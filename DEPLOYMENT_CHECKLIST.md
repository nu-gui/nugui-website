# 🚀 NU GUI Website Deployment Checklist

## Pre-Deployment Checklist

### 1. ✅ Image Assets Verification
- [x] All NUGUI logo files use 1/2 naming convention
  - `NUGUI-icon-1.png` (light theme)
  - `NUGUI-icon-2.png` (dark theme)
  - `NUGUI-1.png` (main logo light)
  - `NUGUI-2.png` (main logo dark)
  
- [x] Product icons properly named:
  - `NU-SMS-icon-1.jpg` / `NU-SMS-icon-2.jpg`
  - `NU-CCS-icon-1.jpg` / `NU-CCS-icon-2.png`
  - `NU-DATA-icon-1.jpg` / `NU-DATA-icon-2.png`
  - `NU-SIP-icon-1.jpg` / `NU-SIP-icon-2.jpg`
  
- [x] Product images present:
  - `NU-SMS-product-1.jpg` / `NU-SMS-product-2.jpg`
  - `NU-CCS-product-1.jpg` / `NU-CCS-product-2.jpg`
  - `NU-DATA-product-1.jpg` / `NU-DATA-product-2.jpg`
  - `NU-SIP-product-1.jpg` / `NU-SIP-product-2.jpg`

### 2. ✅ View Templates Updated
- [x] `app/Views/home.php` - Fixed icon references
- [x] `app/Views/solutions.php` - Updated product images
- [x] `app/Views/templates/footer.php` - NUGUI icons
- [x] `app/Views/templates/header-apple.php` - Logo references
- [x] `app/Views/templates/footer-apple.php` - Footer icons

### 3. ✅ Configuration Files
- [x] `.env` file contains email settings
- [x] `.cpanel.yml` properly configured for Git deployment
- [x] Database connection settings verified

### 4. ✅ Theme System
- [x] Dark/light mode toggle functional
- [x] CSS variables properly set
- [x] JavaScript theme manager working

## Deployment Steps for Afrihost

### Step 1: Prepare Local Repository
```bash
# Ensure on correct branch
git checkout clean-working-branch-20250808

# Add all changes
git add -A

# Commit changes
git commit -m "Fix: Resolve image asset naming issues and broken references
- Renamed all images to follow 1/2 naming convention
- Fixed broken image references in View templates
- Added missing product icons and images
- Updated email configuration in .env
- Verified theme switching functionality"

# Push to GitHub
git push origin clean-working-branch-20250808
```

### Step 2: Afrihost cPanel Deployment

1. **Login to Afrihost cPanel**
   - URL: https://cpanel.afrihost.com
   - Use SSO login credentials

2. **Navigate to Git™ Version Control**
   - Located under "Files" section

3. **Update Repository**
   - Find `nugui-website` repository
   - Click "Manage" → "Pull or Deploy"
   - Select branch: `clean-working-branch-20250808`
   - Click "Update from Remote"
   - Click "Deploy HEAD Commit"

4. **Verify Deployment**
   - `.cpanel.yml` will automatically:
     - Copy public files to `/home/nuguiyhv/public_html/`
     - Copy app files to `/home/nuguiyhv/app/`
     - Copy system files to `/home/nuguiyhv/system/`
     - Copy vendor files to `/home/nuguiyhv/vendor/`
     - Update .env configuration
     - Set proper file permissions

### Step 3: Post-Deployment Verification

1. **Check Website Loading**
   - Visit: https://www.nugui.co.za
   - Verify homepage loads without 404 errors
   - Check all navigation links work

2. **Verify Images**
   - Confirm all logos display correctly
   - Test theme toggle (light/dark mode)
   - Check product icons on home and solutions pages

3. **Test Forms**
   - Contact form submission
   - Support form submission
   - Partner program application

4. **Mobile Responsiveness**
   - Test on mobile devices
   - Verify hamburger menu works
   - Check image scaling

### Step 4: Update Email Passwords

**IMPORTANT**: After deployment, update email passwords in server's `.env` file:

1. Access File Manager in cPanel
2. Navigate to `/home/nuguiyhv/`
3. Edit `.env` file
4. Update these values:
   ```
   CONTACT_EMAIL_PASS = [actual password]
   SUPPORT_EMAIL_PASS = [actual password]
   ```

## Troubleshooting

### Issue: Images Not Loading
- Check file permissions (should be 644)
- Verify image paths in browser console
- Ensure files exist in `/home/nuguiyhv/public_html/assets/images/`

### Issue: 404 Errors
- Verify NGINX configuration is active (Ticket #PTR-587-78820)
- Check `.htaccess` file in public_html
- Confirm CodeIgniter routing is working

### Issue: Forms Not Sending Emails
- Verify email credentials in `.env`
- Check SMTP settings in `app/Config/Email.php`
- Review error logs in `/home/nuguiyhv/writable/logs/`

### Issue: Theme Toggle Not Working
- Check JavaScript console for errors
- Verify `darkmode.js` is loaded
- Clear browser cache

## Rollback Procedure

If issues occur after deployment:

1. **Via cPanel Git™**:
   - Navigate to Git™ Version Control
   - Click "Manage" on repository
   - Select previous working commit
   - Click "Deploy"

2. **Via FTP Backup**:
   - Access backups in `/home/nuguiyhv/archives/`
   - Restore previous working version

## Contact Support

**Afrihost Technical Support**:
- Portal: https://clientzone.afrihost.com
- Reference Ticket: #PTR-587-78820 (NGINX config)

**Development Team**:
- Email: wesley@nugui.co.za
- GitHub: https://github.com/nu-gui/nugui-website

## Final Checklist

Before marking deployment complete:
- [ ] All pages load without errors
- [ ] Images display correctly in both themes
- [ ] Forms submit successfully
- [ ] Mobile version works properly
- [ ] SSL certificate active (HTTPS)
- [ ] Analytics tracking enabled
- [ ] Backup created before deployment

---

**Last Updated**: August 8, 2025
**Version**: 1.0.0