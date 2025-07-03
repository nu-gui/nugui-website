<?php
/**
 * Reusable card component
 * 
 * Usage:
 * <?= view('templates/card', [
 *     'title' => 'Card Title',
 *     'content' => 'Card content or HTML',
 *     'image' => 'path/to/image.jpg', // optional
 *     'imageAlt' => 'Image description', // optional
 *     'link' => 'URL', // optional
 *     'linkText' => 'Learn More', // optional, defaults to 'Learn More'
 *     'icon' => 'SVG or HTML for icon', // optional
 *     'class' => 'additional-classes', // optional
 *     'animate' => true, // optional, adds animation
 *     'animationDelay' => '0.2s' // optional
 * ]) ?>
 */

$cardClass = 'card-modern ' . ($class ?? '');
$animateClass = isset($animate) && $animate ? 'fade-in animate-on-scroll' : '';
$animationStyle = isset($animationDelay) ? 'style="animation-delay: ' . esc($animationDelay, 'attr') . '"' : '';
?>

<div class="<?= esc($cardClass) ?> <?= esc($animateClass) ?>" <?= $animationStyle ?>>
    <?php if (isset($image)): ?>
    <div class="card-image rounded-t-lg overflow-hidden">
        <img src="<?= esc($image, 'attr') ?>" 
             alt="<?= esc($imageAlt ?? $title ?? 'Card image', 'attr') ?>" 
             class="img-responsive aspect-ratio-16-9 hover:scale-105 transition-transform duration-300">
    </div>
    <?php endif; ?>
    
    <div class="p-6">
        <?php if (isset($icon)): ?>
        <div class="card-icon mb-4">
            <?= $icon ?>
        </div>
        <?php endif; ?>
        
        <?php if (isset($title)): ?>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
            <?= esc($title) ?>
        </h3>
        <?php endif; ?>
        
        <div class="card-content text-gray-600 dark:text-gray-300 mb-4">
            <?= $content ?>
        </div>
        
        <?php if (isset($link)): ?>
        <a href="<?= esc($link, 'attr') ?>" 
           class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors">
            <?= esc($linkText ?? 'Learn More') ?>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <?php endif; ?>
    </div>
</div>