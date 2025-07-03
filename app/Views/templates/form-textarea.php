<?php
/**
 * Reusable form textarea component with floating labels
 * 
 * Usage:
 * <?= view('templates/form-textarea', [
 *     'name' => 'message',
 *     'label' => 'Your Message',
 *     'value' => $oldValue ?? '', // optional
 *     'placeholder' => 'Enter your message', // optional
 *     'rows' => 5, // optional, defaults to 4
 *     'required' => true, // optional
 *     'error' => $validation['message'] ?? null, // optional
 *     'helpText' => 'Maximum 500 characters', // optional
 *     'maxlength' => 500, // optional
 *     'autoResize' => true, // optional, auto-resize based on content
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$textareaId = 'textarea-' . ($name ?? uniqid());
$hasError = isset($error) && !empty($error);
$textareaClass = 'form-input peer w-full px-4 py-3 border-2 rounded-lg transition-all duration-200 focus:outline-none resize-y';
$textareaClass .= $hasError ? ' border-red-500 focus:border-red-600' : ' border-gray-300 focus:border-blue-500';
$textareaClass .= isset($autoResize) && $autoResize ? ' auto-resize' : '';
$textareaClass .= ' ' . ($class ?? '');

// Build textarea attributes
$attributes = [
    'id' => $textareaId,
    'name' => $name ?? '',
    'rows' => $rows ?? 4,
    'placeholder' => ' ', // Always use space for floating label to work
    'class' => $textareaClass
];

if (isset($required) && $required) {
    $attributes['required'] = 'required';
}

if (isset($maxlength)) {
    $attributes['maxlength'] = $maxlength;
}

if (isset($placeholder) && !empty($placeholder)) {
    $attributes['data-placeholder'] = $placeholder;
}
?>

<div class="form-group relative">
    <textarea <?php foreach ($attributes as $key => $val): ?>
        <?= esc($key, 'attr') ?>="<?= esc($val, 'attr') ?>"
    <?php endforeach; ?>><?= esc($value ?? '') ?></textarea>
    
    <label for="<?= esc($textareaId, 'attr') ?>" 
           class="form-label absolute left-4 top-3 text-gray-500 transition-all duration-200 pointer-events-none
                  peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                  peer-focus:top-[-0.5rem] peer-focus:text-sm peer-focus:<?= $hasError ? 'text-red-600' : 'text-blue-600' ?>
                  peer-[:not(:placeholder-shown)]:top-[-0.5rem] peer-[:not(:placeholder-shown)]:text-sm
                  bg-white dark:bg-gray-900 px-1">
        <?= esc($label ?? 'Label') ?>
        <?php if (isset($required) && $required): ?>
            <span class="text-red-500">*</span>
        <?php endif; ?>
    </label>
    
    <?php if (isset($maxlength)): ?>
    <div class="absolute bottom-2 right-2 text-xs text-gray-400">
        <span class="char-count"><?= strlen($value ?? '') ?></span> / <?= $maxlength ?>
    </div>
    <?php endif; ?>
    
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

<?php if (isset($maxlength)): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('<?= esc($textareaId, 'js') ?>');
    const charCount = textarea.parentElement.querySelector('.char-count');
    
    textarea.addEventListener('input', function() {
        charCount.textContent = this.value.length;
    });
});
</script>
<?php endif; ?>