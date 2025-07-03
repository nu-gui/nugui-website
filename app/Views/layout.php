<!DOCTYPE html>
<html lang="en" data-theme="nuguidark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?? 'NU GUI - Innovative business solutions including VoIP, direct messaging, and data enrichment services.' ?>">
    <title>NU GUI - <?= $this->renderSection('title') ?></title>
    
    <!-- Apple-Inspired Modern CSS Framework -->
    <link rel="stylesheet" href="<?= base_url('css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/globalnav-apple.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/utilities-apple.css') ?>">
    
    <!-- Existing CSS for backward compatibility -->
    <link rel="preload" href="<?= base_url('css/modern-ui.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="<?= base_url('css/utilities.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- Fallback for browsers without JavaScript -->
    <noscript>
        <link rel="stylesheet" href="<?= base_url('css/modern-ui.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/utilities.css') ?>">
    </noscript>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/NUGUI-ICON-7 - Dark.png') ?>">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="<?= $ogTitle ?? 'NU GUI - Business Solutions' ?>">
    <meta property="og:description" content="<?= $ogDescription ?? 'Discover our comprehensive business solutions designed to meet your needs.' ?>">
    <meta property="og:image" content="<?= $ogImage ?? base_url('assets/images/preview-image.jpg') ?>">
    <meta property="og:url" content="<?= $ogUrl ?? 'https://nugui.co.za' ?>">
    <meta property="og:type" content="website">
    
    <!-- Additional meta tags for other platforms -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $twitterTitle ?? 'NU GUI - Business Solutions' ?>">
    <meta name="twitter:description" content="<?= $twitterDescription ?? 'Discover our comprehensive business solutions designed to meet your needs.' ?>">
    <meta name="twitter:image" content="<?= $twitterImage ?? base_url('assets/images/preview-image.jpg') ?>">

    <?= $this->renderSection('styles') ?>
</head>
<body>
    <?= $this->include('templates/header-apple') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('templates/footer-apple') ?>

    <!-- Apple-Inspired Modern JavaScript -->
    <script src="<?= base_url('js/globalnav-apple.js?v=' . time()) ?>"></script>
    <script src="<?= base_url('js/modern-website.js?v=' . time()) ?>"></script>
    
    <!-- Legacy scripts for backward compatibility -->
    <script src="<?= base_url('assets/js/script.js?v=' . time()) ?>"></script>
    <script src="<?= base_url('assets/js/darkmode.js?v=' . time()) ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
