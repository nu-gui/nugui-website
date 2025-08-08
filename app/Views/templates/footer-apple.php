<!-- Apple-Inspired Professional Footer -->
<footer class="footer" style="background: var(--color-background-secondary); border-top: 1px solid var(--color-separator); padding: var(--spacing-5xl) 0 var(--spacing-xl);">
    <div class="container">
        <div class="grid grid--cols-4" style="gap: var(--spacing-2xl);">
            <!-- Company Info -->
            <div style="grid-column: span 2;">
                <div style="display: flex; align-items: center; margin-bottom: var(--spacing-lg);">
                    <!-- Theme-aware logo -->
                    <div style="height: 32px; width: auto; margin-right: var(--spacing-sm);">
                        <?= picture_logo(true, 'footer-logo') ?>
                    </div>
                    <span style="font-family: var(--font-family-display); font-size: var(--font-size-lg); font-weight: var(--font-weight-semibold); color: var(--color-text-primary);">NuGui</span>
                </div>
                <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg); max-width: 400px; line-height: var(--line-height-relaxed);">
                    Leading telecommunications infrastructure provider specializing in VoIP services, call control systems, SMS solutions, and data enrichment services for carriers and enterprises.
                </p>
                <div style="display: flex; gap: var(--spacing-md);">
                    <a href="https://www.linkedin.com/company/nu-gui/" 
                       target="_blank"
                       rel="noopener noreferrer"
                       style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: var(--color-surface); border-radius: var(--border-radius); transition: all var(--transition-base);"
                       onmouseover="this.style.background='var(--color-primary)'; this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.background='var(--color-surface)'; this.style.transform='translateY(0)'">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/27211100555" 
                       target="_blank"
                       rel="noopener noreferrer"
                       style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: var(--color-surface); border-radius: var(--border-radius); transition: all var(--transition-base);"
                       onmouseover="this.style.background='var(--color-success)'; this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.background='var(--color-surface)'; this.style.transform='translateY(0)'">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 style="color: var(--color-text-primary); font-weight: var(--font-weight-semibold); margin-bottom: var(--spacing-lg); font-size: var(--font-size-base);">Solutions</h3>
                <ul style="space-y: var(--spacing-sm);">
                    <li style="margin-bottom: var(--spacing-sm);">
                        <a href="<?= base_url('/solutions#nu-sip'); ?>" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-text-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            NU SIP Services
                        </a>
                    </li>
                    <li style="margin-bottom: var(--spacing-sm);">
                        <a href="<?= base_url('/solutions#nu-app'); ?>" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-text-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            NU APP Platform
                        </a>
                    </li>
                    <li style="margin-bottom: var(--spacing-sm);">
                        <a href="<?= base_url('/solutions#nu-data'); ?>" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-text-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            NU DATA Analytics
                        </a>
                    </li>
                    <li style="margin-bottom: var(--spacing-sm);">
                        <a href="<?= base_url('/solutions#nu-voice'); ?>" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-text-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            NU VOICE Services
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div>
                <h3 style="color: var(--color-text-primary); font-weight: var(--font-weight-semibold); margin-bottom: var(--spacing-lg); font-size: var(--font-size-base);">Contact</h3>
                <div style="display: flex; flex-direction: column; gap: var(--spacing-md);">
                    <div>
                        <h4 style="font-size: var(--font-size-sm); font-weight: var(--font-weight-medium); color: var(--color-text-secondary); margin-bottom: var(--spacing-xs);">General Inquiries</h4>
                        <a href="mailto:info@nugui.co.za" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            info@nugui.co.za
                        </a>
                    </div>
                    <div>
                        <h4 style="font-size: var(--font-size-sm); font-weight: var(--font-weight-medium); color: var(--color-text-secondary); margin-bottom: var(--spacing-xs);">Sales</h4>
                        <a href="mailto:sales@nugui.co.za" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            sales@nugui.co.za
                        </a>
                    </div>
                    <div>
                        <h4 style="font-size: var(--font-size-sm); font-weight: var(--font-weight-medium); color: var(--color-text-secondary); margin-bottom: var(--spacing-xs);">Office</h4>
                        <a href="tel:+27211100565" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            +27 21 110 565
                        </a>
                    </div>
                    <div>
                        <h4 style="font-size: var(--font-size-sm); font-weight: var(--font-weight-medium); color: var(--color-text-secondary); margin-bottom: var(--spacing-xs);">Support</h4>
                        <a href="tel:+27211100555" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            +27 21 110 555
                        </a>
                    </div>
                    <div>
                        <h4 style="font-size: var(--font-size-sm); font-weight: var(--font-weight-medium); color: var(--color-text-secondary); margin-bottom: var(--spacing-xs);">Location</h4>
                        <p style="color: var(--color-text-secondary);">Cape Town, South Africa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div style="margin-top: var(--spacing-3xl); padding-top: var(--spacing-xl); border-top: 1px solid var(--color-separator); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--spacing-lg);">
            <div style="display: flex; gap: var(--spacing-xl); flex-wrap: wrap;">
                <a href="javascript:void(0)" onclick="showPrivacyPopup()" 
                   style="color: var(--color-text-secondary); font-size: var(--font-size-sm); transition: color var(--transition-fast); text-decoration: none;"
                   onmouseover="this.style.color='var(--color-text-primary)'"
                   onmouseout="this.style.color='var(--color-text-secondary)'">
                    Privacy Policy
                </a>
                <a href="javascript:void(0)" onclick="showTermsPopup()" 
                   style="color: var(--color-text-secondary); font-size: var(--font-size-sm); transition: color var(--transition-fast); text-decoration: none;"
                   onmouseover="this.style.color='var(--color-text-primary)'"
                   onmouseout="this.style.color='var(--color-text-secondary)'">
                    Terms of Service
                </a>
                <a href="javascript:void(0)" onclick="showCookiePopup()" 
                   style="color: var(--color-text-secondary); font-size: var(--font-size-sm); transition: color var(--transition-fast); text-decoration: none;"
                   onmouseover="this.style.color='var(--color-text-primary)'"
                   onmouseout="this.style.color='var(--color-text-secondary)'">
                    Cookie Policy
                </a>
            </div>
            <p style="color: var(--color-text-tertiary); font-size: var(--font-size-sm);">
                © <?= date('Y'); ?> NU GUI. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<!-- Responsive Footer Styles -->
