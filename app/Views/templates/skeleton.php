<?php
/**
 * Reusable skeleton loading component
 * 
 * Usage:
 * <?= view('templates/skeleton', [
 *     'type' => 'card', // card, text, image, list, table, form
 *     'count' => 3, // number of skeleton items
 *     'animate' => true, // optional, default true
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$type = $type ?? 'text';
$count = $count ?? 1;
$animate = $animate ?? true;
$animateClass = $animate ? 'animate-pulse' : '';

// Define skeleton types
function renderSkeletonCard($animateClass) {
    ?>
    <div class="skeleton-card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 <?= $animateClass ?>">
        <!-- Image skeleton -->
        <div class="skeleton-image bg-gray-300 dark:bg-gray-700 h-48 rounded-lg mb-4"></div>
        
        <!-- Title skeleton -->
        <div class="skeleton-title bg-gray-300 dark:bg-gray-700 h-6 rounded w-3/4 mb-3"></div>
        
        <!-- Text lines skeleton -->
        <div class="space-y-2">
            <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-full"></div>
            <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-5/6"></div>
            <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-4/6"></div>
        </div>
        
        <!-- Button skeleton -->
        <div class="skeleton-button bg-gray-300 dark:bg-gray-700 h-10 rounded-lg w-32 mt-4"></div>
    </div>
    <?php
}

function renderSkeletonText($animateClass, $lines = 3) {
    ?>
    <div class="skeleton-text space-y-2 <?= $animateClass ?>">
        <?php for ($i = 0; $i < $lines; $i++): ?>
        <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-<?= $i === $lines - 1 ? '3/4' : 'full' ?>"></div>
        <?php endfor; ?>
    </div>
    <?php
}

function renderSkeletonImage($animateClass) {
    ?>
    <div class="skeleton-image bg-gray-300 dark:bg-gray-700 rounded-lg <?= $animateClass ?>" 
         style="padding-bottom: 56.25%;">
    </div>
    <?php
}

function renderSkeletonList($animateClass, $items = 5) {
    ?>
    <div class="skeleton-list space-y-3 <?= $animateClass ?>">
        <?php for ($i = 0; $i < $items; $i++): ?>
        <div class="flex items-center gap-3">
            <div class="skeleton-avatar bg-gray-300 dark:bg-gray-700 w-10 h-10 rounded-full flex-shrink-0"></div>
            <div class="flex-1 space-y-2">
                <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-1/3"></div>
                <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-3 rounded w-1/2"></div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <?php
}

function renderSkeletonTable($animateClass, $rows = 5, $cols = 4) {
    ?>
    <div class="skeleton-table <?= $animateClass ?>">
        <table class="w-full">
            <thead>
                <tr>
                    <?php for ($i = 0; $i < $cols; $i++): ?>
                    <th class="p-3">
                        <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-20"></div>
                    </th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < $rows; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < $cols; $j++): ?>
                    <td class="p-3">
                        <div class="skeleton-line bg-gray-300 dark:bg-gray-700 h-4 rounded w-<?= $j === 0 ? '24' : '16' ?>"></div>
                    </td>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function renderSkeletonForm($animateClass) {
    ?>
    <div class="skeleton-form space-y-4 <?= $animateClass ?>">
        <!-- Input fields -->
        <?php for ($i = 0; $i < 3; $i++): ?>
        <div>
            <div class="skeleton-label bg-gray-300 dark:bg-gray-700 h-4 rounded w-24 mb-2"></div>
            <div class="skeleton-input bg-gray-300 dark:bg-gray-700 h-12 rounded-lg w-full"></div>
        </div>
        <?php endfor; ?>
        
        <!-- Textarea -->
        <div>
            <div class="skeleton-label bg-gray-300 dark:bg-gray-700 h-4 rounded w-32 mb-2"></div>
            <div class="skeleton-textarea bg-gray-300 dark:bg-gray-700 h-32 rounded-lg w-full"></div>
        </div>
        
        <!-- Submit button -->
        <div class="skeleton-button bg-gray-300 dark:bg-gray-700 h-12 rounded-lg w-32"></div>
    </div>
    <?php
}
?>

<div class="skeleton-wrapper <?= esc($class ?? '', 'attr') ?>">
    <?php for ($i = 0; $i < $count; $i++): ?>
        <?php
        switch ($type) {
            case 'card':
                renderSkeletonCard($animateClass);
                break;
            case 'text':
                renderSkeletonText($animateClass);
                break;
            case 'image':
                renderSkeletonImage($animateClass);
                break;
            case 'list':
                renderSkeletonList($animateClass);
                break;
            case 'table':
                renderSkeletonTable($animateClass);
                break;
            case 'form':
                renderSkeletonForm($animateClass);
                break;
            default:
                renderSkeletonText($animateClass);
        }
        ?>
        
        <?php if ($i < $count - 1): ?>
        <div class="my-4"></div>
        <?php endif; ?>
    <?php endfor; ?>
</div>

<style>
/* Skeleton animation */
@keyframes skeleton-pulse {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
    }
}

.animate-pulse {
    animation: skeleton-pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* Optional shimmer effect */
.skeleton-shimmer {
    position: relative;
    overflow: hidden;
}

.skeleton-shimmer::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    transform: translateX(-100%);
    background: linear-gradient(
        90deg,
        rgba(255, 255, 255, 0) 0,
        rgba(255, 255, 255, 0.2) 20%,
        rgba(255, 255, 255, 0.5) 60%,
        rgba(255, 255, 255, 0)
    );
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    100% {
        transform: translateX(100%);
    }
}
</style>