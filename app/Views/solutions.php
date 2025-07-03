<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Solutions | NuGui<?= $this->endSection() ?>

<?= $this->section('meta_description') ?>Discover NuGui's comprehensive solutions for businesses of all sizes. From enterprise web development to digital transformation.<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    /* Custom styles for the solutions page to align with the Apple design system */
    .hero-section {
        background-color: var(--color-background);
        color: var(--color-text-primary);
        text-align: center;
        padding: 80px 20px;
    }
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: -0.02em;
    }
    .hero-section .text-gradient {
        background: -webkit-linear-gradient(45deg, var(--color-accent), var(--color-accent-secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
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
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .section-header p {
        font-size: 1.2rem;
        max-width: 42rem;
        margin: 0 auto;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }
    .solution-card {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .solution-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
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
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        background-color: var(--color-accent);
        color: white;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: var(--color-accent-hover);
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
            <!-- NU SIP -->
            <div class="solution-card">
                <h3>NU SIP - VoIP Services</h3>
                <p>
                    Advanced VoIP infrastructure with carrier-grade routing, media handling, and comprehensive SIP trunking solutions.
                </p>
                <p><strong>Features:</strong> High-Quality Voice, Global Coverage, Real-time Monitoring, SIP Trunking</p>
            </div>

            <!-- NU SMS -->
            <div class="solution-card">
                <h3>NU SMS - Direct Messaging Services</h3>
                <p>
                    Enterprise-grade messaging platform with bulk SMS capabilities, API integration, and comprehensive delivery tracking.
                </p>
                <p><strong>Features:</strong> Bulk Messaging, API Integration, Real-time Tracking, Global Delivery</p>
            </div>

            <!-- NU CCS -->
            <div class="solution-card">
                <h3>NU CCS - Call Control Server</h3>
                <p>
                    Robust telecommunications software for call control, traffic filtering, advanced billing, and comprehensive monitoring.
                </p>
                <p><strong>Features:</strong> Traffic Filtering, Advanced Billing, Real-time Monitoring, Fraud Prevention</p>
            </div>

            <!-- NU DATA -->
            <div class="solution-card">
                <h3>NU DATA - Data Enrichment Services</h3>
                <p>
                    Comprehensive data validation, cleansing, and enrichment services including phone number verification and validation.
                </p>
                <p><strong>Features:</strong> Data Validation, Phone Verification, Data Cleansing, Real-time API</p>
            </div>

            <!-- NU GUI -->
            <div class="solution-card">
                <h3>NU GUI - Custom Portal Development</h3>
                <p>
                    Custom-built user interfaces and management portals for telecom operations, billing, and customer management.
                </p>
                <p><strong>Features:</strong> Custom UI/UX, White-Label Solutions, API Integration, Real-time Dashboards</p>
            </div>

            <!-- Telecom Infrastructure -->
            <div class="solution-card">
                <h3>Telecom Infrastructure Solutions</h3>
                <p>
                    Complete telecommunications infrastructure setup including VoIP servers, SMS gateways, and carrier interconnects.
                </p>
                <p><strong>Features:</strong> Carrier Integration, Scalable Architecture, 24/7 Support, Global Connectivity</p>
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
        
        <div class="card-grid">
            <div class="process-step">
                <h3>1. Discovery</h3>
                <p>Understanding your business needs and objectives</p>
            </div>
            <div class="process-step">
                <h3>2. Planning</h3>
                <p>Creating a strategic roadmap for implementation</p>
            </div>
            <div class="process-step">
                <h3>3. Development</h3>
                <p>Building and testing your solution</p>
            </div>
            <div class="process-step">
                <h3>4. Deployment</h3>
                <p>Launching and providing ongoing support</p>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Solution Sections -->
<!-- NU SIP Details -->
<section id="nu-sip" class="section alt">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>NU SIP - Advanced VoIP Services</h2>
            <p>Carrier-grade VoIP infrastructure designed for telecommunications operators and enterprises</p>
        </div>
        <div style="text-align: center; margin-bottom: 40px;">
            <img src="<?= base_url('assets/images/nu-sip.jpg') ?>" alt="NU SIP VoIP Services" style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <h3>SIP Trunking</h3>
                <p>High-quality voice connectivity with global reach, supporting both inbound and outbound calling with competitive rates.</p>
            </div>
            <div class="feature-card">
                <h3>Media Handling</h3>
                <p>Advanced media processing including transcoding, recording, and real-time analytics for quality monitoring.</p>
            </div>
            <div class="feature-card">
                <h3>Carrier Routing</h3>
                <p>Intelligent least-cost routing with failover capabilities, ensuring optimal call quality and reliability.</p>
            </div>
            <div class="feature-card">
                <h3>API Integration</h3>
                <p>RESTful APIs for seamless integration with your existing systems, including real-time call control and monitoring.</p>
            </div>
        </div>
    </div>
</section>

<!-- NU SMS Details -->
<section id="nu-sms" class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>NU SMS - Enterprise Messaging Platform</h2>
            <p>Reliable bulk SMS and messaging services with global delivery and real-time tracking</p>
        </div>
        <div style="text-align: center; margin-bottom: 40px;">
            <img src="<?= base_url('assets/images/nu-sms.jpg') ?>" alt="NU SMS Messaging Services" style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <h3>Bulk Messaging</h3>
                <p>Send thousands of messages simultaneously with our high-throughput platform, perfect for marketing campaigns and notifications.</p>
            </div>
            <div class="feature-card">
                <h3>Two-Way Messaging</h3>
                <p>Enable customer engagement with two-way SMS capabilities, including auto-responders and keyword campaigns.</p>
            </div>
            <div class="feature-card">
                <h3>Delivery Reports</h3>
                <p>Real-time delivery tracking and comprehensive reporting to monitor campaign performance and message status.</p>
            </div>
            <div class="feature-card">
                <h3>Global Coverage</h3>
                <p>Reach customers worldwide with our extensive network of carrier connections and competitive international rates.</p>
            </div>
        </div>
    </div>
</section>

<!-- NU CCS Details -->
<section id="nu-ccs" class="section alt">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>NU CCS - Call Control Server</h2>
            <p>Comprehensive telecommunications software for call management, billing, and fraud prevention</p>
        </div>
        <div style="text-align: center; margin-bottom: 40px;">
            <img src="<?= base_url('assets/images/nu-ccs.jpg') ?>" alt="NU CCS Call Control Server" style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <h3>Traffic Management</h3>
                <p>Advanced traffic filtering and routing capabilities with real-time monitoring and automatic failover mechanisms.</p>
            </div>
            <div class="feature-card">
                <h3>Billing Integration</h3>
                <p>Flexible billing system supporting prepaid and postpaid models with real-time rating and charging capabilities.</p>
            </div>
            <div class="feature-card">
                <h3>Fraud Prevention</h3>
                <p>Built-in fraud detection algorithms with customizable rules to protect your network from fraudulent activities.</p>
            </div>
            <div class="feature-card">
                <h3>CDR Management</h3>
                <p>Comprehensive Call Detail Record generation and management with export capabilities for billing and analytics.</p>
            </div>
        </div>
    </div>
</section>

<!-- NU DATA Details -->
<section id="nu-data" class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>NU DATA - Data Enrichment Services</h2>
            <p>Enhance your data quality with our comprehensive validation and enrichment services</p>
        </div>
        <div style="text-align: center; margin-bottom: 40px;">
            <img src="<?= base_url('assets/images/nu-data.jpg') ?>" alt="NU DATA Enrichment Services" style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <h3>Phone Validation</h3>
                <p>Real-time phone number validation including carrier lookup, line type detection, and porting status verification.</p>
            </div>
            <div class="feature-card">
                <h3>Data Cleansing</h3>
                <p>Remove duplicates, standardize formats, and correct errors in your customer data for improved accuracy.</p>
            </div>
            <div class="feature-card">
                <h3>HLR Lookup</h3>
                <p>Home Location Register lookups to verify mobile number status, roaming information, and network details.</p>
            </div>
            <div class="feature-card">
                <h3>Batch Processing</h3>
                <p>Process large datasets efficiently with our batch processing capabilities and downloadable results.</p>
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