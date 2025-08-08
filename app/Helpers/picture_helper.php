<?php

/**
 * Picture Helper - Generate responsive picture elements with theme support
 * This ensures only the correct theme variant loads based on prefers-color-scheme
 */

if (!function_exists('picture_element')) {
    /**
     * Generate a picture element with light/dark theme support
     * 
     * @param string $basePath Base path without -1/-2 suffix (e.g., 'assets/images/NUGUI-icon')
     * @param string $extension File extension (e.g., 'png', 'jpg')
     * @param string $alt Alt text for the image
     * @param string $class CSS classes to apply
     * @param array $attributes Additional HTML attributes
     * @return string HTML picture element
     */
    function picture_element($basePath, $extension = 'png', $alt = '', $class = '', $attributes = []) {
        $lightPath = base_url($basePath . '-1.' . $extension);
        $darkPath = base_url($basePath . '-2.' . $extension);
        
        // Build additional attributes string
        $attrString = '';
        foreach ($attributes as $key => $value) {
            $attrString .= ' ' . $key . '="' . esc($value) . '"';
        }
        
        // Generate picture element with prefers-color-scheme media queries
        $html = '<picture>';
        $html .= '<source media="(prefers-color-scheme: dark)" srcset="' . $darkPath . '">';
        $html .= '<source media="(prefers-color-scheme: light)" srcset="' . $lightPath . '">';
        $html .= '<img src="' . $lightPath . '" alt="' . esc($alt) . '"';
        if ($class) {
            $html .= ' class="' . esc($class) . '"';
        }
        $html .= $attrString;
        $html .= '>';
        $html .= '</picture>';
        
        return $html;
    }
}

if (!function_exists('picture_logo')) {
    /**
     * Generate logo picture element
     * 
     * @param bool $isIcon Whether to use icon version
     * @param string $class CSS classes
     * @return string HTML picture element
     */
    function picture_logo($isIcon = false, $class = '') {
        $basePath = $isIcon ? 'assets/images/NUGUI-icon' : 'assets/images/NUGUI';
        $alt = $isIcon ? 'NU GUI Icon' : 'NU GUI Logo';
        return picture_element($basePath, 'png', $alt, $class);
    }
}

if (!function_exists('picture_product')) {
    /**
     * Generate product image picture element
     * 
     * @param string $product Product name (SMS, CCS, DATA, SIP)
     * @param string $type 'icon' or 'product'
     * @param string $class CSS classes
     * @return string HTML picture element
     */
    function picture_product($product, $type = 'icon', $class = '') {
        // Use PNG for icons (better quality and transparency) and JPG for product images
        $extension = ($type === 'icon') ? 'png' : 'jpg';
        
        $basePath = 'assets/images/NU-' . $product . '-' . $type;
        $alt = 'NU ' . $product . ' ' . ucfirst($type);
        return picture_element($basePath, $extension, $alt, $class);
    }
}

if (!function_exists('picture_profile')) {
    /**
     * Generate profile image picture element
     * Note: Profile images don't have theme variants currently
     * 
     * @param string $name Person's name (e.g., 'wes', 'suren')
     * @param string $class CSS classes
     * @return string HTML img element (no theme variant)
     */
    function picture_profile($name, $class = '') {
        // For now, just return regular img as profiles don't have theme variants
        $path = base_url('assets/images/' . $name . '-profile.jpg');
        $alt = ucfirst($name) . ' Profile';
        
        $html = '<img src="' . $path . '" alt="' . esc($alt) . '"';
        if ($class) {
            $html .= ' class="' . esc($class) . '"';
        }
        $html .= '>';
        
        return $html;
    }
}