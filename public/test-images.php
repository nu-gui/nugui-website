<?php
/**
 * Test page to verify all images are loading correctly
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Test - NU GUI Website</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        h1 { color: #333; }
        .container { max-width: 1200px; margin: 0 auto; }
        .section { 
            background: white; 
            padding: 20px; 
            margin: 20px 0; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .image-item {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
        .image-item img {
            max-width: 100%;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .image-item .name {
            font-size: 12px;
            color: #666;
            word-break: break-all;
        }
        .status { 
            display: inline-block; 
            padding: 2px 6px; 
            border-radius: 3px; 
            font-size: 11px; 
            margin-top: 5px;
        }
        .status.found { background: #d4edda; color: #155724; }
        .status.missing { background: #f8d7da; color: #721c24; }
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        body.dark {
            background: #1a1a1a;
            color: #e0e0e0;
        }
        body.dark .section { background: #2a2a2a; }
        body.dark h1, body.dark h2 { color: #e0e0e0; }
        body.dark .image-item { border-color: #444; }
    </style>
</head>
<body>
    <button class="theme-toggle" onclick="document.body.classList.toggle('dark')">Toggle Theme</button>
    
    <div class="container">
        <h1>🖼️ NU GUI Website - Image Asset Test</h1>
        
        <div class="section">
            <h2>Main Logo & Icons</h2>
            <div class="image-grid">
                <?php
                $mainImages = [
                    'NUGUI-1.png' => 'Logo Light',
                    'NUGUI-2.png' => 'Logo Dark',
                    'NUGUI-icon-1.png' => 'Icon Light',
                    'NUGUI-icon-2.png' => 'Icon Dark'
                ];
                
                foreach ($mainImages as $file => $label) {
                    $path = "assets/images/$file";
                    $exists = file_exists($path);
                    ?>
                    <div class="image-item">
                        <?php if ($exists): ?>
                            <img src="<?= $path ?>" alt="<?= $label ?>">
                        <?php else: ?>
                            <div style="height: 100px; display: flex; align-items: center; justify-content: center; background: #f0f0f0;">
                                ❌ Missing
                            </div>
                        <?php endif; ?>
                        <div class="name"><?= $label ?></div>
                        <div class="status <?= $exists ? 'found' : 'missing' ?>">
                            <?= $exists ? '✓ Found' : '✗ Missing' ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        
        <div class="section">
            <h2>Product Icons</h2>
            <div class="image-grid">
                <?php
                $products = ['SMS', 'CCS', 'DATA', 'SIP'];
                $variants = [
                    '1' => ['jpg', 'png'],
                    '2' => ['jpg', 'png']
                ];
                
                foreach ($products as $product) {
                    foreach ($variants as $num => $extensions) {
                        foreach ($extensions as $ext) {
                            $file = "NU-$product-icon-$num.$ext";
                            $path = "assets/images/$file";
                            if (file_exists($path)) {
                                ?>
                                <div class="image-item">
                                    <img src="<?= $path ?>" alt="<?= $file ?>">
                                    <div class="name"><?= $file ?></div>
                                    <div class="status found">✓ Found</div>
                                </div>
                                <?php
                                break; // Show only the first found extension
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="section">
            <h2>Product Images</h2>
            <div class="image-grid">
                <?php
                foreach ($products as $product) {
                    for ($i = 1; $i <= 2; $i++) {
                        $file = "NU-$product-product-$i.jpg";
                        $path = "assets/images/$file";
                        $exists = file_exists($path);
                        ?>
                        <div class="image-item">
                            <?php if ($exists): ?>
                                <img src="<?= $path ?>" alt="<?= $file ?>">
                            <?php else: ?>
                                <div style="height: 100px; display: flex; align-items: center; justify-content: center; background: #f0f0f0;">
                                    ❌ Missing
                                </div>
                            <?php endif; ?>
                            <div class="name"><?= $file ?></div>
                            <div class="status <?= $exists ? 'found' : 'missing' ?>">
                                <?= $exists ? '✓ Found' : '✗ Missing' ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="section">
            <h2>All Images in Directory</h2>
            <div class="image-grid">
                <?php
                $dir = 'assets/images/';
                if (is_dir($dir)) {
                    $files = scandir($dir);
                    foreach ($files as $file) {
                        if ($file != '.' && $file != '..' && preg_match('/\.(jpg|jpeg|png|gif|svg)$/i', $file)) {
                            ?>
                            <div class="image-item">
                                <img src="<?= $dir . $file ?>" alt="<?= $file ?>">
                                <div class="name"><?= $file ?></div>
                                <div class="status found">
                                    <?= round(filesize($dir . $file) / 1024, 1) ?> KB
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>