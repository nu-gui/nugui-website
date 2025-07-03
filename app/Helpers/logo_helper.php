<?php

/**
 * Logo Configuration Helper
 * Centralized configuration for all NuGui logo assets
 */

if (!function_exists('get_logo_assets')) {
    /**
     * Get all logo asset paths
     * 
     * @return array Array of logo asset paths
     */
    function get_logo_assets() {
        return [
            'logo_full_light' => 'assets/images/NUGU-LOGO-4 - Light.png',
            'logo_full_dark'  => 'assets/images/NUGUI-5.png',
            'icon_light'      => 'assets/images/NUGUI-ICON-6 - Light.png',
            'icon_dark'       => 'assets/images/NUGUI-ICON-7 - Dark.png',
            'favicon'         => 'assets/images/NUGUI-ICON-7 - Dark.png',
        ];
    }
}

if (!function_exists('logo_url')) {
    /**
     * Get logo URL by type
     * 
     * @param string $type Logo type (logo_full_light, logo_full_dark, icon_light, icon_dark, favicon)
     * @return string Full URL to logo asset
     */
    function logo_url($type) {
        $assets = get_logo_assets();
        
        if (!isset($assets[$type])) {
            throw new InvalidArgumentException("Logo type '{$type}' not found. Available types: " . implode(', ', array_keys($assets)));
        }
        
        return base_url($assets[$type]);
    }
}

if (!function_exists('render_theme_aware_logo')) {
    /**
     * Render theme-aware logo HTML
     * 
     * @param string $type Type of logo (full or icon)
     * @param array $attributes Additional HTML attributes
     * @return string HTML for theme-aware logo
     */
    function render_theme_aware_logo($type = 'icon', $attributes = []) {
        $assets = get_logo_assets();
        
        // Default attributes
        $defaultAttributes = [
            'alt' => 'NuGui Logo',
            'class' => 'h-8 w-auto'
        ];
        
        // Use different default classes for full logo in header
        if ($type === 'full') {
            $defaultAttributes['class'] = 'globalnav-logo';
        }
        
        $attributes = array_merge($defaultAttributes, $attributes);
        
        // Build attribute string
        $attrString = '';
        foreach ($attributes as $key => $value) {
            if ($key === 'class') continue; // Handle class separately
            $attrString .= " {$key}=\"{$value}\"";
        }
        
        $lightClass = $attributes['class'] . ' logo-light';
        $darkClass = $attributes['class'] . ' logo-dark';
        
        if ($type === 'full') {
            $lightSrc = logo_url('logo_full_light');
            $darkSrc = logo_url('logo_full_dark');
        } else {
            $lightSrc = logo_url('icon_light');
            $darkSrc = logo_url('icon_dark');
        }
        
        return sprintf(
            '<img src="%s" alt="%s" class="%s"%s>' . 
            '<img src="%s" alt="%s" class="%s"%s>',
            $lightSrc, $attributes['alt'], $lightClass, $attrString,
            $darkSrc, $attributes['alt'], $darkClass, $attrString
        );
    }
}

if (!function_exists('get_favicon_url')) {
    /**
     * Get favicon URL
     * 
     * @return string Favicon URL
     */
    function get_favicon_url() {
        return logo_url('favicon');
    }
}
