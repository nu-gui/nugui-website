# NUGUI Website Color System Guide

## Overview

This guide explains how to use the new NUGUI color system that supports both light and dark themes with product-specific color schemes.

## Files Updated

1. **`/public/css/variables.css`** - Main color variables for light/dark themes
2. **`/public/css/modern-ui.css`** - Updated to use new color variables  
3. **`/public/css/product-colors.css`** - Product-specific color utilities (NEW)
4. **`/public/js/darkmode.js`** - Enhanced theme switching with DaisyUI support
5. **`tailwind.config.js`** - Updated with new color palette and themes

## Color Palette

### 🌞 Light Theme

**Background & Neutrals:**
- Background: `#FFFFFF`
- Secondary Background: `#F7F9FB` 
- Text Primary: `#333333`
- Text Secondary: `#666666`
- Borders: `#E0E0E0`

**Primary Blues:**
- Sky Blue: `#97C9F6`
- Medium Blue: `#2F69B3` (Primary)
- Navy Blue: `#1E3A7A`

**Product Colors:**
- **Gold (CCS)**: `#C6A564`
- **Purple (Data)**: `#8E67CC` 
- **Green (SIP/Voice)**: `#5FB673`
- **Orange (SMS)**: `#E87D4E`

### 🌙 Dark Theme

**Background & Neutrals:**
- Background: `#121212`
- Secondary Background: `#1E1E1E`
- Text Primary: `#FFFFFF`
- Text Secondary: `#CCCCCC`
- Borders: `#333333`

**Primary Blues:**
- Deep Blue: `#1E3A7A`
- Medium Blue: `#2F69B3`
- Cyan Highlight: `#5AB4F1`

**Product Colors (Darker Variants):**
- **Gold (CCS)**: `#AF8F4C`
- **Purple (Data)**: `#6D4DA8`
- **Green (SIP/Voice)**: `#348E4E`
- **Orange (SMS)**: `#CF5B24`

## Using CSS Custom Properties

### Basic Theme Colors

```css
/* Use these variables in your CSS */
.my-component {
    background: var(--color-background);
    color: var(--color-text-primary);
    border: 1px solid var(--color-border);
}
```

### Product-Specific Colors

```css
/* For CCS-related components */
.ccs-card {
    background: var(--color-gold-ccs);
    border-left: 4px solid var(--color-gold-ccs-dark);
}

/* For Data-related components */
.data-section {
    background: var(--gradient-purple-data);
}
```

## Using Utility Classes

### Product Theme Classes

Apply these classes to sections or components:

```html
<!-- CCS (Gold) themed section -->
<div class="theme-ccs">
    <button class="btn-ccs">CCS Button</button>
    <div class="card-ccs">CCS Card</div>
</div>

<!-- Data (Purple) themed section -->
<div class="theme-data">
    <button class="btn-data">Data Button</button>
    <div class="card-data">Data Card</div>
</div>

<!-- SIP (Green) themed section -->
<div class="theme-sip">
    <button class="btn-sip">SIP Button</button>
    <div class="card-sip">SIP Card</div>
</div>

<!-- SMS (Orange) themed section -->
<div class="theme-sms">
    <button class="btn-sms">SMS Button</button>
    <div class="card-sms">SMS Card</div>
</div>
```

### Background & Text Utilities

```html
<!-- Background colors -->
<div class="bg-ccs">Gold background</div>
<div class="bg-data-light">Light purple background</div>
<div class="bg-sip-dark">Dark green background</div>

<!-- Text colors -->
<span class="text-ccs">Gold text</span>
<span class="text-data">Purple text</span>
<span class="text-sip">Green text</span>
<span class="text-sms">Orange text</span>

<!-- Gradient text -->
<h2 class="text-gradient-ccs">Gradient Gold Text</h2>
<h2 class="text-gradient-data">Gradient Purple Text</h2>

<!-- Gradient backgrounds -->
<div class="bg-gradient-ccs">Gold gradient</div>
<div class="bg-gradient-data">Purple gradient</div>
```

## TailwindCSS Integration

### Using the New Color Palette

```html
<!-- Primary blues -->
<div class="bg-primary-300 text-primary-700">Sky blue background, navy text</div>
<button class="bg-primary-500 hover:bg-primary-600">Medium blue button</button>

<!-- Product colors -->
<div class="bg-gold-500 text-white">Gold CCS styling</div>
<div class="bg-purple-500 text-white">Purple Data styling</div>
<div class="bg-green-500 text-white">Green SIP styling</div>
<div class="bg-orange-500 text-white">Orange SMS styling</div>

<!-- Brand utility colors -->
<div class="bg-brand-bg-light dark:bg-brand-bg-dark">Responsive background</div>
<p class="text-brand-text-light dark:text-brand-text-dark">Responsive text</p>
```

## Theme Switching

### JavaScript API

```javascript
// Toggle between light and dark themes
window.themeManager.toggleTheme();

// Apply product theme to an element
const element = document.querySelector('.product-section');
window.ProductThemes.applyProductTheme(element, 'ccs'); // or 'data', 'sip', 'sms'

// Get current product color
const goldColor = window.ProductThemes.getProductColor('ccs', 'main');
const lightPurple = window.ProductThemes.getProductColor('data', 'light');
```

### HTML Theme Toggle Button

The theme toggle is already implemented and looks for:
```html
<button id="theme-toggle">
    <span class="sun-icon">☀️</span>
    <span class="moon-icon hidden">🌙</span>
</button>
```

## DaisyUI Themes

Two custom DaisyUI themes are available:
- **`nuguilight`** - Light theme with NUGUI colors
- **`nuguidark`** - Dark theme with NUGUI colors

These are automatically applied when switching themes.

## CSS File Loading Order

Make sure to load CSS files in this order:

```html
<link rel="stylesheet" href="/css/variables.css">
<link rel="stylesheet" href="/css/modern-ui.css">
<link rel="stylesheet" href="/css/product-colors.css">
<link rel="stylesheet" href="/assets/css/tailwind.min.css">
```

## Best Practices

1. **Always use CSS custom properties** instead of hardcoded colors
2. **Test in both light and dark modes** during development
3. **Use product-specific themes** to differentiate sections clearly
4. **Maintain sufficient contrast** for accessibility
5. **Leverage gradients sparingly** for visual impact

## Migration from Old Colors

If you have existing components using old colors:

```css
/* OLD - Replace these */
.old-component {
    background: #00A2E8; /* Old primary blue */
    color: #ffffff;
}

/* NEW - Use variables instead */
.new-component {
    background: var(--color-primary); /* Auto-adapts to theme */
    color: var(--color-text-primary);
}
```

## Troubleshooting

### Theme not switching properly?
1. Check that `darkmode.js` is loaded
2. Ensure CSS custom properties are defined in `:root`
3. Verify DaisyUI theme attributes are set correctly

### Colors not showing correctly?
1. Make sure `variables.css` is loaded first
2. Check browser developer tools for CSS custom property values
3. Verify the correct theme class (`dark` or `light`) is applied

### Product colors not working?
1. Ensure `product-colors.css` is loaded
2. Check that product theme classes are applied correctly
3. Verify CSS custom properties are available

---

This color system provides a consistent, accessible, and maintainable approach to theming your NUGUI website while preserving your brand identity across all products and themes.