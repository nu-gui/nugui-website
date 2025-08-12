# Nginx Configuration Setup for NU GUI Website

## Current Issue
- Server runs **nginx** but CodeIgniter deployment uses **Apache .htaccess** rules
- Direct routes like `/home` return 404 errors
- Routes work when accessed via `/index.php/home`

## Solution: Nginx Server Block Configuration

### 1. Server Configuration File Location
The nginx configuration needs to be added to your server's nginx configuration. Common locations:
- `/etc/nginx/sites-available/nugui.co.za`
- `/etc/nginx/conf.d/nugui.co.za.conf`
- Main nginx configuration file

### 2. Implementation Steps

#### Step 1: Create Site Configuration
Copy the contents of `nginx-config/nugui-site.conf` to your server's nginx configuration.

#### Step 2: Key Configuration Points
```nginx
# Document root points to CodeIgniter public directory
root /home/nuguiyhv/public;

# Main routing rule - this replaces .htaccess functionality
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
```

#### Step 3: PHP-FPM Configuration
Ensure the PHP-FPM socket path matches your server setup:
```nginx
fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
```

Common alternatives:
- `unix:/var/run/php/php8.0-fpm.sock`
- `unix:/var/run/php/php7.4-fpm.sock`
- `127.0.0.1:9000` (TCP connection)

### 3. Hosting Provider Implementation

#### For Shared Hosting (Afrihost)
1. **Contact Support**: Request nginx configuration update
2. **Provide Configuration**: Share the `nugui-site.conf` file
3. **Specify Requirements**:
   - Document root: `/home/nuguiyhv/public`
   - PHP-FPM processing for `.php` files
   - URL rewriting: `try_files $uri $uri/ /index.php$is_args$args;`

#### For VPS/Dedicated Server
1. **Edit Configuration**: Add to `/etc/nginx/sites-available/nugui.co.za`
2. **Enable Site**: `sudo ln -s /etc/nginx/sites-available/nugui.co.za /etc/nginx/sites-enabled/`
3. **Test Configuration**: `sudo nginx -t`
4. **Reload Nginx**: `sudo systemctl reload nginx`

### 4. Alternative Quick Fix (Temporary)

If nginx configuration cannot be updated immediately, update CodeIgniter to use index.php URLs:

#### Update App Configuration
In `/home/nuguiyhv/app/Config/App.php`:
```php
// Change from:
public string $indexPage = '';

// To:
public string $indexPage = 'index.php/';
```

This will make all CodeIgniter URLs include `index.php/` automatically.

### 5. Verification

After implementing nginx configuration:
1. **Test Direct Routes**: `https://www.nugui.co.za/home` should work
2. **Test About Page**: `https://www.nugui.co.za/about` should work
3. **Verify Homepage**: `https://www.nugui.co.za/` continues working

### 6. Security Notes

The nginx configuration includes:
- HTTPS redirect enforcement
- Security headers (X-Frame-Options, X-XSS-Protection, etc.)
- Denial of access to sensitive files (.env, .htaccess, etc.)
- Static asset caching
- Gzip compression

## Contact Information

For implementation assistance, contact your hosting provider (Afrihost) with:
1. The `nugui-site.conf` configuration file
2. Request to update nginx server block for nugui.co.za
3. Specify document root: `/home/nuguiyhv/public`

## Expected Result

After nginx configuration:
- ✅ `https://www.nugui.co.za/home` → Works (CodeIgniter Home controller)
- ✅ `https://www.nugui.co.za/about` → Works (CodeIgniter About controller)  
- ✅ `https://www.nugui.co.za/products` → Works (CodeIgniter Products controller)
- ✅ All CodeIgniter routes function properly without `/index.php/` prefix
