# NU GUI Server Cleanup Analysis
**Date:** August 7, 2025  
**Server:** ftp.nugui.co.za  
**Root Path:** `/home/nuguiyhv/`  

## Current Server Status
- ✅ **Website Functional:** https://www.nugui.co.za loads correctly
- ✅ **Production Mode:** CodeIgniter debug toolbar removed (CI_ENVIRONMENT = production)
- ⚠️ **Asset Issues:** 404 errors for logo filename mismatch and missing main.js
- ✅ **CodeIgniter Framework:** All directories properly positioned at root level

## Recent Fixes Applied
1. **Environment Configuration:** Updated .env file to set CI_ENVIRONMENT = production
2. **Debug Toolbar Removed:** Website no longer shows development mode toolbar
3. **Asset Investigation:** Identified filename mismatches and missing files

## Asset Issues Identified
- **Logo File:** Exists as "NUGU-LOGOI-4 - Light.png" but code expects "NUGU-LOGO-4 - Light.png"
- **Missing JS:** main.js file not found in assets/js directory
- **Service Worker:** sw.js file missing (404 error)

## Server Directory Structure Analysis

### Root Level (`/home/nuguiyhv/`)
```
├── app/                          # ✅ KEEP - Active CodeIgniter application
├── system/                       # ✅ KEEP - Active CodeIgniter framework
├── vendor/                       # ✅ KEEP - Active Composer dependencies
├── writable/                     # ✅ KEEP - Active CodeIgniter writable directory
├── public_html/                  # ✅ KEEP - Web root directory
├── .env                          # ✅ KEEP - Environment configuration
├── composer.json                 # ✅ KEEP - Composer configuration
├── composer.lock                 # ✅ KEEP - Composer lock file
├── archives/                     # ✅ KEEP - Archive directory (created during cleanup)
│   ├── duplicate_frameworks/     # ✅ ARCHIVED - Duplicate CodeIgniter files
│   ├── development_scripts/      # 📋 TO CREATE - PowerShell scripts
│   ├── test_files/              # 📋 TO CREATE - PHP diagnostic files
│   ├── documentation/           # 📋 TO CREATE - Excessive documentation
│   └── backups/                 # 📋 TO CREATE - Large backup files
├── repositories/                 # 🗂️ TO ARCHIVE - Git deployment directory
│   └── nugui-web/              # 🗂️ TO ARCHIVE - Original repo (needs replacement)
└── backup_pre_hardening_20250805/ # 🗂️ TO ARCHIVE - Pre-deployment backup
```

### Files to Archive
- `Composer-Setup.exe` (1.8MB) → archives/development_binaries/
- Large backup files → archives/backups/
- `/repositories/nugui-web/` → archives/git_deployment_original/

## Cleanup Plan Execution

### Phase 1: Server Archive Structure Creation ✅ COMPLETED
- Created `/archives/duplicate_frameworks/` ✅
- Moved duplicate CodeIgniter directories ✅

### Phase 2: Additional Archive Directories
- Create `/archives/development_binaries/`
- Create `/archives/git_deployment_original/`
- Create `/archives/backups/`

### Phase 3: File Archival
- Move `Composer-Setup.exe` to development_binaries
- Archive `/repositories/nugui-web/` directory
- Archive `backup_pre_hardening_20250805/` directory

## Rollback Mapping
| Original Location | Archive Location | Purpose |
|------------------|------------------|---------|
| `/public_html/app/` | `/archives/duplicate_frameworks/app/` | Duplicate framework |
| `/public_html/system/` | `/archives/duplicate_frameworks/system/` | Duplicate framework |
| `/public_html/vendor/` | `/archives/duplicate_frameworks/vendor/` | Duplicate framework |
| `/public_html/writable/` | `/archives/duplicate_frameworks/writable/` | Duplicate framework |
| `/Composer-Setup.exe` | `/archives/development_binaries/Composer-Setup.exe` | Development binary |
| `/repositories/nugui-web/` | `/archives/git_deployment_original/nugui-web/` | Original Git deployment |
| `/backup_pre_hardening_20250805/` | `/archives/backups/backup_pre_hardening_20250805/` | Pre-deployment backup |

## Next Steps
1. Create additional archive directories
2. Archive remaining development files
3. Archive Git deployment directory
4. Test website functionality
5. Proceed with repository cleanup
