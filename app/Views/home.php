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
    .btn-primary {
        display: inline-block;
        padding: 15px 40px;
        border-radius: 999px;
        font-size: 1.15rem;
        font-weight: 600;
        text-decoration: none;
        background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
        color: #fff;
        border: 2.5px solid transparent;
        box-shadow:
            0 0 0 3px rgba(0,0,0,0.18),
            0 0 12px 2px var(--color-accent),
            0 4px 16px rgba(0,0,0,0.22);
        position: relative;
        transition: background 0.3s, color 0.3s, box-shadow 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        color: #fff;
        border-color: var(--color-primary);
        box-shadow:
            0 0 0 3px var(--color-primary),
            0 0 18px 4px var(--color-accent),
            0 8px 32px rgba(0,0,0,0.32);
    }
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
        background: linear-gradient(135deg, var(--color-surface) 80%, var(--color-accent-secondary) 100%);
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        box-shadow:
            0 0 0 2.5px var(--color-accent),
            0 4px 32px 0 rgba(0,0,0,0.22),
            0 0 18px 2px var(--color-primary);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow:
            0 0 0 3px var(--color-primary),
            0 20px 48px 0 rgba(0,0,0,0.28),
            0 0 24px 4px var(--color-accent);
    }
    .feature-card img {
        display: block;
        margin: 0 auto 1rem auto;
        border-radius: 12px;
        background: var(--color-background-secondary);
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        width: 48px;
        height: 48px;
        object-fit: contain;
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
        margin-bottom: 20px;
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
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-sip-icon.jpg') ?>" alt="NU SIP Icon">
                <h3>NU SIP</h3>
                <p>Carrier-grade VoIP services for global voice connectivity and SIP trunking.</p>
                <a href="<?= base_url('/solutions#nu-sip'); ?>" class="btn-primary">Learn More</a>
            </div>
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-sms-icon.jpg') ?>" alt="NU SMS Icon">
                <h3>NU SMS</h3>
                <p>Enterprise messaging platform for bulk SMS, APIs, and global delivery.</p>
                <a href="<?= base_url('/solutions#nu-sms'); ?>" class="btn-primary">Learn More</a>
            </div>
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-ccs-icon.jpg') ?>" alt="NU CCS Icon">
                <h3>NU CCS</h3>
                <p>Advanced call control, billing, and fraud prevention for telecom operators.</p>
                <a href="<?= base_url('/solutions#nu-ccs'); ?>" class="btn-primary">Learn More</a>
            </div>
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-data-icon.jpg') ?>" alt="NU DATA Icon">
                <h3>NU DATA</h3>
                <p>Data validation, cleansing, and enrichment for accurate telecom operations.</p>
                <a href="<?= base_url('/solutions#nu-data'); ?>" class="btn-primary">Learn More</a>
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
