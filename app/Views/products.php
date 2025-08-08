<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Telecom Products | VoIP, SMS Gateway, Call Control & Data Services<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// SEO Meta Tags for Products Page
$this->setVar('description', 'Explore NU GUI telecom products: NU SIP VoIP platform, NU SMS gateway, NU CCS call control system, and NU DATA intelligence platform. Carrier-grade solutions with 99.99% uptime.');
$this->setVar('ogTitle', 'NU GUI Products - Enterprise Telecom Solutions | VoIP, SMS, Call Control');
$this->setVar('ogDescription', 'Discover our suite of carrier-grade telecom products: Advanced VoIP services, SMS gateway platform, call control systems, and data intelligence solutions.');
$this->setVar('twitterTitle', 'NU GUI Products - Enterprise Telecom Solutions');
$this->setVar('twitterDescription', 'Carrier-grade VoIP, SMS gateway, call control & data services. 99.99% uptime, global coverage, enterprise-ready.');
?>
<!-- Apple-Style Products Hero -->
<section class="hero-section hero-products">
    <div class="container" style="max-width: 980px;">
        <h1 style="color: #FFFFFF;">
            Enterprise-Grade <span class="text-gradient">Telecom Products</span>
        </h1>
        <p style="font-size: var(--font-size-xl); max-width: 680px; margin-left: auto; margin-right: auto; color: #FFFFFF; opacity: 0.9;">
            Carrier-grade solutions trusted by 200+ operators worldwide. Scale from startup to enterprise
            with products that guarantee 99.99% uptime and process billions of transactions monthly.
        </p>
    </div>
</section>

<!-- Product Grid -->
<section style="padding: var(--spacing-5xl) 0; background: var(--color-background);">
    <div class="container" style="max-width: 1024px;">
        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-3xl);">
            
            <!-- NU SIP Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU SIP - VoIP Platform
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Enterprise VoIP & SIP Trunking
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    HD voice quality with <strong>195+ countries coverage</strong>. Built for call centers and enterprises requiring
                    <strong>99.99% uptime</strong>. Seamless integration with Asterisk, FreeSWITCH, and all major PBX systems.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>0.001¢/min</strong> wholesale rates available
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>G.711, G.729, Opus</strong> codec support
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>5000+ DIDs</strong> in 80 countries
                    </li>
                </ul>
                <a href="/solutions#nu-sip" class="btn btn--outline">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- NU SMS Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-success), #4ade80); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU SMS - Messaging Gateway
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Bulk SMS & A2P Messaging Platform
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    Send millions of messages with <strong>98% delivery rates</strong>. Direct operator connections in
                    <strong>200+ countries</strong>. RESTful APIs, SMPP protocol support, and real-time delivery tracking.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>1M+ messages/hour</strong> throughput
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>2-way messaging</strong> & shortcodes
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>Unicode & MMS</strong> support
                    </li>
                </ul>
                <a href="/solutions#nu-sms" class="btn btn--outline">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- NU CCS Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-secondary), #8b5cf6); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU CCS - Call Control System
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        AI-Powered Billing & Fraud Prevention
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    Reduce revenue leakage by <strong>up to 40%</strong> with AI fraud detection. Real-time billing,
                    <strong>10,000+ CPS</strong> capacity, and comprehensive CDR analytics. Kamailio-based for maximum reliability.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>LCR & QoS</strong> routing algorithms
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>Prepaid/Postpaid</strong> billing modes
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>REST APIs</strong> for integration
                    </li>
                </ul>
                <a href="/solutions#nu-ccs" class="btn btn--outline">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- NU DATA Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-warning), #f59e0b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU DATA - Intelligence Platform
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Telecom Data Validation & Enrichment
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    <strong>99.5% accuracy</strong> in number validation. Real-time HLR lookups, MNP checks, and
                    carrier identification. Process <strong>100M+ records daily</strong> with our high-performance APIs.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>HLR/VLR</strong> real-time lookups
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>MNP database</strong> with daily updates
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        <strong>TCPA compliance</strong> tools
                    </li>
                </ul>
                <a href="/solutions#nu-data" class="btn btn--outline">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section style="padding: var(--spacing-5xl) 0; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-hover) 100%);">
    <div class="container" style="max-width: 680px; text-align: center;">
        <h2 style="font-family: var(--font-family-display); font-size: var(--font-size-3xl); font-weight: 600; color: white; margin-bottom: var(--spacing-lg);">
            Start Your 30-Day Free Trial Today
        </h2>
        <p style="font-size: var(--font-size-lg); color: rgba(255, 255, 255, 0.9); margin-bottom: var(--spacing-2xl); line-height: var(--line-height-relaxed);">
            No credit card required. Full access to all features. 24/7 support included.
            Join 200+ operators who've scaled their business with NU GUI.
        </p>
        <div class="btn-group">
            <a href="<?= base_url('/contact') ?>" class="btn btn--primary btn--large">
                Contact Sales
            </a>
            <a href="<?= base_url('/partner-program') ?>" class="btn btn--secondary btn--large">
                Partner Program
            </a>
        </div>
    </div>
