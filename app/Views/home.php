<?= $this->extend('layout') ?>

<?= $this->section('title') ?>NU GUI | Telecom & Engagement Platforms for Carriers & Resellers<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for Home Page
$this->setVar('description', 'NU GUI helps carriers, resellers, and enterprises route calls, send messages, and bill in real time. Explore our VoIP, SMS, call control, data, and scheduling solutions. Strong global partnerships, especially across Africa and India.');
$this->setVar('ogTitle', 'NU GUI | Telecom & Engagement Platforms for Carriers & Resellers');
$this->setVar('ogDescription', 'NU GUI helps you connect with customers, scale reliably, and grow revenue — with voice, SMS, data, and engagement platforms that just work.');
$this->setVar('twitterTitle', 'NU GUI | Telecom & Engagement Platforms');
$this->setVar('twitterDescription', 'Since 2018, enabling carriers, resellers, and enterprises to deliver reliable communications and data‑driven marketing at scale.');
?>
<style>
    body {
        background: var(--color-background);
        color: var(--color-text-primary);
        font-family: var(--font-family-primary);
        margin: 0;
        padding: 0;
    }
    /* Hero section styles are in hero-sections.css */
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
    /* Feature card styles moved to cards-standardized.css for consistency */
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
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1>
            Powering Telecom Growth for
            <span class="text-gradient">Carriers & Resellers</span>
        </h1>
        <p>
            <strong>NU GUI</strong> helps you connect with customers, scale reliably, and grow revenue — 
            with voice, SMS, data, and engagement platforms that just work.
        </p>
        <p style="font-size: 1.1rem; margin-top: 1rem;">
            <strong>Since 2018</strong>, after merging and rebranding from <em>We Sell Solutions (WSS)</em>, 
            we've focused on enabling carriers, resellers, and enterprises to deliver reliable communications 
            and data‑driven marketing at scale.
        </p>
        <div class="btn-group">
            <a href="<?= base_url('/solutions'); ?>" class="btn btn--primary btn--large">Explore Solutions</a>
            <a href="<?= base_url('/contact'); ?>" class="btn btn--secondary btn--large">Talk to Sales</a>
        </div>
    </div>
</section>

<!-- Solutions at a Glance -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Solutions at a Glance</h2>
            <p>
                Everything flows into our <a href="<?= base_url('/solutions'); ?>" style="color: var(--color-primary); text-decoration: underline;">Solutions</a> hub. 
                Use these quick summaries to jump straight to what you need.
            </p>
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <?= picture_product('SIP', 'icon', 'product-icon') ?>
                <h3>NU SIP — Enterprise VoIP</h3>
                <p>Route calls globally with carrier‑grade reliability, least‑cost routing, and failover.</p>
                <a href="<?= base_url('/solutions#nu-sip'); ?>" class="btn btn--outline">Learn More →</a>
            </div>
            <div class="feature-card">
                <?= picture_product('SMS', 'icon', 'product-icon') ?>
                <h3>NU SMS — Bulk & Two‑Way Messaging</h3>
                <p>Launch high‑volume campaigns with direct routes, two‑way messaging, and real‑time DLRs.</p>
                <a href="<?= base_url('/solutions#nu-sms'); ?>" class="btn btn--outline">Learn More →</a>
            </div>
            <div class="feature-card">
                <?= picture_product('CCS', 'icon', 'product-icon') ?>
                <h3>NU CCS — Call Control & Billing</h3>
                <p>Manage high‑volume traffic with advanced routing, real‑time billing integrations, and fraud controls.</p>
                <a href="<?= base_url('/solutions#nu-ccs'); ?>" class="btn btn--outline">Learn More →</a>
            </div>
            <div class="feature-card">
                <?= picture_product('DATA', 'icon', 'product-icon') ?>
                <h3>NU DATA — Intelligence & Validation</h3>
                <p>Cleanse, validate, and enrich phone data (HLR/MNP), with batch processing for large datasets.</p>
                <a href="<?= base_url('/solutions#nu-data'); ?>" class="btn btn--outline">Learn More →</a>
            </div>
            <div class="feature-card">
                <?= picture_product('CRON', 'icon', 'product-icon') ?>
                <h3>NU CRON — AI‑Driven Scheduling</h3>
                <p>Optimise outreach timing and orchestration across channels to lift conversion and CX.</p>
                <a href="<?= base_url('/solutions#nu-cron'); ?>" class="btn btn--outline">Learn More →</a>
            </div>
            <div class="feature-card">
                <?= picture_product('GUI', 'icon', 'product-icon') ?>
                <h3>NU GUI — Management Portal</h3>
                <p>White‑label console with real‑time dashboards and unified API control for operations teams.</p>
                <a href="<?= base_url('/solutions#nu-gui'); ?>" class="btn btn--outline">Learn More →</a>
            </div>
        </div>
    </div>
</section>

