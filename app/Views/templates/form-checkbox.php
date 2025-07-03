<?php
/**
 * Reusable form checkbox component
 * 
 * Usage:
 * <?= view('templates/form-checkbox', [
 *     'name' => 'terms',
 *     'label' => 'I agree to the terms and conditions',
 *     'value' => '1',
 *     'checked' => $oldValue ?? false, // optional
 *     'required' => true, // optional
 *     'error' => $validation['terms'] ?? null, // optional
 *     'helpText' => 'You must agree to continue', // optional
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$checkboxId = 'checkbox-' . ($name ?? uniqid());
$hasError = isset($error) && !empty($error);
$isChecked = isset($checked) && $checked;
?>

<div class="form-group">
    <label class="flex items-start gap-3 cursor-pointer group">
        <div class="relative flex items-center">
            <input type="checkbox"
                   id="<?= esc($checkboxId, 'attr') ?>"
                   name="<?= esc($name ?? '', 'attr') ?>"
                   value="<?= esc($value ?? '1', 'attr') ?>"
                   <?= $isChecked ? 'checked' : '' ?>
                   <?= isset($required) && $required ? 'required' : '' ?>
                   class="peer sr-only <?= esc($class ?? '', 'attr') ?>">
            
            <div class="w-5 h-5 border-2 rounded transition-all duration-200
                        <?= $hasError ? 'border-red-500' : 'border-gray-300' ?>
                        peer-checked:bg-blue-600 peer-checked:border-blue-600
                        peer-focus:ring-2 peer-focus:ring-blue-500 peer-focus:ring-offset-2
                        group-hover:border-blue-500">
                <!-- Checkmark -->
                <svg class="w-3 h-3 text-white absolute top-0.5 left-0.5 hidden peer-checked:block" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
        
        <div class="flex-1">
            <span class="text-gray-700 dark:text-gray-300 select-none">
                <?= esc($label ?? 'Checkbox label') ?>
                <?php if (isset($required) && $required): ?>
                    <span class="text-red-500">*</span>
                <?php endif; ?>
            </span>
            
            <?php if (isset($helpText) && !$hasError): ?>
            <div class="mt-1 text-sm text-gray-500">
                <?= esc($helpText) ?>
            </div>
            <?php endif; ?>
        </div>
    </label>
    
    <?php if ($hasError): ?>
    <div class="mt-2 ml-8 text-sm text-red-600 flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <?= esc($error) ?>
    </div>
    <?php endif; ?>
</div>