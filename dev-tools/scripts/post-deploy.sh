#!/bin/bash
##################################################
# NU GUI Website Post-Deployment Hook
# 
# This script runs after cPanel Git deployment
# to complete the production setup
##################################################

echo "=== NU GUI Post-Deployment Hook ==="
echo "Running post-deployment tasks..."

# Set variables
HOMEDIR="/home/nuguiyhv"
WEBDIR="$HOMEDIR/public_html"

# Function to log messages
log_message() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# Function to check if command exists
command_exists() {
    command -v "$1" >/dev/null 2>&1
}

log_message "Starting post-deployment setup"

# 1. Set proper permissions
log_message "Setting file permissions..."
find "$HOMEDIR" -type d -exec chmod 755 {} \; 2>/dev/null
find "$HOMEDIR" -type f -exec chmod 644 {} \; 2>/dev/null
chmod -R 775 "$HOMEDIR/writable" 2>/dev/null
chmod 600 "$HOMEDIR/.env" 2>/dev/null

# 2. Ensure critical directories exist
log_message "Creating necessary directories..."
mkdir -p "$HOMEDIR/writable/cache"
mkdir -p "$HOMEDIR/writable/logs"
mkdir -p "$HOMEDIR/writable/session"
mkdir -p "$HOMEDIR/writable/uploads"
mkdir -p "$HOMEDIR/database"

# 3. Copy production environment file if it exists
if [ -f "$HOMEDIR/.env.production" ] && [ ! -f "$HOMEDIR/.env" ]; then
    log_message "Copying production environment configuration..."
    cp "$HOMEDIR/.env.production" "$HOMEDIR/.env"
    chmod 600 "$HOMEDIR/.env"
fi

# 4. Update composer autoloader for production
if command_exists composer && [ -f "$HOMEDIR/composer.json" ]; then
    log_message "Optimizing composer autoloader..."
    cd "$HOMEDIR" || exit 1
    composer install --no-dev --optimize-autoloader --no-interaction 2>/dev/null || {
        log_message "Warning: Composer optimization failed"
    }
fi

# 5. Run database setup if PHP CLI is available
if command_exists php && [ -f "$HOMEDIR/deploy-production.php" ]; then
    log_message "Running database setup..."
    cd "$HOMEDIR" || exit 1
    php deploy-production.php 2>/dev/null || {
        log_message "Warning: Database setup script failed"
    }
fi

# 6. Clear any existing caches
log_message "Clearing application caches..."
if [ -d "$HOMEDIR/writable/cache" ]; then
    find "$HOMEDIR/writable/cache" -type f -name "*.cache" -delete 2>/dev/null
fi

# 7. Update index.php paths if needed
log_message "Verifying index.php configuration..."
if [ -f "$WEBDIR/index.php" ]; then
    # Ensure index.php has correct path references
    sed -i "s|FCPATH . '\.\./app/Config/Paths\.php'|FCPATH . '../app/Config/Paths.php'|g" "$WEBDIR/index.php" 2>/dev/null
fi

# 8. Security hardening
log_message "Applying security settings..."

# Remove any dangerous files that might have been deployed
rm -f "$WEBDIR/.env" 2>/dev/null
rm -f "$WEBDIR/composer.json" 2>/dev/null
rm -f "$WEBDIR/deploy-production.php" 2>/dev/null

# Ensure .htaccess has security headers
if [ -f "$WEBDIR/.htaccess" ]; then
    if ! grep -q "X-Content-Type-Options" "$WEBDIR/.htaccess"; then
        cat >> "$WEBDIR/.htaccess" << 'EOF'

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options SAMEORIGIN
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>
EOF
    fi
fi

# 9. Create deployment log
log_message "Creating deployment log..."
cat > "$HOMEDIR/writable/logs/deployment.log" << EOF
Deployment completed: $(date)
Git commit: $(git rev-parse HEAD 2>/dev/null || echo "Unknown")
Environment: Production
Status: Ready
EOF

# 10. Final verification
log_message "Running final verification..."
ERRORS=0

# Check critical files exist
CRITICAL_FILES=(
    "$WEBDIR/index.php"
    "$WEBDIR/.htaccess"
    "$HOMEDIR/app/Config/Routes.php"
    "$HOMEDIR/.env"
)

for file in "${CRITICAL_FILES[@]}"; do
    if [ ! -f "$file" ]; then
        log_message "ERROR: Missing critical file: $file"
        ERRORS=$((ERRORS + 1))
    fi
done

# Check directory permissions
if [ ! -w "$HOMEDIR/writable" ]; then
    log_message "ERROR: Writable directory not writable"
    ERRORS=$((ERRORS + 1))
fi

# Report results
if [ $ERRORS -eq 0 ]; then
    log_message "✓ Post-deployment setup completed successfully"
    log_message "✓ NU GUI website is ready for production"
    
    # Create success marker
    echo "SUCCESS: $(date)" > "$HOMEDIR/writable/deployment-status.txt"
else
    log_message "⚠ Post-deployment completed with $ERRORS error(s)"
    log_message "Please check the deployment manually"
    
    # Create error marker  
    echo "ERRORS: $ERRORS at $(date)" > "$HOMEDIR/writable/deployment-status.txt"
fi

log_message "Post-deployment hook finished"
echo "==================================="