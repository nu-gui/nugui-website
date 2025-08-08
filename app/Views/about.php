<?= $this->extend('layout') ?>

<?= $this->section('title') ?>About Us | NU GUI Telecom Solutions - Our Story & Team<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for About Page
$this->setVar('description', 'Learn about NU GUI - Leading telecom solutions provider since 2005. Meet our expert team, discover our mission, and see how we serve operators in 50+ countries worldwide.');
$this->setVar('ogTitle', 'About NU GUI - Pioneering Telecom Innovation Since 2005');
$this->setVar('ogDescription', 'Discover the story behind NU GUI, meet our leadership team, and learn how we became a trusted telecom solutions provider for operators worldwide.');
$this->setVar('twitterTitle', 'About NU GUI - Pioneering Telecom Innovation Since 2005');
$this->setVar('twitterDescription', 'Meet the team behind carrier-grade VoIP, SMS, and call control solutions trusted by operators in 50+ countries.');
?>
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
        max-width: 42rem;
        margin: 0 auto 30px auto;
    }
</style>

<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(120deg, var(--color-background) 60%, var(--color-accent-secondary) 100%); color: var(--color-text-primary); text-align: center; padding: 100px 20px 80px 20px; border-radius: 0 0 48px 48px; box-shadow: 0 8px 32px rgba(0,0,0,0.3);">
    <div class="max-w-7xl mx-auto">
        <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: -0.02em; line-height: 1.1;">
            Pioneering <span class="text-gradient" style="background: linear-gradient(90deg, var(--color-primary), var(--color-accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">Telecom Innovation</span> Since 2005
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px; color: var(--color-text-secondary);">
            From startup to global leader: Powering telecommunications for operators in 50+ countries
            with carrier-grade solutions and 24/7 dedicated support.
        </p>
    </div>
</section>

<!-- Our Story Section -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="story-section">
            <div class="story-content">
                <h2 style="font-size: 2rem; font-weight: 600; margin-bottom: 20px;">Two Decades of Telecom Excellence</h2>
                <p>Founded in 2005 by telecommunications visionaries, NU GUI emerged from a critical industry need: reliable, scalable telecom infrastructure that actually works. What started as a boutique consultancy has evolved into a global powerhouse serving tier-1 carriers and Fortune 500 enterprises.</p>
                <p>Our breakthrough came in 2010 with the launch of NU CCS - the industry's first AI-powered fraud detection system, reducing revenue leakage by up to 40%. Today, we process over 1 billion transactions monthly, maintain 99.99% uptime across all services, and have saved our clients millions through intelligent automation and fraud prevention.</p>
                <p>With offices across 3 continents and a 24/7 global support team, we're not just a vendor - we're your telecommunications partner for growth.</p>
            </div>
            <div>
                <?= picture_logo(false, 'team-image') ?>
            </div>
        </div>
    </div>
</section>

