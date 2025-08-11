// Partner Program Functions
function openPopup() {
    document.getElementById('popup-modal').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup-modal').style.display = 'none';
}

function nextStep(step) {
    document.querySelector('.wizard-step.active').classList.remove('active');
    document.getElementById('step' + step).classList.add('active');
}

function prevStep(step) {
    document.querySelector('.wizard-step.active').classList.remove('active');
    document.getElementById('step' + step).classList.add('active');
}

// Initialize Partner Form
function initializePartnerForm() {
    // Close modal when clicking outside
    window.onclick = function(event) {
        var modal = document.getElementById('popup-modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // Partner form submission handler with anti-bot measures
    const partnerForm = document.getElementById('partner-form');
    if (partnerForm) {
        // Store form token when form is initialized (if field exists)
        const formTokenField = partnerForm.querySelector('input[name="form_token"]');
        if (formTokenField && formTokenField.value) {
            storeFormToken(formTokenField.value);
        }
        
        partnerForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Add slight delay to ensure human interaction
            setTimeout(() => {
                const formData = new FormData(this);
                const actionUrl = this.action;

                fetch(actionUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Close the popup form if it exists
                        const popupModal = document.getElementById('popup-modal');
                        if (popupModal) {
                            popupModal.style.display = 'none';
                        }
                        
                        // Show the new confirmation modal
                        if (typeof showConfirmationModal === 'function') {
                            showConfirmationModal('partner', {
                                reference: data.reference || 'REF-' + Date.now(),
                                email: formData.get('contactEmail'),
                                name: formData.get('contactName')
                            });
                        } else {
                            // Fallback to old method if new modal isn't available
                            const confirmationMessage = document.getElementById('confirmation-message');
                            if (confirmationMessage) {
                                // Use secure DOM manipulation instead of innerHTML to prevent XSS
                                confirmationMessage.innerHTML = ''; // Clear existing content
                                
                                const p1 = document.createElement('p');
                                p1.textContent = `Dear ${formData.get('contactName')},`;
                                
                                const p2 = document.createElement('p');
                                p2.textContent = 'Thank you for applying to the NU GUI Partner Program.';
                                
                                const p3 = document.createElement('p');
                                p3.textContent = 'Your Reference Number: ';
                                const strong = document.createElement('strong');
                                strong.textContent = data.reference || 'N/A';
                                p3.appendChild(strong);
                                
                                const p4 = document.createElement('p');
                                p4.textContent = 'We will contact you shortly with the next steps.';
                                
                                confirmationMessage.appendChild(p1);
                                confirmationMessage.appendChild(p2);
                                confirmationMessage.appendChild(p3);
                                confirmationMessage.appendChild(p4);
                                
                                confirmationMessage.style.display = 'block';
                                document.getElementById('popup-form-content').style.display = 'none';
                            }
                        }
                    } else {
                        console.error('Error response from server:', data);
                        alert('There was an error submitting your application. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('There was an error submitting your application. Please try again.');
                });
            }, 500); // 500ms delay
        });
    }

    // Step 2 next button handler
    const step2NextButton = document.getElementById('step2NextButton');
    if (step2NextButton) {
        step2NextButton.addEventListener('click', function() {
            const emailField = document.getElementById('contactEmail');
            if (emailField.value === '') {
                document.getElementById('emailError').style.display = 'block';
            } else {
                document.getElementById('emailError').style.display = 'none';
                nextStep(3);
            }
        });
    }

    // Populate country dropdown
    const countryList = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia",
        "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
        "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde",
        "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)",
        "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Denmark", "Djibouti", "Dominica", "Dominican Republic",
        "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini (fmr. Swaziland)", "Ethiopia", "Fiji", "Finland",
        "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana",
        "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan",
        "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
        "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
        "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
        "Myanmar (formerly Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
        "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru",
        "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
        "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore",
        "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka",
        "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo",
        "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom",
        "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];

    const countryDropdown = document.getElementById('countryBusiness');
    if (countryDropdown) {
        countryList.sort().forEach(country => {
            const option = document.createElement('option');
            option.value = country;
            option.text = country;
            countryDropdown.add(option);
        });
    }
}

// Store form token in session storage for validation
function storeFormToken(token) {
    // Send token to server to store in session
    fetch('/store-form-token', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify({ token: token })
    }).catch(error => {
        // Silently fail - token storage is optional for anti-bot protection
        // Log suppressed for production
    });
}

// Anti-bot measures
document.addEventListener('DOMContentLoaded', function() {
    // Track mouse movement to detect human behavior
    let mouseMovements = 0;
    document.addEventListener('mousemove', function() {
        mouseMovements++;
    });
    
    // Track keyboard interaction
    let keyPresses = 0;
    document.addEventListener('keydown', function() {
        keyPresses++;
    });
    
    // Store interaction data for validation
    window.humanInteraction = function() {
        return mouseMovements > 5 && keyPresses > 0;
    };
    
    // Initialize partner form if on partner page
    if (document.getElementById('partner-form')) {
        initializePartnerForm();
    }
    
    // Add basic form validation for all forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Check for human interaction before allowing submission
            if (typeof window.humanInteraction === 'function' && !window.humanInteraction()) {
                console.warn('Potential bot detected - no human interaction');
            }
            
            // Add timestamp to track form completion time
            const startTime = form.querySelector('input[name="form_start_time"]');
            if (startTime) {
                const currentTime = Math.floor(Date.now() / 1000);
                const timeTaken = currentTime - parseInt(startTime.value);
                
                const minimumTime = 3; // Should match server-side configuration
                if (timeTaken < minimumTime) {
                    e.preventDefault();
                    alert('Please take your time to fill out the form properly.');
                    return false;
                }
            }
        });
    });
});