</section>

<!-- Responsive Styles -->
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
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: 1fr !important;
        gap: var(--spacing-xl) !important;
    }
    
    .product-card {
        text-align: center;
    }
}
</style>

<!-- Individual Product Showcases with Unique Gradients -->

<!-- NU SIP Section with Green Gradient -->
<section data-product-theme="sip" style="margin-top: var(--spacing-5xl);">
    <div class="hero-section hero-gradient-sip" style="padding: var(--spacing-4xl) var(--spacing-lg);">
        <h2 style="font-size: var(--font-size-3xl); margin-bottom: var(--spacing-md);">
            NU SIP - <span class="text-gradient">Voice Solutions</span>
        </h2>
        <p style="max-width: 600px; margin: 0 auto;">
            Enterprise-grade VoIP services with crystal-clear quality
        </p>
    </div>
</section>

<!-- NU DATA Section with Purple Gradient -->
<section data-product-theme="data" style="margin-top: var(--spacing-3xl);">
    <div class="hero-section hero-gradient-data" style="padding: var(--spacing-4xl) var(--spacing-lg);">
        <h2 style="font-size: var(--font-size-3xl); margin-bottom: var(--spacing-md);">
            NU DATA - <span class="text-gradient">Data Services</span>
        </h2>
        <p style="max-width: 600px; margin: 0 auto;">
            Advanced data processing and enrichment solutions
        </p>
    </div>
</section>

<!-- CCS Section with Gold Gradient -->
<section data-product-theme="ccs" style="margin-top: var(--spacing-3xl);">
    <div class="hero-section hero-gradient-ccs" style="padding: var(--spacing-4xl) var(--spacing-lg);">
        <h2 style="font-size: var(--font-size-3xl); margin-bottom: var(--spacing-md);">
            CCS - <span class="text-gradient">Call Control</span>
        </h2>
        <p style="max-width: 600px; margin: 0 auto;">
            Comprehensive call control and management systems
        </p>
    </div>
</section>

<!-- SMS Section with Orange Gradient -->
<section data-product-theme="sms" style="margin-top: var(--spacing-3xl);">
    <div class="hero-section hero-gradient-sms" style="padding: var(--spacing-4xl) var(--spacing-lg);">
        <h2 style="font-size: var(--font-size-3xl); margin-bottom: var(--spacing-md);">
            SMS Gateway - <span class="text-gradient">Messaging</span>
        </h2>
        <p style="max-width: 600px; margin: 0 auto;">
            Reliable SMS gateway services for business communications
        </p>
    </div>
</section>

<!-- Structured Data for Products -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "NU GUI Telecom Products",
  "description": "Enterprise-grade telecommunication products for operators and businesses",
  "numberOfItems": 4,
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@type": "Product",
        "name": "NU SIP - VoIP Platform",
        "description": "Enterprise VoIP solution with HD voice quality, 195+ countries coverage, 99.99% uptime SLA",
        "brand": {
          "@type": "Brand",
          "name": "NU GUI"
        },
        "offers": {
          "@type": "AggregateOffer",
          "priceCurrency": "USD",
          "lowPrice": "0.001",
          "offerCount": "5000",
          "availability": "https://schema.org/InStock"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.9",
          "reviewCount": "89"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@type": "Product",
        "name": "NU SMS - Messaging Gateway",
        "description": "Bulk SMS platform with 98% delivery rates, 200+ countries coverage, 1M+ messages/hour",
        "brand": {
          "@type": "Brand",
          "name": "NU GUI"
        },
        "offers": {
          "@type": "Offer",
          "priceCurrency": "USD",
          "price": "0.004",
          "priceSpecification": {
            "@type": "UnitPriceSpecification",
            "price": "0.004",
            "priceCurrency": "USD",
            "unitText": "per SMS"
          },
          "availability": "https://schema.org/InStock"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.8",
          "reviewCount": "156"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@type": "Product",
        "name": "NU CCS - Call Control System",
        "description": "AI-powered call control with fraud detection, real-time billing, 10,000+ CPS capacity",
        "brand": {
          "@type": "Brand",
          "name": "NU GUI"
        },
        "offers": {
          "@type": "Offer",
          "priceCurrency": "USD",
          "priceValidUntil": "2025-12-31",
          "availability": "https://schema.org/InStock",
          "itemCondition": "https://schema.org/NewCondition"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.7",
          "reviewCount": "67"
        }
      }
    },
    {
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@type": "Product",
        "name": "NU DATA - Intelligence Platform",
        "description": "Telecom data validation with 99.5% accuracy, HLR lookups, MNP checks, 100M+ records daily",
        "brand": {
          "@type": "Brand",
          "name": "NU GUI"
        },
        "offers": {
          "@type": "Offer",
          "priceCurrency": "USD",
          "availability": "https://schema.org/InStock"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.9",
          "reviewCount": "43"
        }
      }
    }
  ]
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
      "name": "Products",
      "item": "https://nugui.co.za/products"
    }
  ]
}
</script>

<?= $this->endSection() ?>
