@echo off
echo Starting NU GUI Website on http://localhost:8090
echo.
echo Press Ctrl+C to stop the server
echo.
cd public
"C:\Users\wesle\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.4_Microsoft.Winget.Source_8wekyb3d8bbwe\php.exe" -S localhost:8090
pause