<!-- Customer Success -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Outcomes You Can Expect</h2>
            <p>
                Partner feedback from carriers and resellers across our global network.
            </p>
        </div>
        <div class="testimonial-grid">
            <!-- Testimonial 1 -->
            <div class="testimonial-card" style="--card-index: 0;">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">TC</div>
                    <div class="testimonial-meta">
                        <h4>Technical Director</h4>
                        <p>Tier 2 Carrier, Africa Region</p>
                    </div>
                </div>
                <p class="testimonial-content">
                    "The VoIP platform enabled us to scale from 10K to 500K concurrent calls in 6 months. 
                    Advanced fraud detection capabilities have significantly reduced revenue leakage. Outstanding technical support throughout."
                </p>
                <div class="testimonial-rating">★★★★★</div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="testimonial-card" style="--card-index: 1;">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">HO</div>
                    <div class="testimonial-meta">
                        <h4>Head of Operations</h4>
                        <p>Global Messaging Provider</p>
                    </div>
                </div>
                <p class="testimonial-content">
                    "Processing 50M+ SMS monthly with 98.7% delivery rate. The real-time analytics and 
                    seamless API integration allowed us to consolidate from 3 different providers to this single solution."
                </p>
                <div class="testimonial-rating">★★★★★</div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="testimonial-card" style="--card-index: 2;">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">FD</div>
                    <div class="testimonial-meta">
                        <h4>Founder</h4>
                        <p>MVNO, India Region</p>
                    </div>
                </div>
                <p class="testimonial-content">
                    "Started as a small MVNO, now serving 100K+ customers. The billing system and call control 
                    capabilities made our rapid growth possible. Achieved 400% ROI in year one."
                </p>
                <div class="testimonial-rating">★★★★★</div>
            </div>
        </div>
        
        <!-- Trust Indicators -->
        <div style="display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap; padding: 2rem 0; border-top: 1px solid var(--color-border);">
            <div style="text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary);">99.99%</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Uptime SLA</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary);">24/7</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Expert Support</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary);">ISO 27001</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Certified</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary);">GDPR</div>
                <div style="font-size: 0.9rem; color: var(--color-text-secondary);">Compliant</div>
            </div>
        </div>
    </div>
</section>

<!-- Who We Serve -->
<section class="section" style="background: var(--color-background);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Who We Serve</h2>
        </div>
        <div class="card-grid">
            <div class="feature-card">
                <h3>Carriers (Tier 1 & 2)</h3>
                <p>High‑volume environments with complex routing, analytics, and governance needs.</p>
            </div>
            <div class="feature-card">
                <h3>Resellers (Tier 3)</h3>
                <p>White‑label‑ready platforms, fast onboarding, and go‑to‑market support.</p>
            </div>
            <div class="feature-card">
                <h3>Enterprises & Contact Centres</h3>
                <p>Streamlined operations, lower costs, and better customer conversations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why NU GUI -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Why NU GUI</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div style="padding: 1.5rem;">
                <h3 style="color: var(--color-primary); margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600;">✓ Reliability</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: var(--color-text-secondary);">Carrier‑grade uptime and routing with built‑in failover.</p>
            </div>
            <div style="padding: 1.5rem;">
                <h3 style="color: var(--color-primary); margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600;">✓ Cost Optimisation</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: var(--color-text-secondary);">Least‑cost routing and real‑time reporting.</p>
            </div>
            <div style="padding: 1.5rem;">
                <h3 style="color: var(--color-primary); margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600;">✓ Fraud & Spam Protection</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: var(--color-text-secondary);">Intelligent blocking and controls to protect your network and customers.</p>
            </div>
            <div style="padding: 1.5rem;">
                <h3 style="color: var(--color-primary); margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600;">✓ Speed to Value</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: var(--color-text-secondary);">Fast onboarding, practical support, and a focus on measurable outcomes.</p>
            </div>
            <div style="padding: 1.5rem;">
                <h3 style="color: var(--color-primary); margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600;">✓ Partner‑First</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: var(--color-text-secondary);">Global partner network with particularly <strong>strong relationships across Africa and India</strong>.</p>
            </div>
            <div style="padding: 1.5rem;">
                <h3 style="color: var(--color-primary); margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600;">✓ Clear Visibility</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: var(--color-text-secondary);">Lower cost per connected minute through smarter routing.</p>
            </div>
        </div>
    </div>
</section>

<!-- Ready to Take the Next Step -->
<section class="cta-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2>Ready to Take the Next Step?</h2>
        <p>
            Start with a demo or a pilot tailored to your volumes and regions.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= base_url('/solutions'); ?>" class="btn btn--primary btn--large">Explore Solutions</a>
            <a href="<?= base_url('/contact'); ?>" class="btn btn--secondary btn--large">Schedule a Demo</a>
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
  "logo": "https://nugui.co.za/assets/images/NUGUI-icon-1.png",
  "description": "NU GUI helps carriers, resellers, and enterprises route calls, send messages, and bill in real time. Explore our VoIP, SMS, call control, data, and scheduling solutions. Strong global partnerships, especially across Africa and India.",
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
    },
    {
      "@type": "Offer",
      "name": "NU CRON - Schedule Manager",
      "description": "AI-driven Contact Schedule Manager for optimized lead generation and communication automation"
    }
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "127"
  }
}
</script>

<!-- Reviews Schema for Testimonials -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "NU GUI",
  "review": [
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Mike Bradley"
      },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "reviewBody": "NU GUI's VoIP platform helped us scale from 10K to 500K concurrent calls in 6 months. Their fraud detection saved us $2M in the first year alone. Outstanding support team.",
      "publisher": {
        "@type": "Organization",
        "name": "TeleConnect Africa"
      }
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Sarah Chen"
      },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "reviewBody": "We process 50M SMS monthly through NU SMS. 98.7% delivery rate, real-time analytics, and seamless API integration. Migrated from 3 different providers to this single solution.",
      "publisher": {
        "@type": "Organization",
        "name": "MessageFlow Global"
      }
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Raj Kumar"
      },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "reviewBody": "Started as a small MVNO, now serving 100K+ customers. NU CCS billing system and call control made our rapid growth possible. ROI was 400% in year one.",
      "publisher": {
        "@type": "Organization",
        "name": "VoiceTech Solutions"
      }
    }
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5.0",
    "reviewCount": "3",
    "bestRating": "5",
    "worstRating": "1"
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
