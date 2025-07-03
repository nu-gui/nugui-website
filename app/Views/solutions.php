<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Solutions | NuGui<?= $this->endSection() ?>

<?= $this->section('meta_description') ?>Discover NuGui's comprehensive solutions for businesses of all sizes. From enterprise web development to digital transformation.<?= $this->endSection() ?>

<?= $this->section('content') ?>
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
    .btn-primary {
        display: inline-block;
        padding: 15px 40px;
        border-radius: 999px;
        font-size: 1.15rem;
        font-weight: 600;
        text-decoration: none;
        background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
        color: #18181A;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        transition: background 0.3s, color 0.3s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        color: #fff;
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
    .solution-card img {
        display: block;
        margin: 0 auto 1rem auto;
        border-radius: 12px;
        background: var(--color-background-secondary);
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .solution-details {
        font-size: 1rem;
        color: var(--color-text-secondary);
        background: var(--color-background-secondary);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-top: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .btn-primary {
        margin-top: 1rem;
    }

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl">
        <h1>
            Solutions That
            <span class="text-gradient">Transform</span>
        </h1>
        <p>
            Comprehensive solutions tailored to your business needs. From web development to digital transformation, we deliver results that matter.
        </p>
    </div>
</section>

<!-- Solutions Grid -->
<section class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Our Telecommunication Solutions</h2>
            <p>
                Carrier-grade VoIP, SMS, and data solutions engineered for reliability, scalability, and performance.
            </p>
        </div>
        <div class="card-grid">
            <!-- Modern, compact solution cards with expandable details -->
            <div class="solution-card">
                <img src="<?= base_url('assets/images/nu-sip-icon.jpg') ?>" alt="NU SIP Icon" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU SIP</h3>
                <p>Carrier-grade VoIP services for global voice connectivity and SIP trunking.</p>
                <button class="btn-primary" onclick="toggleDetails('sip-details')">Details</button>
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
                <img src="<?= base_url('assets/images/nu-sms-icon.jpg') ?>" alt="NU SMS Icon" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU SMS</h3>
                <p>Enterprise messaging platform for bulk SMS, APIs, and global delivery.</p>
                <button class="btn-primary" onclick="toggleDetails('sms-details')">Details</button>
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
                <img src="<?= base_url('assets/images/nu-ccs-icon.jpg') ?>" alt="NU CCS Icon" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU CCS</h3>
                <p>Advanced call control, billing, and fraud prevention for telecom operators.</p>
                <button class="btn-primary" onclick="toggleDetails('ccs-details')">Details</button>
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
                <img src="<?= base_url('assets/images/nu-data-icon.jpg') ?>" alt="NU DATA Icon" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU DATA</h3>
                <p>Data validation, cleansing, and enrichment for accurate telecom operations.</p>
                <button class="btn-primary" onclick="toggleDetails('data-details')">Details</button>
                <div id="data-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Phone Validation & HLR Lookup</li>
                        <li>Data Cleansing & Batch Processing</li>
                        <li>Real-time API</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/nu-gui-banner.jpg') ?>" alt="NU GUI Icon" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>NU GUI</h3>
                <p>Custom portals and management UIs for telecom operations and billing.</p>
                <button class="btn-primary" onclick="toggleDetails('gui-details')">Details</button>
                <div id="gui-details" class="solution-details" style="display:none;margin-top:1rem;text-align:left;">
                    <ul>
                        <li>Custom UI/UX & White-Label Solutions</li>
                        <li>API Integration</li>
                        <li>Real-time Dashboards</li>
                    </ul>
                </div>
            </div>
            <div class="solution-card">
                <img src="<?= base_url('assets/images/nu-ccs-banner.jpg') ?>" alt="Telecom Infrastructure Icon" style="width:48px;height:48px;margin-bottom:1rem;">
                <h3>Telecom Infrastructure</h3>
                <p>Complete setup: VoIP servers, SMS gateways, and carrier interconnects.</p>
                <button class="btn-primary" onclick="toggleDetails('infra-details')">Details</button>
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
            <h2>Our Process</h2>
            <p>A proven methodology that delivers results</p>
        </div>
        <div class="process-cards-row" style="display:flex;gap:2rem;flex-wrap:wrap;justify-content:center;align-items:stretch;">
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">1</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Discovery</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Understanding your business needs and objectives</p>
            </div>
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-accent);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">2</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Planning</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Creating a strategic roadmap for implementation</p>
            </div>
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-accent-secondary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">3</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Development</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Building and testing your solution</p>
            </div>
            <div class="process-card" style="flex:1 1 220px;min-width:220px;max-width:260px;background:linear-gradient(135deg,var(--color-surface) 80%,var(--color-accent-secondary) 100%);border-radius:20px;padding:2.2rem 1.2rem 1.5rem 1.2rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);text-align:center;position:relative;">
                <div style="width:48px;height:48px;background:var(--color-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;box-shadow:0 2px 8px rgba(0,0,0,0.10);font-size:1.5rem;color:#fff;font-weight:700;">4</div>
                <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--color-text-primary);">Deployment</h3>
                <p style="color:var(--color-text-secondary);font-size:1.05rem;">Launching and providing ongoing support</p>
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
                <img src="<?= base_url('assets/images/nu-sip.jpg') ?>" alt="NU SIP VoIP Services" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU SIP <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Advanced VoIP Services</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Carrier-grade VoIP infrastructure for seamless, secure, and scalable business communications.</p>
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
                    <li>Crystal-clear global voice connectivity for enterprises and carriers</li>
                    <li>Carrier-grade reliability, security, and uptime</li>
                    <li>Flexible SIP trunking and intelligent routing</li>
                    <li>Real-time analytics and monitoring dashboard</li>
                    <li>Easy API integration for automation</li>
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
                <img src="<?= base_url('assets/images/nu-sms.jpg') ?>" alt="NU SMS Messaging Services" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU SMS <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Enterprise Messaging Platform</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Reliable bulk SMS and messaging services with global delivery and real-time tracking.</p>
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
                    <li>Bulk Messaging & Two-Way SMS</li>
                    <li>API Integration</li>
                    <li>Real-time Tracking & Reports</li>
                    <li>Global Coverage</li>
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
                <img src="<?= base_url('assets/images/nu-ccs.jpg') ?>" alt="NU CCS Call Control Server" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU CCS <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Call Control Server</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Comprehensive software for call management, billing, and fraud prevention.</p>
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
                    <li>Traffic Filtering & Management</li>
                    <li>Flexible Billing Integration</li>
                    <li>Fraud Detection & Prevention</li>
                    <li>CDR Management</li>
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
                <img src="<?= base_url('assets/images/nu-data.jpg') ?>" alt="NU DATA Enrichment Services" style="max-width: 260px; width: 100%; height: auto; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18);">
            </div>
            <div class="product-solution-content" style="flex: 1 1 340px; min-width: 280px; max-width: 520px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--color-primary);">NU DATA <span style="font-weight:400; color:var(--color-text-secondary); font-size:1.1rem;">— Data Enrichment Services</span></h2>
                <p style="margin-bottom: 1.2rem; color: var(--color-text-secondary); font-size: 1.1rem;">Enhance your data quality with our comprehensive validation and enrichment services.</p>
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
                    <li>Phone Validation & HLR Lookup</li>
                    <li>Data Cleansing & Batch Processing</li>
                    <li>Real-time API</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="max-w-7xl">
        <h2>Ready to Transform Your Business?</h2>
        <p>Let's discuss how our solutions can help you achieve your goals.</p>
        <a href="<?= base_url('/contact'); ?>" class="btn-primary">Get Started Today</a>
    </div>
</section>
<?= $this->endSection() ?>