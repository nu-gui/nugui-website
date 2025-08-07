# NU GUI Afrihost Server Directory Structure Analysis
**Date:** August 6, 2025  
**Session:** https://app.devin.ai/sessions/6c3b88fa58a2457e93317ee2b02dfcb9  
**Repository:** nu-gui/nugui-website  
**Purpose:** Document duplicate folders, nested paths, and file locations for server cleanup

## 🔍 INVESTIGATION FINDINGS

### Current Server Directory Structure at `/home/nuguiyhv/`

#### ✅ Framework Directories Present at Root Level
Based on cPanel File Manager investigation:

1. **`/home/nuguiyhv/app/`** 
   - **Timestamp:** Today, 12:49 AM
   - **Permissions:** 0755
   - **Status:** ✅ Present at correct root level
   - **Issue:** User reported nested duplicate contents

2. **`/home/nuguiyhv/system/`**
   - **Timestamp:** Today, 12:49 AM  
   - **Permissions:** 0755
   - **Status:** ✅ Present at correct root level
   - **Issue:** User reported nested as `/home/nuguiyhv/system/system/`

3. **`/home/nuguiyhv/vendor/`**
   - **Timestamp:** Aug 4, 2025, 10:33 PM
   - **Permissions:** 0755
   - **Status:** ✅ Present at correct root level
   - **Issue:** Potential duplicate contents

4. **`/home/nuguiyhv/writable/`**
   - **Timestamp:** Today, 12:50 AM
   - **Permissions:** 0755
   - **Status:** ✅ Present at correct root level
   - **Issue:** User reported nested duplicate contents

### 🔄 DUPLICATE DIRECTORY LOCATIONS IDENTIFIED

#### Primary Locations (Current Deployment)
```
/home/nuguiyhv/
├── app/                    # ⚠️  Contains nested duplicates
├── system/                 # ⚠️  Contains nested duplicates  
├── vendor/                 # ⚠️  May contain duplicates
├── writable/               # ⚠️  Contains nested duplicates
├── .env                    # ✅ Correct location
├── composer.json           # ✅ Correct location
└── composer.lock           # ✅ Correct location
```

#### Historical/Source Locations
```
/home/nuguiyhv/public_html/temp_ci4/CodeIgniter4-develop/
├── system/                 # 📁 Source location (moved from here)
├── app/                    # 📁 Source location (moved from here)  
├── writable/               # 📁 Source location (moved from here)
└── vendor/                 # ❌ NOT FOUND (missing from source)
```

#### Original Repository Structure
```
/home/nuguiyhv/repositories/nugui-web/
├── .git/                   # 📁 Git repository
├── app/                    # 📁 Original app structure
├── public/                 # 📁 Original public directory
│   ├── assets/            # 📁 Static assets
│   ├── css/               # 📁 Stylesheets  
│   └── js/                # 📁 JavaScript files
├── src/                    # 📁 Source files
├── temp_ci4/              # 📁 CodeIgniter extraction
└── tests/                 # 📁 Test files
```

### ⚠️ CRITICAL NESTED STRUCTURE ISSUE

#### Problem Description
User confirmed: **"system was moved to /home/nuguiyhv/system/system/"**

This indicates the directory move operation created nested structures:
- Expected: `/home/nuguiyhv/system/` containing CodeIgniter system files
- Actual: `/home/nuguiyhv/system/system/` with files nested one level too deep

#### Impact on CodeIgniter Path Configuration
The server's `Paths.php` expects:
```php
$systemDirectory = __DIR__ . '/../../system';  // Points to /home/nuguiyhv/system/
```

But if files are at `/home/nuguiyhv/system/system/`, the path resolution fails.

### 📋 CLEANUP REQUIREMENTS

#### Immediate Actions Needed
1. **Flatten Nested Directories**
   - Move contents from `/home/nuguiyhv/system/system/` to `/home/nuguiyhv/system/`
   - Move contents from `/home/nuguiyhv/app/app/` to `/home/nuguiyhv/app/` (if nested)
   - Move contents from `/home/nuguiyhv/writable/writable/` to `/home/nuguiyhv/writable/` (if nested)

2. **Remove Empty Nested Directories**
   - Delete empty `/home/nuguiyhv/system/system/` after moving contents
   - Delete empty `/home/nuguiyhv/app/app/` after moving contents (if exists)
   - Delete empty `/home/nuguiyhv/writable/writable/` after moving contents (if exists)

#### Future Server Cleanup (Post-Deployment)
1. **Remove Source Directories**
   - `/home/nuguiyhv/public_html/temp_ci4/` - No longer needed after successful move
   - Verify no active references before deletion

