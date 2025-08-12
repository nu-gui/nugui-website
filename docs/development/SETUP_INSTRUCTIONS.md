# NU GUI Website - Setup Instructions

## Current Status

The website has been partially debugged with the following fixes applied:

1. **Fixed Kint Configuration**: Updated `app/Config/Kint.php` to remove the undefined `SORT_FULL` constant
2. **Created Temporary Autoloader**: Added a minimal autoloader at `vendor/autoload.php` 
3. **Updated System Path**: Modified `app/Config/Paths.php` to use the temporary CI4 installation
4. **Verified Environment**: The `.env` file is properly configured for local development

## To Complete Setup

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL/MariaDB database server

### Installation Steps

1. **Install PHP 8.1+**
   - Windows: Download from https://windows.php.net/download/
   - Linux: `sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mysql php8.1-mbstring php8.1-xml php8.1-curl`
   - Mac: `brew install php@8.1`

2. **Install Composer**
   ```bash
   # Windows: Run the Composer-Setup.exe in the project root
   # Or download from https://getcomposer.org/download/
   
   # Linux/Mac:
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   ```

3. **Install Dependencies**
   ```bash
   cd /mnt/d/Dev_Projects/GitHub/nugui-website
   composer install
   ```

4. **Create Database**
   ```sql
   CREATE DATABASE nugui_website;
   ```

5. **Run Database Migrations** (if any)
   ```bash
   php spark migrate
   ```

6. **Start Development Server**
   ```bash
   php spark serve
   ```

7. **Access Website**
   Open browser to: http://localhost:8080

## Temporary Fixes Applied

Due to the lack of PHP/Composer in the current environment, the following temporary fixes were applied:

1. Created a minimal autoloader that uses the CI4 files from `temp_ci4/CodeIgniter4-develop/`
2. This allows the basic structure to load but full functionality requires proper Composer installation

## Troubleshooting

- If you get autoload errors, delete the `vendor` directory and run `composer install`
- For database connection errors, verify your MySQL credentials in `.env`
- For permission errors, ensure the `writable` directory and subdirectories are writable
- Run `php test_fixes.php` to verify the fixes are working

## Production Deployment

For production, make sure to:
1. Set `CI_ENVIRONMENT = production` in `.env`
2. Update `app.baseURL` to your domain
3. Set `app.forceGlobalSecureRequests = true`
4. Use production database credentials
5. Run `composer install --no-dev`