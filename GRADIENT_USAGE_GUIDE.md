# Page Gradient Usage Guide

## Overview

Each page now has its own unique gradient identity using the vibrant product colors from your solutions icons. The gradients are automatically applied based on the page class.

## Automatic Page Gradients

The following pages automatically receive unique gradients:

### 1. **Home Page** - Dynamic Blue to Gold
```css
/* Animated gradient that shifts between your signature blue and gold */
background: linear-gradient(135deg, #00A2E8 0%, #33B5ED 25%, #FFC107 75%, #FFB000 100%);
```

### 2. **About Page** - Professional Blue to Purple
```css
/* Sophisticated gradient from blue to purple */
background: linear-gradient(135deg, #00A2E8 0%, #0082BB 40%, #9C4DCC 80%, #B86CE8 100%);
```

### 3. **Products Page** - Multi-color Showcase
```css
/* Vibrant rainbow gradient showcasing all product colors */
background: linear-gradient(45deg, #FFB000 0%, #9C4DCC 40%, #00E676 60%, #FF5722 80%);
```

### 4. **Solutions Page** - Tech Green to Blue
```css
/* Technology-focused gradient */
background: linear-gradient(135deg, #00E676 0%, #00C853 30%, #00A2E8 70%, #0082BB 100%);
```

### 5. **Support Page** - Trustworthy Blue to Green
```css
/* Calming support-focused gradient */
background: linear-gradient(135deg, #0082BB 0%, #00A2E8 35%, #00C853 70%, #69F0AE 100%);
```

### 6. **Contact Page** - Warm Orange to Gold
```css
/* Inviting communication-focused gradient */
background: linear-gradient(135deg, #FF5722 0%, #FF8A65 30%, #FFC107 70%, #FFD54F 100%);
```

### 7. **Partner Page** - Premium Purple to Gold
```css
/* Luxurious partner-focused gradient */
background: linear-gradient(135deg, #7B2D99 0%, #9C4DCC 35%, #FFB000 70%, #FFC847 100%);
```

## Manual Gradient Application

### Method 1: Using CSS Classes

```html
<!-- Apply a specific product gradient -->
<section class="hero-section hero-gradient-ccs">
    <h1>Gold Gradient Section</h1>
</section>

<!-- Available gradient classes -->
.hero-gradient-ccs    /* Gold gradient */
.hero-gradient-data   /* Purple gradient */
.hero-gradient-sip    /* Green gradient */
.hero-gradient-sms    /* Orange gradient */
```

### Method 2: Using Data Attributes

```html
<!-- Apply product theme to entire section -->
<section data-product-theme="sip">
    <div class="hero-section">
        <!-- Automatically gets green gradient -->
    </div>
</section>
```

### Method 3: Using JavaScript

```javascript
// Apply gradient programmatically
window.applyPageGradient(element, 'ccs'); // Gold gradient
window.applyPageGradient(element, 'data'); // Purple gradient
window.applyPageGradient(element, 'sip'); // Green gradient
window.applyPageGradient(element, 'sms'); // Orange gradient

// Demo: Cycle through gradients
window.cycleProductGradients(document.querySelector('.hero-section'));
```

## Gradient Text

The gradient text automatically adapts to each page:

```html
<h1>Welcome to <span class="text-gradient">NU GUI</span></h1>
```

- Home page: Gold gradient text
- Products page: Multi-color gradient text
- Solutions page: Green to white gradient text
- Support page: White to green gradient text
- Contact page: Gold to white gradient text

## Quick Utility Classes

```html
<!-- Pre-defined gradient combinations -->
<div class="gradient-blue-gold">Blue to Gold</div>
<div class="gradient-purple-green">Purple to Green</div>
<div class="gradient-orange-blue">Orange to Blue</div>
<div class="gradient-gold-purple">Gold to Purple</div>
```

## Implementation Tips

1. **Remove inline styles** from hero sections to allow gradients to work
2. **Add page-specific classes** in your controller or view if needed
3. **Use data attributes** for dynamic product sections
4. **Ensure proper text contrast** - white text works best on these vibrant gradients

## CSS Files

Make sure these files are loaded in order:
1. `/css/variables.css` - Color definitions
2. `/css/product-colors.css` - Product color utilities
3. `/css/page-gradients.css` - Gradient definitions

## Troubleshooting

### Gradient not showing?
- Check for inline `background` styles overriding the gradient
- Ensure the page has the correct class (e.g., `page-home`)
- Verify CSS files are loaded

### Text not visible?
- Gradient text requires the `.text-gradient` class
- Ensure text has proper contrast with `text-shadow`
- White text works best on vibrant backgrounds

### Want to disable animation?
- Animations respect `prefers-reduced-motion`
- Remove animation classes for static gradients

---

The gradient system gives each page its own vibrant identity while maintaining consistency with your brand colors!