2. **Consolidate Duplicate Assets**
   - Compare `/home/nuguiyhv/repositories/nugui-web/public/assets/` with `/home/nuguiyhv/public_html/assets/`
   - Identify and remove duplicate static files

3. **Archive Historical Backups**
   - `backup_pre_hardening_20250805/` - Archive or remove after verification
   - `public_html_backup_20250804.tar.gz` - Archive to external storage

### 🔧 DIRECTORY STRUCTURE VERIFICATION COMMANDS

#### Via cPanel File Manager
1. Navigate to `/home/nuguiyhv/system/`
2. Verify contents are CodeIgniter system files (not another `system/` folder)
3. Check file timestamps match "Today, 12:49 AM" deployment

#### Via FTP (dev@nugui.co.za)
```bash
# List system directory contents
ls -la /home/nuguiyhv/system/

# Verify no nested system directory
ls -la /home/nuguiyhv/system/system/  # Should NOT exist

# Check app directory structure  
ls -la /home/nuguiyhv/app/
```

### 📊 FILE TIMESTAMP ANALYSIS

#### Recent Deployment Files (Aug 5, 2025)
- `system/` - Today, 12:49 AM ✅
- `app/` - Today, 12:49 AM ✅  
- `writable/` - Today, 12:50 AM ✅
- `vendor/` - Aug 4, 2025, 10:33 PM ✅

#### Historical Files (Pre-Deployment)
- `repositories/nugui-web/` - Aug 2, 2025, 10:55 PM
- `public_html/temp_ci4/` - Various timestamps

### 🎯 SUCCESS CRITERIA

#### Directory Structure Fixed When:
1. **Correct Path Resolution**
   - `/home/nuguiyhv/system/` contains CodeIgniter system files directly
   - No nested `/home/nuguiyhv/system/system/` directory exists
   - CodeIgniter `Paths.php` can resolve `$systemDirectory` correctly

2. **Website Functionality**
   - `https://www.nugui.co.za` loads CodeIgniter application homepage
   - No 404 errors or CodeIgniter initialization failures
   - Browser shows proper application content (not just HTTP 200 OK)

3. **Clean Directory Structure**
   - No duplicate framework directories in multiple locations
   - All sensitive files properly outside web root
   - Proper file permissions maintained (755 directories, 644 files)

---

### 🚨 CRITICAL ROOT CAUSE IDENTIFIED - INCOMPLETE FRAMEWORK DIRECTORIES

#### FTP Investigation Results (Aug 6, 2025 04:10 UTC)
**Server:** ftp.nugui.co.za (dev@nugui.co.za)  
**Root Directory:** `/` (all framework directories present at correct level)

#### ❌ FRAMEWORK DIRECTORIES MISSING ESSENTIAL CONTENTS

1. **`/system` directory** - ✅ COMPLETE (44 subdirectories with all CodeIgniter framework files)
2. **`/app` directory** - ❌ INCOMPLETE (only 2 files: Common.php, index.html)
   - **Missing:** Config/, Controllers/, Views/, Models/, Database/, Filters/, etc.
   - **Impact:** Application logic and configuration unavailable
3. **`/vendor` directory** - ❌ INCOMPLETE (only 1 file: autoload.php)  
   - **Missing:** All Composer dependency subdirectories
   - **Impact:** Third-party libraries unavailable
4. **`/writable` directory** - ❌ INCOMPLETE (only 1 file: index.html)
   - **Missing:** cache/, logs/, session/, uploads/ subdirectories
   - **Impact:** Application cannot write cache, logs, or session data

#### ✅ COMPLETE FRAMEWORK ARCHIVES AVAILABLE ON SERVER
- **`app_complete.tar.gz`** (109,618 bytes, Aug 6 03:50) - Contains complete app structure
- **`vendor_complete.tar.gz`** (9,011,081 bytes, Aug 6 03:51) - Contains all Composer dependencies  
- **`writable_complete.tar.gz`** (518 bytes, Aug 6 03:52) - Contains writable subdirectories

#### Root Cause Analysis
The deployment process successfully:
- ✅ Created framework directories at correct root level (`/home/nuguiyhv/`)
- ✅ Uploaded complete system directory with all 44 CodeIgniter subdirectories
- ✅ Generated complete tar.gz archives for app, vendor, and writable directories

However, the extraction process failed for app, vendor, and writable directories, leaving them with only individual files instead of complete structures. This explains:
- **Curl Success:** CodeIgniter system directory allows basic framework bootstrap (HTTP/2 200 OK, CSRF cookies)
- **Browser Failure:** Missing app/vendor/writable contents prevent full application functionality (404 errors)