<style>
/* Footer Logo Theme Switching */
.footer-logo-light {
    display: block;
}

.footer-logo-dark {
    display: none;
}

[data-theme="dark"] .footer-logo-light {
    display: none;
}

[data-theme="dark"] .footer-logo-dark {
    display: block;
}

@media (max-width: 1024px) {
    .footer .grid--cols-4 {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .footer .grid--cols-4 > div:first-child {
        grid-column: span 2;
    }
}

@media (max-width: 768px) {
    .footer .grid--cols-4 {
        grid-template-columns: 1fr;
        gap: var(--spacing-xl);
    }
    
    .footer .grid--cols-4 > div:first-child {
        grid-column: span 1;
    }
    
    .footer div[style*="justify-content: space-between"] {
        flex-direction: column;
        align-items: flex-start !important;
        gap: var(--spacing-lg) !important;
    }
    
    .footer div[style*="display: flex; gap: var(--spacing-xl)"] {
        flex-direction: column;
        gap: var(--spacing-sm) !important;
    }
}

/* Modal Popup Styles */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    backdrop-filter: blur(4px);
}

.modal {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: var(--color-background);
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-lg);
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    padding: var(--spacing-2xl);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-lg);
    border-bottom: 1px solid var(--color-separator);
    padding-bottom: var(--spacing-md);
}

.modal-title {
    font-family: var(--font-family-display);
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-semibold);
    color: var(--color-text-primary);
}

.modal-close {
    background: none;
    border: none;
    font-size: var(--font-size-lg);
    cursor: pointer;
    color: var(--color-text-secondary);
    padding: var(--spacing-xs);
    border-radius: var(--border-radius);
    transition: all var(--transition-fast);
}

.modal-close:hover {
    background: var(--color-surface-secondary);
    color: var(--color-text-primary);
}

.modal-content {
    color: var(--color-text-secondary);
    line-height: var(--line-height-relaxed);
}

.modal-content h3 {
    color: var(--color-text-primary);
    font-weight: var(--font-weight-semibold);
    margin: var(--spacing-lg) 0 var(--spacing-sm) 0;
}

.modal-content p {
    margin-bottom: var(--spacing-md);
}

.modal-content ul {
    margin: var(--spacing-sm) 0 var(--spacing-md) var(--spacing-lg);
}

.modal-content li {
    margin-bottom: var(--spacing-xs);
}

@media (max-width: 768px) {
    .modal {
        max-width: calc(100vw - var(--spacing-lg));
        margin: var(--spacing-md);
    }
}
</style>

