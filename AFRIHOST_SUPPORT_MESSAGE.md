# Afrihost Support Request: Nginx Configuration for CodeIgniter URL Rewriting

**Account:** wesley@nugui.co.za  
**Domain:** nugui.co.za / www.nugui.co.za  
**Hosting Package:** Shared Hosting  
**Issue Type:** Server Configuration Request  

---

## **URGENT: Nginx Configuration Required for Website Functionality**

### **Issue Summary**
Our CodeIgniter website at **https://www.nugui.co.za** is experiencing URL routing issues. The main page loads correctly, but all secondary routes (e.g., `/home`, `/about`, `/products`) return **404 Not Found** errors.

**Root Cause:** The server runs **nginx** but our CodeIgniter deployment uses **Apache .htaccess** rewrite rules, which nginx ignores completely.

### **Current Status**
- ✅ **Main page works**: `https://www.nugui.co.za/` → HTTP/2 200 OK
- ✅ **Index.php routes work**: `https://www.nugui.co.za/index.php/home` → HTTP/2 200 OK  
- ❌ **Direct routes fail**: `https://www.nugui.co.za/home` → HTTP/2 404 Not Found
- ✅ **All CodeIgniter framework files deployed correctly**

### **Required Solution: Nginx Server Block Configuration**

Please implement the following nginx configuration for our domain:

#### **Document Root Verification**
- **Current document root should be**: `/home/nuguiyhv/public/`
- **Verify this points to our CodeIgniter public directory**

#### **Complete Nginx Server Block Configuration**
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name nugui.co.za www.nugui.co.za;
    
    # Force HTTPS redirect
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name nugui.co.za www.nugui.co.za;
    
    # Document root - CodeIgniter public directory
    root /home/nuguiyhv/public;
    index index.php index.html index.htm;
    
    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "same-origin" always;
    
    # CRITICAL: Main location block for CodeIgniter routing
    location / {
        # This replaces Apache .htaccess functionality
        try_files $uri $uri/ /index.php$is_args$args;
    }
    
    # Handle PHP files
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;  # Adjust PHP version as needed
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
        fastcgi_intercept_errors on;
    }
    
    # Deny access to sensitive files
    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }
    
    location ~ ^/(\.htaccess|\.env|composer\.(json|lock)|\.git) {
        deny all;
        access_log off;
        log_not_found off;
    }
    
    # Cache static assets
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        access_log off;
    }
}
```

### **Key Configuration Requirements**

#### **1. Critical Routing Rule**
```nginx
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
```
**This single line replaces all Apache .htaccess rewrite functionality.**

#### **2. Document Root**
```nginx
root /home/nuguiyhv/public;
```
**Must point to our CodeIgniter public directory.**

#### **3. PHP-FPM Configuration**
Please verify the PHP-FPM socket path. Common options:
- `unix:/var/run/php/php8.1-fpm.sock`
- `unix:/var/run/php/php8.0-fpm.sock`  
- `unix:/var/run/php/php7.4-fpm.sock`
- `127.0.0.1:9000` (TCP connection)

### **File Structure on Server**
```
/home/nuguiyhv/
├── public/                   # Web-accessible directory (nginx document root)
│   ├── index.php            # CodeIgniter front controller
│   ├── .htaccess            # Apache rules (ignored by nginx)
│   └── assets/              # CSS, JS, images
├── app/                     # CodeIgniter application
├── system/                  # CodeIgniter framework
├── vendor/                  # Composer dependencies
├── writable/                # Cache, logs, uploads
└── .env                     # Environment configuration
```

### **Expected Results After Configuration**
- ✅ `https://www.nugui.co.za/home` → HTTP/2 200 OK (CodeIgniter Home page)
- ✅ `https://www.nugui.co.za/about` → HTTP/2 200 OK (CodeIgniter About page)  
- ✅ `https://www.nugui.co.za/products` → HTTP/2 200 OK (CodeIgniter Products page)
- ✅ All CodeIgniter routes function without `/index.php/` prefix

### **Testing Commands**
After implementation, these commands should return HTTP/2 200 OK:
```bash
curl -I https://www.nugui.co.za/home
curl -I https://www.nugui.co.za/about
curl -I https://www.nugui.co.za/products
```

### **Urgency Level: HIGH**
This configuration issue prevents our website from functioning properly. All secondary pages return 404 errors, making the site unusable for visitors.

### **Technical Contact**
If you need clarification on any configuration details, please contact:
- **Email**: wesley@nugui.co.za
- **Reference**: CodeIgniter nginx URL rewriting configuration

### **Additional Notes**
- Our CodeIgniter application is fully deployed and functional
- The issue is purely nginx configuration - no application code changes needed
- We have verified all framework files are correctly positioned on the server
- SSL certificates should remain as currently configured

---

**Please confirm:**
1. Nginx configuration will be implemented as specified above
2. Document root points to `/home/nuguiyhv/public/`
3. Estimated timeframe for implementation
4. Any additional information required from our side

Thank you for your assistance in resolving this critical website functionality issue.

**Account Reference**: wesley@nugui.co.za  
**Domain**: nugui.co.za / www.nugui.co.za