#### Immediate Solution Required
Extract the complete tar.gz archives to populate the missing framework directory contents:
1. **Extract `app_complete.tar.gz`** to populate `/app/` with Config/, Controllers/, Views/, etc.
2. **Extract `vendor_complete.tar.gz`** to populate `/vendor/` with Composer dependencies
3. **Extract `writable_complete.tar.gz`** to populate `/writable/` with cache/, logs/, session/ subdirectories

**Investigation Status:** ✅ ROOT CAUSE IDENTIFIED - All framework components complete, routing system issue

### 🔍 FINAL INVESTIGATION RESULTS (Aug 6, 2025 08:33 UTC)

#### ✅ ALL CODEIGNITER COMPONENTS CONFIRMED COMPLETE
**FTP Investigation Results:**
- **Routes.php**: ✅ All routes properly defined (`/home` → `Home::index`, `/about` → `About::index`, etc.)
- **Controllers**: ✅ All controllers exist (Home.php: 894 bytes, About.php: 877 bytes, Products.php: 907 bytes, etc.)
- **Views**: ✅ All views exist with complete content (home.php: 21165 bytes, about.php: 16983 bytes, etc.)
- **Vendor Directory**: ✅ Complete with all 20 Composer dependency subdirectories (codeigniter4, composer, dompdf, fakerphp, laminas, masterminds, mikey179, myclabs, nikic, phar-io, phenx, phpunit, psr, sabberworm, sebastian, symfony, theseer, plus autoload.php)
- **System Directory**: ✅ Complete with 44 CodeIgniter framework subdirectories
- **App Directory**: ✅ Complete with 13 application subdirectories

#### ❌ ACTUAL ROOT CAUSE: ROUTING SYSTEM INITIALIZATION FAILURE
**Symptoms:**
- Main landing page (`/`) works perfectly - returns complete HTML with animations
- ALL CodeIgniter routes return 404 errors (`/home`, `/about`, `/products`, etc.)
- All framework components are present and complete

**Root Cause Analysis:**
The issue is NOT missing vendor dependencies (as initially suspected) but rather a problem with CodeIgniter's routing system initialization or bootstrap configuration. The .htaccess file correctly redirects to `/public/` directory, but CodeIgniter's routing system fails to process routes beyond the main landing page.

**BREAKTHROUGH: ROOT CAUSE IDENTIFIED - .HTACCESS URL REWRITING FAILURE**

#### ✅ CODEIGNITER CONFIRMED WORKING VIA DIRECT ACCESS
**Direct Access Test Results:**
- `https://www.nugui.co.za/index.php/home` → ✅ **WORKS** (69,740 characters complete HTML)
- `https://www.nugui.co.za/index.php/about` → ✅ **WORKS** (65,681 characters complete HTML)
- `https://www.nugui.co.za/home` → ❌ **404 ERROR** (URL rewriting fails)
- `https://www.nugui.co.za/about` → ❌ **404 ERROR** (URL rewriting fails)

#### 🔍 ACTUAL ROOT CAUSE: .HTACCESS URL REWRITING NOT FUNCTIONING
**Analysis:**
- **CodeIgniter Framework**: ✅ 100% Complete and functional
- **Vendor Dependencies**: ✅ All 20 subdirectories present and complete
- **Routes Configuration**: ✅ All routes properly defined
- **Controllers & Views**: ✅ All exist with complete content
- **.htaccess File**: ✅ Contains correct rewrite rules (line 37: `RewriteRule ^([\s\S]*)$ index.php/$1 [L,NC,QSA]`)

**Problem**: The server is not processing .htaccess URL rewriting rules, causing direct route access (`/home`) to fail while index.php access (`/index.php/home`) works perfectly.

## 🔧 NGINX CONFIGURATION SOLUTION CREATED

**Configuration Files Created:**
- `nginx-config/nugui-site.conf` - Complete nginx server block configuration
- `nginx-config/NGINX_SETUP_INSTRUCTIONS.md` - Implementation guide

**Key Configuration Elements:**
```nginx
# Main routing rule (replaces .htaccess functionality)
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}

# Document root
root /home/nuguiyhv/public;
```

**Implementation Options:**
1. **Primary Solution**: Contact Afrihost support to implement nginx configuration
2. **Quick Fix**: Update CodeIgniter `indexPage` setting to use `index.php/` URLs
3. **Verification**: Test routes `/home`, `/about`, `/products` after implementation

**Expected Result After Implementation:**
- ✅ `https://www.nugui.co.za/home` → Works (currently 404)
- ✅ `https://www.nugui.co.za/about` → Works (currently 404)
- ✅ All CodeIgniter routes function without `/index.php/` prefix