<!-- Modal Popups -->
<div id="privacyModal" class="modal-overlay" onclick="closeModal('privacyModal')">
    <div class="modal" onclick="event.stopPropagation()">
        <div class="modal-header">
            <h2 class="modal-title">Privacy Policy</h2>
            <button class="modal-close" onclick="closeModal('privacyModal')">&times;</button>
        </div>
        <div class="modal-content">
            <p><strong>Effective Date:</strong> <?= date('F j, Y') ?></p>
            
            <h3>Information We Collect</h3>
            <p>We collect information you provide directly to us, such as when you create an account, use our services, or contact us for support.</p>
            
            <h3>How We Use Your Information</h3>
            <p>We use the information we collect to provide, maintain, and improve our telecommunications services, process transactions, and communicate with you.</p>
            
            <h3>Information Sharing</h3>
            <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy.</p>
            
            <h3>Data Security</h3>
            <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
            
            <h3>Contact Us</h3>
            <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:privacy@nugui.co.za">privacy@nugui.co.za</a>.</p>
        </div>
    </div>
</div>

<div id="termsModal" class="modal-overlay" onclick="closeModal('termsModal')">
    <div class="modal" onclick="event.stopPropagation()">
        <div class="modal-header">
            <h2 class="modal-title">Terms of Service</h2>
            <button class="modal-close" onclick="closeModal('termsModal')">&times;</button>
        </div>
        <div class="modal-content">
            <p><strong>Effective Date:</strong> <?= date('F j, Y') ?></p>
            
            <h3>Acceptance of Terms</h3>
            <p>By accessing or using NU GUI's telecommunications services, you agree to be bound by these Terms of Service.</p>
            
            <h3>Service Description</h3>
            <p>NU GUI provides enterprise telecommunications solutions including VoIP services, SMS platforms, call control systems, and data management services.</p>
            
            <h3>User Responsibilities</h3>
            <ul>
                <li>Comply with all applicable laws and regulations</li>
                <li>Provide accurate and complete information</li>
                <li>Maintain the security of your account credentials</li>
                <li>Use services in accordance with acceptable use policies</li>
            </ul>
            
            <h3>Service Availability</h3>
            <p>We strive to maintain 99.99% uptime but cannot guarantee uninterrupted service due to maintenance, upgrades, or circumstances beyond our control.</p>
            
            <h3>Limitation of Liability</h3>
            <p>NU GUI's liability is limited to the fees paid for services in the preceding twelve months.</p>
            
            <h3>Contact Information</h3>
            <p>For questions regarding these terms, contact us at <a href="mailto:legal@nugui.co.za">legal@nugui.co.za</a>.</p>
        </div>
    </div>
</div>

<div id="cookieModal" class="modal-overlay" onclick="closeModal('cookieModal')">
    <div class="modal" onclick="event.stopPropagation()">
        <div class="modal-header">
            <h2 class="modal-title">Cookie Policy</h2>
            <button class="modal-close" onclick="closeModal('cookieModal')">&times;</button>
        </div>
        <div class="modal-content">
            <p><strong>Last Updated:</strong> <?= date('F j, Y') ?></p>
            
            <h3>What Are Cookies</h3>
            <p>Cookies are small text files stored on your device when you visit our website. They help us provide you with a better experience.</p>
            
            <h3>Types of Cookies We Use</h3>
            <ul>
                <li><strong>Essential Cookies:</strong> Required for basic website functionality</li>
                <li><strong>Analytics Cookies:</strong> Help us understand how visitors use our site</li>
                <li><strong>Functional Cookies:</strong> Remember your preferences and settings</li>
                <li><strong>Performance Cookies:</strong> Monitor website performance and speed</li>
            </ul>
            
            <h3>Managing Cookies</h3>
            <p>You can control cookies through your browser settings. However, disabling certain cookies may affect website functionality.</p>
            
            <h3>Third-Party Cookies</h3>
            <p>We may use third-party services that set cookies for analytics and performance monitoring purposes.</p>
            
            <h3>Updates to This Policy</h3>
            <p>We may update this Cookie Policy periodically. Changes will be posted on this page with an updated revision date.</p>
            
            <p>For cookie-related questions, contact us at <a href="mailto:privacy@nugui.co.za">privacy@nugui.co.za</a>.</p>
        </div>
    </div>
</div>

<script>
function showPrivacyPopup() {
    document.getElementById('privacyModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function showTermsPopup() {
    document.getElementById('termsModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function showCookiePopup() {
    document.getElementById('cookieModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when pressing Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal('privacyModal');
        closeModal('termsModal');
        closeModal('cookieModal');
    }
});
</script>
