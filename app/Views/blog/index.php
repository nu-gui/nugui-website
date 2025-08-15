<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Blog & Resources | Telecom Industry Insights<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for Blog Page
$this->setVar('description', 'Latest telecom industry insights, VoIP best practices, SMS gateway guides, and technical resources. Stay updated with carrier-grade solutions and trends.');
$this->setVar('ogTitle', 'NU GUI Blog - Telecom Industry Insights & Resources');
$this->setVar('ogDescription', 'Expert insights on VoIP, SMS gateways, call control systems, and telecom infrastructure. Technical guides and industry trends from NU GUI experts.');
$this->setVar('twitterTitle', 'NU GUI Blog - Telecom Insights & Resources');
$this->setVar('twitterDescription', 'Latest telecom trends, technical guides, and industry insights from the experts at NU GUI.');
?>

<style>
    /* Hero styles are now in hero-sections.css - no inline overrides needed */
    .blog-category {
        background: var(--color-surface);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 2px solid var(--color-border);
    }
    .blog-category:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        border-color: var(--color-primary);
    }
    .blog-post {
        background: var(--color-surface);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        border: 1px solid var(--color-border);
    }
    .blog-post:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        border-color: var(--color-primary);
    }
    .blog-meta {
        color: var(--color-text-secondary);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    .blog-tag {
        display: inline-block;
        background: var(--color-primary);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 999px;
        font-size: 0.85rem;
        margin-right: 0.5rem;
    }
</style>

<!-- Blog Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl mx-auto">
        <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: -0.02em; line-height: 1.1;">
            Telecom Industry <span class="text-gradient">Insights & Resources</span>
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px; color: var(--color-text-secondary);">
            Expert knowledge, technical guides, and industry trends to help you
            succeed in telecommunications.
        </p>
    </div>
</section>

<!-- Blog Categories -->
<section style="padding: 80px 20px; background: var(--color-background-secondary);">
    <div class="max-w-7xl mx-auto">
        <h2 style="font-size: 2.5rem; font-weight: 700; text-align: center; margin-bottom: 3rem; color: var(--color-primary);">
            Explore by Category
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <!-- VoIP Category -->
            <a href="<?= base_url('blog/category/voip') ?>" style="text-decoration: none;">
                <div class="blog-category">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                        🎤 VoIP & SIP Technology
                    </h3>
                    <p style="color: var(--color-text-secondary); line-height: 1.6;">
                        Deep dives into Voice over IP, SIP trunking, codecs, quality optimization,
                        and carrier interconnection strategies.
                    </p>
                    <div style="margin-top: 1rem;">
                        <span class="blog-tag">SIP Protocol</span>
                        <span class="blog-tag">Call Quality</span>
                        <span class="blog-tag">Routing</span>
                    </div>
                </div>
            </a>
            
            <!-- SMS Category -->
            <a href="<?= base_url('blog/category/sms') ?>" style="text-decoration: none;">
                <div class="blog-category">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                        💬 SMS Gateway Solutions
                    </h3>
                    <p style="color: var(--color-text-secondary); line-height: 1.6;">
                        Bulk SMS best practices, SMPP integration, delivery optimization,
                        and global messaging strategies.
                    </p>
                    <div style="margin-top: 1rem;">
                        <span class="blog-tag">Bulk SMS</span>
                        <span class="blog-tag">SMPP</span>
                        <span class="blog-tag">Delivery</span>
                    </div>
                </div>
            </a>
            
            <!-- Telecom Infrastructure -->
            <a href="<?= base_url('blog/category/telecom') ?>" style="text-decoration: none;">
                <div class="blog-category">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                        🏗️ Telecom Infrastructure
                    </h3>
                    <p style="color: var(--color-text-secondary); line-height: 1.6;">
                        Call control systems, billing integration, fraud prevention,
                        and scaling carrier-grade infrastructure.
                    </p>
                    <div style="margin-top: 1rem;">
                        <span class="blog-tag">Billing</span>
                        <span class="blog-tag">Fraud Detection</span>
                        <span class="blog-tag">CDR</span>
                    </div>
                </div>
            </a>
            
            <!-- Technical Guides -->
            <a href="<?= base_url('blog/category/technical') ?>" style="text-decoration: none;">
                <div class="blog-category">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                        🛠️ Technical Guides
                    </h3>
                    <p style="color: var(--color-text-secondary); line-height: 1.6;">
                        API documentation, integration tutorials, code examples,
                        and developer resources for telecom solutions.
                    </p>
                    <div style="margin-top: 1rem;">
                        <span class="blog-tag">APIs</span>
                        <span class="blog-tag">Integration</span>
                        <span class="blog-tag">Code</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Featured Articles -->
<section style="padding: 80px 20px; background: var(--color-background);">
    <div class="max-w-7xl mx-auto">
        <h2 style="font-size: 2.5rem; font-weight: 700; text-align: center; margin-bottom: 3rem; color: var(--color-primary);">
            Featured Articles
        </h2>
        
        <div style="max-width: 800px; margin: 0 auto;">
            <!-- Article 1 -->
            <article class="blog-post">
                <div class="blog-meta">
                    <span>January 3, 2025</span> • <span>10 min read</span> • <span>VoIP Technology</span>
                </div>
                <h3 style="font-size: 1.75rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                    <a href="<?= base_url('blog/post/reducing-voip-latency-carrier-grade-networks') ?>" style="text-decoration: none; color: inherit;">
                        Reducing VoIP Latency in Carrier-Grade Networks: A Complete Guide
                    </a>
                </h3>
                <p style="color: var(--color-text-secondary); line-height: 1.6; margin-bottom: 1rem;">
                    Learn how to achieve sub-150ms latency in your VoIP infrastructure. We cover QoS implementation,
                    codec selection, jitter buffer optimization, and real-world case studies from tier-1 carriers...
                </p>
                <a href="<?= base_url('blog/post/reducing-voip-latency-carrier-grade-networks') ?>" style="color: var(--color-primary); font-weight: 500;">
                    Read More →
                </a>
            </article>
            
            <!-- Article 2 -->
            <article class="blog-post">
                <div class="blog-meta">
                    <span>December 28, 2024</span> • <span>8 min read</span> • <span>SMS Gateway</span>
                </div>
                <h3 style="font-size: 1.75rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                    <a href="<?= base_url('blog/post/smpp-vs-http-apis-bulk-sms') ?>" style="text-decoration: none; color: inherit;">
                        SMPP vs HTTP APIs for Bulk SMS: Performance Comparison
                    </a>
                </h3>
                <p style="color: var(--color-text-secondary); line-height: 1.6; margin-bottom: 1rem;">
                    Detailed performance analysis of SMPP and HTTP protocols for bulk messaging. Discover why
                    SMPP delivers 10x throughput for high-volume campaigns and when HTTP APIs make more sense...
                </p>
                <a href="<?= base_url('blog/post/smpp-vs-http-apis-bulk-sms') ?>" style="color: var(--color-primary); font-weight: 500;">
                    Read More →
                </a>
            </article>
            
            <!-- Article 3 -->
            <article class="blog-post">
                <div class="blog-meta">
                    <span>December 20, 2024</span> • <span>12 min read</span> • <span>Fraud Prevention</span>
                </div>
                <h3 style="font-size: 1.75rem; font-weight: 600; margin-bottom: 1rem; color: var(--color-text-primary);">
                    <a href="<?= base_url('blog/post/ai-fraud-detection-telecom-2025') ?>" style="text-decoration: none; color: inherit;">
                        AI-Powered Fraud Detection in Telecom: 2025 Implementation Guide
                    </a>
                </h3>
                <p style="color: var(--color-text-secondary); line-height: 1.6; margin-bottom: 1rem;">
                    How machine learning algorithms can reduce revenue leakage by 40%. Includes implementation
                    patterns, real-time detection strategies, and case studies from our deployments...
                </p>
                <a href="<?= base_url('blog/post/ai-fraud-detection-telecom-2025') ?>" style="color: var(--color-primary); font-weight: 500;">
                    Read More →
                </a>
            </article>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section style="padding: 80px 20px; background: var(--color-background-secondary);">
    <div class="max-w-3xl mx-auto text-center">
        <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--color-primary);">
            Stay Updated with Telecom Insights
        </h2>
        <p style="font-size: 1.2rem; color: var(--color-text-secondary); margin-bottom: 2rem;">
            Get the latest industry trends, technical guides, and product updates delivered to your inbox.
        </p>
        <form action="<?= base_url('newsletter/subscribe') ?>" method="POST" style="display: flex; gap: 1rem; max-width: 500px; margin: 0 auto; flex-wrap: wrap; justify-content: center;">
            <?= csrf_field() ?>
            <input type="email" name="email" placeholder="Enter your email" required
                   style="flex: 1; min-width: 250px; padding: 1rem; border-radius: 8px; border: 1px solid var(--color-border); background: var(--color-surface); color: var(--color-text-primary);">
            <button type="submit" class="btn btn--primary" style="padding: 1rem 2rem;">
                Subscribe
            </button>
        </form>
        <p style="font-size: 0.9rem; color: var(--color-text-secondary); margin-top: 1rem;">
            No spam. Unsubscribe anytime. By subscribing, you agree to our Privacy Policy.
        </p>
    </div>
