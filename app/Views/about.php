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
        background: linear-gradient(135deg, var(--color-surface) 80%, var(--color-accent-secondary) 100%);
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        border: 2px solid var(--color-accent);
        box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        transition: transform 0.3s var(--transition-bounce), box-shadow 0.3s var(--transition-bounce), border-color 0.3s;
    }
    .value-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        border-color: var(--color-primary);
    }
    .value-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .value-card p {
        color: var(--color-text-secondary);
        line-height: 1.6;
        margin-bottom: 0;
    }
    .team-card {
        background: linear-gradient(135deg, var(--color-surface) 80%, var(--color-accent-secondary) 100%);
        border-radius: 24px;
        padding: 32px 24px 28px 24px;
        text-align: center;
        border: 2px solid var(--color-accent);
        box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        margin-bottom: 0;
        transition: transform 0.3s var(--transition-bounce), box-shadow 0.3s var(--transition-bounce), border-color 0.3s;
    }
    .team-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 32px rgba(0,0,0,0.22);
        border-color: var(--color-primary);
    }
    .team-card img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 18px auto;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        background: var(--color-background-secondary);
    }
    .team-card h3 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
        color: var(--color-primary);
    }
    .team-card p {
        color: var(--color-accent);
        margin-bottom: 8px;
        font-size: 1.05rem;
        font-weight: 500;
    }
    .team-card .bio {
        color: var(--color-text-secondary);
        font-size: 0.98rem;
        line-height: 1.6;
        margin-top: 0.5rem;
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
        padding: 15px 40px;
        border-radius: 999px;
        font-size: 1.15rem;
        font-weight: 600;
        text-decoration: none;
        background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
        color: #18181A;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        transition: background 0.3s, color 0.3s;
        margin-top: 1rem;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        color: #fff;
    }
</style>

<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(120deg, var(--color-background) 60%, var(--color-accent-secondary) 100%); color: var(--color-text-primary); text-align: center; padding: 100px 20px 80px 20px; border-radius: 0 0 48px 48px; box-shadow: 0 8px 32px rgba(0,0,0,0.3);">
    <div class="max-w-7xl mx-auto">
        <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: -0.02em; line-height: 1.1;">
            About <span class="text-gradient" style="background: linear-gradient(90deg, var(--color-primary), var(--color-accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">NU GUI</span>
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px; color: var(--color-text-secondary);">
            Leading the telecommunications industry with innovative solutions, exceptional service, and a commitment to excellence since 2005.
        </p>
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
                <img src="<?= base_url('assets/images/wes-profile.jpg') ?>" alt="Profile picture of Wes, CEO and Founder of NU GUI" />
                <h3>Wes</h3>
                <p>CEO & Founder</p>
                <span class="bio">Wes is the visionary founder and CEO of NU GUI. With a passion for innovative design and user experience, Wes leads the team in creating stunning and functional interfaces that set new standards in the industry.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/suren-profile.jpg') ?>" alt="Profile picture of Suren, CTO of NU GUI" />
                <h3>Suren</h3>
                <p>CTO</p>
                <span class="bio">Suren, our CTO, brings extensive technical expertise to the team. He oversees all technological developments at NU GUI, ensuring that our solutions are cutting-edge and reliable.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/gali-profile.jpg') ?>" alt="Profile picture of Gali, Senior Executive Assistant at NU GUI" />
                <h3>Gali</h3>
                <p>Sr Executive Assistant</p>
                <span class="bio">Gali is the Senior Executive Assistant at NU GUI. With exceptional organizational skills and attention to detail, she ensures that all executive operations run smoothly and efficiently.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/pavan-profile.jpg') ?>" alt="Profile picture of Pavan, Junior Full Stack Developer at NU GUI" />
                <h3>Pavan</h3>
                <p>Jr Full Stack Developer</p>
                <span class="bio">Pavan is a Junior Full Stack Developer at NU GUI. He brings fresh perspectives and innovative ideas to the team, contributing to the development of our dynamic web solutions.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/ajay-profile.jpg') ?>" alt="Profile picture of Ajay, Senior Full Stack Developer at NU GUI" />
                <h3>Ajay</h3>
                <p>Sr Full Stack Developer</p>
                <span class="bio">Ajay is a Senior Full Stack Developer with a wealth of experience in both front-end and back-end development. His expertise ensures that our applications are robust and user-friendly.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/ankit-profile.jpg') ?>" alt="Profile picture of Ankit, UI/UX Web Designer at NU GUI" />
                <h3>Ankit</h3>
                <p>UI UX Web Designer</p>
                <span class="bio">Ankit is our UI/UX Web Designer who crafts visually appealing and highly functional designs. His work enhances user experience and ensures our interfaces are intuitive and engaging.</span>
            </div>
            <div class="team-card">
                <img src="<?= base_url('assets/images/mihir-profile.jpg') ?>" alt="Profile picture of Mihir, Project Manager and Full Stack Developer at NU GUI" />
                <h3>Mihir</h3>
                <p>PM & Full Stack Developer</p>
                <span class="bio">Mihir serves as both a Project Manager and Full Stack Developer. His dual role helps bridge the gap between project planning and execution, ensuring timely and successful project completions.</span>
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