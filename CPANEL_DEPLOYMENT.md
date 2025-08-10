# cPanel Git™ Deployment Guide - NU GUI Website

This guide covers deployment using cPanel's Git™ Version Control feature for automatic deployment.

## 🔧 Prerequisites

### cPanel Requirements
- ✅ Valid `.cpanel.yml` file in repository root
- ✅ Clean working tree (no uncommitted changes)
- ✅ Local or remote branches configured
- ✅ cPanel Git™ Version Control enabled

### Server Requirements
- PHP 8.1 or higher
- MySQL/MariaDB database
- Composer (for dependency management)
- Sufficient disk space and memory

## 📁 Repository Structure

```
nugui-website/
├── .cpanel.yml                 # ✅ Deployment configuration
├── .env.production             # Production environment template
├── deploy-production.php       # Database setup script
├── post-deploy.sh             # Post-deployment hook
├── public/                    # Web-accessible files
├── app/                       # Application code
├── vendor/                    # PHP dependencies
└── database/                  # Migration files
```

## 🚀 Deployment Types

### 1. Automatic (Push) Deployment

When you push changes directly to the cPanel-managed repository:

```bash
# From your local development environment
git add .
git commit -m "Your changes"
git push cpanel main  # Push to cPanel repository
```

**What happens:**
1. Changes pushed to cPanel repository
2. Post-receive hook triggers automatically
3. `.cpanel.yml` deployment tasks execute
4. Post-deployment script runs
5. Website goes live immediately

### 2. Manual (Pull) Deployment

Using cPanel interface to pull changes from remote repository:

1. **Update from Remote**: Click "Update from Remote" in cPanel Git interface
2. **Deploy**: Click "Deploy HEAD Commit" to deploy changes
3. **Verify**: Check deployment status and logs

## 📝 Deployment Configuration (.cpanel.yml)

Our `.cpanel.yml` file handles:

```yaml
---
deployment:
  tasks:
    # Set deployment paths
    - export DEPLOYPATH=/home/nuguiyhv/public_html/
    - export APPPATH=/home/nuguiyhv/
    
    # Deploy public web files
    - /bin/cp -f ./public/index.php $DEPLOYPATH
    - /bin/cp -f ./public/.htaccess $DEPLOYPATH
    - /bin/rsync -a --delete ./public/assets/ $DEPLOYPATH/assets/
    # ... (additional deployment tasks)
    
    # Run post-deployment setup
    - $APPPATH/post-deploy.sh || echo "Post-deploy script completed with warnings"
```

### Key Features:
- **Secure File Handling**: Only deploys necessary files
- **Permission Management**: Sets correct file/directory permissions
- **Environment Configuration**: Uses production environment settings
- **Database Setup**: Automatically creates ticket system tables
- **Security Hardening**: Applies security headers and protections

## 🗄️ Database Setup

### Automatic Setup
The deployment includes automatic database table creation for the ticket system:

```sql
-- Tables created automatically:
tickets                  -- Main ticket information
ticket_messages         -- Email thread management
ticket_events          -- Activity logging
ticket_keyword_triggers -- Automated responses
```

### Manual Setup (if needed)
If automatic setup fails:

1. **Access cPanel MySQL**
2. **Import** `database/ticketing_system.sql`
3. **Verify** tables created successfully

## 🔒 Security Features

### Automated Security Measures
- **File Permissions**: Automatically sets secure permissions
- **Environment Protection**: `.env` files secured with 600 permissions
- **Security Headers**: Added via `.htaccess`
- **Debug Mode**: Disabled in production
- **Sensitive File Removal**: Removes files that shouldn't be web-accessible

