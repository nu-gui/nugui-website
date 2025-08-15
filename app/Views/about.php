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
    /* Card grid styles are now in layout.css - using feature-cards-grid for 3-column layout */
    /* Card styles moved to cards-standardized.css for consistency */
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
<section class="hero-section hero">
    <div class="max-w-7xl mx-auto">
        <h1>
            About <span class="accent" data-text="NU GUI">NU GUI</span>
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px;">
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
                <img src="<?= base_url('assets/images/NUGUI-2.png') ?>" alt="NU GUI Logo" class="team-image theme-logo-dark" style="display: block;">
                <img src="<?= base_url('assets/images/NUGUI-1.png') ?>" alt="NU GUI Logo" class="team-image theme-logo-light" style="display: none;">
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
        <div class="feature-cards-grid">
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
        <div class="feature-cards-grid">
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
        <div class="feature-cards-grid">
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
                <span class="bio">Suren brings wealth of expertise in all things IP-based, from VoIP engineering to infrastructure and scalability. His exceptional database skills are the driving force behind our success, combined with his vast understanding of digital communications that powers our technical excellence.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('gali', 'team-image') ?>
                <h3>Gali</h3>
                <p>Sr Executive Assistant</p>
                <span class="bio">Gali is the voice of reason at NU GUI, empathetic to all circumstances and bridging the gap between technology and human behavior. Her wealth of language skills and training expertise helps build better relationships across our global partnerships and team.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('pavan', 'team-image') ?>
                <h3>Pavan</h3>
                <p>Full Stack Developer & VoIP Engineer</p>
                <span class="bio">Pavan serves in a dual role at NU GUI, working as both a Full Stack Developer for UI deployments and a VoIP Engineer for day-to-day operations. His versatility allows him to bridge development and telecommunications infrastructure, ensuring seamless integration between our platforms.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('ankit', 'team-image') ?>
                <h3>Ankit</h3>
                <p>UI UX Web Designer</p>
                <span class="bio">Ankit is a creative genius with complete creative freedom at NU GUI. He builds and establishes our vision for project development and user experience with every project, ensuring our interfaces are not just functional but truly exceptional.</span>
            </div>
            <div class="team-card">
                <?= picture_profile('mihir', 'team-image') ?>
                <h3>Mihir</h3>
                <p>Senior Full Stack Developer</p>
                <span class="bio">Mihir is a seasoned senior full stack developer who has worked with the best software development companies in the industry. He's always leading the way in best practices and technology advancements, bringing world-class expertise to every project.</span>
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
        "jobTitle": "Full Stack Developer & VoIP Engineer"
      },
      {
        "@type": "Person",
        "name": "Ankit",
        "jobTitle": "UI/UX Web Designer"
      },
      {
        "@type": "Person",
        "name": "Mihir",
        "jobTitle": "Senior Full Stack Developer"
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
