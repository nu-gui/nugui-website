<?php
/**
 * Reusable toggle/switch component
 * 
 * Usage:
 * <?= view('templates/toggle', [
 *     'name' => 'notifications',
 *     'label' => 'Enable notifications',
 *     'checked' => true, // optional
 *     'disabled' => false, // optional
 *     'size' => 'medium', // small, medium, large
 *     'color' => 'blue', // blue, green, red, purple
 *     'description' => 'Receive email notifications', // optional
 *     'onChange' => 'handleToggleChange', // optional JS function name
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$toggleId = 'toggle-' . ($name ?? uniqid());
$size = $size ?? 'medium';
$color = $color ?? 'blue';
$isChecked = isset($checked) && $checked;
$isDisabled = isset($disabled) && $disabled;

$sizeClasses = [
    'small' => ['toggle' => 'w-8 h-4', 'slider' => 'w-3 h-3', 'translate' => 'translate-x-4'],
    'medium' => ['toggle' => 'w-11 h-6', 'slider' => 'w-5 h-5', 'translate' => 'translate-x-5'],
    'large' => ['toggle' => 'w-14 h-7', 'slider' => 'w-6 h-6', 'translate' => 'translate-x-7']
];

$colorClasses = [
    'blue' => 'bg-blue-600',
    'green' => 'bg-green-600',
    'red' => 'bg-red-600',
    'purple' => 'bg-purple-600'
];

$sizes = $sizeClasses[$size];
$colorClass = $colorClasses[$color];
?>

<div class="toggle-wrapper <?= esc($class ?? '', 'attr') ?>">
    <label class="flex items-start gap-3 cursor-pointer <?= $isDisabled ? 'opacity-50 cursor-not-allowed' : '' ?>">
        <!-- Toggle input -->
        <input type="checkbox"
               id="<?= esc($toggleId, 'attr') ?>"
               name="<?= esc($name ?? '', 'attr') ?>"
               class="sr-only peer"
               <?= $isChecked ? 'checked' : '' ?>
               <?= $isDisabled ? 'disabled' : '' ?>
               <?= isset($onChange) ? 'onchange="' . esc($onChange, 'attr') . '(this)"' : '' ?>>
        
        <!-- Toggle switch -->
        <div class="relative">
            <div class="toggle-track <?= esc($sizes['toggle'], 'attr') ?> bg-gray-300 rounded-full transition-colors duration-200
                        peer-checked:<?= esc($colorClass, 'attr') ?> peer-disabled:opacity-50">
                <div class="toggle-slider absolute top-0.5 left-0.5 <?= esc($sizes['slider'], 'attr') ?> 
                            bg-white rounded-full shadow-lg transform transition-transform duration-200
                            peer-checked:<?= esc($sizes['translate'], 'attr') ?>"></div>
            </div>
        </div>
        
        <!-- Label and description -->
        <div class="flex-1">
            <?php if (isset($label)): ?>
            <div class="text-gray-700 dark:text-gray-300 select-none">
                <?= esc($label) ?>
            </div>
            <?php endif; ?>
            
            <?php if (isset($description)): ?>
            <div class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
                <?= esc($description) ?>
            </div>
            <?php endif; ?>
        </div>
    </label>
</div>

<style>
/* Additional toggle animations */
.toggle-wrapper input:checked ~ .toggle-track .toggle-slider {
    animation: toggle-slide 0.2s ease-out;
}

@keyframes toggle-slide {
    0% { transform: translateX(0); }
    50% { transform: translateX(<?= $size === 'small' ? '0.5rem' : ($size === 'large' ? '1.75rem' : '1.25rem') ?>) scale(1.1); }
    100% { transform: translateX(<?= $size === 'small' ? '1rem' : ($size === 'large' ? '1.75rem' : '1.25rem') ?>) scale(1); }
}

/* Focus styles */
.toggle-wrapper input:focus ~ .toggle-track {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}
</style>