/**
 * Business Form Validation and Security
 */

// Personal email domains list
const personalEmailDomains = [
    'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'live.com',
    'icloud.com', 'me.com', 'mac.com', 'aol.com', 'protonmail.com',
    'yandex.com', 'mail.ru', 'qq.com', '163.com', 'sina.com'
];

// Track form interactions
let formInteractions = {
    startTime: Date.now(),
    interactions: 0,
    fieldFocuses: {},
    mouseMovements: 0,
    keystrokes: 0
};

// Initialize form security
document.addEventListener('DOMContentLoaded', function() {
    initializeFormSecurity();
    setupEmailValidation();
    setupInteractionTracking();
});

/**
 * Initialize form security measures
 */
function initializeFormSecurity() {
    // Track mouse movements
    let lastMouseMove = 0;
    document.addEventListener('mousemove', function() {
        const now = Date.now();
        if (now - lastMouseMove > 100) { // Throttle to every 100ms
            formInteractions.mouseMovements++;
            lastMouseMove = now;
        }
    });
    
    // Track keystrokes on form fields
    document.querySelectorAll('.track-interaction').forEach(field => {
        field.addEventListener('keypress', function() {
            formInteractions.keystrokes++;
        });
    });
    
    // Disable form submission for suspicious activity
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateFormSecurity()) {
                e.preventDefault();
                showSecurityWarning();
                return false;
            }
        });
    });
}

/**
 * Setup email validation and company website requirement
 */
function setupEmailValidation() {
    const emailFields = document.querySelectorAll('input[type="email"][data-business-email="true"]');
    
    emailFields.forEach(emailField => {
        emailField.addEventListener('blur', function() {
            validateBusinessEmail(this);
        });
        
        emailField.addEventListener('input', function() {
            const domain = extractDomain(this.value);
            if (domain) {
                checkEmailDomain(domain, this);
            }
        });
    });
}

/**
 * Validate business email
 */
function validateBusinessEmail(emailField) {
    const email = emailField.value;
    const domain = extractDomain(email);
    
    if (!domain) return;
    
    const isPersonalEmail = personalEmailDomains.includes(domain.toLowerCase());
    const websiteGroup = document.getElementById('company_website_group');
    const websiteField = document.getElementById('company_website');
    
    if (isPersonalEmail) {
        // Show company website field for personal emails
        if (websiteGroup) {
            websiteGroup.style.display = 'block';
            websiteField.setAttribute('required', 'required');
            
            // Add warning message
            showFieldMessage(emailField, 'warning', 
                'Personal email detected. Please provide your company website for verification.');
        }
    } else {
        // Hide company website field for business emails
        if (websiteGroup) {
            websiteGroup.style.display = 'none';
            websiteField.removeAttribute('required');
        }
        
        // Show success message
        showFieldMessage(emailField, 'success', 'Business email verified');
    }
    
    // Track email validation to server
    trackEmailValidation(email, domain, isPersonalEmail);
}

/**
 * Extract domain from email
 */
function extractDomain(email) {
    const parts = email.split('@');
    return parts.length === 2 ? parts[1] : null;
}

/**
 * Check email domain against server rules
 */
function checkEmailDomain(domain, emailField) {
    // Debounce the check
    clearTimeout(emailField.domainCheckTimeout);
    emailField.domainCheckTimeout = setTimeout(() => {
        fetch('/api/check-email-domain', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({ domain: domain })
        })
        .then(response => response.json())
        .then(data => {
            if (data.blocked) {
                showFieldMessage(emailField, 'error', data.message || 'This email domain is not accepted');
                emailField.setCustomValidity('Please use a business email address');
            } else {
                emailField.setCustomValidity('');
            }
        })
        .catch(error => {
            console.error('Domain check failed:', error);
        });
    }, 500);
}

/**
 * Setup interaction tracking
 */
