#!/bin/bash
#==============================================================================
# cPanel Post-Deployment Hook
# This runs automatically after Git deployment
#==============================================================================

# Configuration
APP_PATH="/home/nuguiyhv/ci_app"
LOG_FILE="$APP_PATH/writable/logs/post-deploy.log"

# Ensure log directory exists
mkdir -p $(dirname $LOG_FILE)

# Log function
log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" | tee -a $LOG_FILE
}

log "========================================="
log "Starting post-deployment tasks..."

# Task 1: Install/Update Composer dependencies
log "Installing composer dependencies..."
cd $APP_PATH
if [ -f "composer.json" ]; then
    if [ -f "/opt/cpanel/composer/bin/composer" ]; then
        /opt/cpanel/composer/bin/composer install --no-dev --optimize-autoloader --no-interaction >> $LOG_FILE 2>&1
        log "✅ Composer dependencies installed"
    else
        log "⚠️  Composer not found"
    fi
fi

# Task 2: Run migrations
log "Running database migrations..."
if [ -f "spark" ]; then
    php spark migrate --all >> $LOG_FILE 2>&1 || log "No migrations to run"
fi

# Task 3: Clear caches
log "Clearing caches..."
php spark cache:clear >> $LOG_FILE 2>&1 || true
rm -rf writable/cache/* 2>/dev/null
log "✅ Caches cleared"

# Task 4: Set permissions
log "Setting permissions..."
chmod 600 .env 2>/dev/null || true
chmod -R 755 app/
chmod -R 755 system/
chmod -R 777 writable/
log "✅ Permissions set"

# Task 5: Restart PHP (if possible)
log "Restarting PHP processes..."
killall -u $(whoami) php-cgi 2>/dev/null || true
log "✅ PHP processes restarted"

log "Post-deployment tasks completed!"
log "========================================="