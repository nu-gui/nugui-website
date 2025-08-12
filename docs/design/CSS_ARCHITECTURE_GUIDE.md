# CSS Architecture Guide

## Overview
This guide outlines the CSS architecture strategy for the NUGUI website, focusing on maintainability, performance, and scalability.

## File Structure

```
public/css/
├── critical.css           # Critical above-the-fold styles (inline)
├── modern-ui.css         # Main stylesheet with components
├── components/           # Component-specific styles
│   ├── buttons.css
│   ├── forms.css
│   ├── cards.css
│   └── navigation.css
├── utilities/            # Utility classes
│   ├── spacing.css
│   ├── typography.css
│   └── layout.css
└── vendor/               # Third-party CSS
    └── tailwind.css
```

## CSS Methodology

### 1. ITCSS (Inverted Triangle CSS)
We follow ITCSS principles for CSS organization:

1. **Settings** - CSS Custom Properties and configuration
2. **Tools** - Mixins and functions (if using a preprocessor)
3. **Generic** - Base styles, resets, and normalize
4. **Elements** - Base element styles (h1, p, a, etc.)
5. **Objects** - Layout patterns (.container, .grid, etc.)
6. **Components** - UI components (.card, .button, etc.)
7. **Utilities** - Helper classes (.text-center, .hidden, etc.)

### 2. BEM Naming Convention
For component-specific styles, we use BEM (Block Element Modifier):

```css
/* Block */
.card { }

/* Element */
.card__header { }
.card__body { }
.card__footer { }

/* Modifier */
.card--featured { }
.card--large { }
.card__header--dark { }
```

### 3. CSS Custom Properties Strategy
All design tokens are defined as CSS custom properties:

```css
:root {
  /* Design System Tokens */
  --color-primary-50: #eff6ff;
  --color-primary-500: #3b82f6;
  --color-primary-900: #1e3a8a;
  
  /* Semantic Tokens */
  --color-brand: var(--color-primary-500);
  --color-text: var(--color-gray-900);
  --color-background: var(--color-white);
  
  /* Component Tokens */
  --button-bg: var(--color-brand);
  --button-text: var(--color-white);
  --button-radius: var(--radius-md);
}
```

## Component Architecture

### 1. Component Base Pattern
Each component follows this structure:

```css
/* Component Base */
.component {
  /* Layout properties */
  display: flex;
  
  /* Box model properties */
  padding: var(--space-md);
  margin: 0;
  
  /* Typography properties */
  font-size: var(--text-base);
  
  /* Visual properties */
  background-color: var(--color-background);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  
  /* Interactive properties */
  transition: var(--transition-default);
}

/* Component States */
.component:hover { }
.component:focus { }
.component:active { }
.component[disabled] { }

/* Component Variants */
.component--primary { }
.component--secondary { }
.component--large { }
.component--small { }

/* Component Elements */
.component__header { }
.component__body { }
.component__footer { }
```

### 2. Responsive Component Pattern
Components should be mobile-first and responsive:

```css
.component {
  /* Mobile styles (default) */
  padding: var(--space-sm);
  font-size: var(--text-sm);
}

@media (min-width: 640px) {
  .component {
    /* Tablet styles */
    padding: var(--space-md);
    font-size: var(--text-base);
  }
}

@media (min-width: 1024px) {
  .component {
    /* Desktop styles */
    padding: var(--space-lg);
    font-size: var(--text-lg);
  }
}
```

## Performance Best Practices

### 1. Critical CSS Strategy
- Inline critical CSS in the document head (< 14KB)
- Load non-critical CSS asynchronously
- Use `preload` for important stylesheets

```html
<!-- Critical CSS inlined -->
<style>
  /* Critical styles here */
</style>

<!-- Non-critical CSS loaded asynchronously -->
<link rel="preload" href="styles.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="styles.css"></noscript>
```

### 2. CSS Optimization Techniques
- Use CSS custom properties instead of repeated values
- Minimize CSS specificity conflicts
- Avoid deep nesting (max 3 levels)
- Use efficient selectors

```css
/* Good - Low specificity, efficient */
.button { }
.button--primary { }

/* Bad - High specificity, inefficient */
.page .section .container .content .button.primary { }
```

### 3. Animation Performance
- Use `transform` and `opacity` for animations
- Add `will-change` for heavy animations
- Provide `prefers-reduced-motion` alternatives

```css
.animated-element {
  transform: translateX(0);
  transition: transform 0.3s ease-out;
}

.animated-element:hover {
  transform: translateX(10px);
}

@media (prefers-reduced-motion: reduce) {
  .animated-element {
    transition: none;
  }
}
```

## Utility Classes Strategy

### 1. Spacing Utilities
Based on a consistent spacing scale:

