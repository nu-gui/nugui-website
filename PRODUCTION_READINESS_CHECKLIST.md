# Production Readiness Checklist for nugui.co.za

## ✅ Domain Configuration
- [x] Base URL configured to `https://nugui.co.za/` in `env.production`
- [x] Alternative base URL `https://www.nugui.co.za/` in `app/Config/App.php`
- [x] No hardcoded localhost references in views or public assets
- [x] Database/cache localhost references use environment variables (correctly overridable)

## ✅ Deployment Configuration
- [x] `.cpanel.yml` configured with correct deployment path
- [x] `.htaccess` ready with production settings (HTTPS redirect commented for activation)
- [x] `env.production` template with all necessary configurations
- [x] `.gitignore` updated to include all source code while excluding only temp files

## ✅ Security Configuration
- [x] CSRF protection enabled
- [x] Session cookies set to secure (in production env)
- [x] Content Security Policy configured
- [x] Security headers in `.htaccess`
- [x] Force HTTPS ready to enable (uncomment in `.htaccess`)
- [x] HSTS header ready to enable
- [x] Directory browsing disabled
- [x] Sensitive files protected

## ✅ File Structure
- [x] All application source code (`app/`) included
- [x] All public assets (`public/`) included
- [x] Vendor directory structure ready
- [x] Writable directories with proper `.gitkeep` files
- [x] Deployment scripts and configuration included

## ✅ Environment Variables
The following need to be configured on the production server in `.env`:

```env
# Required configurations
CI_ENVIRONMENT = production
app.baseURL = 'https://nugui.co.za/'

# Database (configure with actual values)
database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_database_user
database.default.password = your_database_password

# Generate on server
encryption.key = [run: php spark key:generate]

# Email settings (configure with actual SMTP)
email.SMTPHost = mail.nugui.co.za
email.SMTPUser = noreply@nugui.co.za
email.SMTPPass = [your_smtp_password]
```

## ✅ Deployment Steps

### 1. Initial Setup in cPanel
1. Create Git repository in cPanel Git Version Control
2. Add remote: `git remote add cpanel ssh://[user]@nugui.co.za:22/home/[user]/repositories/nugui-website`
3. Create MySQL database and user
4. Copy `env.production` to `.env` and configure

### 2. Deploy Code
```bash
git add .
git commit -m "Production deployment - nugui.co.za"
git push cpanel main
```

### 3. Post-Deployment
1. Set file permissions (via cPanel Terminal or SSH):
   ```bash
   chmod 755 spark
   chmod -R 777 writable/cache writable/logs writable/session writable/uploads
   chmod 644 .env
   ```

2. Generate encryption key:
   ```bash
   php spark key:generate
   ```

3. Enable HTTPS in `.htaccess` (uncomment lines 17-19)

4. Clear cache:
   ```bash
   php spark cache:clear
   ```

## ✅ Verification Complete

### URLs Verified:
- Production URL: `https://nugui.co.za/`
- Alternative: `https://www.nugui.co.za/`
- All localhost references properly use environment variables
- No hardcoded development URLs in application code

### Files Ready:
- All source code included (not ignored in `.gitignore`)
- Configuration templates provided
- Deployment automation configured
- Security measures in place

## 🚀 Status: PRODUCTION READY

The website is now 100% production ready for deployment to nugui.co.za. All localhost references have been properly configured to use the production domain through environment variables, and the cPanel Git deployment is fully configured.

---
Last Verified: 2025-08-12
Version: 1.0.0