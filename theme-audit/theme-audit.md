# Theme Image Audit Report
- **Root:** `/mnt/d/Dev_Projects/GitHub/nugui-website`
- **Generated:** 2025-08-08T03:00:27.397Z
- **Light suffix:** `-1`, **Dark suffix:** `-2`
- **Files scanned:** 150
- **Files with themed refs:** 11
- **Unique pairs:** 26
- **Files with BOTH light & dark in same file:** 17
- **Missing assets:** 22

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
  - ❌ `app/Views/solutions.php`
  - ❌ `app/Views/templates/footer-apple.php`
  - ❌ `app/Views/templates/footer.php`
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

### 9. `assets/images/NU-SIP-icon.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/home.php`
- Example assets:
  - `assets/images/NU-SIP-icon-1.jpg`
  - `assets/images/NU-SIP-icon-2.jpg`

### 10. `assets/images/NU-SMS-icon.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/home.php`
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NU-SMS-icon-1.jpg`
  - `assets/images/NU-SMS-icon-2.jpg`

### 11. `assets/images/NUSIP-icon.png`
- **Files loading BOTH variants:**
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NUSIP-icon-1.png`
  - `assets/images/NUSIP-icon-2.png`

### 12. `assets/images/NU-SIP-product.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NU-SIP-product-1.jpg`
  - `assets/images/NU-SIP-product-2.jpg`

### 13. `assets/images/NU-SMS-product.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NU-SMS-product-1.jpg`
  - `assets/images/NU-SMS-product-2.jpg`

### 14. `assets/images/NU-CCS-product.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NU-CCS-product-1.jpg`
  - `assets/images/NU-CCS-product-2.jpg`

### 15. `assets/images/NU-DATA-product.jpg`
- **Files loading BOTH variants:**
  - ❌ `app/Views/solutions.php`
- Example assets:
  - `assets/images/NU-DATA-product-1.jpg`
  - `assets/images/NU-DATA-product-2.jpg`

### 16. `NUGUI.png`
- **Files loading BOTH variants:**
  - ❌ `public/test-images.php`
- Example assets:
  - `NUGUI-1.png`
  - `NUGUI-2.png`

### 17. `NUGUI-icon.png`
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

### ❌ `app/Views/home.php` (loads both light & dark)
- Light images:
  - `assets/images/NU-SIP-icon-1.jpg`
  - `assets/images/NU-SMS-icon-1.jpg`
  - `assets/images/NU-CCS-icon-1.jpg`
  - `assets/images/NU-DATA-icon-1.jpg`
  - `https://nugui.co.za/assets/images/NUGUI-icon-1.png`
- Dark images:
  - `assets/images/NU-SIP-icon-2.jpg`
  - `assets/images/NU-SMS-icon-2.jpg`
  - `assets/images/NU-CCS-icon-2.png`
  - `assets/images/NU-DATA-icon-2.png`

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
  - `assets/images/NU-SMS-icon-1.jpg`
  - `assets/images/NU-CCS-icon-1.jpg`
  - `assets/images/NU-DATA-icon-1.jpg`
  - `assets/images/NUGUI-icon-1.png`
  - `assets/images/NU-SIP-product-1.jpg`
  - `assets/images/NU-SMS-product-1.jpg`
  - `assets/images/NU-CCS-product-1.jpg`
  - `assets/images/NU-DATA-product-1.jpg`
- Dark images:
  - `assets/images/NUSIP-icon-2.png`
  - `assets/images/NU-SMS-icon-2.jpg`
  - `assets/images/NU-CCS-icon-2.png`
  - `assets/images/NU-DATA-icon-2.png`
  - `assets/images/NUGUI-icon-2.png`
  - `assets/images/NU-SIP-product-2.jpg`
  - `assets/images/NU-SMS-product-2.jpg`
  - `assets/images/NU-CCS-product-2.jpg`
  - `assets/images/NU-DATA-product-2.jpg`

### ❌ `app/Views/templates/footer-apple.php` (loads both light & dark)
- Light images:
  - `assets/images/NUGUI-icon-1.png`
- Dark images:
  - `assets/images/NUGUI-icon-2.png`

### ❌ `app/Views/templates/footer.php` (loads both light & dark)
- Light images:
  - `assets/images/NUGUI-icon-1.png`
- Dark images:
  - `assets/images/NUGUI-icon-2.png`

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