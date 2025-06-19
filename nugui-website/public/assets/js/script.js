document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    const applyNowButton = document.querySelector('button[onclick="validateCaptchaBeforeOpening()"]');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'); // CSRF token
    const reCaptchaSiteKey = '6LeFaLYqAAAAAG7nmm6vUjjC16Ah_hUo4rQhPZTs';

    const loader = document.createElement('div');
    loader.className = 'loader';
    document.body.appendChild(loader);

    const showLoader = () => loader.classList.add('active');
    const hideLoader = () => loader.classList.remove('active');

    // Hamburger menu toggle logic
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('mobile-menu');
            hamburger.classList.toggle('active');
        });
    }

    // Handle "Apply Now" button click with reCAPTCHA validation
    if (applyNowButton) {
        applyNowButton.addEventListener('click', (event) => {
            event.preventDefault();
            validateCaptchaBeforeOpening(csrfToken, reCaptchaSiteKey);
        });
    }

    // Handle partner form submission
    const partnerForm = document.getElementById('partner-form');
    if (partnerForm) {
        partnerForm.addEventListener('submit', (event) => {
            event.preventDefault();
            showLoader();

            grecaptcha.ready(() => {
                grecaptcha.execute(reCaptchaSiteKey, { action: 'submit' })
                    .then((token) => {
                        const formData = new FormData(partnerForm);
                        formData.append('g-recaptcha-response', token);

                        fetch(partnerForm.action, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': csrfToken },
                            body: formData,
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                hideLoader();
                                if (data.status === 'success') {
                                    displaySuccessMessage(formData, data);
                                } else {
                                    alert('Form submission failed. Please try again.');
                                }
                            })
                            .catch(() => {
                                hideLoader();
                                alert('An unexpected error occurred. Please try again.');
                            });
                    })
                    .catch(() => {
                        hideLoader();
                        alert('Failed to execute CAPTCHA. Please try again.');
                    });
            });
        });
    }
});

// Validate reCAPTCHA token with the backend
function validateCaptchaBeforeOpening(csrfToken, siteKey) {
    if (typeof grecaptcha === 'undefined') {
        alert('CAPTCHA is unavailable. Please try again later.');
        return;
    }

    grecaptcha.ready(() => {
        grecaptcha.execute(siteKey, { action: 'validate' })
            .then((token) => validateReCaptcha(csrfToken, token))
            .then((isValid) => {
                if (isValid) openPopup();
                else alert('CAPTCHA validation failed. Please refresh the page and try again.');
            })
            .catch(() => alert('An unexpected error occurred. Please refresh the page and try again.'));
    });
}

// Validate reCAPTCHA token with the backend
function validateReCaptcha(csrfToken, token) {
    return fetch('/validate-recaptcha', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ token }),
    })
        .then((response) => response.json())
        .then((data) => data.status === 'success')
        .catch(() => false);
}

// Display success message
function displaySuccessMessage(formData, data) {
    const confirmationMessage = document.getElementById('confirmation-message');
    confirmationMessage.innerHTML = `
        <p>Dear ${formData.get('contactName')},</p>
        <p>Thank you for applying to the NU GUI Partner Program. Your application has been received and is under review.</p>
        <p>Your Reference Number: <strong>${data.reference}</strong></p>
        <p>We will contact you shortly with the next steps.</p>
        <p>Best regards,<br>NU GUI Team</p>
    `;
    confirmationMessage.style.display = 'block';

    document.getElementById('popup-form-content').style.display = 'none';
}

// Open and close popup modal
function openPopup() {
    const popupModal = document.getElementById('popup-modal');
    if (popupModal) {
        popupModal.style.display = 'block';
        popupModal.setAttribute('aria-hidden', 'false');
    }
}

function closePopup() {
    const popupModal = document.getElementById('popup-modal');
    if (popupModal) {
        popupModal.style.display = 'none';
        popupModal.setAttribute('aria-hidden', 'true');
    }
}
