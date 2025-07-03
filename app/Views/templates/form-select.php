<?php
/**
 * Reusable form select/dropdown component
 * 
 * Usage:
 * <?= view('templates/form-select', [
 *     'name' => 'country',
 *     'label' => 'Select Country',
 *     'options' => [
 *         '' => 'Choose a country...',
 *         'us' => 'United States',
 *         'uk' => 'United Kingdom',
 *         'ca' => 'Canada'
 *     ],
 *     'value' => $oldValue ?? '', // optional
 *     'required' => true, // optional
 *     'error' => $validation['country'] ?? null, // optional
 *     'helpText' => 'Select your country', // optional
 *     'icon' => '<svg>...</svg>', // optional
 *     'searchable' => true, // optional, adds search functionality
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$selectId = 'select-' . ($name ?? uniqid());
$hasError = isset($error) && !empty($error);
$selectClass = 'form-input peer w-full pl-' . (isset($icon) ? '12' : '4') . ' pr-10 py-3 border-2 rounded-lg transition-all duration-200 focus:outline-none appearance-none cursor-pointer';
$selectClass .= $hasError ? ' border-red-500 focus:border-red-600' : ' border-gray-300 focus:border-blue-500';
$selectClass .= ' ' . ($class ?? '');
$currentValue = $value ?? '';
?>

<div class="form-group relative">
    <?php if (isset($icon)): ?>
    <div class="absolute left-3 top-3.5 text-gray-400 pointer-events-none">
        <div class="w-5 h-5">
            <?= $icon ?>
        </div>
    </div>
    <?php endif; ?>
    
    <select id="<?= esc($selectId, 'attr') ?>"
            name="<?= esc($name ?? '', 'attr') ?>"
            class="<?= esc($selectClass, 'attr') ?>"
            <?= isset($required) && $required ? 'required' : '' ?>
            <?= isset($searchable) && $searchable ? 'data-searchable="true"' : '' ?>>
        <?php foreach ($options ?? [] as $optValue => $optLabel): ?>
            <option value="<?= esc($optValue, 'attr') ?>" 
                    <?= $currentValue == $optValue ? 'selected' : '' ?>>
                <?= esc($optLabel) ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <!-- Custom dropdown arrow -->
    <div class="absolute right-3 top-3.5 pointer-events-none">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
    
    <label for="<?= esc($selectId, 'attr') ?>" 
           class="form-label absolute left-<?= isset($icon) ? '12' : '4' ?> top-3 text-gray-500 transition-all duration-200 pointer-events-none
                  <?= empty($currentValue) ? 'peer-focus:top-[-0.5rem] peer-focus:text-sm' : 'top-[-0.5rem] text-sm' ?>
                  peer-focus:<?= $hasError ? 'text-red-600' : 'text-blue-600' ?>
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

<?php if (isset($searchable) && $searchable): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('<?= esc($selectId, 'js') ?>');
    
    // Convert to searchable dropdown (requires additional JS library like Select2 or Choices.js)
    if (typeof Choices !== 'undefined') {
        new Choices(select, {
            searchEnabled: true,
            itemSelectText: '',
            shouldSort: false
        });
    }
});
</script>
<?php endif; ?>