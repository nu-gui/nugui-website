<?php
// Load CodeIgniter base URL function
require_once '../app/Config/App.php';
require_once '../app/Helpers/picture_helper.php';

// Mock base_url function for testing
function base_url($path = '') {
    return '/' . ltrim($path, '/');
}

// Mock esc function
function esc($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Theme Implementation</title>
    <link rel="stylesheet" href="/css/variables.css">
    <link rel="stylesheet" href="/css/theme-images.css">
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background: var(--color-background, #fff);
            color: var(--color-text-primary, #000);
        }
        
        .test-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .test-card {
            border: 2px solid var(--color-accent, #ccc);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            background: var(--color-surface, #f9f9f9);
        }
        
        .test-card h3 {
            margin: 0 0 15px 0;
            color: var(--color-primary, #007AFF);
        }
        
        .test-card picture img {
            max-width: 100px;
            height: auto;
            margin: 10px auto;
            display: block;
        }
        
        .code-block {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 6px;
            margin: 10px 0;
            font-family: monospace;
            font-size: 12px;
            text-align: left;
            overflow-x: auto;
        }
        
        @media (prefers-color-scheme: dark) {
            .code-block {
                background: #2a2a2a;
            }
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 4px;
            margin: 10px 0;
            font-size: 14px;
        }
        
        .status.success {
            background: #d4edda;
            color: #155724;
        }
        
        .status.warning {
            background: #fff3cd;
            color: #856404;
        }
        
        @media (prefers-color-scheme: dark) {
            .status.success {
                background: #155724;
                color: #d4edda;
            }
            .status.warning {
                background: #856404;
                color: #fff3cd;
            }
        }
    </style>
</head>
<body>
    <h1>Theme Implementation Verification</h1>
    
    <p>Current browser theme preference: <strong id="theme-pref">detecting...</strong></p>
    <p>Document classes: <strong id="doc-classes">none</strong></p>
    
    <h2>Picture Helper Functions Test</h2>
    
    <div class="test-grid">
        <div class="test-card">
            <h3>Logo (Full)</h3>
            <?= picture_logo(false, 'test-logo') ?>
            <div class="code-block"><?= htmlspecialchars(picture_logo(false, 'test-logo')) ?></div>
            <div class="status success">Should show NUGUI-1.png / NUGUI-2.png</div>
        </div>
        
        <div class="test-card">
            <h3>Logo (Icon)</h3>
            <?= picture_logo(true, 'test-icon') ?>
            <div class="code-block"><?= htmlspecialchars(picture_logo(true, 'test-icon')) ?></div>
            <div class="status success">Should show NUGUI-icon-1.png / NUGUI-icon-2.png</div>
        </div>
        
        <div class="test-card">
            <h3>SMS Product Icon</h3>
            <?= picture_product('SMS', 'icon', 'product-icon') ?>
            <div class="code-block"><?= htmlspecialchars(picture_product('SMS', 'icon', 'product-icon')) ?></div>
            <div class="status success">Should show NU-SMS-icon-1.jpg / NU-SMS-icon-2.jpg</div>
        </div>
        
        <div class="test-card">
            <h3>SIP Product Icon</h3>
            <?= picture_product('SIP', 'icon', 'product-icon') ?>
            <div class="code-block"><?= htmlspecialchars(picture_product('SIP', 'icon', 'product-icon')) ?></div>
            <div class="status success">Should show NU-SIP-icon-1.jpg / NU-SIP-icon-2.jpg</div>
        </div>
        
        <div class="test-card">
            <h3>CCS Product Icon</h3>
            <?= picture_product('CCS', 'icon', 'product-icon') ?>
            <div class="code-block"><?= htmlspecialchars(picture_product('CCS', 'icon', 'product-icon')) ?></div>
            <div class="status warning">Mixed: NU-CCS-icon-1.jpg / NU-CCS-icon-2.png</div>
        </div>
        
        <div class="test-card">
            <h3>DATA Product Icon</h3>
            <?= picture_product('DATA', 'icon', 'product-icon') ?>
            <div class="code-block"><?= htmlspecialchars(picture_product('DATA', 'icon', 'product-icon')) ?></div>
            <div class="status warning">Mixed: NU-DATA-icon-1.jpg / NU-DATA-icon-2.png</div>
        </div>
    </div>
    
    <h2>Network Request Check</h2>
    <p>Open DevTools Network tab (F12) and verify:</p>
    <ul>
        <li>✅ In light mode: Only files ending with "-1" should load</li>
        <li>✅ In dark mode: Only files ending with "-2" should load</li>
        <li>✅ No duplicate requests for both variants</li>
        <li>✅ Images switch when you toggle your OS theme</li>
    </ul>
    
    <h2>Manual Testing Steps</h2>
    <ol>
        <li>Toggle your OS theme (Windows: Settings → Personalization → Colors → Choose your mode)</li>
        <li>Refresh the page and check Network tab - only one variant should load</li>
        <li>Check the main site pages: /, /home, /about, /solutions</li>
        <li>Verify header and footer logos switch correctly</li>
    </ol>
    
    <script>
        // Detect current theme
        function detectTheme() {
            const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.getElementById('theme-pref').textContent = isDark ? 'Dark Mode' : 'Light Mode';
            document.getElementById('theme-pref').style.color = isDark ? '#90EE90' : '#006400';
            
            // Show document classes
            const classes = document.documentElement.classList.toString() || 'none';
            document.getElementById('doc-classes').textContent = classes;
        }
        
        detectTheme();
        
        // Listen for theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', detectTheme);
        
        // Log loaded images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                const src = this.currentSrc || this.src;
                const isDark = src.includes('-2.');
                const isLight = src.includes('-1.');
                console.log(`Loaded: ${src.split('/').pop()} (${isDark ? 'Dark' : isLight ? 'Light' : 'Unknown'} variant)`);
            });
            
            img.addEventListener('error', function() {
                console.error(`Failed to load: ${this.src}`);
                this.style.border = '2px solid red';
            });
        });
    </script>
</body>
</html>