<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Enterprise Telecom Solutions | VoIP, SMS & Call Control Systems<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for Home Page
$this->setVar('description', 'NU GUI delivers carrier-grade telecom solutions: VoIP services, SMS platforms, call control systems & data management. Trusted by operators in 50+ countries. Get started today.');
$this->setVar('ogTitle', 'NU GUI - Enterprise Telecom Solutions | VoIP, SMS, Call Control');
$this->setVar('ogDescription', 'Leading provider of carrier-grade telecommunication solutions. VoIP services, SMS platforms, call control systems & data management for operators worldwide.');
$this->setVar('twitterTitle', 'NU GUI - Enterprise Telecom Solutions | VoIP, SMS, Call Control');
$this->setVar('twitterDescription', 'Carrier-grade telecom solutions trusted by operators in 50+ countries. VoIP, SMS, call control & data services.');
?>
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
            Enterprise Telecom Solutions That
            <span class="text-gradient">Scale Your Business</span>
        </h1>
        <p>
            Trusted by operators in 50+ countries. Carrier-grade VoIP, SMS platforms, call control systems,
            and data management solutions with 99.99% uptime guarantee.
        </p>
        <div class="hero-stats" style="display: flex; justify-content: center; gap: 3rem; margin: 2rem 0; flex-wrap: wrap;">
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--color-primary);">50+</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Countries Served</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--color-primary);">99.99%</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Uptime SLA</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--color-primary);">1B+</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Monthly Transactions</div>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= base_url('/solutions'); ?>" class="btn-primary">Get Started Free</a>
            <a href="<?= base_url('/contact'); ?>" class="btn-secondary">Request Demo</a>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Carrier-Grade Telecom Solutions</h2>
            <p>
                Enterprise-ready telecommunication infrastructure engineered for 99.99% uptime,
                infinite scalability, and seamless integration with your existing systems.
            </p>
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-sip-icon.jpg') ?>" alt="NU SIP Icon">
                <h3>NU SIP - VoIP Platform</h3>
                <p>Enterprise VoIP solution with HD voice quality, global coverage in 195+ countries,
                   and seamless PBX integration. Perfect for call centers and enterprises.</p>
                <a href="<?= base_url('/solutions#nu-sip'); ?>" class="btn-primary">Learn More</a>
            </div>
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-sms-icon.jpg') ?>" alt="NU SMS Icon">
                <h3>NU SMS - Messaging Gateway</h3>
                <p>Bulk SMS platform with 98% delivery rates, real-time analytics, and RESTful APIs.
                   Send millions of messages instantly to 200+ countries.</p>
                <a href="<?= base_url('/solutions#nu-sms'); ?>" class="btn-primary">Learn More</a>
            </div>
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-ccs-icon.jpg') ?>" alt="NU CCS Icon">
                <h3>NU CCS - Call Control System</h3>
                <p>Next-gen call management with real-time billing, AI-powered fraud detection,
                   and comprehensive CDR analytics. Reduce revenue leakage by up to 40%.</p>
                <a href="<?= base_url('/solutions#nu-ccs'); ?>" class="btn-primary">Learn More</a>
            </div>
            <div class="feature-card">
                <img src="<?= base_url('assets/images/nu-data-icon.jpg') ?>" alt="NU DATA Icon">
                <h3>NU DATA - Intelligence Platform</h3>
                <p>Telecom data validation and enrichment with 99.5% accuracy. HLR lookups,
                   number portability checks, and real-time verification APIs.</p>
                <a href="<?= base_url('/solutions#nu-data'); ?>" class="btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Partner Program CTA -->
<section class="cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2>Ready to Transform Your Telecom Operations?</h2>
        <p>
            Join leading operators and enterprises worldwide. Get instant access to our platform
            with 24/7 support, dedicated account management, and no setup fees.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= base_url('/contact'); ?>" class="btn-primary">Start Free Trial</a>
            <a href="<?= base_url('/partner-program'); ?>" class="btn-secondary">Become a Partner</a>
        </div>
    </div>
</section>

<!-- Structured Data for SEO -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "NU GUI",
  "url": "https://nugui.co.za",
  "logo": "https://nugui.co.za/assets/images/NUGUI-ICON-7 - Dark.png",
  "description": "Leading provider of carrier-grade telecommunication solutions including VoIP services, SMS platforms, call control systems, and data management for operators worldwide.",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "ZA"
  },
  "sameAs": [
    "https://www.linkedin.com/company/nugui",
    "https://github.com/nu-gui"
  ],
  "offers": [
    {
      "@type": "Offer",
      "name": "NU SIP - VoIP Platform",
      "description": "Enterprise VoIP solution with HD voice quality and global coverage in 195+ countries"
    },
    {
      "@type": "Offer", 
      "name": "NU SMS - Messaging Gateway",
      "description": "Bulk SMS platform with 98% delivery rates and real-time analytics"
    },
    {
      "@type": "Offer",
      "name": "NU CCS - Call Control System",
      "description": "Next-gen call management with real-time billing and AI-powered fraud detection"
    },
    {
      "@type": "Offer",
      "name": "NU DATA - Intelligence Platform", 
      "description": "Telecom data validation and enrichment with 99.5% accuracy"
    }
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "127"
  }
}
</script>

<!-- FAQ Schema for Common Questions -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What telecom solutions does NU GUI offer?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "NU GUI offers carrier-grade telecom solutions including NU SIP (VoIP platform), NU SMS (messaging gateway), NU CCS (call control system), and NU DATA (intelligence platform) for operators and enterprises worldwide."
      }
    },
    {
      "@type": "Question",
      "name": "What is the uptime guarantee for NU GUI services?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "NU GUI provides a 99.99% uptime SLA guarantee for all our carrier-grade telecommunication services, ensuring reliable operations for your business."
      }
    },
    {
      "@type": "Question",
      "name": "Which countries does NU GUI operate in?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "NU GUI serves telecom operators and enterprises in over 50 countries worldwide, with VoIP coverage in 195+ countries and SMS delivery to 200+ countries."
      }
    }
  ]
}
</script>
<?= $this->endSection() ?>
