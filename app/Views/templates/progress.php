<?php
/**
 * Reusable progress indicator component
 * 
 * Usage:
 * <?= view('templates/progress', [
 *     'value' => 75,
 *     'max' => 100,
 *     'type' => 'bar', // bar, circle, steps
 *     'size' => 'medium', // small, medium, large
 *     'color' => 'blue', // blue, green, red, yellow, purple
 *     'showLabel' => true, // optional
 *     'label' => '75% Complete', // optional custom label
 *     'striped' => false, // optional striped animation
 *     'animated' => true, // optional animation
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 * 
 * For steps type:
 * <?= view('templates/progress', [
 *     'type' => 'steps',
 *     'currentStep' => 2,
 *     'steps' => [
 *         ['label' => 'Account', 'completed' => true],
 *         ['label' => 'Profile', 'completed' => true],
 *         ['label' => 'Settings', 'completed' => false],
 *         ['label' => 'Complete', 'completed' => false]
 *     ]
 * ]) ?>
 */

$type = $type ?? 'bar';
$size = $size ?? 'medium';
$color = $color ?? 'blue';
$value = $value ?? 0;
$max = $max ?? 100;
$percentage = min(100, max(0, ($value / $max) * 100));
$showLabel = $showLabel ?? true;
$animated = $animated ?? true;
$striped = $striped ?? false;

$sizeClasses = [
    'small' => ['bar' => 'h-2', 'circle' => 'w-16 h-16', 'text' => 'text-xs'],
    'medium' => ['bar' => 'h-4', 'circle' => 'w-24 h-24', 'text' => 'text-sm'],
    'large' => ['bar' => 'h-6', 'circle' => 'w-32 h-32', 'text' => 'text-base']
];

$colorClasses = [
    'blue' => 'bg-blue-600',
    'green' => 'bg-green-600',
    'red' => 'bg-red-600',
    'yellow' => 'bg-yellow-500',
    'purple' => 'bg-purple-600'
];

$sizes = $sizeClasses[$size];
$colorClass = $colorClasses[$color];
?>

<div class="progress-wrapper <?= esc($class ?? '', 'attr') ?>">
    
    <?php if ($type === 'bar'): ?>
    <!-- Progress bar -->
    <div class="progress-bar-container">
        <?php if ($showLabel && isset($label)): ?>
        <div class="mb-1 flex justify-between items-center">
            <span class="<?= esc($sizes['text'], 'attr') ?> text-gray-700 dark:text-gray-300"><?= esc($label) ?></span>
        </div>
        <?php endif; ?>
        
        <div class="progress-bar-wrapper bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden <?= esc($sizes['bar'], 'attr') ?>">
            <div class="progress-bar <?= esc($colorClass, 'attr') ?> <?= esc($sizes['bar'], 'attr') ?> 
                        <?= $striped ? 'progress-striped' : '' ?> 
                        <?= $animated ? 'transition-all duration-500 ease-out' : '' ?>"
                 style="width: <?= $percentage ?>%"
                 role="progressbar"
                 aria-valuenow="<?= $value ?>"
                 aria-valuemin="0"
                 aria-valuemax="<?= $max ?>">
                
                <?php if ($showLabel && !isset($label)): ?>
                <span class="progress-label text-white <?= esc($sizes['text'], 'attr') ?> font-medium 
                           flex items-center justify-center h-full">
                    <?= round($percentage) ?>%
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php elseif ($type === 'circle'): ?>
    <!-- Circular progress -->
    <div class="progress-circle relative inline-flex items-center justify-center">
        <svg class="<?= esc($sizes['circle'], 'attr') ?> transform -rotate-90">
            <!-- Background circle -->
            <circle cx="50%" cy="50%" r="45%" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="8"
                    class="text-gray-200 dark:text-gray-700">
            </circle>
            
            <!-- Progress circle -->
            <circle cx="50%" cy="50%" r="45%" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="8"
                    stroke-linecap="round"
                    class="<?= str_replace('bg-', 'text-', $colorClass) ?> <?= $animated ? 'transition-all duration-500' : '' ?>"
                    style="stroke-dasharray: <?= 283 ?>; stroke-dashoffset: <?= 283 - (283 * $percentage / 100) ?>">
            </circle>
        </svg>
        
        <?php if ($showLabel): ?>
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="<?= esc($sizes['text'], 'attr') ?> font-semibold text-gray-700 dark:text-gray-300">
                <?= isset($label) ? esc($label) : round($percentage) . '%' ?>
            </span>
        </div>
        <?php endif; ?>
    </div>
    
    <?php elseif ($type === 'steps'): ?>
    <!-- Step progress -->
    <div class="progress-steps">
        <ol class="flex items-center w-full">
            <?php foreach ($steps ?? [] as $index => $step): ?>
            <?php 
                $isActive = $index + 1 === $currentStep;
                $isCompleted = $step['completed'] ?? false;
                $isLast = $index === count($steps) - 1;
            ?>
            <li class="flex items-center <?= !$isLast ? 'flex-1' : '' ?>">
                <div class="flex items-center">
                    <!-- Step circle -->
                    <div class="step-circle relative flex items-center justify-center <?= $size === 'small' ? 'w-8 h-8' : ($size === 'large' ? 'w-12 h-12' : 'w-10 h-10') ?> 
                                rounded-full <?= $isCompleted ? $colorClass . ' text-white' : ($isActive ? 'border-2 border-current ' . str_replace('bg-', 'text-', $colorClass) : 'bg-gray-200 dark:bg-gray-700 text-gray-500') ?>
                                <?= $animated ? 'transition-all duration-300' : '' ?>">
                        <?php if ($isCompleted): ?>
                        <svg class="<?= $size === 'small' ? 'w-4 h-4' : ($size === 'large' ? 'w-6 h-6' : 'w-5 h-5') ?>" 
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" 
                                  clip-rule="evenodd">
                            </path>
                        </svg>
                        <?php else: ?>
                        <span class="<?= esc($sizes['text'], 'attr') ?> font-medium"><?= $index + 1 ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Step label -->
                    <span class="ml-2 <?= esc($sizes['text'], 'attr') ?> <?= $isActive ? 'font-medium text-gray-900 dark:text-white' : 'text-gray-500' ?>">
                        <?= esc($step['label'] ?? 'Step ' . ($index + 1)) ?>
                    </span>
                </div>
                
                <!-- Connector line -->
                <?php if (!$isLast): ?>
                <div class="flex-1 ml-4">
                    <div class="h-0.5 w-full <?= $isCompleted ? $colorClass : 'bg-gray-200 dark:bg-gray-700' ?> 
                                <?= $animated ? 'transition-all duration-300' : '' ?>">
                    </div>
                </div>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
    <?php endif; ?>
</div>

<style>
/* Striped progress bar animation */
.progress-striped {
    background-image: linear-gradient(
        45deg,
        rgba(255, 255, 255, 0.15) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, 0.15) 50%,
        rgba(255, 255, 255, 0.15) 75%,
        transparent 75%,
        transparent
    );
    background-size: 1rem 1rem;
    animation: progress-stripes 1s linear infinite;
}

@keyframes progress-stripes {
    0% {
        background-position: 1rem 0;
    }
    100% {
        background-position: 0 0;
    }
}

/* Progress bar entrance animation */
.progress-bar {
    animation: progress-fill 1s ease-out;
}

@keyframes progress-fill {
    from {
        width: 0;
    }
}
</style>