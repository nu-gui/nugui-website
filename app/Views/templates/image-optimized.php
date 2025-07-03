<?php
/**
 * Optimized image component with lazy loading and responsive sizes
 * 
 * Usage:
 * <?= view('templates/image-optimized', [
 *     'src' => 'images/hero-image.jpg',
 *     'alt' => 'Hero image description',
 *     'width' => 800,
 *     'height' => 600,
 *     'lazy' => true, // optional, default true
 *     'responsive' => true, // optional, default true
 *     'placeholder' => 'blur', // blur, color, skeleton, none
 *     'class' => 'additional-classes',
 *     'sizes' => '(max-width: 768px) 100vw, 50vw' // optional custom sizes
 * ]) ?>
 */

$src = $src ?? '';
$alt = $alt ?? '';
$width = $width ?? null;
$height = $height ?? null;
$lazy = $lazy ?? true;
$responsive = $responsive ?? true;
$placeholder = $placeholder ?? 'blur';
$class = $class ?? '';
$sizes = $sizes ?? null;

// Generate responsive image sizes
$responsiveSizes = [];
if ($responsive && $width && $height) {
    $responsiveSizes = [
        '320w' => ['width' => 320, 'height' => round(320 * ($height / $width))],
        '640w' => ['width' => 640, 'height' => round(640 * ($height / $width))],
        '768w' => ['width' => 768, 'height' => round(768 * ($height / $width))],
        '1024w' => ['width' => 1024, 'height' => round(1024 * ($height / $width))],
        '1280w' => ['width' => 1280, 'height' => round(1280 * ($height / $width))],
        '1920w' => ['width' => 1920, 'height' => round(1920 * ($height / $width))]
    ];
}

// Generate srcset
$srcset = [];
if ($responsive && !empty($responsiveSizes)) {
    foreach ($responsiveSizes as $descriptor => $dimensions) {
        $srcset[] = generateImageUrl($src, $dimensions['width'], $dimensions['height']) . ' ' . $descriptor;
    }
}

// Generate default sizes attribute
if (!$sizes && $responsive) {
    $sizes = "(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw";
}

// Generate placeholder styles
$placeholderStyle = '';
$placeholderOverlay = '';
switch ($placeholder) {
    case 'blur':
        $placeholderStyle = 'background: linear-gradient(45deg, #f0f0f0 25%, transparent 25%), linear-gradient(-45deg, #f0f0f0 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #f0f0f0 75%), linear-gradient(-45deg, transparent 75%, #f0f0f0 75%); background-size: 20px 20px; background-position: 0 0, 0 10px, 10px -10px, -10px 0px;';
        break;
    case 'color':
        $placeholderStyle = 'background-color: #f3f4f6;';
        break;
    case 'skeleton':
        $placeholderStyle = 'background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200% 100%; animation: skeleton-loading 1.5s infinite;';
        break;
}

// Generate aspect ratio from width/height
$aspectRatio = '';
if ($width && $height) {
    $aspectRatio = 'aspect-ratio: ' . $width . '/' . $height . ';';
}

/**
 * Helper function to generate image URLs with dimensions
 * In a real implementation, this would integrate with your image processing service
 */
function generateImageUrl($src, $width, $height) {
    // For now, return original src
    // In production, you'd integrate with services like Cloudinary, ImageKit, etc.
    // Example: return "https://res.cloudinary.com/your-cloud/image/fetch/w_$width,h_$height,c_fill/$src";
    return $src;
}

$imageId = 'img-' . uniqid();
?>

<div class="image-wrapper relative <?= esc($class) ?>" 
     style="<?= $aspectRatio ?>">
    
    <!-- Placeholder background -->
    <?php if ($placeholder !== 'none'): ?>
    <div class="image-placeholder absolute inset-0 <?= $lazy ? 'opacity-100' : 'opacity-0' ?> transition-opacity duration-300"
         style="<?= $placeholderStyle ?>">
        <?php if ($placeholder === 'skeleton'): ?>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent animate-pulse"></div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <!-- Main image -->
    <img id="<?= esc($imageId, 'attr') ?>"
         <?= $lazy ? 'loading="lazy"' : '' ?>
         <?= $lazy ? 'data-src="' . esc($src, 'attr') . '"' : 'src="' . esc($src, 'attr') . '"' ?>
         <?php if (!empty($srcset)): ?>
         <?= $lazy ? 'data-srcset="' . esc(implode(', ', $srcset), 'attr') . '"' : 'srcset="' . esc(implode(', ', $srcset), 'attr') . '"' ?>
         <?php endif; ?>
         <?php if ($sizes): ?>
         sizes="<?= esc($sizes, 'attr') ?>"
         <?php endif; ?>
         alt="<?= esc($alt, 'attr') ?>"
         <?php if ($width): ?>width="<?= esc($width, 'attr') ?>"<?php endif; ?>
         <?php if ($height): ?>height="<?= esc($height, 'attr') ?>"<?php endif; ?>
         class="image-main w-full h-full object-cover <?= $lazy ? 'opacity-0' : 'opacity-100' ?> transition-opacity duration-300"
         style="<?= $aspectRatio ?>"
         onload="this.classList.remove('opacity-0'); this.classList.add('opacity-100'); if(this.previousElementSibling) this.previousElementSibling.classList.add('opacity-0');">
</div>

<?php if ($lazy): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const img = document.getElementById('<?= esc($imageId, 'js') ?>');
    
    // Intersection Observer for lazy loading
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                
                // Load the image
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                
                if (img.dataset.srcset) {
                    img.srcset = img.dataset.srcset;
                    img.removeAttribute('data-srcset');
                }
                
                // Stop observing this image
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px 0px' // Start loading 50px before the image is visible
    });
    
    imageObserver.observe(img);
});
</script>
<?php endif; ?>

<style>
@keyframes skeleton-loading {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}

/* Ensure images don't cause layout shift */
.image-wrapper {
    display: block;
    overflow: hidden;
}

.image-main {
    transition: opacity 0.3s ease-in-out;
}

/* Fallback for browsers that don't support aspect-ratio */
@supports not (aspect-ratio: 1 / 1) {
    .image-wrapper {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: <?= $height && $width ? (($height / $width) * 100) . '%' : '56.25%' ?>;
    }
    
    .image-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
}
</style>