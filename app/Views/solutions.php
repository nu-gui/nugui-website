<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Telecom Solutions for Operators | VoIP, SMS, Call Control & Billing<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for Solutions Page
$this->setVar('description', 'Enterprise telecom solutions for operators: VoIP infrastructure, SMS gateways, call control systems, billing integration. Scale from startup to tier-1 carrier with 99.99% uptime.');
$this->setVar('ogTitle', 'NU GUI Solutions - Enterprise Telecom Infrastructure for Operators');
$this->setVar('ogDescription', 'Complete telecom solutions: carrier-grade VoIP, bulk SMS platforms, AI-powered call control, real-time billing. Trusted by 200+ operators in 50+ countries.');
$this->setVar('twitterTitle', 'NU GUI Solutions - Telecom Infrastructure for Operators');
$this->setVar('twitterDescription', 'Scale your telecom operations with carrier-grade VoIP, SMS, call control & billing solutions. 99.99% uptime guaranteed.');
?>
<style>
    body {
        background: var(--color-background);
        color: var(--color-text-primary);
        font-family: var(--font-family-primary);
        margin: 0;
        padding: 0;
    }
    /* Custom styles for the solutions page to align with the Apple design system */
    .hero-section {
        background: linear-gradient(120deg, var(--color-background) 60%, var(--color-accent-secondary) 100%);
        color: var(--color-text-primary);
        text-align: center;
        padding: 100px 20px 80px 20px;
        border-radius: 0 0 48px 48px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -0.02em;
        line-height: 1.1;
    }
    .hero-section .text-gradient {
        background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }
    .hero-section p {
        font-size: 1.5rem;
        max-width: 48rem;
        margin: 0 auto 30px;
        color: var(--color-text-secondary);
    }
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
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--color-primary);
        letter-spacing: -0.01em;
    }
    .section-header p {
        font-size: 1.2rem;
        max-width: 42rem;
        margin: 0 auto;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2.5rem;
        align-items: stretch;
    }
    .solution-card {
        background: linear-gradient(135deg, var(--color-surface) 80%, var(--color-accent-secondary) 100%);
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        border: 2px solid var(--color-accent);
        box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        transition: transform 0.3s var(--transition-bounce), box-shadow 0.3s var(--transition-bounce), border-color 0.3s;
    }
    .solution-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        border-color: var(--color-primary);
    }
    .solution-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .solution-card p {
        color: var(--color-text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .process-section {
        padding: 80px 20px;
        background-color: var(--color-background-secondary);
    }
    .process-step {
        text-align: center;
        margin-bottom: 40px;
    }
    .process-step h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .process-step p {
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
        color: var(--color-text-primary);
    }
    .cta-section p {
        font-size: 1.2rem;
        max-width: 42rem;
        margin: 0 auto 30px;
        color: var(--color-text-secondary);
    }
    .feature-card {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .feature-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .feature-card p {
        color: var(--color-text-secondary);
        line-height: 1.6;
    }
    .max-w-7xl {
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    @media (min-width: 640px) {
        .max-w-7xl {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
    @media (min-width: 1024px) {
        .max-w-7xl {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
    /* Smooth scrolling for anchor links */
    html {
        scroll-behavior: smooth;
    }
    /* Offset for fixed header when jumping to sections */
    section[id] {
        scroll-margin-top: 60px;
    }

</style>
<script>
function toggleDetails(id) {
    var el = document.getElementById(id);
    if (el.style.display === 'none' || el.style.display === '') {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}
</script>

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl">
        <h1>
            Telecom Solutions That
            <span class="text-gradient">Scale With You</span>
        </h1>
        <p>
            From startup MVNOs to tier-1 carriers, we power telecommunications success. 
            Complete infrastructure solutions with 99.99% uptime, processing billions of minutes monthly.
        </p>
    </div>
</section>

<!-- Solutions Grid -->
<section class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Industry-Leading Telecom Infrastructure</h2>
            <p>
                Proven solutions deployed by 200+ operators worldwide. Start small, scale infinitely.
                Average ROI of 300% within 12 months. 24/7 expert support included.
            </p>
        </div>
        <div class="card-grid">
            <!-- Modern, compact solution cards with expandable details -->
            <div class="solution-card">
                <img src="<?= base_url('assets/images/NUSIP-icon-1.png') ?>" alt="NU SIP Icon" class="product-icon-light" style="width:48px;height:48px;margin-bottom:1rem;">
                <img src="<?= base_url('assets/images/NUSIP-icon-2.png') ?>" alt="NU SIP Icon" class="product-icon-dark" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU SIP - VoIP Platform</h3>
                <p><strong>195+ countries</strong> coverage. <strong>0.001¢/min</strong> wholesale rates. HD voice quality with <strong>99.99% uptime</strong>.</p>
                <button class="btn btn--primary" onclick="toggleDetails('sip-details')">Details</button>
                <div id="sip-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>High-Quality Voice & Global Coverage</li>
                        <li>Real-time Monitoring & Analytics</li>
                        <li>Advanced SIP Trunking</li>
                        <li>Intelligent Routing & Failover</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/NU-SMS-icon-1.png') ?>" alt="NU SMS Icon" class="product-icon-light" style="width:48px;height:48px;margin-bottom:1rem;">
                <img src="<?= base_url('assets/images/NU-SMS-icon-2.png') ?>" alt="NU SMS Icon" class="product-icon-dark" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU SMS - Messaging Gateway</h3>
                <p><strong>98% delivery rates</strong>. Send <strong>1M+ messages/hour</strong>. Direct routes to <strong>200+ countries</strong>.</p>
                <button class="btn btn--primary" onclick="toggleDetails('sms-details')">Details</button>
                <div id="sms-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Bulk Messaging & Two-Way SMS</li>
                        <li>API Integration</li>
                        <li>Real-time Tracking & Reports</li>
                        <li>Global Coverage</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/NU-CCS-icon-1.png') ?>" alt="NU CCS Icon" class="product-icon-light" style="width:48px;height:48px;margin-bottom:1rem;">
                <img src="<?= base_url('assets/images/NU-CCS-icon-2.png') ?>" alt="NU CCS Icon" class="product-icon-dark" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU CCS - Call Control</h3>
                <p>AI fraud detection reduces losses by <strong>40%</strong>. Handle <strong>10,000+ CPS</strong>. Real-time billing integration.</p>
                <button class="btn btn--primary" onclick="toggleDetails('ccs-details')">Details</button>
                <div id="ccs-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Traffic Filtering & Management</li>
                        <li>Flexible Billing Integration</li>
                        <li>Fraud Detection & Prevention</li>
                        <li>CDR Management</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/NU-DATA-icon-1.png') ?>" alt="NU DATA Icon" class="product-icon-light" style="width:48px;height:48px;margin-bottom:1rem;">
                <img src="<?= base_url('assets/images/NU-DATA-icon-2.png') ?>" alt="NU DATA Icon" class="product-icon-dark" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU DATA - Intelligence</h3>
                <p><strong>99.5% accuracy</strong> in validation. Process <strong>100M+ records daily</strong>. Real-time HLR/MNP lookups.</p>
                <button class="btn btn--primary" onclick="toggleDetails('data-details')">Details</button>
                <div id="data-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Phone Validation & HLR Lookup</li>
                        <li>Data Cleansing & Batch Processing</li>
                        <li>Real-time API</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/NUGUI-icon-1.png') ?>" alt="NU GUI Icon" class="product-icon-light" style="width:48px;height:48px;margin-bottom:1rem;">
                <img src="<?= base_url('assets/images/NUGUI-icon-2.png') ?>" alt="NU GUI Icon" class="product-icon-dark" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU GUI - Management Portal</h3>
                <p>White-label ready. <strong>React + Node.js</strong> stack. Real-time dashboards with <strong>sub-second updates</strong>.</p>
                <button class="btn btn--primary" onclick="toggleDetails('gui-details')">Details</button>
                <div id="gui-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Custom UI/UX & White-Label Solutions</li>
                        <li>API Integration</li>
                        <li>Real-time Dashboards</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/NU-CCS-icon-1.png') ?>" alt="Telecom Infrastructure Icon" class="product-icon-light" style="width:48px;height:48px;margin-bottom:1rem;">
                <img src="<?= base_url('assets/images/NU-CCS-icon-2.png') ?>" alt="Telecom Infrastructure Icon" class="product-icon-dark" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>Complete Infrastructure</h3>
                <p>Turnkey deployment in <strong>48 hours</strong>. Includes servers, interconnects, and <strong>24/7 NOC support</strong>.</p>
                <button class="btn btn--primary" onclick="toggleDetails('infra-details')">Details</button>
                <div id="infra-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Carrier Integration</li>
                        <li>Scalable Architecture</li>
                        <li>24/7 Support</li>
                        <li>Global Connectivity</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->

<section class="process-section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>From Zero to Revenue in 30 Days</h2>
            <p>Our proven deployment methodology gets you operational fast</p>
        </div>
        <div class="process-cards-row" style="display:flex;gap:2rem;flex-wrap:wrap;justify-content:center;align-items:stretch;">
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">1</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Discovery (Days 1-3)</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Analyze requirements, existing infrastructure, and growth projections</p>
            </div>
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-accent);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">2</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Architecture (Days 4-7)</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Design scalable architecture, select carriers, plan integrations</p>
            </div>
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-accent-secondary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">3</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Deployment (Days 8-21)</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Install systems, configure routes, integrate billing, test thoroughly</p>
            </div>
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">4</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Go Live (Days 22-30)</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Launch operations, onboard team, activate 24/7 support</p>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Solution Sections -->
<!-- NU SIP Details -->
<section id="nu-sip" class="section alt">
    <div class="max-w-7xl">
        <div class="product-solution-flex" style="display: flex; flex-wrap: wrap; align-items: stretch; gap: 2.5rem; justify-content: center;">
            <div class="product-solution-image" style="flex: 0 0 320px; display: flex; align-items: center; justify-content: center;">
                <img src="<?= base_url('assets/images/NU-SIP-product-1.jpg') ?>" alt="NU SIP VoIP Services" class="product-image-light" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
                <img src="<?= base_url('assets/images/NU-SIP-product-2.jpg') ?>" alt="NU SIP VoIP Services" class="product-image-dark" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18); display: none;">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU SIP <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Enterprise VoIP Platform</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;"><strong>195+ countries coverage</strong> with HD voice quality. Process <strong>1B+ minutes monthly</strong> at <strong>0.001¢/min</strong> wholesale rates. <strong>99.99% uptime SLA</strong> guaranteed.</p>
                <div class="product-feature-list" style="display: flex; flex-wrap: wrap; gap: 1.2rem; margin-bottom: 1.2rem;">
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">SIP Trunking</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Global reach, inbound/outbound, competitive rates.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Media Handling</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Transcoding, recording, and real-time quality analytics.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Carrier Routing</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Least-cost, failover, and quality-optimized routing.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">API Integration</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">RESTful APIs for seamless system integration.</p>
                    </div>
                </div>
                <ul style="color:var(--color-text-secondary);font-size:1.05rem;line-height:1.6;margin-bottom:0.5rem;list-style:square inside;">
                    <li><strong>5000+ DIDs</strong> available in 80 countries with instant provisioning</li>
                    <li><strong>G.711, G.729, Opus</strong> codec support with automatic transcoding</li>
                    <li><strong>Least-cost routing</strong> with failover to ensure 99.99% call completion</li>
                    <li><strong>REST & GraphQL APIs</strong> for seamless CRM and PBX integration</li>
                    <li><strong>GDPR & HIPAA compliant</strong> with end-to-end encryption</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- NU SMS Details -->
<section id="nu-sms" class="section">
    <div class="max-w-7xl">
        <div class="product-solution-flex" style="display: flex; flex-wrap: wrap; align-items: stretch; gap: 2.5rem; justify-content: center;">
            <div class="product-solution-image" style="flex: 0 0 320px; display: flex; align-items: center; justify-content: center;">
                <img src="<?= base_url('assets/images/NU-SMS-product-1.jpg') ?>" alt="NU SMS Messaging Services" class="product-image-light" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
                <img src="<?= base_url('assets/images/NU-SMS-product-2.jpg') ?>" alt="NU SMS Messaging Services" class="product-image-dark" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18); display: none;">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU SMS <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Bulk SMS Gateway Platform</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Send <strong>1M+ messages per hour</strong> with <strong>98% delivery rates</strong>. Direct operator connections in <strong>200+ countries</strong>. Starting at <strong>$0.004 per SMS</strong>.</p>
                <div class="product-feature-list" style="display: flex; flex-wrap: wrap; gap: 1.2rem; margin-bottom: 1.2rem;">
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Bulk Messaging</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Send thousands of messages simultaneously for campaigns and notifications.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Two-Way Messaging</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Engage customers with two-way SMS, auto-responders, and keyword campaigns.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Delivery Reports</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Real-time delivery tracking and comprehensive reporting.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Global Coverage</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Worldwide reach with competitive international rates.</p>
                    </div>
                </div>
                <ul style="color:var(--color-text-secondary);font-size:1.05rem;line-height:1.6;margin-bottom:0.5rem;list-style:square inside;">
                    <li><strong>SMPP, HTTP, REST APIs</strong> with 99.9% uptime SLA</li>
                    <li><strong>Unicode, long SMS, MMS</strong> support across all routes</li>
                    <li><strong>DLR tracking</strong> with webhook notifications in real-time</li>
                    <li><strong>Dedicated short codes</strong> and two-way messaging capabilities</li>
                    <li><strong>TCPA compliance tools</strong> with opt-out management</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- NU CCS Details -->
<section id="nu-ccs" class="section alt">
    <div class="max-w-7xl">
        <div class="product-solution-flex" style="display: flex; flex-wrap: wrap; align-items: stretch; gap: 2.5rem; justify-content: center;">
            <div class="product-solution-image" style="flex: 0 0 320px; display: flex; align-items: center; justify-content: center;">
                <img src="<?= base_url('assets/images/NU-CCS-product-1.jpg') ?>" alt="NU CCS Call Control Server" class="product-image-light" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
                <img src="<?= base_url('assets/images/NU-CCS-product-2.jpg') ?>" alt="NU CCS Call Control Server" class="product-image-dark" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18); display: none;">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU CCS <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— AI-Powered Call Control System</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Handle <strong>10,000+ calls per second</strong> with AI fraud detection that reduces revenue leakage by <strong>up to 40%</strong>. Built on Kamailio for <strong>maximum reliability</strong>.</p>
                <div class="product-feature-list" style="display: flex; flex-wrap: wrap; gap: 1.2rem; margin-bottom: 1.2rem;">
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Traffic Management</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Advanced filtering, routing, and real-time monitoring.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Billing Integration</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Prepaid/postpaid, real-time rating and charging.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Fraud Prevention</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Customizable rules and detection algorithms.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">CDR Management</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Call Detail Record generation and analytics.</p>
                    </div>
                </div>
                <ul style="color:var(--color-text-secondary);font-size:1.05rem;line-height:1.6;margin-bottom:0.5rem;list-style:square inside;">
                    <li><strong>Machine learning</strong> fraud detection with customizable rules engine</li>
                    <li><strong>Real-time rating</strong> for prepaid/postpaid with multi-currency support</li>
                    <li><strong>LCR, QoS, time-based</strong> routing with automatic failover</li>
                    <li><strong>CDR export</strong> in multiple formats with S3/FTP delivery</li>
                    <li><strong>REST APIs</strong> for billing system integration (CGRateS, BillRun)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- NU DATA Details -->
<section id="nu-data" class="section">
    <div class="max-w-7xl">
        <div class="product-solution-flex" style="display: flex; flex-wrap: wrap; align-items: stretch; gap: 2.5rem; justify-content: center;">
            <div class="product-solution-image" style="flex: 0 0 320px; display: flex; align-items: center; justify-content: center;">
                <img src="<?= base_url('assets/images/NU-DATA-product-1.jpg') ?>" alt="NU DATA Enrichment Services" class="product-image-light" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
                <img src="<?= base_url('assets/images/NU-DATA-product-2.jpg') ?>" alt="NU DATA Enrichment Services" class="product-image-dark" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18); display: none;">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU DATA <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Telecom Intelligence Platform</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Process <strong>100M+ validations daily</strong> with <strong>99.5% accuracy</strong>. Real-time HLR/VLR lookups, MNP checks, and carrier identification. <strong>Sub-100ms response times</strong>.</p>
                <div class="product-feature-list" style="display: flex; flex-wrap: wrap; gap: 1.2rem; margin-bottom: 1.2rem;">
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Phone Validation</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Real-time validation, carrier lookup, and porting status.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Data Cleansing</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Remove duplicates, standardize formats, correct errors.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">HLR Lookup</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Verify mobile number status, roaming, and network.</p>
                    </div>
                    <div class="mini-feature-card" style="background: var(--color-background-secondary); border-radius: 14px; padding: 1.1rem 1.2rem; flex: 1 1 180px; min-width: 160px; max-width: 220px; text-align: left; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                        <h4 style="margin:0 0 0.3rem 0; font-size:1.1rem; font-weight:600; color:var(--color-primary);">Batch Processing</h4>
                        <p style="margin:0; color:var(--color-text-secondary); font-size:0.98rem;">Efficiently process large datasets, downloadable results.</p>
                    </div>
                </div>
                <ul style="color:var(--color-text-secondary);font-size:1.05rem;line-height:1.6;margin-bottom:0.5rem;list-style:square inside;">
                    <li><strong>HLR/VLR lookups</strong> with live network status and roaming detection</li>
                    <li><strong>MNP database</strong> updated daily across 180+ countries</li>
                    <li><strong>Carrier identification</strong> with network type (mobile/landline/VoIP)</li>
                    <li><strong>TCPA compliance</strong> checking and DNC list management</li>
                    <li><strong>Batch processing</strong> up to 10M records with downloadable reports</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="max-w-7xl">
        <h2>Start Your Free 30-Day Trial</h2>
        <p>Join 200+ operators worldwide. No credit card required. Full platform access.<br>
           Average time to first revenue: 15 days. ROI guarantee or money back.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="<?= base_url('/contact'); ?>" class="btn btn--primary btn--large">Start Free Trial</a>
            <a href="<?= base_url('/contact'); ?>" class="btn btn--secondary btn--large">Schedule Demo</a>
        </div>
    </div>
</section>

<!-- Structured Data for Solutions -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "Telecommunications Infrastructure Solutions",
  "provider": {
    "@type": "Organization",
    "name": "NU GUI",
    "url": "https://nugui.co.za"
  },
  "name": "NU GUI Telecom Solutions",
  "description": "Enterprise telecom solutions for operators: VoIP infrastructure, SMS gateways, call control systems, billing integration with 99.99% uptime",
  "areaServed": {
    "@type": "Country",
    "name": "Worldwide"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Telecom Solutions",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "NU SIP - VoIP Platform",
          "description": "Enterprise VoIP with 195+ countries coverage, HD voice quality, 99.99% uptime"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "NU SMS - Messaging Gateway",
          "description": "Bulk SMS platform with 98% delivery rates, 1M+ messages/hour capacity"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "NU CCS - Call Control System",
          "description": "AI-powered call control with fraud detection, 10,000+ CPS capacity"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "NU DATA - Intelligence Platform",
          "description": "Telecom data validation with 99.5% accuracy, 100M+ daily validations"
        }
      }
    ]
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "127"
  }
}
</script>

