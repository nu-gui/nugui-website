<?php
/**
 * Reusable loading spinner/indicator component
 * 
 * Usage:
 * <?= view('templates/loading', [
 *     'type' => 'spinner', // spinner, dots, bars, ring
 *     'size' => 'medium', // small, medium, large
 *     'color' => 'blue', // blue, white, gray, custom hex
 *     'text' => 'Loading...', // optional loading text
 *     'overlay' => false, // optional, show with overlay
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$type = $type ?? 'spinner';
$size = $size ?? 'medium';
$color = $color ?? 'blue';
$showOverlay = isset($overlay) && $overlay;

$sizeClasses = [
    'small' => ['wrapper' => 'w-4 h-4', 'text' => 'text-sm'],
    'medium' => ['wrapper' => 'w-8 h-8', 'text' => 'text-base'],
    'large' => ['wrapper' => 'w-12 h-12', 'text' => 'text-lg']
];

$colorClasses = [
    'blue' => 'text-blue-600',
    'white' => 'text-white',
    'gray' => 'text-gray-600',
];

$sizes = $sizeClasses[$size];
$colorClass = isset($colorClasses[$color]) ? $colorClasses[$color] : '';

// Custom color handling
if (!isset($colorClasses[$color]) && strpos($color, '#') === 0) {
    $customColorStyle = "color: $color;";
}
?>

<?php if ($showOverlay): ?>
<div class="loading-overlay fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
<?php endif; ?>

<div class="loading-wrapper inline-flex flex-col items-center gap-3 <?= esc($class ?? '', 'attr') ?>">
    
    <?php if ($type === 'spinner'): ?>
    <!-- Classic spinner -->
    <div class="loading-spinner <?= esc($sizes['wrapper'], 'attr') ?> <?= esc($colorClass, 'attr') ?>" 
         <?= isset($customColorStyle) ? 'style="' . esc($customColorStyle, 'attr') . '"' : '' ?>>
        <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    
    <?php elseif ($type === 'dots'): ?>
    <!-- Animated dots -->
    <div class="loading-dots flex gap-1">
        <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="dot <?= $size === 'small' ? 'w-2 h-2' : ($size === 'large' ? 'w-4 h-4' : 'w-3 h-3') ?> 
                    bg-current rounded-full animate-bounce <?= esc($colorClass, 'attr') ?>"
             style="animation-delay: <?= $i * 0.1 ?>s; <?= isset($customColorStyle) ? esc($customColorStyle, 'attr') : '' ?>">
        </div>
        <?php endfor; ?>
    </div>
    
    <?php elseif ($type === 'bars'): ?>
    <!-- Animated bars -->
    <div class="loading-bars flex gap-1">
        <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="bar <?= $size === 'small' ? 'w-1 h-4' : ($size === 'large' ? 'w-2 h-8' : 'w-1.5 h-6') ?> 
                    bg-current animate-pulse <?= esc($colorClass, 'attr') ?>"
             style="animation-delay: <?= $i * 0.15 ?>s; <?= isset($customColorStyle) ? esc($customColorStyle, 'attr') : '' ?>">
        </div>
        <?php endfor; ?>
    </div>
    
    <?php elseif ($type === 'ring'): ?>
    <!-- Ring loader -->
    <div class="loading-ring <?= esc($sizes['wrapper'], 'attr') ?>">
        <div class="ring-loader <?= esc($colorClass, 'attr') ?>" 
             <?= isset($customColorStyle) ? 'style="' . esc($customColorStyle, 'attr') . '"' : '' ?>>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if (isset($text)): ?>
    <div class="loading-text <?= esc($sizes['text'], 'attr') ?> <?= esc($colorClass, 'attr') ?> font-medium"
         <?= isset($customColorStyle) ? 'style="' . esc($customColorStyle, 'attr') . '"' : '' ?>>
        <?= esc($text) ?>
    </div>
    <?php endif; ?>
</div>

<?php if ($showOverlay): ?>
</div>
<?php endif; ?>

<style>
/* Ring loader styles */
.ring-loader {
    display: inline-block;
    width: 100%;
    height: 100%;
    border: 3px solid transparent;
    border-radius: 50%;
    border-top-color: currentColor;
    animation: ring-spin 1s ease-in-out infinite;
}

@keyframes ring-spin {
    to { transform: rotate(360deg); }
}

/* Enhanced dot animation */
.loading-dots .dot {
    animation: dot-bounce 1.4s ease-in-out infinite both;
}

@keyframes dot-bounce {
    0%, 80%, 100% {
        transform: scale(0);
        opacity: 0.5;
    }
    40% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Enhanced bar animation */
.loading-bars .bar {
    animation: bar-scale 1s ease-in-out infinite;
}

@keyframes bar-scale {
    0%, 40%, 100% {
        transform: scaleY(0.4);
    }
    20% {
        transform: scaleY(1);
    }
}
</style>