function setupInteractionTracking() {
    const trackableFields = document.querySelectorAll('.track-interaction');
    
    trackableFields.forEach(field => {
        // Track focus events
        field.addEventListener('focus', function() {
            const fieldName = this.name || this.id;
            if (!formInteractions.fieldFocuses[fieldName]) {
                formInteractions.fieldFocuses[fieldName] = 0;
            }
            formInteractions.fieldFocuses[fieldName]++;
            formInteractions.interactions++;
            
            // Send interaction to server
            trackInteraction('field_focus', { field: fieldName });
        });
        
        // Track changes
        field.addEventListener('change', function() {
            formInteractions.interactions++;
            trackInteraction('field_change', { field: this.name || this.id });
        });
    });
}

/**
 * Track interaction to server
 */
function trackInteraction(type, data) {
    const formToken = document.querySelector('input[name="form_token"]')?.value;
    if (!formToken) return;
    
    fetch('/api/track-interaction', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify({
            token: formToken,
            type: type,
            data: data
        })
    }).catch(error => {
        // Silently fail - tracking is not critical
    });
}

/**
 * Track email validation
 */
function trackEmailValidation(email, domain, isPersonal) {
    const formToken = document.querySelector('input[name="form_token"]')?.value;
    if (!formToken) return;
    
    fetch('/api/track-email-validation', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify({
            token: formToken,
            email: email,
            domain: domain,
            is_personal: isPersonal
        })
    }).catch(error => {
        // Silently fail
    });
}

/**
 * Validate form security before submission
 */
function validateFormSecurity() {
    const timeSpent = (Date.now() - formInteractions.startTime) / 1000; // seconds
    
    // Check minimum time (5 seconds)
    if (timeSpent < 5) {
        console.warn('Form submitted too quickly');
        return false;
    }
    
    // Check minimum interactions
    if (formInteractions.interactions < 3) {
        console.warn('Insufficient form interactions');
        return false;
    }
    
    // Check for bot-like behavior
    if (formInteractions.mouseMovements === 0 && formInteractions.keystrokes === 0) {
        console.warn('No human interactions detected');
        return false;
    }
    
    return true;
}

/**
 * Show field message
 */
function showFieldMessage(field, type, message) {
    // Remove existing messages
    const existingMessage = field.parentElement.querySelector('.field-message');
    if (existingMessage) {
        existingMessage.remove();
    }
    
    // Create new message
    const messageDiv = document.createElement('div');
    messageDiv.className = `field-message field-message--${type}`;
    messageDiv.textContent = message;
    
    // Add after field
    field.parentElement.appendChild(messageDiv);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}

/**
 * Show security warning
 */
function showSecurityWarning() {
    const modal = document.createElement('div');
    modal.className = 'security-warning-modal';
    modal.innerHTML = `
        <div class="security-warning-content">
            <h3>Security Check Failed</h3>
            <p>We detected unusual activity. Please complete the form normally and try again.</p>
            <button onclick="this.parentElement.parentElement.remove()">OK</button>
        </div>
    `;
    document.body.appendChild(modal);
}

/**
 * Validate company website
 */
function validateCompanyWebsite(url) {
    // Basic URL validation
    try {
        const parsed = new URL(url.startsWith('http') ? url : 'https://' + url);
        return parsed.hostname && parsed.hostname.includes('.');
    } catch {
        return false;
    }
}

// Add styles for messages
const style = document.createElement('style');
style.textContent = `
    .field-message {
        margin-top: 5px;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.9em;
        animation: slideIn 0.3s ease;
    }
    
    .field-message--success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .field-message--warning {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
    
    .field-message--error {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .security-warning-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
    }
    
    .security-warning-content {
        background: white;
        padding: 30px;
        border-radius: 8px;
        max-width: 400px;
        text-align: center;
    }
    
    .security-warning-content h3 {
        color: #dc3545;
        margin-bottom: 15px;
    }
    
    .security-warning-content button {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 15px;
    }
    
    .form-note {
        margin-top: 10px;
        font-size: 0.9em;
        color: #666;
        font-style: italic;
    }
    
    .required {
        color: #dc3545;
    }
    
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);