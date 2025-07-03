<?php
/**
 * Reusable form input component with floating labels
 * 
 * Usage:
 * <?= view('templates/form-input', [
 *     'name' => 'email',
 *     'type' => 'email', // text, email, tel, password, etc.
 *     'label' => 'Email Address',
 *     'value' => $oldValue ?? '', // optional
 *     'placeholder' => 'Enter your email', // optional
 *     'required' => true, // optional
 *     'error' => $validation['email'] ?? null, // optional
 *     'helpText' => 'We\'ll never share your email', // optional
 *     'icon' => '<svg>...</svg>', // optional
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$inputId = 'input-' . ($name ?? uniqid());
$hasError = isset($error) && !empty($error);
$inputClass = 'form-input peer w-full pl-' . (isset($icon) ? '12' : '4') . ' pr-4 py-3 border-2 rounded-lg transition-all duration-200 focus:outline-none';
$inputClass .= $hasError ? ' border-red-500 focus:border-red-600' : ' border-gray-300 focus:border-blue-500';
$inputClass .= ' ' . ($class ?? '');

// Build input attributes
$attributes = [
    'type' => $type ?? 'text',
    'id' => $inputId,
    'name' => $name ?? '',
    'value' => $value ?? '',
    'placeholder' => ' ', // Always use space for floating label to work
    'class' => $inputClass
];

if (isset($required) && $required) {
    $attributes['required'] = 'required';
}

if (isset($placeholder) && !empty($placeholder)) {
    $attributes['data-placeholder'] = $placeholder;
}
?>

<div class="form-group relative">
    <?php if (isset($icon)): ?>
    <div class="absolute left-3 top-3.5 text-gray-400 pointer-events-none">
        <div class="w-5 h-5">
            <?= $icon ?>
        </div>
    </div>
    <?php endif; ?>
    
    <input <?php foreach ($attributes as $key => $val): ?>
        <?= esc($key, 'attr') ?>="<?= esc($val, 'attr') ?>"
    <?php endforeach; ?>>
    
    <label for="<?= esc($inputId, 'attr') ?>" 
           class="form-label absolute left-<?= isset($icon) ? '12' : '4' ?> top-3 text-gray-500 transition-all duration-200 pointer-events-none
                  peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                  peer-focus:top-[-0.5rem] peer-focus:text-sm peer-focus:<?= $hasError ? 'text-red-600' : 'text-blue-600' ?>
                  peer-[:not(:placeholder-shown)]:top-[-0.5rem] peer-[:not(:placeholder-shown)]:text-sm
                  bg-white dark:bg-gray-900 px-1">
        <?= esc($label ?? 'Label') ?>
        <?php if (isset($required) && $required): ?>
            <span class="text-red-500">*</span>
        <?php endif; ?>
    </label>
    
    <?php if ($hasError): ?>
    <div class="mt-1 text-sm text-red-600 flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <?= esc($error) ?>
    </div>
    <?php elseif (isset($helpText)): ?>
    <div class="mt-1 text-sm text-gray-500">
        <?= esc($helpText) ?>
    </div>
    <?php endif; ?>
</div>