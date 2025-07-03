<!-- Apple-Inspired Professional Footer -->
<footer class="footer" style="background: var(--color-background-secondary); border-top: 1px solid var(--color-separator); padding: var(--spacing-5xl) 0 var(--spacing-xl);">
    <div class="container">
        <div class="grid grid--cols-4" style="gap: var(--spacing-2xl);">
            <!-- Company Info -->
            <div style="grid-column: span 2;">
                <div style="display: flex; align-items: center; margin-bottom: var(--spacing-lg);">
                    <!-- Theme-aware logo -->
                    <img src="<?= base_url('assets/images/NUGUI-ICON-6 - Light.png'); ?>" 
                         alt="NuGui Logo" 
                         class="footer-logo-light"
                         style="height: 32px; width: auto; margin-right: var(--spacing-sm);">
                    <img src="<?= base_url('assets/images/NUGUI-ICON-7 - Dark.png'); ?>" 
                         alt="NuGui Logo" 
                         class="footer-logo-dark"
                         style="height: 32px; width: auto; margin-right: var(--spacing-sm); display: none;">
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
                        <h4 style="font-size: var(--font-size-sm); font-weight: var(--font-weight-medium); color: var(--color-text-secondary); margin-bottom: var(--spacing-xs);">Phone</h4>
                        <a href="tel:+27211100565" 
                           style="color: var(--color-text-secondary); transition: color var(--transition-fast); text-decoration: none;"
                           onmouseover="this.style.color='var(--color-primary)'"
                           onmouseout="this.style.color='var(--color-text-secondary)'">
                            +27 21 110 0565
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
                <a href="<?= base_url('/privacy-policy'); ?>" 
                   style="color: var(--color-text-secondary); font-size: var(--font-size-sm); transition: color var(--transition-fast); text-decoration: none;"
                   onmouseover="this.style.color='var(--color-text-primary)'"
                   onmouseout="this.style.color='var(--color-text-secondary)'">
                    Privacy Policy
                </a>
                <a href="<?= base_url('/terms-of-service'); ?>" 
                   style="color: var(--color-text-secondary); font-size: var(--font-size-sm); transition: color var(--transition-fast); text-decoration: none;"
                   onmouseover="this.style.color='var(--color-text-primary)'"
                   onmouseout="this.style.color='var(--color-text-secondary)'">
                    Terms of Service
                </a>
                <a href="<?= base_url('/cookie-policy'); ?>" 
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
</style>
