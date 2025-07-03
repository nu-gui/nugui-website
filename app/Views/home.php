<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    /* Custom styles for the home page to align with the Apple design system */
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
        max-w-3xl mx-auto;
        margin-bottom: 30px;
        color: var(--color-text-secondary);
    }
    .section {
        padding: 80px 20px;
        background-color: var(--color-background-secondary);
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
        max-w-2xl mx-auto;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
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
    .feature-card img {
        height: 80px;
        margin: 0 auto 20px;
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
        max-w-2xl mx-auto;
        margin-bottom: 30px;
        color: var(--color-text-secondary);
    }
    .btn-primary, .btn-secondary {
        display: inline-block;
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 0.3s ease;
        margin: 0 10px;
    }
    .btn-primary {
        background-color: var(--color-accent);
        color: white;
    }
    .btn-primary:hover {
        background-color: var(--color-accent-hover);
    }
    .btn-secondary {
        background-color: var(--color-background-secondary);
        color: var(--color-text-primary);
        border: 1px solid var(--color-border);
    }
    .btn-secondary:hover {
        background-color: var(--color-border);
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1>
            The Future of
            <span class="text-gradient">Telecommunication</span>
        </h1>
        <p>
            Carrier-grade VoIP, SMS, and data solutions for global operators and enterprises.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= base_url('/solutions'); ?>" class="btn-primary">Explore Solutions</a>
            <a href="<?= base_url('/partner-program'); ?>" class="btn-secondary">Partner Program</a>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Our Core Services</h2>
            <p>
                Discover our suite of telecommunication solutions, engineered for reliability and performance.
            </p>
        </div>
        <div class="card-grid">
            <!-- NU SIP -->
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-sip-icon.jpg') ?>" alt="NU SIP Icon" class="h-20 mx-auto mb-5">
                <h3>NU SIP</h3>
                <p>Advanced VoIP services with carrier-grade routing and media handling.</p>
                <a href="<?= base_url('/solutions#nu-sip'); ?>" class="btn-secondary" style="margin-top: 20px; display: inline-block;">Learn More</a>
            </div>
            <!-- NU SMS -->
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-sms-icon.jpg') ?>" alt="NU SMS Icon" class="h-20 mx-auto mb-5">
                <h3>NU SMS</h3>
                <p>Enterprise messaging platform with bulk SMS, API integration, and real-time tracking.</p>
                <a href="<?= base_url('/solutions#nu-sms'); ?>" class="btn-secondary" style="margin-top: 20px; display: inline-block;">Learn More</a>
            </div>
            <!-- NU CCS -->
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-ccs-icon.jpg') ?>" alt="NU CCS Icon" class="h-20 mx-auto mb-5">
                <h3>NU CCS</h3>
                <p>Robust call control server with traffic filtering, advanced billing, and monitoring.</p>
                <a href="<?= base_url('/solutions#nu-ccs'); ?>" class="btn-secondary" style="margin-top: 20px; display: inline-block;">Learn More</a>
            </div>
            <!-- NU DATA -->
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-data-icon.jpg') ?>" alt="NU DATA Icon" class="h-20 mx-auto mb-5">
                <h3>NU DATA</h3>
                <p>Data enrichment services including validation, cleansing, and phone verification.</p>
                <a href="<?= base_url('/solutions#nu-data'); ?>" class="btn-secondary" style="margin-top: 20px; display: inline-block;">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Partner Program CTA -->
<section class="cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2>Join Our Partner Network</h2>
        <p>
            Unlock exclusive resources, dedicated support, and growth opportunities with our partner program.
        </p>
        <a href="<?= base_url('/partner-program'); ?>" class="btn-primary">Become a Partner</a>
    </div>
</section>
<?= $this->endSection() ?>
