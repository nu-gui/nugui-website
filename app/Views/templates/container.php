<?php
/**
 * Reusable container component for consistent layout
 * 
 * Usage: 
 * <?= view('templates/container', ['content' => $yourContent, 'class' => 'additional-classes']) ?>
 */

$containerClass = $class ?? '';
?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl <?= esc($containerClass) ?>">
    <?= $content ?>
</div>