</section>

<!-- Structured Data for Blog -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "NU GUI Blog",
  "description": "Telecom industry insights, technical guides, and resources",
  "url": "https://nugui.co.za/blog",
  "publisher": {
    "@type": "Organization",
    "name": "NU GUI",
    "logo": {
      "@type": "ImageObject",
      "url": "https://nugui.co.za/assets/images/NUGUI-icon-1.png"
    }
  },
  "blogPost": [
    {
      "@type": "BlogPosting",
      "headline": "Reducing VoIP Latency in Carrier-Grade Networks: A Complete Guide",
      "datePublished": "2025-01-03",
      "dateModified": "2025-01-03",
      "author": {
        "@type": "Person",
        "name": "NU GUI Technical Team"
      },
      "description": "Learn how to achieve sub-150ms latency in your VoIP infrastructure with QoS, codec optimization, and more."
    },
    {
      "@type": "BlogPosting",
      "headline": "SMPP vs HTTP APIs for Bulk SMS: Performance Comparison",
      "datePublished": "2024-12-28",
      "dateModified": "2024-12-28",
      "author": {
        "@type": "Person",
        "name": "NU GUI Technical Team"
      },
      "description": "Detailed performance analysis of SMPP and HTTP protocols for bulk messaging."
    },
    {
      "@type": "BlogPosting",
      "headline": "AI-Powered Fraud Detection in Telecom: 2025 Implementation Guide",
      "datePublished": "2024-12-20",
      "dateModified": "2024-12-20",
      "author": {
        "@type": "Person",
        "name": "NU GUI Technical Team"
      },
      "description": "How machine learning algorithms can reduce revenue leakage by 40% in telecom operations."
    }
  ]
}
</script>

<?= $this->endSection() ?>
