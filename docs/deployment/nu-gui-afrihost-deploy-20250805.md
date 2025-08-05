# NU GUI Afrihost Deployment & Security Hardening Report
**Date:** August 5, 2025  
**Session:** session-PL-nugui-afrihost-secure-deploy  
**Domain:** https://www.nugui.co.za  
**Repository:** nu-gui/nugui-website  

## Overview
This report documents the security hardening and deployment of the CodeIgniter 4 website from GitHub repository to Afrihost shared hosting, implementing proper directory structure to protect sensitive files from web access.

## Pre-Deployment State
- **Repository Location:** `/home/nuguiyhv/repositories/nugui-web`
- **Current Issue:** Sensitive directories (app/, vendor/, writable/, .env) exposed in public_html
- **Security Risk:** Framework files and configuration accessible via web requests

## Deployment Tasks

### 1. Backup Creation
**Status:** Pending  
**Command:** `cp -a /home/nuguiyhv/public_html /home/nuguiyhv/backup_pre_hardening_20250805`

### 2. Directory Restructuring
**Status:** Pending  
**Target Structure:**
```
/home/nuguiyhv/
├── public_html/          # Web-accessible only
│   ├── index.php
│   ├── .htaccess
│   └── assets/
├── app/                  # Moved from public_html
├── system/               # Moved from public_html  
├── vendor/               # Moved from public_html
├── writable/             # Moved from public_html
├── .env                  # Moved from public_html
└── composer.*            # Moved from public_html
```

### 3. Index.php Path Update
**Status:** Prepared  
**Current:** `require FCPATH . '../app/Config/Paths.php';`  
**Target:** Verify path points to relocated app directory

### 4. Permissions Hardening
**Status:** Pending  
**Commands:**
```bash
find /home/nuguiyhv -type d -exec chmod 755 {} \;
find /home/nuguiyhv -type f -exec chmod 644 {} \;
chmod -R 775 /home/nuguiyhv/writable
```

### 5. AutoSSL Configuration
**Status:** Pending  
**Target:** Enable Let's Encrypt certificate for nugui.co.za

### 6. HTTPS Redirect
**Status:** Pending  
**Target .htaccess:**
```apache
RewriteCond %{HTTPS} !=on
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 7. Deployment Hook Update
**Status:** Prepared  
**Updated .cpanel.yml:**
```yaml
deployment:
  tasks:
    - export DEPLOYPATH=/home/nuguiyhv/public_html/
    - /bin/rsync -a --delete ./public/ $DEPLOYPATH
    - /bin/rsync -a ./app/ /home/nuguiyhv/app/
    - /bin/rsync -a ./system/ /home/nuguiyhv/system/
    - /bin/rsync -a ./vendor/ /home/nuguiyhv/vendor/
    - /bin/rsync -a ./writable/ /home/nuguiyhv/writable/
    - /bin/rsync -a ./.env /home/nuguiyhv/.env
```

## Testing Results

### Browser Verification
**Status:** Pending  
**Target:** https://www.nugui.co.za loads successfully

### cURL Headers Test
**Status:** Pending  
**Command:** `curl -I https://www.nugui.co.za`  
**Expected:** HTTP/2 200 OK with SSL certificate

### Security Verification
**Status:** Pending  
**Test:** Verify sensitive files not accessible via web requests

## Next Steps
1. Complete cPanel File Manager backup
2. Execute directory restructuring
3. Test site functionality
4. Verify SSL certificate status
5. Document final configuration

## Commands Executed
*To be updated during deployment*

## Screenshots
*To be added during deployment process*

---
**Devin Session:** https://app.devin.ai/sessions/c26960d3816f47f6b8d2785170081bca  
**Requested by:** @nu-gui (wesley@nugui.co.za)
