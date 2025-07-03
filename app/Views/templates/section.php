<?php
/**
 * Reusable section component with consistent spacing
 * 
 * Usage:
 * <?= view('templates/section', [
 *     'content' => $yourContent,
 *     'background' => 'bg-gray-50', // optional, defaults to transparent
 *     'spacing' => 'py-16 lg:py-24', // optional, defaults to standard spacing
 *     'class' => 'additional-classes', // optional
 *     'id' => 'section-id' // optional
 * ]) ?>
 */

$sectionBackground = $background ?? '';
$sectionSpacing = $spacing ?? 'py-16 lg:py-24';
$sectionClass = $class ?? '';
$sectionId = isset($id) ? 'id="' . esc($id, 'attr') . '"' : '';
?>

<section <?= $sectionId ?> class="<?= esc($sectionBackground) ?> <?= esc($sectionSpacing) ?> <?= esc($sectionClass) ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <?= $content ?>
    </div>
</section>