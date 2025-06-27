# Quick Development Setup Script
# Run this after installing PHP and Composer

Write-Host "CodeIgniter 4 Development Setup" -ForegroundColor Green
Write-Host "================================" -ForegroundColor Green

# Check if we're in the right directory
if (-not (Test-Path "composer.json")) {
    Write-Host "Error: Please run this script from your project root directory" -ForegroundColor Red
    exit 1
}

# Check if PHP is available
try {
    $phpVersion = php -v 2>$null
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✓ PHP is available" -ForegroundColor Green
        Write-Host $phpVersion.Split("`n")[0] -ForegroundColor Cyan
    }
} catch {
    Write-Host "✗ PHP not found. Please install PHP 8.1+ first" -ForegroundColor Red
    Write-Host "Run setup_environment.ps1 as Administrator to install PHP" -ForegroundColor Yellow
    exit 1
}

# Check if Composer is available
try {
    $composerVersion = composer --version 2>$null
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✓ Composer is available" -ForegroundColor Green
        Write-Host $composerVersion -ForegroundColor Cyan
    }
} catch {
    Write-Host "✗ Composer not found. Please install Composer first" -ForegroundColor Red
    exit 1
}

# Install dependencies
Write-Host "`nInstalling Composer dependencies..." -ForegroundColor Yellow
composer install

# Check if vendor directory exists
if (Test-Path "vendor") {
    Write-Host "✓ Dependencies installed successfully" -ForegroundColor Green
} else {
    Write-Host "✗ Failed to install dependencies" -ForegroundColor Red
    exit 1
}

# Create writable directories if they don't exist
$writableDirs = @("writable", "writable/cache", "writable/logs", "writable/session", "writable/uploads")

Write-Host "`nSetting up writable directories..." -ForegroundColor Yellow
foreach ($dir in $writableDirs) {
    if (-not (Test-Path $dir)) {
        New-Item -ItemType Directory -Path $dir -Force | Out-Null
        Write-Host "✓ Created $dir" -ForegroundColor Green
    } else {
        Write-Host "✓ $dir already exists" -ForegroundColor Green
    }
}

# Check .env file
if (Test-Path ".env") {
    Write-Host "✓ .env file exists" -ForegroundColor Green
} else {
    Write-Host "! Copying env to .env" -ForegroundColor Yellow
    Copy-Item "env" ".env"
    Write-Host "✓ .env file created" -ForegroundColor Green
}

# Generate encryption key if needed
Write-Host "`nGenerating encryption key..." -ForegroundColor Yellow
try {
    php spark key:generate
    Write-Host "✓ Encryption key generated" -ForegroundColor Green
} catch {
    Write-Host "! Could not generate encryption key automatically" -ForegroundColor Yellow
    Write-Host "  You can generate it later with: php spark key:generate" -ForegroundColor Cyan
}

# Run project diagnostic
Write-Host "`nRunning project diagnostic..." -ForegroundColor Yellow
php project_diagnostic.php

Write-Host "`n=== Setup Complete! ===" -ForegroundColor Green
Write-Host "Next steps:" -ForegroundColor Cyan
Write-Host "1. Configure your database settings in .env file" -ForegroundColor White
Write-Host "2. Start the development server: php spark serve" -ForegroundColor White
Write-Host "3. Open your browser to: http://localhost:8080" -ForegroundColor White
Write-Host "4. Check for any remaining issues in the diagnostic above" -ForegroundColor White
