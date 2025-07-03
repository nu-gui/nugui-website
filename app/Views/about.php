<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    /* Custom styles for the about page to align with the Apple design system */
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
    .hero-section p {
        font-size: 1.5rem;
        max-w-3xl mx-auto;
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
        max-w-3xl mx-auto;
        color: var(--color-text-secondary);
    }
    .story-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .story-section img {
        border-radius: 20px;
        max-width: 100%;
    }
    .story-content h3 {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .story-content p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }
    .value-card {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
    }
    .value-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .value-card p {
        color: var(--color-text-secondary);
    }
    .team-card {
        text-align: center;
    }
    .team-card img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto 20px;
        object-fit: cover;
    }
    .team-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
    }
    .team-card p {
        color: var(--color-accent);
        margin-bottom: 10px;
    }
    .team-card .bio {
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
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-4xl mx-auto">
        <h1>About <span class="text-gradient">NU GUI</span></h1>
        <p>Leading the telecommunications industry with innovative solutions, exceptional service, and a commitment to excellence since 2005.</p>
    </div>
</section>

<!-- Our Story Section -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="story-section">
            <div class="story-content">
                <h3>Our Story</h3>
                <p>Founded in 2005, NU GUI has grown from a small startup to a leading provider of telecommunications infrastructure solutions. Our journey began with a simple vision: to make advanced telecom technology accessible and reliable for businesses worldwide.</p>
                <p>Today, we serve hundreds of telecommunications operators and enterprises across the globe, providing carrier-grade VoIP services, call control systems, SMS solutions, and data enrichment services that power millions of connections daily.</p>
            </div>
            <div>
                <img src="<?= base_url('assets/images/our-story.jpg') ?>" alt="Our Story" />
            </div>
        </div>
    </div>
</section>

<!-- Vision, Mission & Values -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Our Vision, Mission & Values</h2>
        </div>
        <div class="card-grid">
            <div class="value-card">
                <h3>Our Vision</h3>
                <p>To be the global leader in telecommunications infrastructure, connecting businesses and communities through innovative, reliable technology solutions.</p>
            </div>
            <div class="value-card">
                <h3>Our Mission</h3>
                <p>Empowering telecommunications providers with cutting-edge solutions that enhance connectivity, drive growth, and deliver exceptional value.</p>
            </div>
            <div class="value-card">
                <h3>Our Values</h3>
                <p>Innovation, Integrity, Excellence, Customer Focus, and Teamwork guide everything we do, ensuring we deliver the best solutions and service.</p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Leadership Team</h2>
            <p>Our experienced leadership team brings together decades of expertise in telecommunications, technology, and business management.</p>
        </div>
        <div class="card-grid">
            <div class="team-card">
                <img src="<?= base_url('assets/images/ceo-profile.jpg') ?>" alt="CEO" />
                <h3>John Smith</h3>
                <p>Chief Executive Officer</p>
                <span class="bio">20+ years in telecommunications leadership, driving innovation and growth.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/cto-profile.jpg') ?>" alt="CTO" />
                <h3>Sarah Johnson</h3>
                <p>Chief Technology Officer</p>
                <span class="bio">Expert in VoIP and telecommunications infrastructure with 15+ years experience.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/coo-profile.jpg') ?>" alt="COO" />
                <h3>Michael Brown</h3>
                <p>Chief Operating Officer</p>
                <span class="bio">Operational excellence expert with proven track record in scaling technology companies.</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="max-w-4xl mx-auto">
        <h2>Ready to Transform Your Telecommunications?</h2>
        <p>Join hundreds of satisfied clients who trust NU GUI for their telecommunications infrastructure needs.</p>
        <a href="<?= base_url('/contact') ?>" class="btn-primary">Get in Touch</a>
    </div>
</section>

<?= $this->endSection() ?>