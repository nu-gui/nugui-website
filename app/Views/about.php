<?= $this->extend('layout') ?>

<?= $this->section('title') ?>About NU GUI | Our Story, Mission & Global Partnerships<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for About Page
$this->setVar('description', 'NU GUI rebranded from We Sell Solutions (WSS) in 2018. We help carriers, resellers, and enterprises deliver reliable telecom and direct marketing at scale, with strong partnerships globally—especially across Africa and India.');
$this->setVar('ogTitle', 'About NU GUI | Our Story, Mission & Global Partnerships');
$this->setVar('ogDescription', 'NU GUI helps carriers, resellers, and enterprises deliver reliable communications and data‑driven marketing at scale. Established in 2018 through merger and rebrand of We Sell Solutions.');
$this->setVar('twitterTitle', 'About NU GUI | Global Telecom Solutions Provider');
$this->setVar('twitterDescription', 'Since 2018, focusing on practical outcomes: better connectivity, lower cost per minute, stronger customer engagement, and clear reporting.');
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
<section class="hero-section hero-about">
    <div class="max-w-7xl mx-auto">
        <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: -0.02em; line-height: 1.1; color: #FFFFFF;">
            About <span class="text-gradient" style="background: linear-gradient(90deg, var(--color-primary), var(--color-accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">NU GUI</span>
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px; color: #FFFFFF; opacity: 0.9;">
            NU GUI helps carriers, resellers, and enterprises deliver <strong>reliable communications and data‑driven marketing at scale</strong>.<br>
            We focus on practical outcomes: <strong>better connectivity, lower cost per minute, stronger customer engagement, and clear reporting</strong>.
        </p>
    </div>
</section>

<!-- Our Story Section -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="story-section">
            <div class="story-content">
                <h2 style="font-size: 2rem; font-weight: 600; margin-bottom: 20px;">Our Origin Story</h2>
                <p>NU GUI was established in <strong>2018</strong> through the <strong>merger and rebrand of We Sell Solutions (WSS)</strong>. WSS had been providing holistic telecom and direct marketing services—<strong>VoIP, bulk SMS, cloud PBX, campaign automation, and data management</strong>—with a hands‑on, results‑first approach.</p>
                <p>The rebrand consolidated those strengths into a single, focused company built for modern telecom needs.</p>
                <p><strong>Leadership:</strong> NU GUI is led by <strong>CEO Wesley Burgess</strong>, whose background spans telecommunications, contact‑centre optimisation, and business intelligence. Prior to NU GUI, Wesley held leadership roles at <strong>Teleforge</strong> and <strong>Proforge</strong>, and served as Managing Director of <strong>We Sell Solutions</strong>. His north star has stayed the same: <strong>help businesses connect better, sell smarter, and operate more efficiently</strong>.</p>
            </div>
            <div>
                <!-- Custom logo for about page: NUGUI-1 for light theme, NUGUI-2 for dark theme -->
                <picture>
                    <source media="(prefers-color-scheme: dark)" srcset="<?= base_url('assets/images/NUGUI-2.png') ?>">
                    <source media="(prefers-color-scheme: light)" srcset="<?= base_url('assets/images/NUGUI-1.png') ?>">
                    <img src="<?= base_url('assets/images/NUGUI-1.png') ?>" alt="NU GUI Logo" class="team-image">
                </picture>
            </div>
        </div>
    </div>
</section>

<!-- What We Do & How We Work -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>What We Do</h2>
            <p>We provide platforms and services to <strong>route calls, send messages, run campaigns, and bill in real time</strong>—without complexity.</p>
        </div>
        <div class="card-grid">
            <div class="value-card">
                <h3>Voice & Call Control</h3>
                <p>VoIP, SBC/PBX, advanced routing, failover.</p>
            </div>
            <div class="value-card">
                <h3>Messaging & Campaigns</h3>
                <p>Bulk SMS, automated outreach.</p>
            </div>
            <div class="value-card">
                <h3>Engagement & Data</h3>
                <p>Lead data management and database tools.</p>
            </div>
            <div class="value-card">
                <h3>Reporting & Billing</h3>
                <p>Real‑time visibility to manage cost, quality, and ROI.</p>
            </div>
        </div>
    </div>
</section>

