<?php
/**
 * Reusable image-text split layout component
 * 
 * Usage:
 * <?= view('templates/image-text', [
 *     'title' => 'Section Title',
 *     'content' => 'HTML content or text',
 *     'image' => 'path/to/image.jpg',
 *     'imageAlt' => 'Image description',
 *     'imagePosition' => 'right', // 'left' or 'right', defaults to 'right'
 *     'features' => [ // optional list of features
 *         ['icon' => '<svg>...</svg>', 'title' => 'Feature 1', 'description' => 'Description'],
 *         // ... more features
 *     ],
 *     'button' => ['text' => 'Learn More', 'link' => '/learn'], // optional
 *     'background' => 'bg-white', // optional
 *     'animate' => true // optional
 * ]) ?>
 */

$imagePosition = $imagePosition ?? 'right';
$imageOrder = $imagePosition === 'left' ? 'order-1 lg:order-1' : 'order-1 lg:order-2';
$contentOrder = $imagePosition === 'left' ? 'order-2 lg:order-2' : 'order-2 lg:order-1';
$background = $background ?? 'bg-white';
$animateClass = isset($animate) && $animate ? 'fade-in animate-on-scroll' : '';
?>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
    <div class="<?= esc($contentOrder) ?> <?= esc($animateClass) ?>">
        <?php if (isset($title)): ?>
        <h2 class="font-bold text-gray-900 dark:text-white mb-6" style="font-size: var(--text-4xl);">
            <?= esc($title) ?>
        </h2>
        <?php endif; ?>
        
        <div class="text-gray-600 dark:text-gray-300 mb-6" style="font-size: var(--text-lg);">
            <?= $content ?>
        </div>
        
        <?php if (isset($features) && is_array($features)): ?>
        <div class="space-y-4 mb-6">
            <?php foreach ($features as $feature): ?>
            <div class="flex items-start gap-4">
                <?php if (isset($feature['icon'])): ?>
                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                    <div class="w-6 h-6 text-blue-600 dark:text-blue-400">
                        <?= $feature['icon'] ?>
                    </div>
                </div>
                <?php endif; ?>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white">
                        <?= esc($feature['title']) ?>
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        <?= esc($feature['description']) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if (isset($button)): ?>
        <a href="<?= esc($button['link'], 'attr') ?>" 
           class="btn btn--primary inline-flex items-center">
            <?= esc($button['text']) ?>
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <?php endif; ?>
    </div>
    
    <div class="<?= esc($imageOrder) ?> <?= esc($animateClass) ?>" <?= isset($animate) ? 'style="animation-delay: 0.2s"' : '' ?>>
        <div class="rounded-xl overflow-hidden shadow-2xl">
            <img src="<?= esc($image, 'attr') ?>" 
                 alt="<?= esc($imageAlt, 'attr') ?>" 
                 class="img-responsive aspect-ratio-16-9">
        </div>
    </div>
</div>