# NU GUI Website - CodeIgniter 4 Development Setup

## 🚀 Quick Start

This is a CodeIgniter 4 website project for NU GUI. Follow these steps to get your development environment running.

## 📋 Prerequisites

- **PHP 8.1+** with required extensions
- **Composer** for dependency management
- **MySQL/MariaDB** for database
- **Web Server** (Apache/Nginx) or use built-in PHP server

## 🔧 Installation Steps

### Option 1: Automated Setup (Recommended)

1. **Run the environment setup script** (as Administrator):
   ```powershell
   .\setup_environment.ps1
   ```

2. **Run the quick setup**:
   ```powershell
   .\quick_setup.ps1
   ```

3. **Start the development server**:
   ```bash
   php spark serve
   ```

4. **Open your browser** to: `http://localhost:8080`

### Option 2: Manual Setup

1. **Install dependencies**:
   ```bash
   composer install
   ```

2. **Configure environment**:
   ```bash
   cp env .env
   ```
   Edit `.env` file with your database settings.

3. **Generate encryption key**:
   ```bash
   php spark key:generate
   ```

4. **Set directory permissions**:
   Ensure `writable/` directory is writable by web server.

5. **Start development server**:
   ```bash
   php spark serve
   ```

## 🗂️ Project Structure

```
├── app/
│   ├── Controllers/     # Application controllers
│   ├── Models/         # Database models
│   ├── Views/          # View templates
│   └── Config/         # Configuration files
├── public/             # Web accessible files
│   └── assets/         # CSS, JS, Images
├── writable/           # Cache, logs, uploads
└── vendor/             # Composer dependencies
```

## 🔧 Configuration

### Environment Settings (.env)

- **Development**: `CI_ENVIRONMENT = development`
- **Base URL**: `app.baseURL = 'http://localhost:8080/'`
- **Database**: Configure your MySQL settings

### Database Setup

1. Create database: `nugui_website`
2. Update `.env` with your database credentials
3. Run migrations: `php spark migrate`

## 🛠️ Development Tools

### Available Scripts

- `php spark serve` - Start development server
- `php spark migrate` - Run database migrations
- `php spark key:generate` - Generate encryption key
- `php project_diagnostic.php` - Check project health

### Useful Commands

```bash
# Clear cache
php spark cache:clear

# View routes
php spark routes

# Run tests
./vendor/bin/phpunit
```

## 📁 Key Files

- **Routes**: `app/Config/Routes.php`
- **Database**: `app/Config/Database.php`
- **Environment**: `.env`
- **Controllers**: `app/Controllers/`
- **Views**: `app/Views/`

## 🐛 Troubleshooting

### Common Issues

1. **PHP not found**
   - Install PHP 8.1+ and add to PATH
   - Or use XAMPP/WAMP

2. **Composer not found**
   - Download from https://getcomposer.org/

3. **Permission errors**
   - Ensure `writable/` directory is writable
   - On Windows: `icacls writable /grant Everyone:F /T`

4. **Database connection fails**
   - Check database credentials in `.env`
   - Ensure MySQL server is running

5. **404 errors**
   - Check `.htaccess` in public folder
   - Verify routes in `app/Config/Routes.php`

### Debug Tools

Run the diagnostic script to check your setup:
```bash
php project_diagnostic.php
```

## 🚀 Deployment

### Production Setup

1. Set environment to production in `.env`
2. Update `app.baseURL` to your domain
3. Configure production database
4. Enable HTTPS settings
5. Set proper file permissions

### Security Checklist

- [ ] Remove debug files (`phpinfo.php`, etc.)
- [ ] Set `CI_ENVIRONMENT = production`
- [ ] Enable HTTPS
- [ ] Secure database credentials
- [ ] Set proper file permissions

## 📞 Support

If you encounter issues:

1. Check the diagnostic output: `php project_diagnostic.php`
2. Review CodeIgniter 4 documentation
3. Check project logs in `writable/logs/`

## 🔄 Updates

To update CodeIgniter 4:
```bash
composer update codeigniter4/framework
```

## 📝 Notes

- This project uses CodeIgniter 4.x
- Database migrations are in `app/Database/Migrations/`
- Views use PHP templates (not Twig)
- Assets are in `public/assets/`

---

**Project**: NU GUI Website  
**Framework**: CodeIgniter 4  
**PHP Version**: 8.1+