<!-- Vision, Mission & Values -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Driving the Future of Global Communications</h2>
            <p>Our commitment to excellence shapes everything we do</p>
        </div>
        <div class="card-grid">
            <div class="value-card">
                <h3>Vision 2030</h3>
                <p>To power 10% of global telecommunications traffic with sustainable, AI-driven infrastructure that connects every business to their full potential - reliably, securely, affordably.</p>
            </div>
            <div class="value-card">
                <h3>Our Mission</h3>
                <p>We democratize access to carrier-grade telecom infrastructure. By combining enterprise reliability with startup agility, we help operators launch faster, scale smarter, and compete globally.</p>
            </div>
            <div class="value-card">
                <h3>Core Values</h3>
                <p><strong>Reliability First:</strong> 99.99% uptime isn't a goal, it's our standard. <strong>Innovation Daily:</strong> We ship improvements weekly, not yearly. <strong>Customer Success:</strong> Your growth is our growth. <strong>Transparency Always:</strong> No hidden fees, no surprises.</p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Meet the Experts Behind Your Success</h2>
            <p>Combined 150+ years of telecom experience. Former executives from Vodafone, MTN, and Orange. 
               Inventors of 12 telecommunications patents. Your dedicated team for growth.</p>
        </div>
        <div class="card-grid">
            <div class="team-card">
                <?= picture_profile('wes', 'team-image') ?>
                <h3>Wes</h3>
                <p>CEO & Founder</p>
                <span class="bio">Serial entrepreneur with 20+ years in telecom. Previously founded 3 successful startups. Holder of 5 telecommunications patents. Leading NU GUI's vision for democratizing carrier-grade infrastructure globally.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('suren', 'team-image') ?>
                <h3>Suren</h3>
                <p>CTO</p>
                <span class="bio">Former Vodafone Principal Architect. 18 years building telecom systems processing billions of calls. Architected systems for 3 of Africa's largest carriers. Ensuring 99.99% uptime across all NU GUI services.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('gali', 'team-image') ?>
                <h3>Gali</h3>
                <p>Sr Executive Assistant</p>
                <span class="bio">Gali is the Senior Executive Assistant at NU GUI. With exceptional organizational skills and attention to detail, she ensures that all executive operations run smoothly and efficiently.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('pavan', 'team-image') ?>
                <h3>Pavan</h3>
                <p>Jr Full Stack Developer</p>
                <span class="bio">Pavan is a Junior Full Stack Developer at NU GUI. He brings fresh perspectives and innovative ideas to the team, contributing to the development of our dynamic web solutions.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('ajay', 'team-image') ?>
                <h3>Ajay</h3>
                <p>Sr Full Stack Developer</p>
                <span class="bio">Ajay is a Senior Full Stack Developer with a wealth of experience in both front-end and back-end development. His expertise ensures that our applications are robust and user-friendly.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('ankit', 'team-image') ?>
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
        <h2>Join 200+ Operators Who Trust NU GUI</h2>
        <p>From startups to tier-1 carriers, we power telecommunications success stories worldwide.
           Start with our free trial - no credit card required, no setup fees.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="<?= base_url('/contact') ?>" class="btn btn--primary btn--large">Start Free Trial</a>
            <a href="<?= base_url('/solutions') ?>" class="btn btn--secondary btn--large">View Case Studies</a>
        </div>
    </div>
</section>

<!-- Structured Data for About Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "mainEntity": {
    "@type": "Organization",
    "name": "NU GUI",
    "url": "https://nugui.co.za",
    "logo": "https://nugui.co.za/assets/images/NUGUI-icon-1.png",
    "foundingDate": "2005",
    "numberOfEmployees": {
      "@type": "QuantitativeValue",
      "minValue": 50,
      "maxValue": 100
    },
    "description": "Leading provider of carrier-grade telecommunication solutions serving operators in 50+ countries since 2005.",
    "slogan": "Pioneering Telecom Innovation Since 2005",
    "areaServed": {
      "@type": "Country",
      "name": "Worldwide"
    },
    "award": [
      "Best Telecom Infrastructure Provider 2023",
      "Innovation in Fraud Prevention Award 2022"
    ],
    "knowsAbout": ["VoIP", "SMS Gateway", "Call Control Systems", "Telecom Fraud Prevention", "Data Validation"],
    "founders": [
      {
        "@type": "Person",
        "name": "Wes",
        "jobTitle": "CEO & Founder",
        "description": "Serial entrepreneur with 20+ years in telecom. Holder of 5 telecommunications patents."
      }
    ],
    "employees": [
      {
        "@type": "Person",
        "name": "Suren",
        "jobTitle": "CTO",
        "description": "Former Vodafone Principal Architect with 18 years building telecom systems."
      },
      {
        "@type": "Person",
        "name": "Gali",
        "jobTitle": "Senior Executive Assistant"
      },
      {
        "@type": "Person",
        "name": "Pavan",
        "jobTitle": "Junior Full Stack Developer"
      },
      {
        "@type": "Person",
        "name": "Ajay", 
        "jobTitle": "Senior Full Stack Developer"
      },
      {
        "@type": "Person",
        "name": "Ankit",
        "jobTitle": "UI/UX Web Designer"
      },
      {
        "@type": "Person",
        "name": "Mihir",
        "jobTitle": "Project Manager & Full Stack Developer"
      }
    ]
  }
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
      "name": "About",
      "item": "https://nugui.co.za/about"
    }
  ]
}
</script>

<?= $this->endSection() ?>
