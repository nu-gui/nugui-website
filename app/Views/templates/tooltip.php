<?php
/**
 * Reusable tooltip component
 * 
 * Usage:
 * <?= view('templates/tooltip', [
 *     'text' => 'Helpful information',
 *     'content' => '<button>Hover me</button>',
 *     'position' => 'top', // top, bottom, left, right
 *     'trigger' => 'hover', // hover, click
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$tooltipId = 'tooltip-' . uniqid();
$position = $position ?? 'top';
$trigger = $trigger ?? 'hover';

$positionClasses = [
    'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
    'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
    'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
    'right' => 'left-full top-1/2 -translate-y-1/2 ml-2'
];

$arrowClasses = [
    'top' => 'top-full left-1/2 -translate-x-1/2 -mt-1',
    'bottom' => 'bottom-full left-1/2 -translate-x-1/2 -mb-1 rotate-180',
    'left' => 'left-full top-1/2 -translate-y-1/2 -ml-1 -rotate-90',
    'right' => 'right-full top-1/2 -translate-y-1/2 -mr-1 rotate-90'
];
?>

<div class="tooltip-wrapper relative inline-block <?= esc($class ?? '', 'attr') ?>">
    <!-- Trigger element -->
    <div class="tooltip-trigger" 
         data-tooltip-id="<?= esc($tooltipId, 'attr') ?>"
         data-tooltip-trigger="<?= esc($trigger, 'attr') ?>">
        <?= $content ?? '' ?>
    </div>
    
    <!-- Tooltip -->
    <div id="<?= esc($tooltipId, 'attr') ?>" 
         class="tooltip absolute z-50 <?= esc($positionClasses[$position], 'attr') ?> 
                pointer-events-none opacity-0 scale-95 transition-all duration-200"
         role="tooltip">
        <div class="relative bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg px-3 py-2 whitespace-nowrap max-w-xs">
            <?= esc($text ?? 'Tooltip text') ?>
            
            <!-- Arrow -->
            <div class="absolute <?= esc($arrowClasses[$position], 'attr') ?>">
                <div class="w-0 h-0 border-4 border-transparent border-t-gray-900 dark:border-t-gray-700"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const trigger = document.querySelector('[data-tooltip-id="<?= esc($tooltipId, 'js') ?>"]');
    const tooltip = document.getElementById('<?= esc($tooltipId, 'js') ?>');
    const triggerType = '<?= esc($trigger, 'js') ?>';
    
    function showTooltip() {
        tooltip.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
        tooltip.classList.add('opacity-100', 'scale-100');
    }
    
    function hideTooltip() {
        tooltip.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
        tooltip.classList.remove('opacity-100', 'scale-100');
    }
    
    if (triggerType === 'hover') {
        trigger.addEventListener('mouseenter', showTooltip);
        trigger.addEventListener('mouseleave', hideTooltip);
        trigger.addEventListener('focus', showTooltip);
        trigger.addEventListener('blur', hideTooltip);
    } else if (triggerType === 'click') {
        let isOpen = false;
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            isOpen = !isOpen;
            isOpen ? showTooltip() : hideTooltip();
        });
        
        // Close on outside click
        document.addEventListener('click', () => {
            if (isOpen) {
                isOpen = false;
                hideTooltip();
            }
        });
    }
});
</script>