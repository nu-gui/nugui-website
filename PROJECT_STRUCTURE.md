# Project Structure - NU GUI Website

## 📁 Directory Organization

```
nugui-website/
│
├── 📱 app/                     # CodeIgniter 4 Application
│   ├── Config/                 # Configuration files
│   ├── Controllers/            # MVC Controllers
│   ├── Database/               # Migrations and seeds
│   ├── Filters/                # Request/Response filters
│   ├── Helpers/                # Helper functions
│   ├── Libraries/              # Custom libraries
│   ├── Models/                 # Data models
│   ├── ThirdParty/            # Third-party libraries
│   └── Views/                  # View templates
│
├── 🌐 public/                  # Web-accessible files only
│   ├── assets/                 # Images, fonts, downloads
│   ├── css/                    # Stylesheets
│   ├── js/                     # JavaScript files
│   ├── images/                 # Public images
│   └── index.php              # Application entry point
│
├── 💾 database/                # Database scripts
│   ├── complete_database.sql   # Full database structure
│   ├── ticketing_system.sql   # Support ticket tables
│   └── add_business_fields.sql # Business form fields
│
├── 📚 docs/                    # Documentation (NOT deployed)
│   ├── deployment/             # Deployment guides
│   ├── development/            # Development docs
│   ├── design/                 # Design system docs
│   └── security/               # Security documentation
│
├── 🔧 dev-tools/               # Development tools (NOT deployed)
│   ├── scripts/                # Build and deployment scripts
│   ├── tests/                  # Test files and utilities
│   ├── docker/                 # Docker configuration
│   ├── debug/                  # Debug tools and logs
│   ├── archived/               # Old/archived files
│   ├── theme-audit/            # Theme audit results
│   └── theme-audit-fixed/      # Fixed theme files
│
├── 📝 scripts/                 # Production scripts
│   └── deployment/             # Deployment automation
│
├── 🧪 tests/                   # PHPUnit tests
│   ├── unit/                   # Unit tests
│   ├── database/               # Database tests
│   └── _support/               # Test support files
│
├── ✏️ writable/                # Runtime writable directories
│   ├── cache/                  # Cache files
│   ├── logs/                   # Application logs
│   ├── session/                # Session files
│   ├── uploads/                # User uploads
│   └── debugbar/               # Debug toolbar data
│
├── ⚙️ Configuration Files
│   ├── .cpanel.yml            # cPanel deployment config
│   ├── .env.production        # Production environment template
│   ├── .gitignore             # Git ignore rules
│   ├── .htaccess              # Apache configuration
│   ├── composer.json          # PHP dependencies
│   ├── package.json           # Node.js dependencies
│   ├── robots.txt             # Search engine rules
│   └── favicon.ico            # Website favicon
│
└── 📄 Root Files
    ├── README.md              # Project overview
    ├── LICENSE                # License file
    ├── spark                  # CodeIgniter CLI tool
    └── builds                 # Build configuration
```

## 🚀 Production Deployment

### Files Deployed to Production:
- ✅ `app/` - Application code (protected location)
- ✅ `public/` - Public assets only
- ✅ `system/` - CodeIgniter framework (protected)
- ✅ `vendor/` - PHP dependencies (protected)
- ✅ `writable/` - Runtime directories (protected)
- ✅ `.env.production` → `.env` (protected)
- ✅ Essential configs (.htaccess, robots.txt)

### Files NOT Deployed:
- ❌ `dev-tools/` - Development utilities
- ❌ `docs/` - Documentation
- ❌ `tests/` - Test suites
- ❌ `node_modules/` - Node.js packages
- ❌ `.env` - Local environment
- ❌ Development scripts and debug files

## 🔒 Security Structure

```
/home/nuguiyhv/
├── nugui-app/              # Protected (above web root)
│   ├── app/
│   ├── system/
│   ├── vendor/
│   ├── writable/
│   └── .env
│
└── public_html/           # Public (web accessible)
    ├── css/
    ├── js/
    ├── assets/
    └── index.php
```

## 📋 Quick Commands

```bash
# Local Development
php spark serve

# Run Tests
./vendor/bin/phpunit

# Deploy to Production
git push origin main
# Then use cPanel Git deployment

# Clear Cache
php spark cache:clear
```

## 🏗️ Industry Standards Compliance

✅ **PSR-4 Autoloading** - Proper namespace structure
✅ **MVC Architecture** - Clear separation of concerns
✅ **Security First** - Sensitive files above web root
✅ **Environment-based Config** - .env for configuration
✅ **Version Control** - Comprehensive .gitignore
✅ **Documentation** - Organized docs structure
✅ **Testing** - Dedicated test directories
✅ **Asset Organization** - Clear public/private separation
✅ **Dependency Management** - Composer for PHP, npm for JS
✅ **Deployment Automation** - cPanel YAML configuration