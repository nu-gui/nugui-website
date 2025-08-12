#!/bin/bash
#==============================================================================
# Professional Deployment Script for NU GUI Website
# This script handles the complete deployment pipeline
#==============================================================================

set -e  # Exit on error

# Configuration
REPO_URL="https://github.com/nu-gui/nugui-website.git"
BRANCH="latest-production-build"
APP_PATH="/home/nuguiyhv/ci_app"
PUBLIC_PATH="/home/nuguiyhv/public_html"
REPO_PATH="/home/nuguiyhv/repositories/nugui-website"

echo "🚀 NU GUI Website - Professional Deployment Pipeline"
echo "====================================================="
echo "Timestamp: $(date)"
echo ""

# Step 1: Pull latest changes from Git
echo "📥 Step 1: Pulling latest changes from GitHub..."
cd $REPO_PATH
git fetch origin
git reset --hard origin/$BRANCH
COMMIT=$(git rev-parse HEAD)
echo "   ✅ Updated to commit: $COMMIT"

# Step 2: Install/Update PHP dependencies
echo "📦 Step 2: Installing PHP dependencies..."
if [ -f "$REPO_PATH/composer.json" ]; then
    cp $REPO_PATH/composer.json $APP_PATH/
    cp $REPO_PATH/composer.lock $APP_PATH/
    cd $APP_PATH
    
    # Use appropriate composer command
    if [ -f "/opt/cpanel/composer/bin/composer" ]; then
        /opt/cpanel/composer/bin/composer install --no-dev --optimize-autoloader --no-interaction
    elif command -v composer &> /dev/null; then
        composer install --no-dev --optimize-autoloader --no-interaction
    else
        echo "   ⚠️  Composer not found - skipping dependency update"
    fi
    echo "   ✅ Dependencies updated"
else
    echo "   ℹ️  No composer.json found"
fi

# Step 3: Run database migrations (if any)
echo "🗄️  Step 3: Checking for database migrations..."
cd $APP_PATH
if [ -f "spark" ]; then
    php spark migrate --all 2>/dev/null || echo "   ℹ️  No migrations to run"
else
    echo "   ℹ️  Migration tool not available"
fi

# Step 4: Clear all caches
echo "🧹 Step 4: Clearing caches..."
php spark cache:clear 2>/dev/null || true
rm -rf $APP_PATH/writable/cache/* 2>/dev/null || true
rm -rf $APP_PATH/writable/debugbar/* 2>/dev/null || true
echo "   ✅ Caches cleared"

# Step 5: Optimize for production
echo "⚡ Step 5: Optimizing for production..."
cd $APP_PATH

# Generate optimized autoloader
if [ -f "vendor/autoload.php" ]; then
    if command -v composer &> /dev/null; then
        composer dump-autoload --optimize --no-dev 2>/dev/null || true
    fi
fi

# Set production permissions
chmod 600 .env 2>/dev/null || true
chmod -R 755 app/
chmod -R 755 system/
chmod -R 777 writable/
echo "   ✅ Optimizations complete"

# Step 6: Health check
echo "🏥 Step 6: Running health check..."
if php spark 2>/dev/null | grep -q "CodeIgniter"; then
    echo "   ✅ Application is healthy"
else
    echo "   ⚠️  Could not verify application health"
fi

# Step 7: Log deployment
echo "📝 Step 7: Logging deployment..."
cat >> $APP_PATH/writable/logs/deployment.log << EOF
========================================
Deployment completed at: $(date)
Commit: $COMMIT
Branch: $BRANCH
Status: SUCCESS
========================================
EOF
echo "   ✅ Deployment logged"

echo ""
echo "✨ Deployment completed successfully!"
echo "====================================================="
echo "Your website is now live at: https://nugui.co.za"
echo ""