#!/bin/bash
#==============================================================================
# One-Time Production Setup Script for NU GUI Website
# Run this ONCE after initial cPanel Git deployment
#==============================================================================

echo "🚀 NU GUI Website - Production Setup"
echo "===================================="

# Configuration
APPPATH="/home/nuguiyhv/ci_app"
PUBLICPATH="/home/nuguiyhv/public_html"

# Check if running on the server
if [ ! -d "$APPPATH" ]; then
    echo "❌ Error: Application directory not found at $APPPATH"
    echo "   Please run this script on your production server after Git deployment"
    exit 1
fi

cd $APPPATH

# Step 1: Install Composer if not available
echo "📦 Checking for Composer..."
if ! command -v composer &> /dev/null; then
    if [ ! -f "/opt/cpanel/composer/bin/composer" ]; then
        echo "   Installing Composer locally..."
        curl -sS https://getcomposer.org/installer | php
        mv composer.phar /home/nuguiyhv/bin/composer
        chmod +x /home/nuguiyhv/bin/composer
        export PATH="/home/nuguiyhv/bin:$PATH"
    else
        echo "   Using cPanel Composer"
        alias composer='/opt/cpanel/composer/bin/composer'
    fi
else
    echo "   ✅ Composer found"
fi

# Step 2: Install PHP dependencies
echo "📚 Installing PHP dependencies..."
if [ -f "composer.json" ]; then
    composer install --no-dev --optimize-autoloader --no-interaction
    echo "   ✅ Dependencies installed"
else
    echo "   ⚠️  No composer.json found - skipping"
fi

# Step 3: Set proper permissions
echo "🔒 Setting secure permissions..."
chmod 600 $APPPATH/.env 2>/dev/null || true
chmod -R 755 $APPPATH/app
chmod -R 755 $APPPATH/system
chmod -R 777 $APPPATH/writable
echo "   ✅ Permissions set"

# Step 4: Clear caches
echo "🧹 Clearing caches..."
php spark cache:clear 2>/dev/null || true
echo "   ✅ Caches cleared"

# Step 5: Create .htaccess if missing
if [ ! -f "$PUBLICPATH/.htaccess" ]; then
    echo "📝 Creating .htaccess..."
    cat > $PUBLICPATH/.htaccess << 'EOF'
# Force HTTPS and remove www
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]
RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]

# CodeIgniter routing
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([\s\S]*)$ index.php/$1 [L,NC,QSA]

# Security headers
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
</IfModule>
EOF
    echo "   ✅ .htaccess created"
fi

# Step 6: Test the installation
echo "🧪 Testing installation..."
if php $APPPATH/spark 2>/dev/null | grep -q "CodeIgniter"; then
    echo "   ✅ CodeIgniter is working!"
else
    echo "   ⚠️  Could not verify CodeIgniter installation"
fi

echo ""
echo "✨ Setup complete!"
echo "===================================="
echo "Your website should now be accessible at: https://nugui.co.za"
echo ""
echo "Next steps:"
echo "1. Test your website in a browser"
echo "2. Check error logs if any issues: $APPPATH/writable/logs/"
echo "3. This script only needs to run ONCE"
echo ""
echo "For future updates, just use cPanel Git deployment - no manual steps needed!"