<?php
/**
 * Reusable hero section component
 * 
 * Usage:
 * <?= view('templates/hero', [
 *     'title' => 'Hero Title',
 *     'subtitle' => 'Hero subtitle text', // optional
 *     'description' => 'Longer description text', // optional
 *     'primaryButton' => ['text' => 'Get Started', 'link' => '/start'],
 *     'secondaryButton' => ['text' => 'Learn More', 'link' => '/about'], // optional
 *     'background' => 'bg-gradient-to-br from-gray-900 to-blue-900', // optional
 *     'overlay' => true, // optional, adds dark overlay
 *     'pattern' => true, // optional, adds background pattern
 *     'height' => 'py-20 lg:py-32', // optional, defaults to this
 *     'centered' => true // optional, centers content
 * ]) ?>
 */

$backgroundClass = $background ?? 'bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900';
$heightClass = $height ?? 'py-20 lg:py-32';
$contentAlignment = isset($centered) && $centered ? 'text-center' : '';
?>

<section class="relative <?= esc($backgroundClass) ?> <?= esc($heightClass) ?> overflow-hidden">
    <?php if (isset($overlay) && $overlay): ?>
    <div class="absolute inset-0 bg-black/20"></div>
    <?php endif; ?>
    
    <?php if (isset($pattern) && $pattern): ?>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-size: 60px 60px;"></div>
    </div>
    <?php endif; ?>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="<?= esc($contentAlignment) ?>">
            <?php if (isset($title)): ?>
            <h1 class="font-bold text-white mb-6 fade-in animate-on-scroll" style="font-size: var(--text-5xl); line-height: 1.1;">
                <?= $title ?>
            </h1>
            <?php endif; ?>
            
            <?php if (isset($subtitle)): ?>
            <p class="text-2xl lg:text-3xl text-blue-200 mb-4 fade-in animate-on-scroll" style="animation-delay: 0.1s;">
                <?= esc($subtitle) ?>
            </p>
            <?php endif; ?>
            
            <?php if (isset($description)): ?>
            <p class="text-gray-300 mb-8 max-w-4xl <?= $centered ? 'mx-auto' : '' ?> fade-in animate-on-scroll" style="font-size: var(--text-xl); animation-delay: 0.2s;">
                <?= esc($description) ?>
            </p>
            <?php endif; ?>
            
            <?php if (isset($primaryButton) || isset($secondaryButton)): ?>
            <div class="flex flex-col sm:flex-row gap-4 <?= $centered ? 'justify-center' : '' ?> fade-in animate-on-scroll" style="animation-delay: 0.4s;">
                <?php if (isset($primaryButton)): ?>
                <a href="<?= esc($primaryButton['link'], 'attr') ?>" class="btn-modern btn-primary">
                    <?= esc($primaryButton['text']) ?>
                </a>
                <?php endif; ?>
                
                <?php if (isset($secondaryButton)): ?>
                <a href="<?= esc($secondaryButton['link'], 'attr') ?>" class="btn-modern bg-white/10 backdrop-blur-sm text-white border-2 border-white/30 hover:bg-white/20">
                    <?= esc($secondaryButton['text']) ?>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>