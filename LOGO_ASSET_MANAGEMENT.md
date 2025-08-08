# NuGui Logo Asset Management System

## Overview
This document outlines the centralized logo asset management system for the NuGui website, ensuring consistent branding across all templates and making future logo updates simple and efficient.

## Logo Asset Files

### Current Logo Assets
All logo files are located in `/public/assets/images/`:

| Asset Type | Filename | Usage |
|------------|----------|-------|
| Full Logo Light | `NUGUI-1.png` | Main header navigation (light theme) |
| Full Logo Dark | `NUGUI-2.png` | Main header navigation (dark theme) |
| Icon Light | `NUGUI-icon-1.png` | Footers, compact spaces (light theme) |
| Icon Dark | `NUGUI-icon-2.png` | Footers, compact spaces, favicon (dark theme) |

## Logo Helper Functions

### Available Functions

#### `get_logo_assets()`
Returns array of all logo asset paths:
```php
$assets = get_logo_assets();
// Returns:
// [
//     'logo_full_light' => 'assets/images/NUGUI-1.png',
//     'logo_full_dark'  => 'assets/images/NUGUI-2.png',
//     'icon_light'      => 'assets/images/NUGUI-icon-1.png',
//     'icon_dark'       => 'assets/images/NUGUI-icon-2.png',
//     'favicon'         => 'assets/images/NUGUI-icon-1.png',
// ]
```

#### `logo_url($type)`
Get full URL for specific logo type:
```php
echo logo_url('logo_full_light'); // http://site.com/assets/images/NUGUI-1.png
echo logo_url('icon_dark');       // http://site.com/assets/images/NUGUI-icon-2.png
```

#### `render_theme_aware_logo($type, $attributes)`
Render complete HTML for theme-aware logo switching:
```php
// Render icon with default styling
echo render_theme_aware_logo('icon');

// Render full logo with custom attributes
echo render_theme_aware_logo('full', [
    'class' => 'h-12 w-auto',
    'width' => '100',
    'height' => '30'
]);
```

#### `get_favicon_url()`
Get favicon URL:
```php
<link rel="icon" href="<?= get_favicon_url() ?>">
```

## Current Implementation

### Templates Using Logo Assets

#### Main Templates
- **`header-apple.php`** - Uses full logo in main navigation
- **`footer-apple.php`** - Uses square icon with brand text
- **`layout.php`** - Uses dark icon as favicon

#### Legacy Templates  
- **`header.php`** - Uses square icon
- **`footer.php`** - Uses square icon
- **`header2.php`** - Uses square icon + favicon
- **`header-modern.php`** - Uses square icon

### Theme-Aware Logo Switching

All templates include CSS for automatic logo switching:

```css
/* Default - show light logos */
.logo-dark {
    display: none;
}

/* Dark mode - show dark logos */
@media (prefers-color-scheme: dark) {
    .logo-light {
        display: none;
    }
    .logo-dark {
        display: inline-block;
    }
}

/* Manual theme switching support */
[data-theme="dark"] .logo-light,
.dark .logo-light {
    display: none;
}

[data-theme="dark"] .logo-dark,
.dark .logo-dark {
    display: inline-block;
}
```

## Logo Specifications

### Recommended Dimensions
- **Full Logo**: ~200x50px (4:1 ratio) for horizontal brand + text
- **Square Icon**: 64x64px, 128x128px, 256x256px for icons/favicons

### File Format
- **Format**: PNG with transparent background
- **Color Modes**: Separate light and dark theme versions
- **Quality**: High resolution for crisp display on all devices

## Usage Examples

### Basic Icon in Template
```php
<img src="<?= logo_url('icon_light') ?>" alt="NuGui" class="logo-light h-8">
<img src="<?= logo_url('icon_dark') ?>" alt="NuGui" class="logo-dark h-8">
```

### Using Helper Function
```php
<?= render_theme_aware_logo('icon', ['class' => 'h-8 w-auto']) ?>
```

### Custom Favicon
```php
<link rel="icon" type="image/png" href="<?= get_favicon_url() ?>">
```

## Updating Logo Assets

### To Update All Logos
1. Replace files in `/public/assets/images/` with new versions
2. Update the `get_logo_assets()` function in `/app/Helpers/logo_helper.php` if filenames change
3. All templates will automatically use the new assets

### To Add New Logo Variants
1. Add new files to `/public/assets/images/`
2. Update `get_logo_assets()` array with new entries
3. Update templates as needed using the helper functions

## Benefits of This System

1. **Centralized Management** - All logo paths in one location
2. **Easy Updates** - Change filenames in one place
3. **Consistent Usage** - Helper functions ensure uniform implementation
4. **Theme-Aware** - Automatic light/dark mode switching
5. **Future-Proof** - Easy to add new logo variants or update assets

## File Structure
```
/app/
  /Helpers/
    logo_helper.php     # Logo management functions
  /Config/
    Autoload.php        # Loads logo helper automatically
/public/
  /assets/
    /images/
      NUGUI-1.png                # Full logo (light)
      NUGUI-2.png                # Full logo (dark)  
      NUGUI-icon-1.png           # Square icon (light)
      NUGUI-icon-2.png           # Square icon (dark)
```

This system ensures consistent branding across the entire NuGui website while making logo management simple and maintainable.
