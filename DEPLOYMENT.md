# Deployment Guide for NU GUI Website on Afrihost

This guide provides detailed instructions for deploying the NU GUI website on Afrihost's hosting platform using various deployment methods.

## Table of Contents

1. [Pre-Deployment Checklist](#pre-deployment-checklist)
2. [Option 1: cPanel Deployment (Recommended)](#option-1-cpanel-deployment-recommended)
3. [Option 2: Docker Deployment](#option-2-docker-deployment)
4. [Option 3: FTP/SSH Deployment](#option-3-ftpssh-deployment)
5. [Post-Deployment Configuration](#post-deployment-configuration)
6. [Troubleshooting](#troubleshooting)

## Pre-Deployment Checklist

Before deploying, ensure you have:

- [ ] Afrihost hosting account with cPanel access
- [ ] Domain name configured in Afrihost DNS
- [ ] SSL certificate (Let's Encrypt or custom)
- [ ] Database credentials ready
- [ ] SMTP email credentials for contact forms
- [ ] Google reCAPTCHA keys
- [ ] Backup of any existing website data

## Option 1: cPanel Deployment (Recommended)

### Step 1: Prepare Your Files Locally

```bash
# Clone the repository
git clone https://github.com/nu-gui/nugui-website.git
cd nugui-website

# Install PHP dependencies (production mode)
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build CSS
npm install
npm run build:css

# Create production .env file
cp .env .env.production
```

### Step 2: Configure Production Environment

Edit `.env.production`:

```env
# Application
CI_ENVIRONMENT = production
app.baseURL = 'https://nugui.co.za/'
app.forceGlobalSecureRequests = true

# Database (from cPanel MySQL Database)
database.default.hostname = localhost
database.default.database = your_cpanel_db_name
database.default.username = your_cpanel_db_user
database.default.password = your_cpanel_db_pass
database.default.DBDriver = MySQLi

# Email Configuration
SMTP_HOST = mail.nugui.co.za
SMTP_PORT = 465
SMTP_CRYPTO = ssl
CONTACT_EMAIL_USER = info@nugui.co.za
CONTACT_EMAIL_PASS = your_email_password
SUPPORT_EMAIL_USER = support@nugui.co.za
SUPPORT_EMAIL_PASS = your_email_password

# reCAPTCHA
RECAPTCHA_SECRET_KEY = your_recaptcha_secret_key
```

### Step 3: Database Setup via cPanel

1. **Login to cPanel**
2. **Navigate to "MySQL Databases"**
3. **Create a new database**:
   - Database name: `nugui_website`
4. **Create a database user**:
   - Username: `nugui_user`
   - Generate strong password
5. **Add user to database**:
   - Select the user and database
   - Grant ALL PRIVILEGES
6. **Note the credentials** for your `.env` file

### Step 4: Configure PHP Version

1. **Open MultiPHP Manager** in cPanel
2. **Select your domain**
3. **Choose PHP 8.1** or higher
4. **Apply changes**

### Step 5: Configure PHP Settings

1. **Open MultiPHP INI Editor** in cPanel
2. **Select your domain**
3. **Configure these settings**:

```ini
max_execution_time = 300
max_input_time = 300
memory_limit = 256M
post_max_size = 20M
upload_max_filesize = 20M
display_errors = Off
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT
date.timezone = "Africa/Johannesburg"
```

### Step 6: Upload Files via File Manager

1. **Open File Manager** in cPanel
2. **Navigate to your domain root** (usually `public_html`)
3. **Create directory structure**:

```
/home/username/
├── nugui_app/          # Create this directory
│   ├── app/
│   ├── system/
│   ├── vendor/
│   ├── writable/       # Set permissions to 755
│   └── .env            # Upload your production .env here
└── public_html/        # Your web root
    ├── assets/         # From public/assets
    ├── .htaccess       # From public/.htaccess
    └── index.php       # Modified (see below)
```

4. **Modify `public_html/index.php`**:

```php
<?php

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Location of the Paths config file.
// This is the line that might need to be changed, should you choose to use this.
require realpath(FCPATH . '../nugui_app/app/Config/Paths.php') ?: FCPATH . '../nugui_app/app/Config/Paths.php';

// Location of the framework bootstrap file.
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load CodeIgniter
require_once SYSTEMPATH . 'CodeIgniter.php';
```

5. **Set proper permissions**:
   - Directories: 755
   - Files: 644
   - writable/ directory: 755 (recursive)

### Step 7: Run Database Migrations

1. **Access SSH** (if available) or use **cPanel Terminal**
2. **Navigate to application directory**:

```bash
cd ~/nugui_app
php spark migrate
```

Alternatively, create a temporary migration script `migrate.php` in public_html:

```php
<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
require realpath(FCPATH . '../nugui_app/app/Config/Paths.php');
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Run migrations
$migrate = \Config\Services::migrations();
try {
    $migrate->latest();
    echo "Migrations completed successfully!";
} catch (\Exception $e) {
    echo "Migration failed: " . $e->getMessage();
}
```

Access via browser, then delete the file.

### Step 8: Configure Email Accounts

1. **Navigate to "Email Accounts"** in cPanel
2. **Create email accounts**:
   - info@nugui.co.za
   - support@nugui.co.za
3. **Note the email settings** for SMTP configuration

### Step 9: SSL Certificate Setup

1. **Navigate to "SSL/TLS"** in cPanel
2. **Use Let's Encrypt** (free option):
   - Select your domain
   - Issue certificate
3. **Or install custom certificate** if you have one

### Step 10: Configure .htaccess for Security

Add to `public_html/.htaccess`:

```apache
# Force HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]

# Security headers
Header set X-Frame-Options "SAMEORIGIN"
Header set X-Content-Type-Options "nosniff"
Header set X-XSS-Protection "1; mode=block"

# Hide server signature
ServerSignature Off

# Prevent directory listing
Options -Indexes
```

## Option 2: Docker Deployment

If Afrihost supports Docker containers or VPS with Docker:

### Step 1: Prepare Docker Images

```bash
# Build production image
docker build -t nugui-website:production .

# Or use docker-compose
docker-compose -f docker-compose.yml build
```

### Step 2: Deploy via Docker Compose

1. **Upload docker-compose.yml** to your VPS
2. **Create `.env.production`** with production values
3. **Run the containers**:

```bash
docker-compose up -d
```

### Step 3: Configure Reverse Proxy

If using Afrihost's load balancer or nginx:

```nginx
server {
    listen 80;
    server_name nugui.co.za www.nugui.co.za;
    
    location / {
        proxy_pass http://localhost:8080;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}
```

## Option 3: FTP/SSH Deployment

### Using FTP Client (FileZilla)

1. **Connect to Afrihost FTP**:
   - Host: ftp.nugui.co.za or assigned FTP server
   - Username: Your cPanel username
   - Password: Your cPanel password
   - Port: 21 (or 22 for SFTP)

2. **Upload files**:
   - Local: All files except `.git`, `node_modules`, `.env`
   - Remote: Follow directory structure from Option 1

3. **Set permissions** via FTP client:
   - Right-click → File permissions
   - Directories: 755
   - Files: 644

### Using SSH (if available)

```bash
# Connect via SSH
ssh username@nugui.co.za

# Clone repository
cd ~
git clone https://github.com/nu-gui/nugui-website.git nugui_app

# Install dependencies
cd nugui_app
composer install --no-dev --optimize-autoloader

# Copy public files
cp -r public/* ~/public_html/

# Update index.php paths
nano ~/public_html/index.php

# Run migrations
php spark migrate
```

## Post-Deployment Configuration

### 1. Verify Installation

- [ ] Access https://nugui.co.za
- [ ] Check all pages load correctly
- [ ] Test contact forms
- [ ] Verify partner program submission
- [ ] Check email delivery
- [ ] Test reCAPTCHA

### 2. Performance Optimization

1. **Enable caching** in `.env`:

```env
# Cache
cache.handler = file
cache.backupHandler = dummy
```

2. **Configure OPcache** in MultiPHP INI Editor:

```ini
opcache.enable = 1
opcache.memory_consumption = 128
opcache.max_accelerated_files = 10000
opcache.revalidate_freq = 60
```

3. **Enable Gzip compression** in .htaccess:

```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/json
</IfModule>
```

### 3. Security Hardening

1. **Protect sensitive files** in .htaccess:

```apache
# Protect .env file
<Files .env>
    Order allow,deny
    Deny from all
</Files>

# Protect .git directory
<IfModule mod_rewrite.c>
    RewriteRule ^\.git/ - [F,L]
</IfModule>
```

2. **Set secure cookie settings** in `.env`:

```env
cookie.secure = true
cookie.httponly = true
cookie.samesite = Lax
```

### 4. Monitoring and Backups

1. **Set up automated backups** in cPanel:
   - Navigate to "Backup"
   - Configure automated backups
   - Include database and files

2. **Monitor error logs**:
   - Check `writable/logs/` directory
   - Review cPanel error logs
   - Set up email alerts for errors

3. **Configure uptime monitoring**:
   - Use Afrihost's monitoring tools
   - Or set up external monitoring (UptimeRobot, Pingdom)

## Troubleshooting

### Common Issues and Solutions

#### 1. 500 Internal Server Error

**Causes**:
- Incorrect file permissions
- PHP version mismatch
- Missing PHP extensions

**Solutions**:
```bash
# Fix permissions
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod -R 755 writable/

# Check PHP version
php -v

# Check error logs
tail -f writable/logs/log-*.php
```

#### 2. Database Connection Failed

**Check**:
- Database credentials in `.env`
- Database server is localhost or specific host
- User has proper permissions

**Test connection**:
```php
<?php
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
```

#### 3. Email Not Sending

**Check**:
- SMTP settings in `.env`
- Email account passwords
- Port 465 (SSL) or 587 (TLS) is open
- SPF/DKIM records in DNS

**Test email**:
```bash
php spark email:test
```

#### 4. Assets Not Loading

**Check**:
- Base URL in `.env` includes trailing slash
- .htaccess RewriteBase is correct
- Asset paths in views are correct

#### 5. Session Issues

**Solutions**:
- Ensure `writable/session/` has write permissions
- Check session save path in php.ini
- Verify cookie domain settings

### Getting Help

1. **Check logs**:
   - Application: `writable/logs/`
   - Server: cPanel → Errors
   - PHP: Enable display_errors temporarily

2. **Afrihost Support**:
   - Technical support ticket
   - Live chat for urgent issues
   - Knowledge base articles

3. **CodeIgniter Resources**:
   - [CodeIgniter4 User Guide](https://codeigniter.com/user_guide/)
   - [CodeIgniter Forum](https://forum.codeigniter.com/)
   - [Stack Overflow](https://stackoverflow.com/questions/tagged/codeigniter-4)

## Maintenance

### Regular Tasks

1. **Weekly**:
   - Check error logs
   - Monitor disk usage
   - Review security alerts

2. **Monthly**:
   - Update dependencies (security patches)
   - Review and optimize database
   - Check backup integrity

3. **Quarterly**:
   - Performance audit
   - Security scan
   - Update PHP version if needed

### Update Procedure

```bash
# Backup current version
tar -czf backup-$(date +%Y%m%d).tar.gz ~/nugui_app ~/public_html

# Pull updates
cd ~/nugui_app
git pull origin main

# Update dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build:css

# Run migrations
php spark migrate

# Clear cache
php spark cache:clear
```

## Recent Production Updates

### Security Enhancements (Latest Release)
- ✅ **Enhanced CSRF Protection**: Token randomization enabled for production
- ✅ **Secure Session Management**: Production-ready session configuration
- ✅ **Input Validation**: Comprehensive anti-bot protection measures
- ✅ **SSL/HTTPS Enforcement**: Force secure connections in production
- ✅ **Debug Code Removal**: All console.log and debug statements cleaned up

### Bug Fixes Applied
- ✅ **Contact Form Icons**: Fixed success/error icon assignment (checkmark vs X)
- ✅ **Partner Program Email**: Corrected to use sales@nugui.co.za
- ✅ **Theme Compatibility**: Fixed button visibility in light theme
- ✅ **Form Confirmations**: Enhanced modal system with proper theming

### Features Added
- ✅ **Complete Ticket System**: Support ticket management with MySQL backend
- ✅ **Enhanced Modals**: Theme-aware confirmation dialogs with download/copy features
- ✅ **Email Threading**: Advanced email management with Message-ID tracking
- ✅ **Anti-Bot Protection**: Multi-layered bot detection and prevention

### Production Configuration Files
- `.env.production` - Complete production environment template
- `DEPLOYMENT.md` - This comprehensive deployment guide
- Enhanced security settings in `app/Config/Security.php`

### Database Tables (Auto-Created)
The application will automatically create these production tables:
```sql
-- Support ticket system tables
tickets                  -- Main ticket information
ticket_messages         -- Email thread messages  
ticket_events          -- Ticket activity logging
ticket_keyword_triggers -- Automated response system
```

### Production Checklist Before Deploy
- [ ] Update `.env` with production database credentials
- [ ] Configure SMTP email settings for info@nugui.co.za and support@nugui.co.za
- [ ] Generate new encryption key: `openssl rand -hex 32`
- [ ] Set `CI_ENVIRONMENT = production`
- [ ] Enable `app.forceGlobalSecureRequests = true`
- [ ] Configure SSL certificate
- [ ] Test email delivery end-to-end
- [ ] Verify all forms submit correctly
- [ ] Test ticket creation workflow
- [ ] Confirm partner program applications work
- [ ] Validate anti-bot protection is active

## Conclusion

This deployment guide covers the main options for deploying the NU GUI website on Afrihost. The recommended approach is using cPanel with proper directory structure separation for security. 

The latest release includes significant security enhancements, bug fixes, and new features that make the application production-ready. Always test in a staging environment first and maintain regular backups.

For additional support, contact:
- Afrihost Support: [support portal]  
- NU GUI Team: support@nugui.co.za