<!-- HowTo Schema for Implementation Process -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Deploy Telecom Infrastructure in 30 Days",
  "description": "Our proven methodology to get your telecom operations running in 30 days",
  "totalTime": "P30D",
  "supply": [
    {
      "@type": "HowToSupply",
      "name": "Business requirements and growth projections"
    },
    {
      "@type": "HowToSupply",
      "name": "Technical team for integration"
    }
  ],
  "step": [
    {
      "@type": "HowToStep",
      "name": "Discovery Phase",
      "text": "Analyze requirements, existing infrastructure, and growth projections",
      "timeRequired": "P3D"
    },
    {
      "@type": "HowToStep",
      "name": "Architecture Design",
      "text": "Design scalable architecture, select carriers, plan integrations",
      "timeRequired": "P4D"
    },
    {
      "@type": "HowToStep",
      "name": "Deployment",
      "text": "Install systems, configure routes, integrate billing, test thoroughly",
      "timeRequired": "P14D"
    },
    {
      "@type": "HowToStep",
      "name": "Go Live",
      "text": "Launch operations, onboard team, activate 24/7 support",
      "timeRequired": "P9D"
    }
  ]
}
</script>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://nugui.co.za"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Solutions",
      "item": "https://nugui.co.za/solutions"
    }
  ]
}
</script>

<?= $this->endSection() ?>
