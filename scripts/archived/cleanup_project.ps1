# CodeIgniter 4 Project Cleanup Script
# This script removes unnecessary files and cleans up your project

Write-Host "CodeIgniter 4 Project Cleanup" -ForegroundColor Green
Write-Host "==============================" -ForegroundColor Green

# Files to remove (development/testing files that shouldn't be in production)
$filesToRemove = @(
    "info.php",                    # PHP info file (security risk)
    "phpinfo.php",                 # Another PHP info file
    "composer-setup.exe",          # Composer installer
    "xampp-installer.exe",         # XAMPP installer
    "app/Controllers/DatabaseTest.php",  # Test controller
    "app/Controllers/PartnerProgram_copy.php"  # Duplicate file
)

# Directories to clean
$dirsToClean = @(
    "writable/cache",
    "writable/logs",
    "writable/session"
)

Write-Host "`nRemoving unnecessary files..." -ForegroundColor Yellow

foreach ($file in $filesToRemove) {
    if (Test-Path $file) {
        try {
            Remove-Item $file -Force
            Write-Host "✓ Removed: $file" -ForegroundColor Green
        } catch {
            Write-Host "✗ Failed to remove: $file" -ForegroundColor Red
        }
    } else {
        Write-Host "! Not found: $file" -ForegroundColor Gray
    }
}

Write-Host "`nCleaning cache and temporary files..." -ForegroundColor Yellow

foreach ($dir in $dirsToClean) {
    if (Test-Path $dir) {
        try {
            Get-ChildItem $dir -File | Where-Object { $_.Name -ne ".gitkeep" } | Remove-Item -Force
            Write-Host "✓ Cleaned: $dir" -ForegroundColor Green
        } catch {
            Write-Host "✗ Failed to clean: $dir" -ForegroundColor Red
        }
    }
}

# Create .gitkeep files in writable directories
$writeableDirs = @(
    "writable/cache",
    "writable/logs", 
    "writable/session",
    "writable/uploads"
)

Write-Host "`nEnsuring .gitkeep files exist..." -ForegroundColor Yellow

foreach ($dir in $writeableDirs) {
    $gitkeepFile = Join-Path $dir ".gitkeep"
    if (-not (Test-Path $gitkeepFile)) {
        New-Item -ItemType File -Path $gitkeepFile -Force | Out-Null
        Write-Host "✓ Created: $gitkeepFile" -ForegroundColor Green
    }
}

# Check for other potential issues
Write-Host "`nChecking for other issues..." -ForegroundColor Yellow

# Check for large files that might not belong
Get-ChildItem -File -Recurse | Where-Object { $_.Length -gt 10MB } | ForEach-Object {
    Write-Host "! Large file found: $($_.FullName) ($([math]::Round($_.Length/1MB, 2)) MB)" -ForegroundColor Yellow
}

# Check for duplicate files
$duplicateFiles = @()
$controllers = Get-ChildItem "app/Controllers" -Filter "*.php"
foreach ($controller in $controllers) {
    if ($controller.BaseName -match "_copy$") {
        $duplicateFiles += $controller.FullName
    }
}

if ($duplicateFiles.Count -gt 0) {
    Write-Host "`nDuplicate files found:" -ForegroundColor Yellow
    foreach ($file in $duplicateFiles) {
        Write-Host "! $file" -ForegroundColor Yellow
    }
}

Write-Host "`n=== Cleanup Complete! ===" -ForegroundColor Green
Write-Host "Your project is now cleaner and more secure." -ForegroundColor Cyan
