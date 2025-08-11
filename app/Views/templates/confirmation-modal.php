<!-- Confirmation Modal Template -->
<style>
    .confirmation-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        backdrop-filter: blur(10px);
        animation: fadeIn 0.3s ease;
    }
    
    .confirmation-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .confirmation-content {
        background: var(--color-surface, #ffffff);
        border-radius: 24px;
        padding: 40px;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease;
        position: relative;
    }
    
    /* Ensure proper backgrounds in both themes */
    [data-theme="light"] .confirmation-content {
        background: #ffffff;
        color: #1d1d1f;
    }
    
    [data-theme="dark"] .confirmation-content {
        background: #1c1c1e;
        color: #f5f5f7;
    }
    
    .confirmation-header {
        text-align: center;
        margin-bottom: 24px;
    }
    
    .confirmation-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 16px;
        background: linear-gradient(135deg, #4CAF50, #45a049);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .confirmation-icon svg {
        width: 32px;
        height: 32px;
        color: white;
    }
    
    .confirmation-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--color-text-primary);
        margin-bottom: 8px;
    }
    
    .confirmation-subtitle {
        font-size: 1rem;
        color: var(--color-text-secondary);
    }
    
    .confirmation-body {
        margin-bottom: 24px;
    }
    
    .confirmation-details {
        background: var(--color-background, #f5f5f7);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 16px;
    }
    
    [data-theme="light"] .confirmation-details {
        background: #f5f5f7;
        border: 1px solid #e8e8ed;
    }
    
    [data-theme="dark"] .confirmation-details {
        background: #2c2c2e;
        border: 1px solid #3a3a3c;
    }
    
    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--color-border);
    }
    
    .detail-row:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .detail-label {
        font-size: 0.9rem;
        color: var(--color-text-secondary);
    }
    
    .detail-value {
        font-size: 1rem;
        font-weight: 600;
        color: var(--color-text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .copy-btn {
        background: var(--color-accent);
        color: white;
        border: none;
        padding: 4px 8px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }
    
    .copy-btn:hover {
        background: var(--color-accent-secondary);
        transform: scale(1.05);
    }
    
    .copy-btn.copied {
        background: #4CAF50;
    }
    
    .confirmation-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
    }
    
    .action-btn {
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }
    
    .action-btn.primary {
        background: var(--color-accent, #007AFF);
        color: white !important;
        border: 2px solid var(--color-accent, #007AFF);
    }
    
    .action-btn.primary:hover {
        background: var(--color-accent-secondary, #0051D5);
        border-color: var(--color-accent-secondary, #0051D5);
        transform: translateY(-2px);
    }
    
    .action-btn.secondary {
        background: transparent;
        color: var(--color-accent, #007AFF);
        border: 2px solid var(--color-accent, #007AFF);
    }
    
    .action-btn.secondary:hover {
        background: var(--color-accent, #007AFF);
        color: white !important;
    }
    
    /* Ensure button visibility in both themes */
    [data-theme="light"] .action-btn.primary {
        background: #007AFF;
        color: white !important;
        border-color: #007AFF;
    }
    
    [data-theme="light"] .action-btn.primary:hover {
        background: #0051D5;
        border-color: #0051D5;
    }
    
    [data-theme="dark"] .action-btn.primary {
        background: #0A84FF;
        color: white !important;
        border-color: #0A84FF;
    }
    
    [data-theme="dark"] .action-btn.primary:hover {
        background: #0066CC;
        border-color: #0066CC;
    }
    
    .close-modal {
        position: absolute;
        top: 20px;
        right: 20px;
        background: transparent;
        border: none;
        color: var(--color-text-secondary);
        cursor: pointer;
        font-size: 1.5rem;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    
    .close-modal:hover {
        background: var(--color-background);
        color: var(--color-text-primary);
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Mobile responsiveness */
    @media (max-width: 640px) {
        .confirmation-content {
            padding: 24px;
            width: 95%;
        }
        
        .confirmation-actions {
            flex-direction: column;
        }
        
        .action-btn {
            width: 100%;
        }
    }
</style>

<script>
    function showConfirmationModal(type, data) {
        const modal = document.getElementById('confirmationModal');
        const modalContent = document.getElementById('modalContent');
        
        if (type === 'partner') {
            modalContent.innerHTML = getPartnerConfirmation(data);
        } else if (type === 'contact') {
            modalContent.innerHTML = getContactConfirmation(data);
        } else if (type === 'support') {
            modalContent.innerHTML = getSupportConfirmation(data);
        }
        
        modal.classList.add('active');
        
        // Setup copy buttons
        setupCopyButtons();
    }
    
    function getPartnerConfirmation(data) {
        return `
            <div class="confirmation-header">
                <div class="confirmation-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="confirmation-title">Application Submitted!</h2>
                <p class="confirmation-subtitle">Welcome to the NU GUI Partner Program</p>
            </div>
            
            <div class="confirmation-body">
                <div class="confirmation-details">
                    <div class="detail-row">
                        <span class="detail-label">Reference Number</span>
                        <span class="detail-value">
                            ${data.reference || 'REF-' + Date.now()}
                            <button class="copy-btn" onclick="copyToClipboard('${data.reference || 'REF-' + Date.now()}', this)">Copy</button>
                        </span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Application Status</span>
                        <span class="detail-value" style="color: #4CAF50;">Under Review</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Expected Response</span>
                        <span class="detail-value">Within 48 hours</span>
                    </div>
                </div>
                
                <p style="text-align: center; color: var(--color-text-secondary); margin-top: 16px;">
                    Our partnership team will review your application and contact you with next steps and onboarding information.
                    For inquiries, please contact <strong>sales@nugui.co.za</strong>.
                </p>
            </div>
            
            <div class="confirmation-actions">
                <button class="action-btn secondary" onclick="downloadPartnerInfo('${data.reference || 'REF-' + Date.now()}')">
                    Download Info
                </button>
                <button class="action-btn primary" onclick="closeConfirmationModal()">
                    Got it
                </button>
            </div>
        `;
    }
    
    function getContactConfirmation(data) {
        return `
            <div class="confirmation-header">
                <div class="confirmation-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="confirmation-title">Message Sent!</h2>
                <p class="confirmation-subtitle">We'll get back to you soon</p>
            </div>
            
            <div class="confirmation-body">
                <p style="text-align: center; color: var(--color-text-secondary);">
                    Thank you for reaching out. Our team will respond to <strong>${data.email}</strong> 
                    within 24 hours.
                </p>
            </div>
            
            <div class="confirmation-actions">
                <button class="action-btn primary" onclick="closeConfirmationModal()">
                    Done
                </button>
            </div>
        `;
    }
    
    function getSupportConfirmation(data) {
        return `
            <div class="confirmation-header">
                <div class="confirmation-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="confirmation-title">Ticket Created!</h2>
                <p class="confirmation-subtitle">Your support request has been logged</p>
            </div>
            
            <div class="confirmation-body">
                <div class="confirmation-details">
                    <div class="detail-row">
                        <span class="detail-label">Ticket Number</span>
                        <span class="detail-value">
                            ${data.ticketNumber}
                            <button class="copy-btn" onclick="copyToClipboard('${data.ticketNumber}', this)">Copy</button>
                        </span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Priority</span>
                        <span class="detail-value">${data.priority}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Product</span>
                        <span class="detail-value">${data.product}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Issue</span>
                        <span class="detail-value">${data.issue}</span>
                    </div>
                </div>
                
                <p style="text-align: center; color: var(--color-text-secondary); margin-top: 16px;">
                    We'll send updates to <strong>${data.email}</strong>. 
                    Keep your ticket number for reference.
                </p>
            </div>
            
            <div class="confirmation-actions">
                <button class="action-btn secondary" onclick="downloadTicketInfo('${data.ticketNumber}', ${JSON.stringify(data).replace(/"/g, '&quot;')})">
                    Download Ticket
                </button>
                <button class="action-btn primary" onclick="closeConfirmationModal()">
                    Close
                </button>
            </div>
        `;
    }
    
    function copyToClipboard(text, button) {
        navigator.clipboard.writeText(text).then(() => {
            const originalText = button.textContent;
            button.textContent = 'Copied!';
            button.classList.add('copied');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('copied');
            }, 2000);
        });
    }
    
    function downloadPartnerInfo(reference) {
        const content = `NU GUI Partner Program Application
=====================================
Reference Number: ${reference}
Date: ${new Date().toLocaleDateString()}
Time: ${new Date().toLocaleTimeString()}

Status: Under Review
Expected Response: Within 48 hours

Next Steps:
1. Our partnership team will review your application
2. You will receive an email with onboarding information
3. Initial consultation will be scheduled
4. Partnership agreement will be sent for review

For inquiries, please reference your application number.

Contact: sales@nugui.co.za
Phone: +27 21 110 0565

Thank you for your interest in partnering with NU GUI!`;
        
        downloadTextFile(content, `NUGUI_Partner_Application_${reference}.txt`);
    }
    
    function downloadTicketInfo(ticketNumber, data) {
        const content = `NU GUI Support Ticket
=====================================
Ticket Number: ${ticketNumber}
Date: ${new Date().toLocaleDateString()}
Time: ${new Date().toLocaleTimeString()}

Customer Information:
- Name: ${data.name}
- Email: ${data.email}

Ticket Details:
- Product: ${data.product}
- Priority: ${data.priority}
- Issue: ${data.issue}

Message:
${data.message}

Status: Open
Expected Response: Within 24-48 hours

You can track your ticket status using the ticket number above.
For urgent matters, please call: +27 21 110 0565

Thank you for contacting NU GUI Support!`;
        
        downloadTextFile(content, `NUGUI_Ticket_${ticketNumber}.txt`);
    }
    
    function downloadTextFile(content, filename) {
        const blob = new Blob([content], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    }
    
    function closeConfirmationModal() {
        const modal = document.getElementById('confirmationModal');
        modal.classList.remove('active');
    }
    
    function setupCopyButtons() {
        // Any additional setup for copy buttons
    }
    
    // Close modal on outside click
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('confirmationModal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeConfirmationModal();
                }
            });
        }
    });
</script>

<!-- Modal Container -->
<div id="confirmationModal" class="confirmation-modal">
    <div class="confirmation-content">
        <button class="close-modal" onclick="closeConfirmationModal()">×</button>
        <div id="modalContent">
            <!-- Dynamic content will be inserted here -->
        </div>
    </div>
</div>

<!-- Noscript fallback for users without JavaScript -->
<noscript>
    <style>
        .noscript-message {
            display: block;
            background: var(--color-surface, #ffffff);
            border: 2px solid var(--color-accent, #007AFF);
            border-radius: 12px;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            text-align: center;
        }
        
        .noscript-message h3 {
            color: var(--color-accent, #007AFF);
            margin-bottom: 10px;
        }
        
        .noscript-message p {
            color: var(--color-text-primary);
            margin-bottom: 15px;
        }
        
        .noscript-details {
            background: var(--color-background, #f5f5f7);
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            text-align: left;
        }
        
        .noscript-details strong {
            color: var(--color-text-primary);
            display: inline-block;
            min-width: 120px;
        }
        
        /* Hide JavaScript-dependent elements when JS is disabled */
        .confirmation-modal {
            display: none !important;
        }
    </style>
    
    <?php if (session()->has('success')): ?>
        <div class="noscript-message">
            <h3>✓ Form Submitted Successfully</h3>
            <p><?= esc(session('success')) ?></p>
            
            <?php if (session()->has('ticketNumber')): ?>
                <div class="noscript-details">
                    <strong>Ticket Number:</strong> <?= esc(session('ticketNumber')) ?><br>
                    <?php if (session()->has('email')): ?>
                        <strong>Email:</strong> <?= esc(session('email')) ?><br>
                    <?php endif; ?>
                    <?php if (session()->has('product')): ?>
                        <strong>Product:</strong> <?= esc(session('product')) ?><br>
                    <?php endif; ?>
                    <?php if (session()->has('priority')): ?>
                        <strong>Priority:</strong> <?= esc(session('priority')) ?><br>
                    <?php endif; ?>
                </div>
                <p><small>Please save your ticket number for future reference. You will receive a confirmation email shortly.</small></p>
            <?php endif; ?>
            
            <?php if (session()->has('reference')): ?>
                <div class="noscript-details">
                    <strong>Reference Number:</strong> <?= esc(session('reference')) ?><br>
                    <strong>Status:</strong> Under Review<br>
                    <strong>Expected Response:</strong> Within 48 hours
                </div>
                <p><small>Our partnership team will contact you soon at the email address provided.</small></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</noscript>