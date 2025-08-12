# NU GUI Website - cPanel Deployment Instructions

## Prerequisites Completed ✅
- System folder added to repository
- .cpanel.yml configured for secure deployment
- Setup script created for dependencies

## One-Time Setup (After First Deployment)

Since the `vendor/` folder is not in the repository (best practice), you need to install PHP dependencies ONCE after your first cPanel Git deployment.

### Option 1: Via cPanel Terminal (Recommended)
1. Open cPanel → Terminal
2. Run:
```bash
cd ~/ci_app && composer install --no-dev --optimize-autoloader
```

### Option 2: Via SSH
1. SSH into your server
2. Run:
```bash
bash ~/repositories/nugui-website/scripts/setup-production.sh
```

### Option 3: Automatic (If cPanel has Composer)
The deployment will automatically run composer if available at:
- `/opt/cpanel/composer/bin/composer` (cPanel's composer)
- Or system-wide `composer` command

## Deployment Process

### Initial Deployment
1. Go to cPanel → Git™ Version Control
2. Create repository from: `https://github.com/nu-gui/nugui-website.git`
3. Use branch: `latest-production-build`
4. Deploy path: `/home/nuguiyhv/repositories/nugui-website`
5. Click "Deploy HEAD Commit"
6. Run one-time setup (see above)
7. Visit https://nugui.co.za to verify

### Future Updates
1. Make changes locally
2. Push to `latest-production-build` branch
3. In cPanel → Git™ Version Control → Deploy HEAD Commit
4. No manual steps needed! (vendor already installed)

## File Structure After Deployment

```
/home/nuguiyhv/
├── ci_app/                 # Secure app files (OUTSIDE public_html)
│   ├── app/                # Your application
│   ├── system/             # CodeIgniter framework
│   ├── vendor/             # PHP dependencies (created by composer)
│   ├── writable/           # Logs, cache, sessions
│   └── .env                # Environment configuration
│
├── public_html/            # Public web root
│   ├── index.php           # Entry point (loads from ci_app)
│   ├── .htaccess           # Security & routing
│   ├── assets/             # CSS, JS, images
│   └── favicon.ico         # Site icon
│
└── repositories/
    └── nugui-website/      # Git repository (managed by cPanel)
```

## Troubleshooting

### Website shows 503 error
- Vendor folder missing → Run one-time setup
- Check error log: `~/ci_app/writable/logs/`

### Composer not found
- Ask hosting provider to install composer
- Or download locally: `curl -sS https://getcomposer.org/installer | php`

### Changes not showing
- Clear cache: `cd ~/ci_app && php spark cache:clear`
- Check deployment log: `~/ci_app/writable/logs/deployment.log`

## Security Features
✅ Application files outside public_html
✅ Environment file protected (chmod 600)
✅ HTTPS forced via .htaccess
✅ Security headers configured
✅ Directory browsing disabled
✅ Sensitive files blocked

## Support
For issues, check:
1. Error logs: `~/ci_app/writable/logs/`
2. Deployment log: `~/ci_app/writable/logs/deployment.log`
3. PHP error log in cPanel → Errors