<!-- How We Work -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>How We Work</h2>
            <p>Values & principles that guide everything we do</p>
        </div>
        <div class="card-grid">
            <div class="value-card">
                <h3>Reliability First</h3>
                <p>Carrier‑grade platforms, built‑in failover, proactive support.</p>
            </div>
            <div class="value-card">
                <h3>Cost Transparency</h3>
                <p>Tools that surface real‑time spend and performance so you can act quickly.</p>
            </div>
            <div class="value-card">
                <h3>Security & Compliance</h3>
                <p>Controls that protect your business and your customers.</p>
            </div>
            <div class="value-card">
                <h3>Partner‑First</h3>
                <p>We succeed when our clients and resellers succeed—your roadmap informs ours.</p>
            </div>
            <div class="value-card">
                <h3>Practical Innovation</h3>
                <p>We ship outcomes, not buzzwords.</p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Leadership</h2>
        </div>
        <div class="card-grid">
            <div class="team-card">
                <?= picture_profile('wes', 'team-image') ?>
                <h3>Wesley Burgess</h3>
                <p>Chief Executive Officer</p>
                <span class="bio">Wesley leads NU GUI's strategy and growth. His experience spans telecommunications, direct marketing, and analytics—turning complex operations into measurable business results. Under his leadership, NU GUI has focused on reliability, partner enablement, and data‑driven decision‑making.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('suren', 'team-image') ?>
                <h3>Suren</h3>
                <p>CTO</p>
                <span class="bio">Technical leadership driving our platform architecture and innovation. Ensuring reliability and scalability across all NU GUI services.</span>
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
                <?= picture_profile('mihir', 'team-image') ?>
                <h3>Mihir</h3>
                <p>PM & Full Stack Developer</p>
                <span class="bio">Mihir serves as both a Project Manager and Full Stack Developer. His dual role helps bridge the gap between project planning and execution, ensuring timely and successful project completions.</span>
            </div>
        </div>
    </div>
</section>

<!-- Global Partnerships -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Global Partnerships</h2>
            <p>NU GUI partners with operators, resellers, and technology providers <strong>worldwide</strong>, with particularly <strong>strong relationships across Africa and India</strong>.</p>
            <p>We collaborate closely with partners on deployment, onboarding, and growth, offering enablement, training, and co‑marketing support.</p>
        </div>
        <div style="text-align: center; margin-top: 2rem;">
            <p>Interested in partnering? Visit <a href="<?= base_url('/partner-program'); ?>" style="color: var(--color-primary); text-decoration: underline;">Partner with NU GUI</a> or <a href="<?= base_url('/contact'); ?>" style="color: var(--color-primary); text-decoration: underline;">Contact us</a>.</p>
        </div>
    </div>
</section>

<!-- Where We Operate -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Where We Operate</h2>
            <p>Headquartered in <strong>Cape Town, South Africa</strong>, we support customers and partners around the world.</p>
            <p>Our network and experience bridge <strong>regional growth in Africa and India</strong> with global scalability.</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="max-w-4xl mx-auto">
        <h2>Ready to Partner with NU GUI?</h2>
        <p>Join our global network of carriers, resellers, and enterprises delivering reliable communications at scale.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <a href="<?= base_url('/contact') ?>" class="btn btn--primary btn--large">Contact Us</a>
            <a href="<?= base_url('/solutions') ?>" class="btn btn--secondary btn--large">Explore Solutions</a>
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
    "foundingDate": "2018",
    "numberOfEmployees": {
      "@type": "QuantitativeValue",
      "minValue": 50,
      "maxValue": 100
    },
    "description": "NU GUI helps carriers, resellers, and enterprises deliver reliable communications and data-driven marketing at scale. Established in 2018 through merger and rebrand of We Sell Solutions.",
    "slogan": "Powering Telecom Growth for Carriers & Resellers",
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
        "name": "Wesley Burgess",
        "jobTitle": "Chief Executive Officer",
        "description": "Wesley leads NU GUI's strategy and growth. His experience spans telecommunications, direct marketing, and analytics."
      }
    ],
    "employees": [
      {
        "@type": "Person",
        "name": "Suren",
        "jobTitle": "CTO",
        "description": "Technical leadership driving our platform architecture and innovation."
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
