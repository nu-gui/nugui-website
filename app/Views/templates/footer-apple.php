<!-- Clean Professional Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-section footer-company">
                <div class="footer-logo-wrapper">
                    <div class="footer-logo">
                        <?= picture_logo(true, 'footer-logo') ?>
                    </div>
                    <span class="footer-brand">NuGui</span>
                </div>
                <p class="footer-description">
                    Leading telecommunications infrastructure provider specializing in VoIP services, call control systems, SMS solutions, and data enrichment services for carriers and enterprises.
                </p>
                <div class="footer-social">
                    <a href="https://www.linkedin.com/company/nu-gui/" 
                       target="_blank"
                       rel="noopener noreferrer"
                       title="Connect with NU GUI on LinkedIn"
                       aria-label="LinkedIn Profile"
                       class="social-link">
                        <svg viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/27211100555" 
                       target="_blank"
                       rel="noopener noreferrer"
                       title="Contact us on WhatsApp"
                       aria-label="WhatsApp Contact"
                       class="social-link">
                        <svg viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Solutions Links -->
            <div class="footer-section">
                <h3>Solutions</h3>
                <ul>
                    <li><a href="<?= base_url('/solutions#nu-sip'); ?>" class="footer-link">NU SIP Services</a></li>
                    <li><a href="<?= base_url('/solutions#nu-app'); ?>" class="footer-link">NU APP Platform</a></li>
                    <li><a href="<?= base_url('/solutions#nu-data'); ?>" class="footer-link">NU DATA Analytics</a></li>
                    <li><a href="<?= base_url('/solutions#nu-voice'); ?>" class="footer-link">NU VOICE Services</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="footer-section">
                <h3>Contact</h3>
                <div class="footer-contact-group">
                    <h4>General Inquiries</h4>
                    <a href="mailto:info@nugui.co.za" class="footer-contact-link">info@nugui.co.za</a>
                </div>
                <div class="footer-contact-group">
                    <h4>Sales</h4>
                    <a href="mailto:sales@nugui.co.za" class="footer-contact-link">sales@nugui.co.za</a>
                </div>
                <div class="footer-contact-group">
                    <h4>Support</h4>
                    <a href="tel:+27211100555" class="footer-contact-link">+27 21 110 555</a>
                </div>
                <div class="footer-contact-group">
                    <h4>Location</h4>
                    <p>Cape Town, South Africa</p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-legal">
                <a href="javascript:void(0)" onclick="showPrivacyPopup()" class="footer-legal-link">Privacy Policy</a>
                <a href="javascript:void(0)" onclick="showTermsPopup()" class="footer-legal-link">Terms of Service</a>
                <a href="javascript:void(0)" onclick="showCookiePopup()" class="footer-legal-link">Cookie Policy</a>
            </div>
            <p class="footer-copyright">© <?= date('Y'); ?> NU GUI. All rights reserved.</p>
        </div>
    </div>
</footer>

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