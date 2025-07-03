<?php
/**
 * Reusable feature grid component
 * 
 * Usage:
 * <?= view('templates/feature-grid', [
 *     'title' => 'Our Features',
 *     'description' => 'Description text', // optional
 *     'features' => [
 *         [
 *             'icon' => '<svg>...</svg>',
 *             'iconColor' => 'blue', // blue, green, purple, orange, red
 *             'title' => 'Feature Title',
 *             'description' => 'Feature description'
 *         ],
 *         // ... more features
 *     ],
 *     'columns' => 3, // optional, defaults to 3
 *     'centered' => true // optional
 * ]) ?>
 */

$columns = $columns ?? 3;
$gridClass = match($columns) {
    2 => 'grid-cols-1 md:grid-cols-2',
    3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
    4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4',
    default => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3'
};

$iconColors = [
    'blue' => 'bg-blue-100 text-blue-600',
    'green' => 'bg-green-100 text-green-600',
    'purple' => 'bg-purple-100 text-purple-600',
    'orange' => 'bg-orange-100 text-orange-600',
    'red' => 'bg-red-100 text-red-600',
    'cyan' => 'bg-cyan-100 text-cyan-600',
    'pink' => 'bg-pink-100 text-pink-600',
    'yellow' => 'bg-yellow-100 text-yellow-600'
];
?>

<div class="w-full">
    <?php if (isset($title) || isset($description)): ?>
    <div class="text-center mb-16">
        <?php if (isset($title)): ?>
        <h2 class="font-bold text-gray-900 dark:text-white mb-4 fade-in animate-on-scroll" style="font-size: var(--text-4xl);">
            <?= esc($title) ?>
        </h2>
        <?php endif; ?>
        
        <?php if (isset($description)): ?>
        <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto fade-in animate-on-scroll" style="font-size: var(--text-lg); animation-delay: 0.1s;">
            <?= esc($description) ?>
        </p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="grid <?= esc($gridClass) ?> gap-8">
        <?php foreach ($features as $index => $feature): ?>
        <div class="<?= isset($centered) && $centered ? 'text-center' : '' ?> fade-in animate-on-scroll" 
             style="animation-delay: <?= 0.1 + ($index * 0.1) ?>s">
            <?php if (isset($feature['icon'])): ?>
            <div class="<?= isset($centered) && $centered ? 'mx-auto' : '' ?> w-16 h-16 rounded-full flex items-center justify-center mb-4 <?= esc($iconColors[$feature['iconColor'] ?? 'blue']) ?>">
                <?= $feature['icon'] ?>
            </div>
            <?php endif; ?>
            
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                <?= esc($feature['title']) ?>
            </h3>
            
            <p class="text-gray-600 dark:text-gray-300">
                <?= esc($feature['description']) ?>
            </p>
        </div>
        <?php endforeach; ?>
    </div>
</div>