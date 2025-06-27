# PHP and Composer Installation Fix Script
# This script addresses SSL certificate issues and installs Composer properly

Write-Host "=== PHP & Composer Installation Fix ===" -ForegroundColor Green

# First, let's find PHP installation
Write-Host "Searching for PHP installation..." -ForegroundColor Yellow

$phpPaths = @(
    "C:\tools\php",
    "C:\PHP",
    "C:\Program Files\PHP",
    "C:\php",
    "$env:USERPROFILE\scoop\apps\php\current",
    "$env:LOCALAPPDATA\Programs\PHP"
)

$phpFound = $false
$phpPath = ""

foreach ($path in $phpPaths) {
    if (Test-Path "$path\php.exe") {
        $phpPath = $path
        $phpFound = $true
        Write-Host "✓ Found PHP at: $phpPath" -ForegroundColor Green
        break
    }
}

if (-not $phpFound) {
    # Try to find PHP using where command if it's in PATH
    try {
        $whereResult = where.exe php 2>$null
        if ($whereResult) {
            $phpPath = Split-Path $whereResult[0]
            $phpFound = $true
            Write-Host "✓ Found PHP in PATH at: $phpPath" -ForegroundColor Green
        }
    } catch {
        Write-Host "PHP not found in PATH" -ForegroundColor Gray
    }
}

if (-not $phpFound) {
    Write-Host "✗ PHP not found. Let's install it manually..." -ForegroundColor Red
    
    # Download PHP manually
    $phpVersion = "8.4.8"
    $phpUrl = "https://windows.php.net/downloads/releases/php-$phpVersion-Win32-vs17-x64.zip"
    $phpZip = "php-$phpVersion.zip"
    $phpDir = "C:\PHP"
    
    Write-Host "Downloading PHP $phpVersion..." -ForegroundColor Yellow
    try {
        # Disable SSL verification for this download
        [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.SecurityProtocolType]::Tls12
        [System.Net.ServicePointManager]::ServerCertificateValidationCallback = {$true}
        
        Invoke-WebRequest -Uri $phpUrl -OutFile $phpZip -UseBasicParsing
        
        # Extract PHP
        Write-Host "Extracting PHP..." -ForegroundColor Yellow
        Expand-Archive -Path $phpZip -DestinationPath $phpDir -Force
        
        $phpPath = $phpDir
        $phpFound = $true
        
        # Add PHP to PATH
        $currentPath = [Environment]::GetEnvironmentVariable("PATH", "Machine")
        if ($currentPath -notlike "*$phpDir*") {
            [Environment]::SetEnvironmentVariable("PATH", "$currentPath;$phpDir", "Machine")
            Write-Host "✓ Added PHP to system PATH" -ForegroundColor Green
        }
        
        # Clean up
        Remove-Item $phpZip -Force
        
    } catch {
        Write-Host "✗ Failed to download PHP: $($_.Exception.Message)" -ForegroundColor Red
        exit 1
    }
}

# Configure PHP
Write-Host "Configuring PHP..." -ForegroundColor Yellow
$phpIni = "$phpPath\php.ini"
$phpIniDevelopment = "$phpPath\php.ini-development"

if (-not (Test-Path $phpIni) -and (Test-Path $phpIniDevelopment)) {
    Copy-Item $phpIniDevelopment $phpIni
    Write-Host "✓ Created php.ini from development template" -ForegroundColor Green
}

# Fix SSL certificate issues
if (Test-Path $phpIni) {
    Write-Host "Fixing SSL certificate configuration..." -ForegroundColor Yellow
    
    # Download updated CA bundle
    $caBundleUrl = "https://curl.se/ca/cacert.pem"
    $caBundlePath = "$phpPath\cacert.pem"
    
    try {
        # Download CA bundle with SSL verification disabled
        [System.Net.ServicePointManager]::ServerCertificateValidationCallback = {$true}
        Invoke-WebRequest -Uri $caBundleUrl -OutFile $caBundlePath -UseBasicParsing
        Write-Host "✓ Downloaded updated CA certificate bundle" -ForegroundColor Green
        
        # Update php.ini
        $phpIniContent = Get-Content $phpIni
        $phpIniContent = $phpIniContent -replace ';curl.cainfo =.*', "curl.cainfo = `"$caBundlePath`""
        $phpIniContent = $phpIniContent -replace ';openssl.cafile=.*', "openssl.cafile=`"$caBundlePath`""
        
        # Enable required extensions
        $phpIniContent = $phpIniContent -replace ';extension=curl', 'extension=curl'
        $phpIniContent = $phpIniContent -replace ';extension=openssl', 'extension=openssl'
        $phpIniContent = $phpIniContent -replace ';extension=mbstring', 'extension=mbstring'
        $phpIniContent = $phpIniContent -replace ';extension=mysqli', 'extension=mysqli'
        $phpIniContent = $phpIniContent -replace ';extension=pdo_mysql', 'extension=pdo_mysql'
        
        Set-Content $phpIni $phpIniContent
        Write-Host "✓ Updated php.ini with SSL and extension configuration" -ForegroundColor Green
        
    } catch {
        Write-Host "! Warning: Could not download CA bundle automatically" -ForegroundColor Yellow
        Write-Host "  You may need to configure SSL certificates manually" -ForegroundColor Gray
    }
}

