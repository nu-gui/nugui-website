# NU GUI Website Local Development Server
# PowerShell script to start the CodeIgniter application

$Host.UI.RawUI.WindowTitle = "NU GUI Local Server"
Clear-Host

Write-Host "==========================================" -ForegroundColor Cyan
Write-Host "     NU GUI Website Development Server    " -ForegroundColor Yellow
Write-Host "==========================================" -ForegroundColor Cyan
Write-Host ""

# Check if PHP is available
$phpPath = "C:\Users\wesle\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.4_Microsoft.Winget.Source_8wekyb3d8bbwe\php.exe"

if (-not (Test-Path $phpPath)) {
    Write-Host "ERROR: PHP not found at expected location!" -ForegroundColor Red
    Write-Host "Please install PHP 8.4 using: winget install PHP.PHP.8.4" -ForegroundColor Yellow
    Read-Host "Press Enter to exit"
    exit 1
}

# Get available ports (try 8090, 8080, 8000, 3000 in order)
$ports = @(8090, 8080, 8000, 3000)
$selectedPort = $null

foreach ($port in $ports) {
    $tcpConnection = Test-NetConnection -ComputerName localhost -Port $port -WarningAction SilentlyContinue -InformationLevel Quiet
    if (-not $tcpConnection) {
        $selectedPort = $port
        break
    }
}

if ($null -eq $selectedPort) {
    Write-Host "ERROR: No available ports found!" -ForegroundColor Red
    Read-Host "Press Enter to exit"
    exit 1
}

Write-Host "Starting server on port $selectedPort..." -ForegroundColor Green
Write-Host ""
Write-Host "Server URLs:" -ForegroundColor Cyan
Write-Host "  Local:    " -NoNewline
Write-Host "http://localhost:$selectedPort" -ForegroundColor Green
Write-Host "  Network:  " -NoNewline

# Get local IP address
$localIP = (Get-NetIPAddress -AddressFamily IPv4 -InterfaceAlias "Wi-Fi" -ErrorAction SilentlyContinue).IPAddress
if (-not $localIP) {
    $localIP = (Get-NetIPAddress -AddressFamily IPv4 -InterfaceAlias "Ethernet" -ErrorAction SilentlyContinue).IPAddress
}
if ($localIP) {
    Write-Host "http://${localIP}:$selectedPort" -ForegroundColor Green
} else {
    Write-Host "http://[your-ip]:$selectedPort" -ForegroundColor Yellow
}

Write-Host ""
Write-Host "Pages to test:" -ForegroundColor Cyan
Write-Host "  - Home:       http://localhost:$selectedPort/" -ForegroundColor Gray
Write-Host "  - About:      http://localhost:$selectedPort/about" -ForegroundColor Gray
Write-Host "  - Solutions:  http://localhost:$selectedPort/solutions" -ForegroundColor Gray
Write-Host "  - Contact:    http://localhost:$selectedPort/contact" -ForegroundColor Gray
Write-Host "  - Support:    http://localhost:$selectedPort/support" -ForegroundColor Gray
Write-Host ""
Write-Host "Press Ctrl+C to stop the server" -ForegroundColor Yellow
Write-Host "==========================================" -ForegroundColor Cyan
Write-Host ""

# Change to public directory
Set-Location -Path "public"

# Start the PHP server
try {
    & $phpPath -S "localhost:$selectedPort"
} catch {
    Write-Host "ERROR: Failed to start server!" -ForegroundColor Red
    Write-Host $_.Exception.Message -ForegroundColor Red
} finally {
    Set-Location -Path ".."
    Read-Host "Press Enter to exit"
}