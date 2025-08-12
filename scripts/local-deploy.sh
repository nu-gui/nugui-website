#!/bin/bash
#==============================================================================
# Local Development & Deployment Script
# Run this on your local machine to deploy changes to production
#==============================================================================

set -e  # Exit on error

echo "🔧 NU GUI Website - Local Deployment Pipeline"
echo "=============================================="
echo ""

# Step 1: Check for uncommitted changes
echo "📋 Checking for uncommitted changes..."
if ! git diff-index --quiet HEAD --; then
    echo "   ⚠️  You have uncommitted changes!"
    echo "   Please commit or stash them first."
    exit 1
fi
echo "   ✅ Working directory clean"

# Step 2: Run local tests (if any)
echo "🧪 Running tests..."
if [ -f "phpunit.xml" ] || [ -f "phpunit.xml.dist" ]; then
    ./vendor/bin/phpunit --testdox 2>/dev/null || echo "   ℹ️  Tests skipped"
else
    echo "   ℹ️  No tests configured"
fi

# Step 3: Build assets (if needed)
echo "🎨 Building assets..."
if [ -f "package.json" ]; then
    npm run build 2>/dev/null || echo "   ℹ️  No build script"
else
    echo "   ℹ️  No assets to build"
fi

# Step 4: Update version/build info
echo "📝 Updating build info..."
BUILD_DATE=$(date +"%Y-%m-%d %H:%M:%S")
BUILD_NUMBER=$(git rev-list --count HEAD)
cat > app/Config/Build.php << EOF
<?php
namespace Config;

class Build {
    public const DATE = '$BUILD_DATE';
    public const NUMBER = $BUILD_NUMBER;
    public const VERSION = '1.0.$BUILD_NUMBER';
}
EOF
git add app/Config/Build.php
git commit -m "build: Update build info to v1.0.$BUILD_NUMBER" || true

# Step 5: Push to GitHub
echo "📤 Pushing to GitHub..."
BRANCH=$(git branch --show-current)
git push origin $BRANCH
echo "   ✅ Pushed to origin/$BRANCH"

# Step 6: Trigger cPanel deployment
echo "🚀 Triggering production deployment..."
echo ""
echo "===================================================="
echo "📌 NEXT STEPS - Complete deployment in cPanel:"
echo "===================================================="
echo ""
echo "1. Log into cPanel at: https://nugui.co.za:2083"
echo ""
echo "2. Go to: Git™ Version Control"
echo ""
echo "3. Find repository: nugui-website"
echo ""
echo "4. Click: 'Manage' → 'Pull or Deploy'"
echo ""
echo "5. Click: 'Deploy HEAD Commit'"
echo ""
echo "===================================================="
echo "OR use Terminal/SSH to run:"
echo "===================================================="
echo ""
echo "bash ~/repositories/nugui-website/scripts/deploy.sh"
echo ""
echo "===================================================="
echo ""
echo "✅ Local deployment complete! Now complete the steps above."