### Security Headers Applied:
```apache
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options SAMEORIGIN  
Header always set X-XSS-Protection "1; mode=block"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

## ⚙️ Environment Configuration

### Production Environment Setup

1. **Create Production Environment**:
   ```bash
   cp .env.production .env
   ```

2. **Configure Database**:
   ```env
   database.default.hostname = localhost
   database.default.database = your_database_name
   database.default.username = your_db_user
   database.default.password = your_secure_password
   ```

3. **Configure Email**:
   ```env
   CONTACT_EMAIL_HOST = mail.nugui.co.za
   CONTACT_EMAIL_USER = info@nugui.co.za
   SUPPORT_EMAIL_USER = support@nugui.co.za
   ```

4. **Security Settings**:
   ```env
   CI_ENVIRONMENT = production
   app.forceGlobalSecureRequests = true
   encryption.key = hex2bin:your_32_byte_key_here
   ```

## 📊 Deployment Process

### Step-by-Step Process

1. **Pre-Deployment**:
   - Code committed to repository
   - Tests passing
   - Clean working directory

2. **Deployment Execution**:
   ```
   cPanel Git Hook Triggered
   ↓
   .cpanel.yml Tasks Execute
   ↓
   Files Copied to Production
   ↓
   Permissions Set
   ↓
   Post-Deploy Script Runs
   ↓
   Database Tables Created
   ↓
   Security Headers Applied
   ↓
   Deployment Complete
   ```

3. **Post-Deployment**:
   - Verification scripts run
   - Logs generated
   - Status reported

### File Deployment Map

```
Repository File          → Production Location
══════════════════════════════════════════════════
./public/index.php       → /home/nuguiyhv/public_html/index.php
./public/.htaccess       → /home/nuguiyhv/public_html/.htaccess
./public/assets/         → /home/nuguiyhv/public_html/assets/
./app/                   → /home/nuguiyhv/app/
./vendor/                → /home/nuguiyhv/vendor/
./.env.production        → /home/nuguiyhv/.env
./database/              → /home/nuguiyhv/database/
```

## 🔍 Verification & Testing

### Automatic Verification
The deployment script automatically checks:
- ✅ Database connection
- ✅ Required tables exist
- ✅ File permissions correct
- ✅ Environment configured
- ✅ Security settings applied

### Manual Verification Checklist
After deployment, verify:

- [ ] **Website loads**: https://nugui.co.za
- [ ] **Forms work**: Contact, Support, Partner Program
- [ ] **Database connected**: Check ticket creation
- [ ] **Email delivery**: Test form submissions
- [ ] **SSL certificate**: Verify HTTPS works
- [ ] **Security headers**: Check with online tools

## 📝 Logs & Monitoring

### Deployment Logs
Check these locations for deployment information:

```bash
# Deployment status
/home/nuguiyhv/writable/deployment-status.txt

# Application logs  
/home/nuguiyhv/writable/logs/

# Deployment history
/home/nuguiyhv/writable/logs/deployment.log
```

### Log Monitoring
```bash
# Check deployment status
cat /home/nuguiyhv/writable/deployment-status.txt

# View recent logs
tail -f /home/nuguiyhv/writable/logs/log-*.php

# Check error logs
tail -f /home/nuguiyhv/public_html/error_log
```

## 🚨 Troubleshooting

### Common Issues & Solutions

#### 1. Deployment Fails
**Symptoms**: cPanel shows deployment error
```bash
# Check .cpanel.yml syntax
yamllint .cpanel.yml

# Verify file permissions
ls -la .cpanel.yml

# Check repository status
git status
```

#### 2. Database Connection Failed
**Symptoms**: Website shows database errors
```bash
# Verify database credentials
cat /home/nuguiyhv/.env | grep database

# Test connection manually
mysql -h localhost -u username -p database_name
```

#### 3. File Permission Issues
**Symptoms**: Website shows permission errors
```bash
# Fix permissions manually
find /home/nuguiyhv -type d -exec chmod 755 {} \;
find /home/nuguiyhv -type f -exec chmod 644 {} \;
chmod -R 775 /home/nuguiyhv/writable
```

#### 4. Email Not Working
**Symptoms**: Forms submit but no emails sent
```bash
# Check email configuration
cat /home/nuguiyhv/.env | grep EMAIL

# Test SMTP connection
telnet mail.nugui.co.za 587
```

### Getting Help

1. **Check Deployment Logs**: Always check logs first
2. **cPanel Support**: Use cPanel's support system
3. **Repository Issues**: Check GitHub issues
4. **Emergency Contact**: support@nugui.co.za

## 📚 Additional Resources

### cPanel Documentation
- [Git™ Version Control](https://docs.cpanel.net/cpanel/files/git-version-control/)
- [Deployment Configuration](https://docs.cpanel.net/cpanel/files/git-version-control/#deployment)

### CodeIgniter Documentation
- [Installation Guide](https://codeigniter.com/user_guide/installation/index.html)
- [Configuration](https://codeigniter.com/user_guide/general/configuration.html)

## 🔄 Update Process

### Regular Updates
```bash
# 1. Make changes locally
git add .
git commit -m "Update description"

# 2. Push to cPanel (automatic deployment)
git push cpanel main

# 3. Verify deployment
curl -I https://nugui.co.za
```

### Rollback Procedure
```bash
# 1. Revert to previous commit
git revert HEAD

# 2. Push revert (triggers deployment)
git push cpanel main

# 3. Or manually reset in cPanel Git interface
```

## ✅ Production Ready Checklist

Before going live, ensure:

- [ ] **Environment**: `.env` configured with production values
- [ ] **Database**: Connection working, tables created
- [ ] **Email**: SMTP configured and tested
- [ ] **SSL**: Certificate installed and working
- [ ] **Security**: Headers applied, debug mode off
- [ ] **Testing**: All forms and features tested
- [ ] **Monitoring**: Logs configured, alerts set up
- [ ] **Backup**: Database and files backed up
- [ ] **DNS**: Domain pointing to correct server

## 🎯 Success Indicators

Deployment is successful when:
- ✅ Website loads without errors
- ✅ All forms submit correctly
- ✅ Emails are delivered
- ✅ Tickets are created in database
- ✅ SSL certificate shows valid
- ✅ No PHP errors in logs
- ✅ Performance is acceptable

---

**Need Help?** Contact our support team at support@nugui.co.za or check the troubleshooting section above.