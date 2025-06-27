# CodeIgniter 4 Development Environment Setup Script
# Run this script as Administrator

Write-Host "Setting up CodeIgniter 4 Development Environment..." -ForegroundColor Green

# Function to check if running as administrator
function Test-Administrator {
    $currentUser = [Security.Principal.WindowsIdentity]::GetCurrent()
    $principal = New-Object Security.Principal.WindowsPrincipal($currentUser)
    return $principal.IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)
}

if (-not (Test-Administrator)) {
    Write-Host "Please run this script as Administrator!" -ForegroundColor Red
    pause
    exit 1
}

# 1. Install Chocolatey if not present
if (-not (Get-Command choco -ErrorAction SilentlyContinue)) {
    Write-Host "Installing Chocolatey..." -ForegroundColor Yellow
    Set-ExecutionPolicy Bypass -Scope Process -Force
    [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072
    Invoke-Expression ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
}

# 2. Install PHP 8.1
Write-Host "Installing PHP 8.1..." -ForegroundColor Yellow
choco install php --version=8.1.25 -y

# 3. Install Composer
Write-Host "Installing Composer..." -ForegroundColor Yellow
choco install composer -y

# 4. Install Node.js (for frontend assets)
Write-Host "Installing Node.js..." -ForegroundColor Yellow
choco install nodejs -y

# 5. Refresh environment variables
Write-Host "Refreshing environment variables..." -ForegroundColor Yellow
refreshenv

# 6. Verify installations
Write-Host "Verifying installations..." -ForegroundColor Green
php --version
composer --version
node --version
npm --version

Write-Host "Environment setup complete!" -ForegroundColor Green
Write-Host "Next steps:" -ForegroundColor Cyan
Write-Host "1. Navigate to your project folder"
Write-Host "2. Run 'composer install' to install dependencies"
Write-Host "3. Copy 'env' to '.env' and configure your settings"
Write-Host "4. Run 'php spark serve' to start the development server"

pause
