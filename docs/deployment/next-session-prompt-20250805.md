# Next Session Prompt - Complete NU GUI Afrihost Deployment

## Session Context
**Previous Session:** session-PL-nugui-afrihost-secure-deploy  
**Current Status:** 95% Complete - CodeIgniter Framework Partially Deployed  
**Repository:** nu-gui/nugui-website  
**Target Domain:** https://www.nugui.co.za  

## Current State Analysis

### ✅ **Successfully Completed:**
- **Git-based deployment executed** - .cpanel.yml changes merged to main (commit ad9c571)
- **Security hardening structure implemented** - All framework directories moved outside public_html
- **Most CodeIgniter framework deployed** to `/home/nuguiyhv/` level:
  - `app/` directory ✅ (Today, 6:18 AM, 0755 permissions)
  - `vendor/` directory ✅ (Today, 6:18 AM, 0755 permissions)
  - `writable/` directory ✅ (Today, 6:18 AM, 0755 permissions)
  - `.env` file ✅ (Today, 6:18 AM, 0644 permissions)
  - `composer.json` ✅ (Aug 2, 2025, 0644 permissions)
  - `composer.lock` ✅ (Yesterday, 12:47 AM, 0644 permissions)
- **Proper file permissions set** (755 directories, 644 files)
- **HTTPS redirect configured** in public/.htaccess
- **Security structure verified** - Only public assets in web root

### ❌ **Critical Missing Piece:**
- **`system` directory missing** from `/home/nuguiyhv/` root level
- **Site returns `HTTP/2 301` redirect** to `/public` instead of `200 OK`
- **CodeIgniter cannot initialize** without system directory

### 🔍 **Root Cause Identified:**
From FTP analysis, the missing `system` directory exists in:
`/home/nuguiyhv/temp_ci4/CodeIgniter4-develop/system/`

## Access Credentials

### Afrihost ClientZone (cPanel SSO)
- **URL:** https://clientzone.afrihost.com/en/login
- **Username:** wesley@nugui.co.za
- **Password:** ZaZa@040722
- **Target Dashboard:** https://clientzone.afrihost.com/en/#/ah/hosting/shared/2186045110/website-manager

### FTP Access (for verification)
- **Server:** ftp.nugui.co.za:21
- **Username:** dev@nugui.co.za
- **Password:** NUGUI@2018

### Repository Status
- **Branch:** `devin/1754387891-afrihost-secure-deploy` (9 commits)
- **PR Status:** Ready for final update after completion
- **Main Branch:** Contains merged .cpanel.yml changes

## Immediate Tasks for Next Session

### 1. Extract Missing System Directory (Priority 1)
```bash
# Via cPanel File Manager:
# 1. Navigate to /home/nuguiyhv/temp_ci4/CodeIgniter4-develop/
# 2. Copy 'system' directory to /home/nuguiyhv/ root level
# 3. Set permissions: chmod 755 /home/nuguiyhv/system
```

### 2. Verify Deployment Complete (Priority 2)
```bash
# Test commands:
curl -I https://www.nugui.co.za
# Expected: HTTP/2 200 OK (not 301 redirect)

# FTP verification:
# Confirm system/ directory exists at /home/nuguiyhv/system/
```

### 3. Enable AutoSSL (Priority 3)
- Navigate to cPanel → SSL/TLS Status
- Run AutoSSL for nugui.co.za domain
- Verify certificate installation

### 4. Final Testing & Documentation (Priority 4)
- Browser test: https://www.nugui.co.za loads properly
- Update deployment report with completion status
- Create final PR update with success confirmation

## Expected End State

### Directory Structure
```
/home/nuguiyhv/
├── public_html/          # Web-accessible only
│   ├── index.php
│   ├── .htaccess
│   └── assets/
├── app/                  ✅ EXISTS
├── system/               ❌ MISSING (extract from temp_ci4)
├── vendor/               ✅ EXISTS
├── writable/             ✅ EXISTS
├── .env                  ✅ EXISTS
└── composer.*            ✅ EXISTS
```

### Success Criteria
- `curl -I https://www.nugui.co.za` returns `HTTP/2 200 OK`
- Browser loads CodeIgniter application homepage
- AutoSSL certificate active
- All sensitive files outside web root
- Deployment report updated with completion status

## Navigation Instructions

### Accessing cPanel via Afrihost
1. Login to Afrihost ClientZone with wesley@nugui.co.za
2. Navigate to hosting dashboard
3. Click "Website Manager" or direct cPanel access
4. Use File Manager to navigate to temp_ci4 directory

### Critical Notes
- **Do NOT** use direct cPanel login (paganini.aserv.co.za:2083) - use Afrihost SSO
- **Server uses `/public` as web root** (not `/public_html`)
- **Git deployment already successful** - only system directory extraction needed
- **All security hardening complete** - framework properly outside web root

## Completion Message Template
```
✅ Deployment hardened & live  
HTTP/2 200 OK → https://www.nugui.co.za  
Report committed: docs/deployment/nu-gui-afrihost-deploy-20250805.md
```

## Session Estimate
**Expected Duration:** 1-2 ACU  
**Complexity:** Low (single directory extraction + testing)  
**Risk Level:** Minimal (framework 95% deployed, structure verified)

---
**Previous Session:** https://app.devin.ai/sessions/c26960d3816f47f6b8d2785170081bca  
**Requested by:** @nu-gui (wesley@nugui.co.za)
