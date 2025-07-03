<?php
/**
 * Reusable Call-to-Action section component
 * 
 * Usage:
 * <?= view('templates/cta-section', [
 *     'title' => 'Ready to Get Started?',
 *     'description' => 'Join thousands of satisfied customers', // optional
 *     'primaryButton' => ['text' => 'Start Now', 'link' => '/signup'],
 *     'secondaryButton' => ['text' => 'Contact Sales', 'link' => '/contact'], // optional
 *     'background' => 'bg-gradient-to-r from-blue-600 to-blue-800', // optional
 *     'pattern' => true, // optional, adds background pattern
 *     'centered' => true // optional, defaults to true
 * ]) ?>
 */

$backgroundClass = $background ?? 'bg-gradient-to-r from-blue-600 to-blue-800';
$centered = $centered ?? true;
?>

<section class="py-16 lg:py-24 <?= esc($backgroundClass) ?> relative overflow-hidden">
    <?php if (isset($pattern) && $pattern): ?>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23fff" fill-opacity="0.1"%3E%3Cpath d="M0 40L40 0H20L0 20M40 40V20L20 40"/%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <?php endif; ?>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="<?= $centered ? 'text-center' : '' ?>">
            <?php if (isset($title)): ?>
            <h2 class="font-bold text-white mb-4 fade-in animate-on-scroll" style="font-size: var(--text-4xl);">
                <?= esc($title) ?>
            </h2>
            <?php endif; ?>
            
            <?php if (isset($description)): ?>
            <p class="text-blue-100 mb-8 <?= $centered ? 'max-w-3xl mx-auto' : '' ?> fade-in animate-on-scroll" 
               style="font-size: var(--text-lg); animation-delay: 0.1s;">
                <?= esc($description) ?>
            </p>
            <?php endif; ?>
            
            <?php if (isset($primaryButton) || isset($secondaryButton)): ?>
            <div class="flex flex-col sm:flex-row gap-4 <?= $centered ? 'justify-center' : '' ?> fade-in animate-on-scroll" 
                 style="animation-delay: 0.2s;">
                <?php if (isset($primaryButton)): ?>
                <a href="<?= esc($primaryButton['link'], 'attr') ?>" 
                   class="btn-modern bg-white text-blue-600 hover:bg-gray-100">
                    <?= esc($primaryButton['text']) ?>
                </a>
                <?php endif; ?>
                
                <?php if (isset($secondaryButton)): ?>
                <a href="<?= esc($secondaryButton['link'], 'attr') ?>" 
                   class="btn-modern bg-transparent text-white border-2 border-white hover:bg-white/10">
                    <?= esc($secondaryButton['text']) ?>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>