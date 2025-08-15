<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: var(--color-background);
        color: var(--color-text-primary);
        font-family: var(--font-family-primary);
        margin: 0;
        padding: 0;
    }
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--color-primary);
        letter-spacing: -0.01em;
    }
    /* Hero styles are now in hero-sections.css - no inline overrides needed */
    .section {
        padding: 80px 20px;
        background-color: var(--color-background-secondary);
    }
    .section.alt {
        background-color: var(--color-background);
    }
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .section-header p {
        font-size: 1.2rem;
        max-w-3xl mx-auto;
        color: var(--color-text-secondary);
    }
    /* Card grid styles are now in layout.css - using feature-cards-grid for 3-column layout */
    /* Card styles moved to cards-standardized.css for consistency */
    .how-it-works-steps {
        display: flex;
        justify-content: center;
        text-align: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    /* Step card styles moved to cards-standardized.css for consistency */
    .step {
        max-width: 300px;
        min-width: 220px;
        flex: 1 1 220px;
    }
    .step h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--color-text-primary);
        margin-bottom: 0.75rem;
    }
    .step p {
        font-size: 0.95rem;
        line-height: 1.5;
        color: var(--color-text-secondary);
    }
    .cta-section {
        background: var(--color-background);
        padding: 80px 20px;
        text-align: center;
    }
    .cta-section h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .cta-section p {
        font-size: 1.2rem;
        max-w-2xl mx-auto;
        margin-bottom: 30px;
    }
    
    /* Popup Modal Styles */
    .popup-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
        overflow-y: auto;
        padding: 20px;
    }
    
    .popup-content {
        background-color: var(--color-background);
        margin: 50px auto;
        padding: 40px;
        border-radius: 20px;
        max-width: 600px;
        position: relative;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .close {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        font-weight: 300;
        cursor: pointer;
        color: var(--color-text-secondary);
        transition: color 0.3s ease;
    }
    
    .close:hover {
        color: var(--color-text-primary);
    }
    
    /* Wizard Steps */
    .wizard-step {
        display: none;
    }
    
    .wizard-step.active {
        display: block;
    }
    
    .wizard-step h2 {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 30px;
        color: var(--color-text-primary);
    }
    
    .button-container {
        display: flex;
        gap: 20px;
        justify-content: flex-end;
        margin-top: 30px;
    }
    
    /* Keep form wizard buttons but ensure they don't affect other buttons */
    .wizard-step .button-container button {
        padding: 12px 24px;
        border-radius: 999px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .wizard-step .button-container button[type="button"] {
        background-color: var(--color-background-secondary);
        color: var(--color-text-primary);
        border: 2px solid var(--color-border);
    }
    
    .wizard-step .button-container button[type="button"]:hover {
        background-color: var(--color-border);
        transform: translateY(-2px);
    }
    
    .wizard-step .button-container button[type="submit"] {
        background: linear-gradient(135deg, #00A2E8, #0082BB);
        color: white;
        border: 2px solid transparent;
        box-shadow: 0 4px 16px rgba(0, 162, 232, 0.3);
    }
    
    .wizard-step .button-container button[type="submit"]:hover {
        background: linear-gradient(135deg, #33B5ED, #00A2E8);
        box-shadow: 0 6px 20px rgba(0, 162, 232, 0.4);
        transform: translateY(-2px);
    }
    
    .error {
        color: #ff3b30;
        font-size: 0.875rem;
        margin-top: 5px;
    }
    
    /* Fix CTA button styling to match theme */
    .cta-section .btn--primary {
        background: linear-gradient(135deg, #00A2E8, #0082BB) !important;
        color: #FFFFFF !important;
        border: 2px solid transparent !important;
        box-shadow: 
            0 4px 16px rgba(0, 162, 232, 0.3),
            0 2px 4px rgba(0, 0, 0, 0.1) !important;
        padding: 16px 32px !important;
        border-radius: 999px !important;
        font-weight: 600 !important;
        display: inline-block;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }
    
    .cta-section .btn--primary:hover {
        background: linear-gradient(135deg, #33B5ED, #00A2E8) !important;
        box-shadow: 
            0 6px 20px rgba(0, 162, 232, 0.4),
            0 3px 6px rgba(0, 0, 0, 0.15) !important;
        transform: translateY(-2px);
    }
    
    /* Dark theme adjustment for CTA button */
    @media (prefers-color-scheme: dark) {
        .cta-section .btn--primary {
            background: linear-gradient(135deg, #5AB4F1, #2F69B3) !important;
            border: 2px solid rgba(90, 180, 241, 0.3) !important;
            box-shadow: 
                0 4px 16px rgba(90, 180, 241, 0.3),
                0 2px 4px rgba(0, 0, 0, 0.3) !important;
        }
        
        .cta-section .btn--primary:hover {
            background: linear-gradient(135deg, #7AC5F5, #5AB4F1) !important;
            border-color: rgba(122, 197, 245, 0.5) !important;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl mx-auto">
        <h1>
            Partner with <span class="text-gradient">NU GUI</span>
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px;">
            Join a partner network focused on <strong>outcomes</strong>—reliable communications, measurable ROI, and scalable growth for your customers.<br>
            We collaborate with carriers, resellers, system integrators, and technology providers <strong>worldwide</strong>, with particularly <strong>strong relationships across Africa and India</strong>.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="#application-form" class="btn btn--primary btn--large">Become a Partner</a>
            <a href="<?= base_url('/contact'); ?>" class="btn btn--secondary btn--large">Talk to Sales</a>
        </div>
    </div>
</section>

<!-- Who Partners with NU GUI -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Who Partners with NU GUI?</h2>
        </div>
        <div class="feature-cards-grid">
            <div class="benefit-card">
                <h3>Carriers & Operators (Tier 1 & 2)</h3>
                <p>Expand routing options, add redundancy, and unlock real-time cost and quality insights.</p>
            </div>
            <div class="benefit-card">
                <h3>Resellers & MSPs (Tier 3)</h3>
                <p>White-label our platforms to launch fast, win deals, and retain customers with reliable service.</p>
            </div>
            <div class="benefit-card">
                <h3>System Integrators & Consulting Firms</h3>
                <p>Deliver complex deployments, migrations, and integrations with our support.</p>
            </div>
            <div class="benefit-card">
                <h3>Technology Partners & ISVs</h3>
                <p>Integrate complementary products—analytics, security, CRM, billing, messaging, and more.</p>
            </div>
        </div>
        <p style="text-align: center; margin-top: 2rem; color: var(--color-text-secondary);">Looking to collaborate on a specific use case? <a href="<?= base_url('/contact'); ?>" style="color: var(--color-primary); text-decoration: underline;">Contact us</a> and we'll scope it together.</p>
    </div>
</section>

<!-- Why Partner with NU GUI -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Why Partner with NU GUI</h2>
        </div>
        <div class="feature-cards-grid">
            <div class="benefit-card">
                <h3>Carrier-Grade Reliability</h3>
                <p>Built-in failover and resilient routing.</p>
            </div>
            <div class="benefit-card">
                <h3>Clear ROI</h3>
                <p>Least-cost routing, real-time reporting, and transparent billing models.</p>
            </div>
            <div class="benefit-card">
                <h3>Frictionless Delivery</h3>
                <p>Fast onboarding, guided deployment, and practical documentation.</p>
            </div>
            <div class="benefit-card">
                <h3>Co-Sell & Co-Market</h3>
                <p>Joint go-to-market campaigns, enablement, and case studies.</p>
            </div>
            <div class="benefit-card">
                <h3>Regional Strength</h3>
                <p>Deep relationships and operational experience across <strong>Africa and India</strong>, with global scalability.</p>
            </div>
        </div>
    </div>
</section>

<!-- Partner Program Tiers -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Partner Program Tiers</h2>
        </div>
        <div class="feature-cards-grid">
            <div class="benefit-card">
                <h3>Registered — Get started</h3>
                <p>Access to product overview sessions and partner newsletters. Light-touch support for early opportunities.</p>
            </div>
            <div class="benefit-card">
                <h3>Authorized — Grow together</h3>
                <p>Solution training, deal support, and co-branded assets. Access to demo environments and sandbox accounts. Opportunity registration and basic MDF (where applicable).</p>
            </div>
            <div class="benefit-card">
                <h3>Premier — Scale & co-invest</h3>
                <p>Priority solution engineering and roadmap briefings. Joint go-to-market plans, co-selling, and dedicated partner manager. Eligibility for enhanced MDF and case study development.</p>
            </div>
        </div>
        <p style="text-align: center; margin-top: 2rem; color: var(--color-text-secondary);">Tier benefits can be tailored by region or segment. We'll align on goals and the right tier during onboarding.</p>
    </div>
</section>

<!-- Onboarding Process -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Onboarding – How It Works</h2>
        </div>
        <div class="process-flow-container" style="position: relative; padding: 3rem 1rem; overflow-x: auto;">
            <div class="process-flow" style="display: flex; justify-content: space-between; align-items: center; gap: 0; max-width: 1200px; margin: 0 auto; position: relative;">
                
                <!-- Connecting Line -->
                <div class="flow-line" style="position: absolute; top: 60px; left: 80px; right: 80px; height: 3px; background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4); z-index: 0;"></div>
                
                <!-- Step 1 -->
                <div class="flow-step" style="position: relative; z-index: 1; text-align: center; flex: 1; max-width: 200px;">
                    <div class="step-circle" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; position: relative;">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #FF6B6B, #FF8E53); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 24px rgba(255, 107, 107, 0.3), 0 4px 8px rgba(0, 0, 0, 0.1); border: 3px solid rgba(255, 255, 255, 0.9); position: relative; overflow: hidden;">
                            <span style="font-size: 3rem; font-weight: 700; color: #FFFFFF; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">1</span>
                            <div class="pulse-ring" style="position: absolute; width: 100%; height: 100%; border: 2px solid rgba(255, 107, 107, 0.5); border-radius: 50%; animation: pulse-ring 2s infinite;"></div>
                        </div>
                    </div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-primary); margin-bottom: 0.5rem;">Discovery & Fit</h3>
                    <p style="font-size: 0.9rem; line-height: 1.4; color: var(--color-text-secondary);">Use cases, target markets, and success criteria</p>
                </div>
                
                <!-- Arrow 1 -->
                <div class="flow-arrow" style="flex: 0 0 40px; display: flex; align-items: center; justify-content: center; margin-top: -3rem;">
                    <svg width="40" height="20" viewBox="0 0 40 20" style="opacity: 0.6;">
                        <path d="M0 10 L30 10 M30 10 L25 5 M30 10 L25 15" stroke="#4ECDC4" stroke-width="2" fill="none"/>
                    </svg>
                </div>
                
                <!-- Step 2 -->
                <div class="flow-step" style="position: relative; z-index: 1; text-align: center; flex: 1; max-width: 200px;">
                    <div class="step-circle" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; position: relative;">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #4ECDC4, #44A08D); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 24px rgba(78, 205, 196, 0.3), 0 4px 8px rgba(0, 0, 0, 0.1); border: 3px solid rgba(255, 255, 255, 0.9); position: relative; overflow: hidden;">
                            <span style="font-size: 3rem; font-weight: 700; color: #FFFFFF; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">2</span>
                            <div class="pulse-ring" style="position: absolute; width: 100%; height: 100%; border: 2px solid rgba(78, 205, 196, 0.5); border-radius: 50%; animation: pulse-ring 2s infinite 0.4s;"></div>
                        </div>
                    </div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-primary); margin-bottom: 0.5rem;">Program Selection</h3>
                    <p style="font-size: 0.9rem; line-height: 1.4; color: var(--color-text-secondary);">Registered, Authorized, or Premier</p>
                </div>
                
                <!-- Arrow 2 -->
                <div class="flow-arrow" style="flex: 0 0 40px; display: flex; align-items: center; justify-content: center; margin-top: -3rem;">
                    <svg width="40" height="20" viewBox="0 0 40 20" style="opacity: 0.6;">
                        <path d="M0 10 L30 10 M30 10 L25 5 M30 10 L25 15" stroke="#45B7D1" stroke-width="2" fill="none"/>
                    </svg>
                </div>
                
                <!-- Step 3 -->
                <div class="flow-step" style="position: relative; z-index: 1; text-align: center; flex: 1; max-width: 200px;">
                    <div class="step-circle" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; position: relative;">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #45B7D1, #2196F3); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 24px rgba(69, 183, 209, 0.3), 0 4px 8px rgba(0, 0, 0, 0.1); border: 3px solid rgba(255, 255, 255, 0.9); position: relative; overflow: hidden;">
                            <span style="font-size: 3rem; font-weight: 700; color: #FFFFFF; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">3</span>
                            <div class="pulse-ring" style="position: absolute; width: 100%; height: 100%; border: 2px solid rgba(69, 183, 209, 0.5); border-radius: 50%; animation: pulse-ring 2s infinite 0.8s;"></div>
                        </div>
                    </div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-primary); margin-bottom: 0.5rem;">Enablement Plan</h3>
                    <p style="font-size: 0.9rem; line-height: 1.4; color: var(--color-text-secondary);">Sales + technical training, demo access</p>
                </div>
                
                <!-- Arrow 3 -->
                <div class="flow-arrow" style="flex: 0 0 40px; display: flex; align-items: center; justify-content: center; margin-top: -3rem;">
                    <svg width="40" height="20" viewBox="0 0 40 20" style="opacity: 0.6;">
                        <path d="M0 10 L30 10 M30 10 L25 5 M30 10 L25 15" stroke="#96CEB4" stroke-width="2" fill="none"/>
                    </svg>
                </div>
                
                <!-- Step 4 -->
                <div class="flow-step" style="position: relative; z-index: 1; text-align: center; flex: 1; max-width: 200px;">
                    <div class="step-circle" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; position: relative;">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #96CEB4, #78C2A4); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 24px rgba(150, 206, 180, 0.3), 0 4px 8px rgba(0, 0, 0, 0.1); border: 3px solid rgba(255, 255, 255, 0.9); position: relative; overflow: hidden;">
                            <span style="font-size: 3rem; font-weight: 700; color: #FFFFFF; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">4</span>
                            <div class="pulse-ring" style="position: absolute; width: 100%; height: 100%; border: 2px solid rgba(150, 206, 180, 0.5); border-radius: 50%; animation: pulse-ring 2s infinite 1.2s;"></div>
                        </div>
                    </div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-primary); margin-bottom: 0.5rem;">Launch Kit</h3>
                    <p style="font-size: 0.9rem; line-height: 1.4; color: var(--color-text-secondary);">Co-branded collateral, partner portal access</p>
                </div>
                
                <!-- Arrow 4 -->
                <div class="flow-arrow" style="flex: 0 0 40px; display: flex; align-items: center; justify-content: center; margin-top: -3rem;">
                    <svg width="40" height="20" viewBox="0 0 40 20" style="opacity: 0.6;">
                        <path d="M0 10 L30 10 M30 10 L25 5 M30 10 L25 15" stroke="#9C4DCC" stroke-width="2" fill="none"/>
                    </svg>
                </div>
                
                <!-- Step 5 -->
                <div class="flow-step" style="position: relative; z-index: 1; text-align: center; flex: 1; max-width: 200px;">
                    <div class="step-circle" style="width: 120px; height: 120px; margin: 0 auto 1.5rem; position: relative;">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #9C4DCC, #7B1FA2); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 24px rgba(156, 77, 204, 0.3), 0 4px 8px rgba(0, 0, 0, 0.1); border: 3px solid rgba(255, 255, 255, 0.9); position: relative; overflow: hidden;">
                            <span style="font-size: 3rem; font-weight: 700; color: #FFFFFF; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">5</span>
                            <div class="pulse-ring" style="position: absolute; width: 100%; height: 100%; border: 2px solid rgba(156, 77, 204, 0.5); border-radius: 50%; animation: pulse-ring 2s infinite 1.6s;"></div>
                        </div>
                    </div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-primary); margin-bottom: 0.5rem;">Go-Live & Review</h3>
                    <p style="font-size: 0.9rem; line-height: 1.4; color: var(--color-text-secondary);">First opportunities, post-launch check-in, growth plan</p>
                </div>
            </div>
        </div>
        
        <!-- Add animation keyframes -->
        <style>
            @keyframes pulse-ring {
                0% {
                    transform: scale(1);
                    opacity: 1;
                }
                100% {
                    transform: scale(1.3);
                    opacity: 0;
                }
            }
            
            /* Responsive adjustments */
            @media (max-width: 1024px) {
                .process-flow {
                    flex-direction: column;
                    gap: 2rem !important;
                }
                .flow-line {
                    display: none;
                }
                .flow-arrow {
                    transform: rotate(90deg);
                    margin: 1rem 0 !important;
                }
            }
            
            /* Dark mode adjustments */
            @media (prefers-color-scheme: dark) {
                .flow-step h3 {
                    color: #FFFFFF !important;
                }
                .flow-step p {
                    color: rgba(255, 255, 255, 0.7) !important;
                }
                .flow-arrow svg path {
                    opacity: 0.8;
                }
            }
        </style>
    </div>
</section>

<!-- Regional Strength: Africa & India -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Regional Strength: Africa & India</h2>
            <p>We work closely with partners across <strong>Africa and India</strong>, supporting market entry and scale with:</p>
        </div>
        <div class="feature-cards-grid">
            <div class="benefit-card">
                <h3>Local Routing Expertise</h3>
                <p>Local routing expertise & coverage through regional partners.</p>
            </div>
            <div class="benefit-card">
                <h3>Regulatory Awareness</h3>
                <p>Regulatory awareness and best practices for compliance and data handling.</p>
            </div>
            <div class="benefit-card">
                <h3>Time-zone Aligned Support</h3>
                <p>Time-zone aligned support and enablement for faster execution.</p>
            </div>
        </div>
        <p style="text-align: center; margin-top: 2rem; color: var(--color-text-secondary);">Want to validate regional fit? <a href="<?= base_url('/contact'); ?>" style="color: var(--color-primary); text-decoration: underline;">Speak with a specialist</a>.</p>
    </div>
</section>

<!-- Application Form CTA -->
<section id="application-form" class="cta-section">
    <div class="max-w-4xl mx-auto">
        <h2>Ready to partner?</h2>
        <p>We'd love to learn about your market and goals. Fill out the application form below to take the first step.</p>
        <button onclick="openPopup()" class="btn btn--primary btn--large">Become a Partner</button>
        <a href="<?= base_url('/contact'); ?>" class="btn btn--secondary btn--large" style="margin-left: 1rem;">Talk to Sales</a>
    </div>
</section>

<!-- Popup Modal -->
<div id="popup-modal" class="popup-modal" role="dialog" aria-labelledby="form-title" aria-hidden="true">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <div id="popup-form-content">
            <div class="partner-form futuristic-form" style="max-width: 700px; margin: 0 auto;">
                <form id="partner-form" method="post" enctype="multipart/form-data" action="<?= base_url('submit_partner_form') ?>">
                    <?= csrf_field() ?>
                    <!-- Honeypot fields - hidden from users but visible to bots -->
                    <div style="display:none;">
                        <input type="text" name="website" tabindex="-1" autocomplete="off">
                        <input type="email" name="email_confirm" tabindex="-1" autocomplete="off">
                        <input type="text" name="company" tabindex="-1" autocomplete="off">
                        <textarea name="comments" tabindex="-1" autocomplete="off"></textarea>
                    </div>
                    <!-- Time-based validation -->
                    <input type="hidden" name="form_start_time" value="<?= time() ?>">
                    <input type="hidden" name="form_token" value="<?= bin2hex(random_bytes(16)) ?>">
                    <div id="step1" class="wizard-step active">
                        <div class="form-section-title">Step 1: Business Information</div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="businessName">Business Name</label>
                                <input type="text" id="businessName" name="businessName" required placeholder="Your company name">
                            </div>
                        </div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="registrationNumber">Registration Number</label>
                                <input type="text" id="registrationNumber" name="registrationNumber" placeholder="Company registration (optional)">
                            </div>
                        </div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="countryBusiness">Country of Business</label>
                                <select id="countryBusiness" name="countryBusiness" required></select>
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <button type="button" class="btn btn--primary" onclick="nextStep(2)">Next Step</button>
                        </div>
                    </div>
                    <div id="step2" class="wizard-step">
                        <div class="form-section-title">Step 2: Contact Information</div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="contactName">Contact Name</label>
                                <input type="text" id="contactName" name="contactName" required placeholder="Full name">
                            </div>
                        </div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="contactEmail">Contact Email</label>
                                <input type="email" id="contactEmail" name="contactEmail" required placeholder="business@example.com">
                            </div>
                        </div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="contactPhone">Contact Phone</label>
                                <input type="tel" id="contactPhone" name="contactPhone" required placeholder="+1 234 567 8900">
                            </div>
                        </div>
                        
                        <div class="form-row single">
                            <div class="form-group">
                                <label for="Skype_Teams">Skype/Teams</label>
                                <input type="text" id="Skype_Teams" name="Skype_Teams" placeholder="Username or ID (optional)">
                            </div>
                        </div>
                        
                        <div class="form-submit" style="display: flex; gap: 1rem; justify-content: space-between;">
                            <button type="button" class="btn btn--secondary" onclick="prevStep(1)">Previous</button>
                            <button type="button" class="btn btn--primary" id="step2NextButton">Next Step</button>
                        </div>
                        <div class="error" id="emailError" style="display: none;">Email is required.</div>
                    </div>
                    <div id="step3" class="wizard-step">
                        <h2 style="font-size:2rem;font-weight:700;margin-bottom:1.5rem;color:var(--color-primary)">Step 3: Questionnaire</h2>
                        <div class="form-group">
                            <label for="question1">What is your annual turnover for the last financial year?</label>
                            <select id="question1" name="question1" required>
                                <option value="">Select an option</option>
                                <option value="100k-500k">100k - 500k</option>
                                <option value="500k-1mil">500k - 1mil</option>
                                <option value="1mil-5mil">1mil - 5mil</option>
                                <option value="5mil-10mil">5mil - 10mil</option>
                                <option value="10mil+">10mil+</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question2">Do you have financial statements for the last two years?</label>
                            <select id="question2" name="question2" required>
                                <option value="">Select an option</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question3">What industry does your business primarily operate in?</label>
                            <select id="question3" name="question3" required>
                                <option value="">Select an option</option>
                                <option value="VoIP Wholesale">VoIP Wholesale</option>
                                <option value="Contact Center">Contact Center</option>
                                <option value="BPO">BPO (Business Process Outsourcing)</option>
                                <option value="PBX">PBX (Private Branch Exchange)</option>
                                <option value="SMS">SMS Services</option>
                                <option value="CRM">CRM (Customer Relationship Management)</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Lead Generation">Lead Generation</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Telecom Equipment">Telecom Equipment</option>
                                <option value="Telecom Infrastructure">Telecom Infrastructure</option>
                                <option value="Telecom Carrier">Telecom Carrier</option>
                                <option value="Internet Service Provider">Internet Service Provider</option>
                                <option value="Unified Communications">Unified Communications</option>
                                <option value="Cloud Services">Cloud Services</option>
                                <option value="Data Center Services">Data Center Services</option>
                                <option value="IT Services">IT Services</option>
                                <option value="Network Security">Network Security</option>
                                <option value="Managed Services">Managed Services</option>
                                <option value="Mobile Network Operator">Mobile Network Operator</option>
                                <option value="Satellite Communications">Satellite Communications</option>
                                <option value="IoT (Internet of Things)">IoT (Internet of Things)</option>
                                <option value="Artificial Intelligence">Artificial Intelligence</option>
                                <option value="Big Data">Big Data</option>
                                <option value="Enterprise Solutions">Enterprise Solutions</option>
                                <option value="Consulting Services">Consulting Services</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="E-commerce">E-commerce</option>
                                <option value="Financial Services">Financial Services</option>
                                <option value="Healthcare Technology">Healthcare Technology</option>
                                <option value="Education Technology">Education Technology</option>
                                <option value="Media and Entertainment">Media and Entertainment</option>
                                <option value="Retail Technology">Retail Technology</option>
                                <option value="Travel and Hospitality">Travel and Hospitality</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question4">What type of partnership are you interested in?</label>
                            <select id="question4" name="question4" required>
                                <option value="">Select an option</option>
                                <option value="reseller">Reseller</option>
                                <option value="distributor">Distributor</option>
                                <option value="service">Service Provider</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Which of our solutions are you interested in? (Select all that apply)</label>
                            <div style="display: grid; grid-template-columns: 1fr; gap: 0.8rem; margin-top: 0.5rem;">
                                <label style="display: flex; align-items: center; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: background-color 0.2s;">
                                    <input type="checkbox" name="solutions[]" value="NU SIP" style="margin-right: 0.8rem; width: 20px; height: 20px;">
                                    <span><strong>NU SIP</strong> - Enterprise VoIP Services</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: background-color 0.2s;">
                                    <input type="checkbox" name="solutions[]" value="NU SMS" style="margin-right: 0.8rem; width: 20px; height: 20px;">
                                    <span><strong>NU SMS</strong> - Direct Messaging Services</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: background-color 0.2s;">
                                    <input type="checkbox" name="solutions[]" value="NU CCS" style="margin-right: 0.8rem; width: 20px; height: 20px;">
                                    <span><strong>NU CCS</strong> - Call Control Server</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: background-color 0.2s;">
                                    <input type="checkbox" name="solutions[]" value="NU DATA" style="margin-right: 0.8rem; width: 20px; height: 20px;">
                                    <span><strong>NU DATA</strong> - Data Enrichment Services</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: background-color 0.2s;">
                                    <input type="checkbox" name="solutions[]" value="NU CRON" style="margin-right: 0.8rem; width: 20px; height: 20px;">
                                    <span><strong>NU CRON</strong> - AI Contact Schedule Manager</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: background-color 0.2s;">
                                    <input type="checkbox" name="solutions[]" value="NU GUI" style="margin-right: 0.8rem; width: 20px; height: 20px;">
                                    <span><strong>NU GUI</strong> - Custom UI/UX Portal</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="question6">How do you plan to market our solutions to your customers?</label>
                            <textarea id="question6" name="question6" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="question7">Describe your current customer base and target market.</label>
                            <textarea id="question7" name="question7" required></textarea>
                        </div>
                        <div class="button-container" style="display: flex; gap: 1rem; justify-content: flex-end;">
                            <button type="button" class="btn btn--secondary" onclick="prevStep(2)">Previous</button>
                            <button type="submit" class="btn btn--primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="confirmation-message" style="display: none;"></div>
    </div>
</div>

<script>
    // Popup functions
    function openPopup() {
        const modal = document.getElementById('popup-modal');
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closePopup() {
        const modal = document.getElementById('popup-modal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('popup-modal');
        if (event.target === modal) {
            closePopup();
        }
    }
    
    // Wizard navigation functions
    function nextStep(step) {
        const currentStep = document.querySelector('.wizard-step.active');
        const nextStep = document.getElementById('step' + step);
        
        if (currentStep && nextStep) {
            currentStep.classList.remove('active');
            nextStep.classList.add('active');
        }
    }
    
    function prevStep(step) {
        const currentStep = document.querySelector('.wizard-step.active');
        const prevStep = document.getElementById('step' + step);
        
        if (currentStep && prevStep) {
            currentStep.classList.remove('active');
            prevStep.classList.add('active');
        }
    }
    
    // Initialize partner form once DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Use the functions from script.js which should already be loaded
        if (typeof initializePartnerForm === 'function') {
            initializePartnerForm();
        }
        
        // Handle step 2 next button
        const step2NextButton = document.getElementById('step2NextButton');
        if (step2NextButton) {
            step2NextButton.addEventListener('click', function() {
                const email = document.getElementById('contactEmail').value;
                if (email) {
                    nextStep(3);
                } else {
                    document.getElementById('emailError').style.display = 'block';
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>
