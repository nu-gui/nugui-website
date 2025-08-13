<!DOCTYPE html>
<html lang="en">
<head>
    <?php if (env('GA_MEASUREMENT_ID')): ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= env('GA_MEASUREMENT_ID') ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?= env('GA_MEASUREMENT_ID') ?>');
    </script>
    <?php endif; ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?? 'NU GUI - Leading telecom solutions provider. Carrier-grade VoIP, SMS gateways, call control systems & data services. Trusted by 200+ operators in 50+ countries. 99.99% uptime guaranteed.' ?>">
    <meta name="keywords" content="telecom solutions, VoIP platform, SMS gateway, call control system, billing integration, carrier grade, wholesale voip, bulk sms, HLR lookup, MNP database, fraud prevention">
    <meta name="author" content="NU GUI">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">
    <title><?= $this->renderSection('title') ? $this->renderSection('title') . ' | ' : '' ?>NU GUI - Enterprise Telecom Solutions</title>
    
    <!-- Tailwind CSS with Organized Theme System -->
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css?v=' . time()) ?>">
    
    <!-- Core Apple-Inspired CSS Framework -->
    <link rel="stylesheet" href="<?= base_url('css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/globalnav-apple.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/utilities-apple.css') ?>">
    
    <!-- Shared Animations - Centralized to avoid duplication -->
    <link rel="stylesheet" href="<?= base_url('css/animations.css?v=' . time()) ?>">
    
    <!-- Product Colors and Page Gradients -->
    <link rel="stylesheet" href="<?= base_url('css/product-colors.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/page-gradients.css') ?>">
    
    <!-- Theme and Asset Configuration -->
    <link rel="stylesheet" href="<?= base_url('css/theme-images.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/theme-assets.css') ?>">
    
    <!-- Unified Button System - Single source for all button styles with consistent animations -->
    <link rel="stylesheet" href="<?= base_url('css/buttons-unified.css?v=' . time()) ?>">
    <link rel="stylesheet" href="<?= base_url('css/hero-sections.css?v=' . time()) ?>">
    <link rel="stylesheet" href="<?= base_url('css/forms-enhanced.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/forms-futuristic.css') ?>">
    
    <!-- Master Card Styling System - All card types with animations and effects -->
    <link rel="stylesheet" href="<?= base_url('css/cards-master.css?v=' . time()) ?>">
    
    <!-- Fix for rounded corners with gradient borders -->
    <link rel="stylesheet" href="<?= base_url('css/cards-rounded-fix.css?v=' . time()) ?>">
    
    <!-- Improved Typography System - Better font sizes and responsive scaling -->
    <link rel="stylesheet" href="<?= base_url('css/typography-improved.css?v=' . time()) ?>">
    
    <!-- Existing CSS for enhanced features -->
    <link rel="preload" href="<?= base_url('css/modern-ui.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="<?= base_url('css/utilities.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- Fallback for browsers without JavaScript -->
    <noscript>
        <link rel="stylesheet" href="<?= base_url('css/modern-ui.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/utilities.css') ?>">
    </noscript>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/NUGUI-icon-1.png') ?>" class="favicon-light">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/NUGUI-icon-2.png') ?>" class="favicon-dark">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="<?= $ogTitle ?? 'NU GUI - Enterprise Telecom Solutions | VoIP, SMS, Call Control' ?>">
    <meta property="og:description" content="<?= $ogDescription ?? 'Leading telecom solutions provider. Carrier-grade VoIP, SMS platforms, call control systems. 99.99% uptime. Trusted by 200+ operators worldwide.' ?>">
    <meta property="og:image" content="<?= $ogImage ?? base_url('assets/images/NUGUI-1.png') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="NU GUI">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@nugui">
    <meta name="twitter:creator" content="@nugui">
    <meta name="twitter:title" content="<?= $twitterTitle ?? 'NU GUI - Enterprise Telecom Solutions' ?>">
    <meta name="twitter:description" content="<?= $twitterDescription ?? 'Carrier-grade VoIP, SMS, call control & data services. 99.99% uptime. 200+ operators trust us.' ?>">
    <meta name="twitter:image" content="<?= $twitterImage ?? base_url('assets/images/NUGUI-1.png') ?>">
    
    <!-- Additional SEO meta tags -->
    <meta name="theme-color" content="#007AFF">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.google-analytics.com">

    <?= $this->renderSection('styles') ?>
