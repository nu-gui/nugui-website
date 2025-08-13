# Professional Development & Deployment Workflow

## 🏗️ Architecture Overview

```
Local Development → GitHub → cPanel Git → Production Server
```

## 🔧 Local Development Setup

### Initial Setup (One Time)
```bash
# Clone repository
git clone https://github.com/nu-gui/nugui-website.git
cd nugui-website

# Install dependencies
make install

# Copy environment file
cp env .env
# Edit .env with your local database settings
```

### Daily Development
```bash
# Start development server
make dev
# Visit: http://localhost:8080

# Make your changes...
# Test your changes
make test

# Clean build
make clean
make build
```

## 🚀 Deployment Workflow

### Method 1: Quick Deploy (Recommended)
```bash
# On your local machine
make deploy
# or
make quick-deploy

# Then in cPanel:
# Git™ Version Control → Deploy HEAD Commit
```

### Method 2: Manual Steps
```bash
# 1. Commit changes locally
git add .
git commit -m "feat: Your change description"

# 2. Push to GitHub
git push origin latest-production-build

# 3. Deploy via cPanel
# Go to: cPanel → Git™ Version Control
# Click: Deploy HEAD Commit
```

### Method 3: SSH Deployment
```bash
# SSH into server
ssh nuguiyhv@nugui.co.za

# Run deployment script
bash ~/repositories/nugui-website/scripts/deploy.sh
```

## 📋 Deployment Checklist

### Pre-Deployment
- [ ] All changes committed
- [ ] Tests passing (`make test`)
- [ ] Build successful (`make build`)
- [ ] Environment variables updated if needed

### Deployment Steps
1. **Push to GitHub**
   ```bash
   git push origin latest-production-build
   ```

2. **Trigger cPanel Deployment**
   - Option A: cPanel GUI → Git™ Version Control → Deploy
   - Option B: SSH → Run deploy script
   - Option C: cPanel Terminal → Run deploy script

3. **Automatic Post-Deployment** (Handled by .cpanel.yml)
   - ✅ Composer dependencies installed
   - ✅ Database migrations run
   - ✅ Caches cleared
   - ✅ Permissions set
   - ✅ PHP processes restarted

### Post-Deployment Verification
- [ ] Website loads: https://nugui.co.za
- [ ] No errors in logs: `~/ci_app/writable/logs/`
- [ ] Features working as expected

## 🛠️ Tools & Commands

### Makefile Commands
```bash
make help       # Show all commands
make install    # Install dependencies
make dev        # Start dev server
make build      # Production build
make test       # Run tests
make deploy     # Deploy to production
make clean      # Clean caches
```

### Direct Commands
```bash
# Development
php spark serve

# Database
php spark migrate
php spark db:seed

# Cache
php spark cache:clear

# Routes
php spark routes
```

## 📁 File Structure

### Local Development
```
nugui-website/
├── app/                 # Application code
├── public/             # Public assets
├── system/             # CodeIgniter framework
├── vendor/             # Dependencies (git ignored)
├── writable/           # Temp files
├── scripts/            # Deployment scripts
├── .cpanel.yml         # cPanel auto-deployment
├── .cpanel/            # Post-deploy hooks
├── Makefile            # Development commands
└── composer.json       # PHP dependencies
```

### Production Server
```
/home/nuguiyhv/
├── ci_app/             # Secure application
│   ├── app/
│   ├── system/
│   ├── vendor/         # Installed by composer
│   └── writable/
├── public_html/        # Web root
│   ├── index.php
│   └── assets/
└── repositories/       # Git repository
    └── nugui-website/
```

## 🔒 Security Features

- ✅ Application files outside public_html
- ✅ Environment variables in .env (not in git)
- ✅ HTTPS forced via .htaccess
- ✅ Composer runs with --no-dev in production
- ✅ Proper file permissions set automatically
- ✅ Security headers configured

## 🐛 Troubleshooting

### Common Issues

#### Vendor folder missing
```bash
# Via SSH/Terminal
cd ~/ci_app
composer install --no-dev --optimize-autoloader
```

#### 503 Error
- Check: `~/ci_app/writable/logs/log-*.php`
- Verify vendor folder exists
- Check .env file exists and is configured

#### Changes not showing
```bash
# Clear all caches
cd ~/ci_app
php spark cache:clear
rm -rf writable/cache/*
```

#### Composer not found
```bash
# Install composer locally
curl -sS https://getcomposer.org/installer | php
mv composer.phar ~/bin/composer
```

## 📊 Monitoring

### Check Logs
```bash
# Application logs
tail -f ~/ci_app/writable/logs/log-*.php

# Deployment logs
tail -f ~/ci_app/writable/logs/deployment.log

# Post-deploy logs
tail -f ~/ci_app/writable/logs/post-deploy.log
```

### Health Check
```bash
cd ~/ci_app
php spark
```

## 🎯 Best Practices

1. **Always test locally first**
   - Run `make test` before deploying
   - Check in development server

2. **Use semantic commits**
   - feat: New feature
   - fix: Bug fix
   - docs: Documentation
   - style: Formatting
   - refactor: Code restructuring

3. **Deploy regularly**
   - Small, frequent deployments
   - Easier to debug issues

4. **Monitor after deployment**
   - Check error logs
   - Verify functionality
   - Test critical paths

## 📞 Support

If deployment fails:
1. Check deployment log: `~/ci_app/writable/logs/deployment.log`
2. Check post-deploy log: `~/ci_app/writable/logs/post-deploy.log`
3. Verify composer installed: `which composer`
4. Run manual deploy: `bash ~/repositories/nugui-website/scripts/deploy.sh`