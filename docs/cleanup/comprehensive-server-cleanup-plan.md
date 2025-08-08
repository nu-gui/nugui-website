# Comprehensive Server Cleanup Plan - NU GUI Website

## Current Server State Analysis (August 7, 2025)

### ✅ Framework Status - RESTORED
- **app/** - Aug 5 00:27 (4096 bytes) - CodeIgniter application directory ✅
- **system/** - Aug 5 00:27 (4096 bytes) - CodeIgniter system directory ✅  
- **writable/** - Aug 5 00:27 (4096 bytes) - CodeIgniter writable directory ✅
- **vendor/** - Aug 5 00:33 (4096 bytes) - Composer dependencies ✅
- **composer.json** - Aug 5 00:27 (1299 bytes) - Composer configuration ✅
- **composer.lock** - Aug 5 00:27 (86464 bytes) - Composer lock file ✅

### 📁 Directory Structure Overview
```
/home/nuguiyhv/
├── app/                    # CodeIgniter app (RESTORED)
├── system/                 # CodeIgniter system (RESTORED)  
├── writable/              # CodeIgniter writable (RESTORED)
├── vendor/                # Composer dependencies (RESTORED)
├── public_html/           # Web root directory
├── archives/              # Existing cleanup archives (Aug 7 09:56)
├── tmp/                   # Temporary files (12288 bytes)
├── logs/                  # Server logs
├── ssl/                   # SSL certificates
├── bin/                   # Binary files
├── php/                   # PHP configurations
├── etc/                   # Configuration files
└── [various subdomain directories]
```

### 🎯 Cleanup Targets Identified

#### High Priority - Large Space Consumers
1. **tmp/** - 12288 bytes (Aug 5 22:14) - Investigate for cleanup candidates
2. **archives/** - Already exists, may contain previous cleanup work
3. **logs/** - Server logs directory for potential rotation
4. **Various subdomain directories** - Multiple SMS/SIP service directories

#### Medium Priority - Configuration Files
1. **php/** - PHP configuration files (Jun 19 12:31)
2. **ssl/** - SSL certificate files (Jul 9 22:25)
3. **etc/** - System configuration files (Aug 6 11:49)

#### Low Priority - System Files
1. **bin/** - Binary files (Jun 19 12:31)
2. **perl5/** - Perl modules (Mar 20 2019)
3. **quarantine/** - Quarantine directory (Aug 5 01:18)

### 🔒 Protected Directories (DO NOT MODIFY)
- **app/** - Active CodeIgniter application
- **system/** - Active CodeIgniter system
- **writable/** - Active CodeIgniter writable
- **vendor/** - Active Composer dependencies
- **public_html/** - Active web root
- **mail/** - Active mail system
- **ssl/** - Active SSL certificates
- **.ssh/** - SSH configuration
- **logs/** - Active logging system

### 📋 Cleanup Strategy

#### Phase 1: Investigation & Documentation
1. ✅ Map current directory structure via FTP
2. ✅ Identify framework restoration status
3. ✅ Document protected vs cleanup candidate directories
4. 🔄 Create detailed file inventory for tmp/ and archives/

#### Phase 2: Safe Archival (If Needed)
1. Investigate tmp/ directory contents for outdated files
2. Review archives/ directory for consolidation opportunities
3. Check for duplicate or outdated configuration files
4. Create additional archive subdirectories if needed

#### Phase 3: Repository Cleanup (Parallel)
1. Remove development binaries from repository
2. Organize PowerShell scripts into deployment vs archived
3. Archive test and diagnostic files
4. Consolidate documentation

### 🚨 Safety Measures
- All moves documented with exact original locations
- Files moved to archives, never deleted
- Systematic testing after each phase
- Git deployment mechanism preservation verified
- Rollback mapping maintained for all changes

### ✅ Current Status
- **Website Status**: ✅ ONLINE at https://www.nugui.co.za
- **Framework Status**: ✅ FULLY RESTORED
- **Image Updates**: ✅ COMPLETED (new 1/2 naming convention)
- **Theme Switching**: ✅ IMPLEMENTED
- **Ready for Cleanup**: ✅ YES

## Repository Cleanup Progress

### Phase 1: Create Archive Structure ✅
```bash
mkdir -p archived/binaries archived/test_files archived/temp_ci4 scripts/deployment scripts/archived
```

### Phase 2: Move Development Binaries
- Composer-Setup.exe → archived/binaries/
- codeigniter4.zip → archived/binaries/

### Phase 3: Organize PowerShell Scripts
**Deployment Scripts (Keep Active):**
- quick_setup.ps1 → scripts/deployment/
- setup_environment.ps1 → scripts/deployment/

**Archive Scripts (Development Only):**
- cleanup_project.ps1 → scripts/archived/
- install_php_composer.ps1 → scripts/archived/
- FINAL_STATUS.ps1 → scripts/archived/
- SESSION_COMPLETE.ps1 → scripts/archived/
- SETUP_COMPLETE.ps1 → scripts/archived/
- PHP84_UPDATE_COMPLETE.ps1 → scripts/archived/

### Phase 4: Archive Test Files
- debug_check.php → archived/test_files/
- test_fixes.php → archived/test_files/
- project_diagnostic.php → archived/test_files/

### Phase 5: Archive Temporary Files
- temp_ci4/ → archived/temp_ci4/
- env (duplicate) → archived/test_files/

## Next Steps
1. ✅ Complete repository cleanup (development files, scripts organization)
2. ✅ Fix website routing issue via FTP (index.php and .htaccess uploaded)
3. ✅ Complete image reference updates to new 1/2 naming convention
4. 🔄 Stage and commit all repository cleanup changes
5. Test website functionality and theme switching
6. Document final completion status

## Website Status Update (Aug 7, 2025 13:57 UTC)
- **Server Response**: ✅ HTTP/2 200 OK (confirmed via curl)
- **HTML Content**: ✅ Website content loading successfully
- **Routing Fix**: ✅ Uploaded corrected index.php and minimal .htaccess via FTP
- **Environment**: ✅ Set to production (CI_ENVIRONMENT = production)
- **Image Updates**: ✅ All 36 new images with 1/2 naming convention implemented
- **Theme Switching**: ✅ CSS classes added for light/dark theme switching
