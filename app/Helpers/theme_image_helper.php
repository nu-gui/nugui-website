<?php

/**
 * Theme Image Helper - Uses CSS variables for centralized image management
 * All image paths are defined in /public/css/theme-assets.css
 */

if (!function_exists('theme_image')) {
    /**
     * Generate a div with background image from CSS variables
     * 
     * @param string $type Type of image (logo-main, logo-icon, icon-sip, etc.)
     * @param string $alt Alt text for accessibility
     * @param string $class Additional CSS classes
     * @param array $attributes Additional HTML attributes
     * @return string HTML div element with background image
     */
    function theme_image($type, $alt = '', $class = '', $attributes = []) {
        // Build attributes string
        $attrString = '';
        foreach ($attributes as $key => $value) {
            $attrString .= ' ' . $key . '="' . esc($value) . '"';
        }
        
        // Add aria-label for accessibility
        if ($alt) {
            $attrString .= ' aria-label="' . esc($alt) . '"';
            $attrString .= ' role="img"';
        }
        
        // Combine classes
        $classes = trim("bg-{$type} theme-image {$class}");
        
        // Generate div with background image
        $html = '<div class="' . esc($classes) . '"' . $attrString . '></div>';
        
        return $html;
    }
}

if (!function_exists('theme_logo')) {
    /**
     * Generate logo with theme support
     * 
     * @param bool $isIcon Use icon version
     * @param string $class Additional CSS classes  
     * @return string HTML element
     */
    function theme_logo($isIcon = false, $class = '') {
        $type = $isIcon ? 'logo-icon' : 'logo-main';
        $alt = 'NU GUI ' . ($isIcon ? 'Icon' : 'Logo');
        return theme_image($type, $alt, $class);
    }
}

if (!function_exists('theme_product_icon')) {
    /**
     * Generate product icon with theme support
     * 
     * @param string $product Product name (sip, sms, ccs, data)
     * @param string $class Additional CSS classes
     * @return string HTML element
     */
    function theme_product_icon($product, $class = '') {
        $type = 'icon-' . strtolower($product);
        $alt = 'NU ' . strtoupper($product) . ' Icon';
        return theme_image($type, $alt, $class);
    }
}

if (!function_exists('theme_product_image')) {
    /**
     * Generate product image with theme support
     * 
     * @param string $product Product name (sip, sms, ccs, data)
     * @param string $class Additional CSS classes
     * @return string HTML element
     */
    function theme_product_image($product, $class = '') {
        $type = 'product-' . strtolower($product);
        $alt = 'NU ' . strtoupper($product) . ' Product';
        return theme_image($type, $alt, $class);
    }
}

// For backward compatibility with existing picture_* functions
if (!function_exists('use_css_theme_images')) {
    /**
     * Check if CSS theme images should be used
     * Can be controlled via environment variable or config
     */
    function use_css_theme_images() {
        return getenv('USE_CSS_THEME_IMAGES') === 'true' || true; // Default to true
    }
}