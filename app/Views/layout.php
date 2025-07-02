<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?? 'NU GUI - Innovative business solutions including VoIP, direct messaging, and data enrichment services.' ?>">
    <title>NU GUI - <?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/nugui-icon-white.png') ?>">
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
    <?= $this->include('templates/header') ?>

    <main class="pt-16">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('templates/footer') ?>

    <script src="<?= base_url('assets/js/script.js?v=' . time()) ?>"></script>
    <script src="<?= base_url('assets/js/modern.js?v=' . time()) ?>"></script>
    <script src="<?= base_url('assets/js/darkmode.js?v=' . time()) ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
