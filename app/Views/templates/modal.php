<?php
/**
 * Reusable modal/dialog component
 * 
 * Usage:
 * <?= view('templates/modal', [
 *     'id' => 'confirm-modal',
 *     'title' => 'Confirm Action',
 *     'content' => '<p>Are you sure you want to continue?</p>',
 *     'size' => 'medium', // small, medium, large, full
 *     'showCloseButton' => true,
 *     'footer' => '<button class="btn-primary">Confirm</button>',
 *     'class' => 'additional-classes' // optional
 * ]) ?>
 */

$modalId = $id ?? 'modal-' . uniqid();
$modalSize = $size ?? 'medium';

$sizeClasses = [
    'small' => 'max-w-md',
    'medium' => 'max-w-lg',
    'large' => 'max-w-2xl',
    'full' => 'max-w-full mx-4'
];

$sizeClass = $sizeClasses[$modalSize] ?? $sizeClasses['medium'];
?>

<!-- Modal backdrop -->
<div id="<?= esc($modalId, 'attr') ?>" 
     class="modal fixed inset-0 z-50 hidden overflow-y-auto <?= esc($class ?? '', 'attr') ?>"
     aria-labelledby="<?= esc($modalId, 'attr') ?>-title"
     aria-modal="true"
     role="dialog">
    
    <!-- Backdrop overlay -->
    <div class="modal-backdrop fixed inset-0 bg-black bg-opacity-50 transition-opacity duration-300"
         data-modal-close="<?= esc($modalId, 'attr') ?>"></div>
    
    <!-- Modal container -->
    <div class="flex min-h-full items-center justify-center p-4">
        <!-- Modal content -->
        <div class="modal-content relative bg-white dark:bg-gray-800 rounded-lg shadow-xl transform transition-all duration-300 w-full <?= esc($sizeClass, 'attr') ?>">
            
            <!-- Modal header -->
            <?php if (isset($title) || (isset($showCloseButton) && $showCloseButton)): ?>
            <div class="modal-header flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <?php if (isset($title)): ?>
                <h3 id="<?= esc($modalId, 'attr') ?>-title" class="text-xl font-semibold text-gray-900 dark:text-white">
                    <?= esc($title) ?>
                </h3>
                <?php endif; ?>
                
                <?php if (isset($showCloseButton) && $showCloseButton): ?>
                <button type="button" 
                        class="modal-close text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 transition-colors"
                        data-modal-close="<?= esc($modalId, 'attr') ?>"
                        aria-label="Close modal">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- Modal body -->
            <div class="modal-body p-6">
                <?= $content ?? '' ?>
            </div>
            
            <!-- Modal footer -->
            <?php if (isset($footer)): ?>
            <div class="modal-footer flex items-center justify-end gap-3 p-6 border-t border-gray-200 dark:border-gray-700">
                <?= $footer ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// Modal functionality
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('<?= esc($modalId, 'js') ?>');
    
    // Open modal function
    window.openModal = function(modalId) {
        const targetModal = document.getElementById(modalId);
        if (targetModal) {
            targetModal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            
            // Animate in
            setTimeout(() => {
                targetModal.querySelector('.modal-backdrop').classList.add('opacity-100');
                targetModal.querySelector('.modal-content').classList.add('opacity-100', 'scale-100');
            }, 10);
        }
    };
    
    // Close modal function
    window.closeModal = function(modalId) {
        const targetModal = document.getElementById(modalId);
        if (targetModal) {
            // Animate out
            targetModal.querySelector('.modal-backdrop').classList.remove('opacity-100');
            targetModal.querySelector('.modal-content').classList.remove('opacity-100', 'scale-100');
            
            setTimeout(() => {
                targetModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }
    };
    
    // Close on backdrop or close button click
    document.querySelectorAll('[data-modal-close="<?= esc($modalId, 'js') ?>"]').forEach(element => {
        element.addEventListener('click', () => closeModal('<?= esc($modalId, 'js') ?>'));
    });
    
    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal('<?= esc($modalId, 'js') ?>');
        }
    });
});
</script>