</head>
<?php
    // Get current page name for page-specific styling
    $currentPage = service('router')->getMatchedRoute()[0] ?? 'home';
    $pageClass = 'page-' . str_replace(['/', '_'], '-', strtolower($currentPage));
?>
<body class="<?= $pageClass ?> <?= $bodyClass ?? '' ?>">
    <script>
        // Apply theme from localStorage or system preference
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <?= $this->include('templates/header-apple') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>
    
    <!-- Include Confirmation Modal -->
    <?= $this->include('templates/confirmation-modal') ?>

    <?= $this->include('templates/footer-apple') ?>

    <!-- Apple-Inspired Modern JavaScript -->
    <script src="<?= base_url('js/globalnav-apple.js?v=' . time()) ?>"></script>
    <script src="<?= base_url('js/modern-website.js?v=' . time()) ?>"></script>
    
    <!-- Legacy scripts for backward compatibility -->
    <script src="<?= base_url('assets/js/script.js?v=' . time()) ?>"></script>
    
    <!-- Page Gradient Enhancement -->
    <script src="<?= base_url('js/page-gradients.js?v=' . time()) ?>"></script>
    
    <!-- Global Site Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "NU GUI",
      "alternateName": "NU GUI Telecom Solutions",
      "url": "https://nugui.co.za",
      "description": "Leading provider of carrier-grade telecommunication solutions",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://nugui.co.za/search?q={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    
    <!-- Organization Schema (appears on all pages) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "NU GUI",
      "legalName": "NU GUI (Pty) Ltd",
      "url": "https://nugui.co.za",
      "logo": "https://nugui.co.za/assets/images/NUGUI-icon-1.png",
      "foundingDate": "2005",
      "founders": [
        {
          "@type": "Person",
          "name": "Wes"
        }
      ],
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "ZA"
      },
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "telephone": "+27-21-110-565",
          "contactType": "sales",
          "areaServed": "Worldwide",
          "availableLanguage": ["English", "Afrikaans"]
        },
        {
          "@type": "ContactPoint",
          "telephone": "+27-21-110-555",
          "contactType": "technical support",
          "areaServed": "Worldwide",
          "availableLanguage": "English",
          "contactOption": "TollFree",
          "availableLanguage": "English"
        }
      ],
      "sameAs": [
        "https://www.linkedin.com/company/nugui",
        "https://github.com/nu-gui",
        "https://twitter.com/nugui"
      ],
      "brand": {
        "@type": "Brand",
        "name": "NU GUI",
        "logo": "https://nugui.co.za/assets/images/NUGUI-icon-1.png"
      }
    }
    </script>
    
    <!-- Business Form Validation -->
    <?php 
    $uri = service('uri');
    if (in_array($uri->getSegment(1), ['contact', 'support', 'partner-program'])): 
    ?>
    <script src="<?= base_url('assets/js/business-validation.js') ?>"></script>
    <?php endif; ?>
    
    <!-- Google Analytics -->
    <?php if (getenv('GA_MEASUREMENT_ID')): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= esc(getenv('GA_MEASUREMENT_ID')) ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?= esc(getenv('GA_MEASUREMENT_ID')) ?>');
    </script>
    <?php endif; ?>
    
    <?= $this->renderSection('scripts') ?>
    
    <!-- Form Submission Fix -->
    <script src="/js/form-fix.js"></script>
</body>
</html>
