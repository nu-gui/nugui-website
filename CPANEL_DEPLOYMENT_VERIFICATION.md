# cPanel Deployment Verification Checklist

## ✅ Repository Status

### Required Files in Repository
- ✅ **system/** - 592 files tracked (CodeIgniter framework)
- ✅ **app/** - 129 files tracked (Application code)
- ✅ **public/** - 106 files tracked (Public assets)
- ✅ **composer.json** - Tracked (Dependency manifest)
- ✅ **composer.lock** - Tracked (Locked dependencies)
- ✅ **.cpanel.yml** - Tracked (Deployment configuration)
- ✅ **spark** - Tracked (CLI tool)
- ✅ **vendor/** - NOT tracked (Will be installed by composer)

### Environment Files
- ✅ **.env.production** - Present (Will be copied to .env)
- ✅ **env.production** - Present (Fallback option)

## ✅ Deployment Configuration (.cpanel.yml)

### Step-by-Step Process
1. **Backup Creation** ✅
   - Creates timestamped backup before deployment
   - Excludes cache, logs, and vendor from backup

2. **Directory Structure** ✅
   - Creates `/home/nuguiyhv/ci_app/` for secure app files
   - Creates writable subdirectories with proper permissions

3. **File Deployment** ✅
   - Copies app/ and system/ to secure location
   - Copies composer.json and composer.lock

4. **Composer Installation** ✅
   ```bash
   # Tries multiple composer locations:
   /opt/cpanel/composer/bin/composer install --no-dev
   # OR system composer
   # OR provides manual instructions if not found
   ```

5. **Public Files** ✅
   - Copies only public assets to public_html
   - Creates secure index.php entry point

6. **Security** ✅
   - Sets chmod 600 on .env file
   - Sets proper permissions on all directories
   - Creates .htaccess with security headers

7. **Post-Deployment** ✅
   - Runs .cpanel/post-deploy.sh automatically
   - Clears caches
   - Runs migrations
   - Optimizes autoloader

## ✅ Automated Deployment Flow

### When you deploy via cPanel Git™ Version Control:

1. **cPanel pulls from GitHub** → Gets latest code from `latest-production-build`
2. **Runs .cpanel.yml** → Executes all deployment tasks
3. **Composer runs automatically** → Installs vendor/ directory
4. **Post-deploy hooks execute** → Final optimizations
5. **Website is live** → No manual intervention needed!

## ⚠️ One-Time Setup Required (First Deployment Only)

### If Composer is NOT available on server:
```bash
# Option 1: Via cPanel Terminal
cd ~/ci_app && composer install --no-dev --optimize-autoloader

# Option 2: Via SSH
bash ~/repositories/nugui-website/scripts/setup-production.sh

# Option 3: Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar ~/bin/composer
chmod +x ~/bin/composer
```

## ✅ Deployment Commands Summary

### From Local Machine:
```bash
# Make changes
git add .
git commit -m "Your changes"
git push origin latest-production-build
```

### In cPanel:
1. Go to **Git™ Version Control**
2. Find **nugui-website** repository
3. Click **Manage** → **Pull or Deploy**
4. Click **Deploy HEAD Commit**

## ✅ Verification Tests

After deployment, verify:
- [ ] Website loads at https://nugui.co.za
- [ ] No 500/503 errors
- [ ] Check logs: `~/ci_app/writable/logs/`
- [ ] Vendor directory exists: `~/ci_app/vendor/`
- [ ] Environment configured: `~/ci_app/.env`

## 🎯 Deployment Status: READY

**All components are properly configured for automated cPanel deployment!**

### Key Points:
- ✅ All required files in repository
- ✅ Composer installation automated
- ✅ Security properly configured
- ✅ Post-deployment tasks automated
- ✅ One-click deployment ready

The only potential manual step is the **first-time composer install** if composer is not available on the server.