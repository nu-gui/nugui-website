# Theme Image Audit Report
- **Root:** `/mnt/d/Dev_Projects/GitHub/nugui-website`
- **Generated:** 2025-08-08T03:06:04.803Z
- **Light suffix:** `-1`, **Dark suffix:** `-2`
- **Files scanned:** 152
- **Files with themed refs:** 10
- **Unique pairs:** 18
- **Files with BOTH light & dark in same file:** 11
- **Missing assets:** 24

## Files Loading Both Light & Dark (MUST FIX)
### 1. `assets/images/NUGUI.png`
- **Files loading BOTH variants:**
  - ❌ `app/Helpers/logo_helper.php`
  - ❌ `app/Views/about.php`
  - ❌ `app/Views/templates/header-apple.php`
- Example assets:
  - `assets/images/NUGUI-1.png`
  - `assets/images/NUGUI-2.png`

### 2. `assets/images/NUGUI-icon.png`
- **Files loading BOTH variants:**
  - ❌ `app/Helpers/logo_helper.php`
  - ❌ `app/Views/landing.php`
  - ❌ `app/Views/layout.php`
- Example assets:
  - `assets/images/NUGUI-icon-1.png`
  - `assets/images/NUGUI-icon-2.png`

### 3. `assets/images/wes-profile.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/about.php`
- Example assets:
  - `assets/images/wes-profile-1.jpg`
  - `assets/images/wes-profile-2.jpg`

### 4. `assets/images/suren-profile.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/about.php`
- Example assets:
  - `assets/images/suren-profile-1.jpg`
  - `assets/images/suren-profile-2.jpg`

### 5. `assets/images/gali-profile.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/about.php`
- Example assets:
  - `assets/images/gali-profile-1.jpg`
  - `assets/images/gali-profile-2.jpg`

### 6. `assets/images/pavan-profile.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/about.php`
- Example assets:
  - `assets/images/pavan-profile-1.jpg`
  - `assets/images/pavan-profile-2.jpg`

### 7. `assets/images/ajay-profile.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/about.php`
- Example assets:
  - `assets/images/ajay-profile-1.jpg`
  - `assets/images/ajay-profile-2.jpg`

### 8. `assets/images/ankit-profile.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/about.php`
- Example assets:
  - `assets/images/ankit-profile-1.jpg`
  - `assets/images/ankit-profile-2.jpg`

### 9. `assets/images/NUSIP-icon.png`
- **Files loading BOTH variants:**
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NUSIP-icon-1.png`
  - `assets/images/NUSIP-icon-2.png`

### 10. `NUGUI.png`
- **Files loading BOTH variants:**
  - ❌ `public/test-images.php`
- Example assets:
  - `NUGUI-1.png`
  - `NUGUI-2.png`

### 11. `NUGUI-icon.png`
- **Files loading BOTH variants:**
  - ❌ `public/test-images.php`
- Example assets:
  - `NUGUI-icon-1.png`
  - `NUGUI-icon-2.png`


## All Files With Themed References
### ❌ `app/Helpers/logo_helper.php` (loads both light & dark)
- Light images:
  - `logo_full_light`
  - `icon_light`
  - `assets/images/NUGUI-1.png`
  - `assets/images/NUGUI-icon-1.png`
- Dark images:
  - `logo_full_dark`
  - `icon_dark`
  - `assets/images/NUGUI-2.png`
  - `assets/images/NUGUI-icon-2.png`

### ❌ `app/Helpers/picture_helper.php` (loads both light & dark)
- Light images:
  - `-1.jpg`
- Dark images:
  - `-2.png`

### ❌ `app/Views/about.php` (loads both light & dark)
- Light images:
  - `assets/images/NUGUI-1.png`
  - `assets/images/wes-profile-1.jpg`
  - `assets/images/suren-profile-1.jpg`
  - `assets/images/gali-profile-1.jpg`
  - `assets/images/pavan-profile-1.jpg`
  - `assets/images/ajay-profile-1.jpg`
  - `assets/images/ankit-profile-1.jpg`
  - `https://nugui.co.za/assets/images/NUGUI-icon-1.png`
- Dark images:
  - `assets/images/NUGUI-2.png`
  - `assets/images/wes-profile-2.jpg`
  - `assets/images/suren-profile-2.jpg`
  - `assets/images/gali-profile-2.jpg`
  - `assets/images/pavan-profile-2.jpg`
  - `assets/images/ajay-profile-2.jpg`
  - `assets/images/ankit-profile-2.jpg`

### ❌ `app/Views/landing.php` (loads both light & dark)
- Light images:
  - `assets/images/NUGUI-icon-1.png`
- Dark images:
  - `assets/images/NUGUI-icon-2.png`

### ❌ `app/Views/layout.php` (loads both light & dark)
- Light images:
  - `assets/images/NUGUI-icon-1.png`
  - `assets/images/NUGUI-1.png`
  - `https://nugui.co.za/assets/images/NUGUI-icon-1.png`
- Dark images:
  - `assets/images/NUGUI-icon-2.png`

### ❌ `app/Views/solutions.php` (loads both light & dark)
- Light images:
  - `assets/images/NUSIP-icon-1.png`
- Dark images:
  - `assets/images/NUSIP-icon-2.png`

### ❌ `app/Views/templates/header-apple.php` (loads both light & dark)
- Light images:
  - `assets/images/NUGUI-1.png`
- Dark images:
  - `assets/images/NUGUI-2.png`

### ❌ `public/test-images.php` (loads both light & dark)
- Light images:
  - `NUGUI-1.png`
  - `NUGUI-icon-1.png`
- Dark images:
  - `NUGUI-2.png`
  - `NUGUI-icon-2.png`

## Missing Assets (404 errors)
- ❌ `-1.jpg`
- ❌ `-2.png`
- ❌ `NUGUI-1.png`
- ❌ `NUGUI-2.png`
- ❌ `NUGUI-icon-1.png`
- ❌ `NUGUI-icon-2.png`
- ❌ `assets/images/NUSIP-icon-1.png`
- ❌ `assets/images/NUSIP-icon-2.png`
- ❌ `assets/images/ajay-profile-1.jpg`
- ❌ `assets/images/ajay-profile-2.jpg`
- ❌ `assets/images/ankit-profile-1.jpg`
- ❌ `assets/images/ankit-profile-2.jpg`
- ❌ `assets/images/gali-profile-1.jpg`
- ❌ `assets/images/gali-profile-2.jpg`
- ❌ `assets/images/pavan-profile-1.jpg`
- ❌ `assets/images/pavan-profile-2.jpg`
- ❌ `assets/images/suren-profile-1.jpg`
- ❌ `assets/images/suren-profile-2.jpg`
- ❌ `assets/images/wes-profile-1.jpg`
- ❌ `assets/images/wes-profile-2.jpg`
- ❌ `icon_dark`
- ❌ `icon_light`
- ❌ `logo_full_dark`
- ❌ `logo_full_light`