```css
/* Margin utilities */
.m-0 { margin: 0; }
.m-1 { margin: var(--space-xs); }
.m-2 { margin: var(--space-sm); }
.m-3 { margin: var(--space-md); }
.m-4 { margin: var(--space-lg); }

/* Directional margins */
.mt-1 { margin-top: var(--space-xs); }
.mr-1 { margin-right: var(--space-xs); }
.mb-1 { margin-bottom: var(--space-xs); }
.ml-1 { margin-left: var(--space-xs); }

/* Responsive spacing */
@media (min-width: 768px) {
  .md\:m-6 { margin: var(--space-2xl); }
}
```

### 2. Typography Utilities
Consistent typography scale:

```css
.text-xs { font-size: var(--text-xs); }
.text-sm { font-size: var(--text-sm); }
.text-base { font-size: var(--text-base); }
.text-lg { font-size: var(--text-lg); }

.font-normal { font-weight: 400; }
.font-medium { font-weight: 500; }
.font-semibold { font-weight: 600; }
.font-bold { font-weight: 700; }

.text-left { text-align: left; }
.text-center { text-align: center; }
.text-right { text-align: right; }
```

### 3. Layout Utilities
Common layout patterns:

```css
/* Display utilities */
.block { display: block; }
.inline-block { display: inline-block; }
.flex { display: flex; }
.grid { display: grid; }
.hidden { display: none; }

/* Flexbox utilities */
.items-start { align-items: flex-start; }
.items-center { align-items: center; }
.items-end { align-items: flex-end; }

.justify-start { justify-content: flex-start; }
.justify-center { justify-content: center; }
.justify-end { justify-content: flex-end; }
.justify-between { justify-content: space-between; }

/* Grid utilities */
.grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
.grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
```

## Code Quality Guidelines

### 1. CSS Linting Rules
Use stylelint with these key rules:

```json
{
  "rules": {
    "declaration-block-trailing-semicolon": "always",
    "declaration-colon-space-after": "always",
    "declaration-colon-space-before": "never",
    "indentation": 2,
    "max-nesting-depth": 3,
    "no-duplicate-selectors": true,
    "no-unknown-at-rules": true
  }
}
```

### 2. Property Order
Follow a consistent property order:

```css
.component {
  /* Positioning */
  position: relative;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  
  /* Display & Box Model */
  display: flex;
  flex-direction: column;
  width: 100%;
  height: auto;
  padding: var(--space-md);
  margin: 0;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  
  /* Typography */
  font-family: var(--font-family);
  font-size: var(--text-base);
  font-weight: 400;
  line-height: 1.5;
  text-align: left;
  
  /* Visual */
  background-color: var(--color-background);
  color: var(--color-text);
  box-shadow: var(--shadow-sm);
  
  /* Interaction */
  cursor: pointer;
  transition: var(--transition-default);
  
  /* Transforms */
  transform: scale(1);
}
```

### 3. Comments and Documentation
Use clear, descriptive comments:

```css
/* ==========================================================================
   Component: Button
   ========================================================================== */

/**
 * Base button component
 * 
 * 1. Normalize appearance across browsers
 * 2. Ensure adequate touch targets (44px minimum)
 * 3. Provide focus indicators for accessibility
 */

.button {
  appearance: none; /* 1 */
  min-height: 44px; /* 2 */
  min-width: 44px; /* 2 */
  /* ... other styles ... */
}

.button:focus {
  outline: 2px solid var(--color-focus); /* 3 */
  outline-offset: 2px; /* 3 */
}
```

## Maintenance Guidelines

### 1. Regular Audits
- Monthly CSS audit for unused styles
- Performance review of bundle sizes
- Accessibility compliance check

### 2. Version Control
- Meaningful commit messages for CSS changes
- Document breaking changes in component APIs
- Tag releases for major CSS architecture changes

### 3. Team Guidelines
- Code review required for all CSS changes
- Document new components in style guide
- Test across supported browsers and devices

## Migration Strategy

### Phase 1: Foundation (Completed)
- [x] Establish CSS custom properties
- [x] Create base component structure
- [x] Implement critical CSS strategy

### Phase 2: Component Library (Completed)
- [x] Build core component set
- [x] Create form components
- [x] Add interactive components

### Phase 3: Performance (In Progress)
- [ ] Optimize CSS bundle size
- [ ] Implement automated purging
- [ ] Add performance monitoring

### Phase 4: Maintenance
- [ ] Set up CSS linting in CI/CD
- [ ] Create living style guide
- [ ] Document component APIs

## Tools and Resources

### Development Tools
- **PostCSS**: CSS processing and optimization
- **Stylelint**: CSS linting and formatting
- **PurgeCSS**: Remove unused CSS
- **CSSO**: CSS optimization and minification

### Testing Tools
- **Percy**: Visual regression testing
- **Backstop.js**: Visual testing framework
- **Pa11y**: Accessibility testing

### Performance Tools
- **CSS Stats**: Analyze CSS complexity
- **Unused CSS**: Find unused selectors
- **Critical**: Extract critical CSS automatically

This architecture provides a solid foundation for maintainable, scalable, and performant CSS that will grow with the project while maintaining consistency and quality.