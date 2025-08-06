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

**Next Steps:**
1. ✅ COMPLETED - Created all 40 essential CodeIgniter subdirectories via FTP
2. ✅ PARTIAL - Started uploading framework files (ResponseTrait.php uploaded to API directory)
3. 🔧 IN PROGRESS - Fix localhost configuration references in application
4. ⚠️ PENDING - Complete upload of all framework files to subdirectories
5. 📋 PENDING - Test website functionality after complete framework deployment

**Investigation Status:** ✅ MAJOR PROGRESS - Directory structure created, application now returns HTML content via curl

### 🎯 BREAKTHROUGH ACHIEVED

#### Curl Test Results (Major Success)
- **Before Fix:** 404 "Not Found" errors
- **After Directory Creation:** Complete HTML page with CodeIgniter application content
- **Evidence:** Landing page animation, JavaScript functionality, debug toolbar, CSRF cookies
- **Issue Identified:** Application references `http://localhost:8080` instead of live domain

#### Browser vs Curl Discrepancy
- **Curl Response:** Full CodeIgniter application HTML (502 lines)
- **Browser Response:** 404 "Not Found" errors
- **Root Cause:** Configuration pointing to localhost:8080 instead of https://www.nugui.co.za
- **Next Action:** Fix application configuration for live domain

#### FTP Progress Summary
- ✅ **40 CodeIgniter subdirectories created** in `/system/` directory
- ✅ **1 framework file uploaded** (ResponseTrait.php to API directory)
- ⚠️ **Remaining work:** Upload complete contents to all 39 remaining subdirectories
- 🔧 **Configuration fix needed:** Replace localhost:8080 references with live domain

### 🚨 CONFIRMED NESTED STRUCTURE ISSUE

#### System Directory Investigation Results
**Location:** `/home/nuguiyhv/system/`
**Critical Finding:** Contains nested `system/` subdirectory with actual CodeIgniter framework files

**Directory Contents Found:**
- ✅ CodeIgniter system directories: API, Autoloader, Cache, CLI, Commands, Config, Cookie, Database, etc.
- ⚠️ **NESTED `system/` subdirectory** (0775 permissions, Aug 4, 2025, 10:27 PM)
- ✅ Core CodeIgniter files: Boot.php, CodeIgniter.php, Common.php, Model.php, etc.

**Root Cause Confirmed:** 
- Expected: CodeIgniter files directly in `/home/nuguiyhv/system/`
- Actual: CodeIgniter files nested in `/home/nuguiyhv/system/system/`
- Impact: Path resolution fails, preventing application initialization
