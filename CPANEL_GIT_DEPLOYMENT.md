# cPanel Git Version Control Deployment Guide

This guide provides instructions for deploying the NU GUI website using cPanel's Git Version Control feature.

## 📋 Prerequisites

- cPanel account with Git Version Control feature enabled
- SSH access to your hosting account (optional but recommended)
- Git installed on your local machine
- Repository access (GitHub account with proper permissions)

## 🚀 Quick Setup (Push Deployment - Recommended)

### Step 1: Create Repository in cPanel

1. Log into your cPanel account
2. Navigate to **Files → Git Version Control**
3. Click **Create** to create a new repository
4. Configure:
   - **Clone URL**: Leave empty (we'll create an empty repository)
   - **Repository Path**: `/home/your_username/repositories/nugui-website`
   - **Repository Name**: nugui-website
5. Click **Create**

### Step 2: Configure Local Repository

```bash
# Clone your GitHub repository locally
git clone https://github.com/nu-gui/nugui-website.git
cd nugui-website

# Add cPanel repository as remote
git remote add cpanel ssh://your_username@your-domain.com:22/home/your_username/repositories/nugui-website

# Verify remotes
git remote -v
```

### Step 3: Update .cpanel.yml

Edit the `.cpanel.yml` file and update the deployment path:

```yaml
deployment:
  tasks:
    - export DEPLOYPATH=/home/your_username/public_html/
    # ... rest of configuration
```

### Step 4: Configure Production Environment

1. Copy `env.production` to `.env`:
```bash
cp env.production .env
```

2. Update `.env` with your production values:
   - Database credentials
   - Email settings
   - Base URL
   - Generate encryption key: `php spark key:generate`

### Step 5: Push to cPanel Repository

```bash
# Commit your changes
git add .
git commit -m "Configure for production deployment"

# Push to cPanel repository
git push cpanel main
```

## 📝 Important Configuration Steps

### 1. Update .htaccess for HTTPS

In production, uncomment these lines in `.htaccess`:

```apache
# Force HTTPS
RewriteCond %{HTTPS} !=on
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]

# Enable HSTS
Header set Strict-Transport-Security "max-age=31536000; includeSubDomains"
```

### 2. Database Setup

1. Create MySQL database in cPanel
2. Create database user with full privileges
3. Update `.env` with database credentials

### 3. Email Configuration

Update `.env` with your SMTP settings:

```env
email.protocol = 'smtp'
email.SMTPHost = 'mail.your-domain.com'
email.SMTPUser = 'noreply@your-domain.com'
email.SMTPPass = 'your-password'
email.SMTPPort = 587
email.SMTPCrypto = 'tls'
```

### 4. Set Proper Permissions

After deployment, ensure proper permissions:

```bash
# Via SSH or cPanel Terminal
cd /home/your_username/public_html
chmod 755 spark
chmod -R 777 writable/cache
chmod -R 777 writable/logs
chmod -R 777 writable/session
chmod -R 777 writable/uploads
chmod 644 .env
```

## 🔄 Alternative: Pull Deployment

If you prefer to pull from GitHub directly:

### Step 1: Clone from GitHub in cPanel

1. Navigate to **Files → Git Version Control**
2. Click **Create**
3. Enter GitHub repository URL: `https://github.com/nu-gui/nugui-website.git`
4. Set Repository Path
5. Click **Create**

### Step 2: Deploy Changes

1. Go to **Git Version Control**
2. Click **Manage** for your repository
3. Click **Pull or Deploy** tab
4. Click **Update from Remote** to pull changes
5. Click **Deploy HEAD Commit** to deploy

## 🛠️ Troubleshooting

### Common Issues

1. **500 Internal Server Error**
   - Check `.htaccess` syntax
   - Verify PHP version (requires PHP 7.4+)
   - Check error logs in `writable/logs/`

2. **Database Connection Failed**
   - Verify database credentials in `.env`
   - Ensure database user has proper privileges
   - Check if database server is accessible

3. **Email Not Sending**
   - Verify SMTP settings
   - Check if port 587/465 is open
   - Test with different email protocol (mail/sendmail)

4. **Assets Not Loading**
   - Check if mod_rewrite is enabled
   - Verify `.htaccess` is present
   - Clear browser cache

### Debug Mode

To enable debug mode temporarily:

1. Edit `.env`:
```env
CI_ENVIRONMENT = development
```

2. Remember to change back to `production` after debugging

## 📁 File Structure After Deployment

```
public_html/
├── .cpanel.yml          # Deployment configuration
├── .env                 # Environment configuration
├── .htaccess           # Apache configuration
├── index.php           # Entry point
├── spark               # CLI tool
├── app/                # Application files
├── public/             # Public assets
│   ├── css/
│   ├── js/
│   └── assets/
├── vendor/             # Composer dependencies
└── writable/           # Writable directories
    ├── cache/
    ├── logs/
    ├── session/
    └── uploads/
```

## 🔒 Security Checklist

- [ ] Force HTTPS enabled
- [ ] Debug mode disabled (`CI_ENVIRONMENT = production`)
- [ ] Sensitive files protected via `.htaccess`
- [ ] Database password is strong
- [ ] Email passwords are secure
- [ ] CSRF protection enabled
- [ ] Session cookies set to secure
- [ ] Error display disabled in production
- [ ] Directory listing disabled
- [ ] Unnecessary files removed (tests, docs, etc.)

## 📞 Support

If you encounter issues:

1. Check error logs: `writable/logs/`
2. Review cPanel error log
3. Verify all configuration files
4. Contact hosting support if server-related

## 🔄 Updates and Maintenance

To update the website:

1. Make changes locally
2. Test thoroughly
3. Commit changes: `git commit -am "Update description"`
4. Push to cPanel: `git push cpanel main`
5. Changes deploy automatically via `.cpanel.yml`

## 📌 Important Notes

- Always backup before major updates
- Test in staging environment first if available
- Monitor error logs after deployment
- Keep `.env` file secure and never commit to Git
- Regular security updates for CodeIgniter framework

---

Last Updated: 2025-08-12
Version: 1.0.0