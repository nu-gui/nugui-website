# Performance Optimization Guide

## Overview
This guide outlines performance optimizations implemented to improve page load times, reduce bandwidth usage, and enhance user experience.

## Image Optimization

### 1. Optimized Image Component
**File**: `app/Views/templates/image-optimized.php`

Features:
- **Lazy Loading**: Images load only when they enter the viewport
- **Responsive Images**: Multiple image sizes for different screen resolutions
- **Placeholder Options**: Blur, color, skeleton, or no placeholder
- **Aspect Ratio Preservation**: Prevents layout shift during loading
- **WebP Support**: Automatically serves WebP format when supported

Usage:
```php
<?= view('templates/image-optimized', [
    'src' => 'images/hero.jpg',
    'alt' => 'Hero image',
    'width' => 1200,
    'height' => 800,
    'lazy' => true,
    'responsive' => true,
    'placeholder' => 'blur'
]) ?>
```

### 2. Image Processing Recommendations

#### Convert to Modern Formats
```bash
# Convert to WebP (85% quality, good balance)
cwebp -q 85 input.jpg -o output.webp

# Convert to AVIF (even better compression)
avif-cli --input input.jpg --output output.avif --quality 85
```

#### Optimize JPEGs
```bash
# Using jpegoptim
jpegoptim --max=85 --strip-all *.jpg

# Using mozjpeg
cjpeg -quality 85 -progressive input.jpg > output.jpg
```

#### Optimize PNGs
```bash
# Using pngquant
pngquant --quality=65-85 --ext .png --force *.png

# Using optipng
optipng -o7 *.png
```

### 3. Responsive Image Sizes
Generate multiple sizes for responsive images:

**Recommended breakpoints:**
- 320px (mobile portrait)
- 640px (mobile landscape) 
- 768px (tablet)
- 1024px (desktop)
- 1280px (large desktop)
- 1920px (full HD)

## CSS Optimization

### 1. Critical CSS
Extract above-the-fold CSS to inline in the document head:

```php
<!-- In app/Views/templates/layout.php -->
<style>
/* Critical CSS - inline only the most important styles */
body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
.container { max-width: 1280px; margin: 0 auto; padding: 0 1rem; }
.header { position: sticky; top: 0; z-index: 50; }
/* Add other critical styles */
</style>

<!-- Load full CSS asynchronously -->
<link rel="preload" href="<?= base_url('css/modern-ui.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= base_url('css/modern-ui.css') ?>"></noscript>
```

### 2. CSS Minification
Minify CSS in production:

```bash
# Using clean-css
cleancss -o public/css/modern-ui.min.css public/css/modern-ui.css

# Using cssnano (with PostCSS)
postcss public/css/modern-ui.css --use cssnano -o public/css/modern-ui.min.css
```

### 3. Remove Unused CSS
Use PurgeCSS to remove unused TailwindCSS classes:

```js
// purgecss.config.js
module.exports = {
  content: ['./app/Views/**/*.php'],
  css: ['./public/css/tailwind.css'],
  output: './public/css/tailwind.purged.css'
}
```

## JavaScript Optimization

### 1. Code Splitting
Split JavaScript into critical and non-critical parts:

```php
<!-- Critical JS - inline -->
<script>
// Critical functionality only
document.documentElement.classList.remove('no-js');
</script>

<!-- Non-critical JS - load asynchronously -->
<script src="<?= base_url('js/modern-ui.js') ?>" defer></script>
```

### 2. JavaScript Minification
```bash
# Using terser
terser public/js/modern-ui.js -o public/js/modern-ui.min.js --compress --mangle

# Using esbuild (faster)
esbuild public/js/modern-ui.js --minify --outfile=public/js/modern-ui.min.js
```

### 3. Modern JavaScript Loading
Use module/nomodule pattern for modern browsers:

```php
<!-- Modern ES6+ code for modern browsers -->
<script type="module" src="<?= base_url('js/modern-ui.modern.js') ?>"></script>

<!-- ES5 fallback for older browsers -->
<script nomodule src="<?= base_url('js/modern-ui.legacy.js') ?>"></script>
```

## Font Optimization

### 1. Font Loading Strategy
```php
<!-- Preload critical fonts -->
<link rel="preload" href="<?= base_url('fonts/inter-var.woff2') ?>" as="font" type="font/woff2" crossorigin>

<!-- Use font-display: swap for faster text rendering -->
<style>
@font-face {
    font-family: 'Inter';
    src: url('<?= base_url('fonts/inter-var.woff2') ?>') format('woff2');
    font-display: swap;
    font-weight: 100 900;
}
</style>
```

### 2. System Font Fallbacks
```css
:root {
    --font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 
                   Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
}
```

## Resource Loading Optimization

### 1. Preload Critical Resources
```php
<!-- In document head -->
<link rel="preload" href="<?= base_url('css/modern-ui.css') ?>" as="style">
<link rel="preload" href="<?= base_url('js/modern-ui.js') ?>" as="script">
<link rel="preload" href="<?= base_url('images/hero.webp') ?>" as="image">
```

