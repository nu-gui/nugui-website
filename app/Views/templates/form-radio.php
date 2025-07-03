<?php
/**
 * Reusable form radio button group component
 * 
 * Usage:
 * <?= view('templates/form-radio', [
 *     'name' => 'plan',
 *     'label' => 'Select your plan',
 *     'options' => [
 *         'basic' => ['label' => 'Basic Plan', 'description' => '$9/month'],
 *         'pro' => ['label' => 'Pro Plan', 'description' => '$29/month'],
 *         'enterprise' => ['label' => 'Enterprise', 'description' => 'Contact us']
 *     ],
 *     'value' => $oldValue ?? '', // optional
 *     'required' => true, // optional
 *     'error' => $validation['plan'] ?? null, // optional
 *     'inline' => false, // optional, display options inline
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$groupName = $name ?? uniqid();
$hasError = isset($error) && !empty($error);
$currentValue = $value ?? '';
$isInline = isset($inline) && $inline;
?>

<div class="form-group">
    <fieldset>
        <?php if (isset($label)): ?>
        <legend class="text-gray-700 dark:text-gray-300 font-medium mb-3">
            <?= esc($label) ?>
            <?php if (isset($required) && $required): ?>
                <span class="text-red-500">*</span>
            <?php endif; ?>
        </legend>
        <?php endif; ?>
        
        <div class="<?= $isInline ? 'flex flex-wrap gap-6' : 'space-y-3' ?>">
            <?php foreach ($options ?? [] as $optValue => $option): ?>
            <?php 
                $radioId = 'radio-' . $groupName . '-' . $optValue;
                $isChecked = $currentValue == $optValue;
                $optLabel = is_array($option) ? ($option['label'] ?? $optValue) : $option;
                $optDescription = is_array($option) ? ($option['description'] ?? null) : null;
            ?>
            <label class="flex items-start gap-3 cursor-pointer group">
                <div class="relative flex items-center mt-0.5">
                    <input type="radio"
                           id="<?= esc($radioId, 'attr') ?>"
                           name="<?= esc($groupName, 'attr') ?>"
                           value="<?= esc($optValue, 'attr') ?>"
                           <?= $isChecked ? 'checked' : '' ?>
                           <?= isset($required) && $required ? 'required' : '' ?>
                           class="peer sr-only">
                    
                    <div class="w-5 h-5 border-2 rounded-full transition-all duration-200
                                <?= $hasError ? 'border-red-500' : 'border-gray-300' ?>
                                peer-checked:border-blue-600
                                peer-focus:ring-2 peer-focus:ring-blue-500 peer-focus:ring-offset-2
                                group-hover:border-blue-500">
                        <div class="w-2 h-2 rounded-full bg-blue-600 absolute top-1 left-1 
                                    scale-0 peer-checked:scale-100 transition-transform duration-200"></div>
                    </div>
                </div>
                
                <div class="flex-1">
                    <span class="text-gray-700 dark:text-gray-300 select-none">
                        <?= esc($optLabel) ?>
                    </span>
                    <?php if ($optDescription): ?>
                    <div class="text-sm text-gray-500 mt-0.5">
                        <?= esc($optDescription) ?>
                    </div>
                    <?php endif; ?>
                </div>
            </label>
            <?php endforeach; ?>
        </div>
    </fieldset>
    
    <?php if ($hasError): ?>
    <div class="mt-2 text-sm text-red-600 flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <?= esc($error) ?>
    </div>
    <?php endif; ?>
</div>