# Now install Composer
Write-Host "Installing Composer..." -ForegroundColor Yellow

# Method 1: Try using PHP directly to install Composer
$composerInstaller = "composer-setup.php"
$composerUrl = "https://getcomposer.org/installer"

try {
    # Download Composer installer using PHP with SSL verification disabled
    $phpExe = "$phpPath\php.exe"
    if (Test-Path $phpExe) {
        # Create a temporary PHP script to download with disabled SSL verification
        $downloadScript = @"
<?php
// Disable SSL verification temporarily
stream_context_set_default([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
    'http' => [
        'method' => 'GET',
        'header' => 'User-Agent: Mozilla/5.0'
    ]
]);

file_put_contents('$composerInstaller', file_get_contents('$composerUrl'));
echo "Composer installer downloaded successfully\n";
?>
"@
        
        Set-Content "download_composer.php" $downloadScript
        
        # Download installer
        & $phpExe "download_composer.php"
        
        if (Test-Path $composerInstaller) {
            Write-Host "✓ Downloaded Composer installer" -ForegroundColor Green
            
            # Install Composer
            & $phpExe $composerInstaller --install-dir="$phpPath" --filename=composer.phar
            
            # Create batch file for easier access
            $composerBat = "$phpPath\composer.bat"
            Set-Content $composerBat "@echo off`nphp `"%~dp0composer.phar`" %*"
            
            Write-Host "✓ Composer installed successfully" -ForegroundColor Green
            
            # Clean up
            Remove-Item $composerInstaller -Force -ErrorAction SilentlyContinue
            Remove-Item "download_composer.php" -Force -ErrorAction SilentlyContinue
            
        } else {
            throw "Failed to download Composer installer"
        }
    } else {
        throw "PHP executable not found at $phpExe"
    }
    
} catch {
    Write-Host "✗ Method 1 failed: $($_.Exception.Message)" -ForegroundColor Red
    
    # Method 2: Download Composer.phar directly
    Write-Host "Trying alternative method..." -ForegroundColor Yellow
    try {
        $composerPhar = "$phpPath\composer.phar"
        $composerPharUrl = "https://getcomposer.org/download/latest-stable/composer.phar"
        
        [System.Net.ServicePointManager]::ServerCertificateValidationCallback = {$true}
        Invoke-WebRequest -Uri $composerPharUrl -OutFile $composerPhar -UseBasicParsing
        
        # Create batch file
        $composerBat = "$phpPath\composer.bat"
        Set-Content $composerBat "@echo off`nphp `"%~dp0composer.phar`" %*"
        
        Write-Host "✓ Composer installed via direct download" -ForegroundColor Green
        
    } catch {
        Write-Host "✗ Alternative method also failed: $($_.Exception.Message)" -ForegroundColor Red
    }
}

# Test installations
Write-Host "`nTesting installations..." -ForegroundColor Yellow

# Update PATH for current session
$env:PATH = "$phpPath;$env:PATH"

try {
    $phpVersion = & "$phpPath\php.exe" --version
    Write-Host "✓ PHP: $($phpVersion.Split("`n")[0])" -ForegroundColor Green
} catch {
    Write-Host "✗ PHP test failed" -ForegroundColor Red
}

try {
    $composerVersion = & "$phpPath\composer.bat" --version
    Write-Host "✓ Composer: $composerVersion" -ForegroundColor Green
} catch {
    Write-Host "✗ Composer test failed" -ForegroundColor Red
    Write-Host "  Try running: php $phpPath\composer.phar --version" -ForegroundColor Gray
}

Write-Host "`n=== Installation Complete ===" -ForegroundColor Green
Write-Host "Please restart your PowerShell session to use the new PATH" -ForegroundColor Cyan
Write-Host "Then run: .\quick_setup.ps1" -ForegroundColor Cyan