### 2. DNS Prefetching
```php
<!-- Prefetch external domains -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
```

### 3. Resource Hints
```php
<!-- Preconnect to critical third-party origins -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Prefetch likely next pages -->
<link rel="prefetch" href="<?= base_url('about') ?>">
```

## Server-Side Optimizations

### 1. Gzip/Brotli Compression
Configure web server compression:

**Apache (.htaccess):**
```apache
# Enable Gzip compression
<IfModule mod_deflate.c>
    SetOutputFilter DEFLATE
    SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png)$ no-gzip dont-vary
    SetEnvIfNoCase Request_URI \.(?:exe|t?gz|zip|bz2|sit|rar)$ no-gzip dont-vary
</IfModule>

# Enable Brotli compression (if available)
<IfModule mod_brotli.c>
    BrotliCompressionLevel 6
    BrotliFilterNote ratio
</IfModule>
```

**Nginx:**
```nginx
# Gzip compression
gzip on;
gzip_vary on;
gzip_min_length 1000;
gzip_types text/plain text/css application/json application/javascript text/xml application/xml;

# Brotli compression
brotli on;
brotli_comp_level 6;
brotli_types text/plain text/css application/json application/javascript text/xml application/xml;
```

### 2. Browser Caching
Set appropriate cache headers:

**Apache:**
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType font/woff2 "access plus 1 year"
</IfModule>
```

**Nginx:**
```nginx
location ~* \.(css|js|png|jpg|jpeg|gif|webp|svg|woff|woff2)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

### 3. HTTP/2 Push
Push critical resources:

```php
// In CodeIgniter controller
if (function_exists('http2_push')) {
    http2_push(base_url('css/modern-ui.css'), 'style');
    http2_push(base_url('js/modern-ui.js'), 'script');
}
```

## Database Optimization

### 1. Query Optimization
```php
// Use query caching
$this->db->cache_on();

// Optimize with proper indexes
$this->db->select('id, title, slug')
         ->from('posts')
         ->where('status', 'published')
         ->order_by('created_at', 'DESC')
         ->limit(10);

// Turn off caching for dynamic content
$this->db->cache_off();
```

### 2. Database Connection Optimization
```php
// In app/Config/Database.php
public $default = [
    'hostname' => $_ENV['DB_HOST'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'database' => $_ENV['DB_NAME'],
    'persistent' => true,  // Enable persistent connections
    'compress'   => true,  // Enable compression
];
```

## Monitoring and Metrics

### 1. Core Web Vitals
Monitor these key metrics:
- **Largest Contentful Paint (LCP)**: < 2.5s
- **First Input Delay (FID)**: < 100ms
- **Cumulative Layout Shift (CLS)**: < 0.1

### 2. Performance Testing Tools
- **Google PageSpeed Insights**: Web performance analysis
- **GTmetrix**: Detailed performance reports
- **WebPageTest**: Advanced testing with multiple locations
- **Lighthouse**: Built into Chrome DevTools

### 3. Real User Monitoring (RUM)
```javascript
// Basic performance monitoring
window.addEventListener('load', function() {
    const navigation = performance.getEntriesByType('navigation')[0];
    const loadTime = navigation.loadEventEnd - navigation.fetchStart;
    
    // Send metrics to analytics
    gtag('event', 'page_load_time', {
        'value': Math.round(loadTime),
        'custom_parameter': 'performance'
    });
});
```

## Implementation Checklist

### Phase 1: Quick Wins
- [ ] Enable Gzip/Brotli compression
- [ ] Optimize and compress existing images
- [ ] Add lazy loading to images
- [ ] Minify CSS and JavaScript
- [ ] Set proper cache headers

### Phase 2: Advanced Optimizations
- [ ] Implement critical CSS
- [ ] Add responsive images with srcset
- [ ] Convert images to WebP/AVIF
- [ ] Implement code splitting
- [ ] Add resource preloading

### Phase 3: Monitoring and Refinement
- [ ] Set up performance monitoring
- [ ] Establish performance budgets
- [ ] Regular performance audits
- [ ] Optimize based on real user data

## Performance Budget
Set performance targets:
- **Page Load Time**: < 3 seconds on 3G
- **Image Size**: < 500KB per page
- **JavaScript Bundle**: < 200KB compressed
- **CSS Size**: < 100KB compressed
- **Total Page Size**: < 2MB

## Tools and Resources

### Image Optimization Tools
- **Squoosh**: Online image optimizer
- **ImageOptim**: Mac app for image optimization
- **TinyPNG**: Online PNG/JPEG compressor
- **Cloudinary**: Cloud-based image optimization service

### Performance Analysis
- **Bundle Analyzer**: Analyze JavaScript bundle size
- **Coverage Tab**: Find unused CSS/JS in Chrome DevTools
- **Performance Tab**: Analyze runtime performance
- **Network Tab**: Monitor resource loading

### Automation
- **Webpack**: Module bundler with optimization plugins
- **Gulp/Grunt**: Task runners for optimization workflows
- **PostCSS**: CSS processing with optimization plugins
- **GitHub Actions**: Automated performance testing in CI/CD