# NU GUI Website - CodeIgniter4

A professional business website built with CodeIgniter4 framework, featuring partner program registration, responsive design, and comprehensive business solutions showcase.

## Features

- **Partner Program Registration**: Complete application system with form validation and email notifications
- **Responsive Design**: Mobile-friendly navigation with hamburger menu and modern CSS styling
- **SEO Optimization**: Meta tags, Open Graph, and Twitter Card integration
- **Email Integration**: Custom email library with SMTP configuration for contact and support emails
- **reCAPTCHA Protection**: Form spam protection using Google reCAPTCHA
- **Professional UI**: Modern dark theme with professional styling and animations

## Requirements

- PHP 8.1 or higher
- MySQL/MariaDB database
- Web server (Apache/Nginx)
- Composer (for dependency management)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/nu-gui/nugui-website.git
cd nugui-website
```

2. Install dependencies:
```bash
composer install
```

3. Configure environment:
```bash
cp env .env
```

4. Update the `.env` file with your configuration:
```env
# Database Configuration
database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_username
database.default.password = your_password

# Email Configuration
SMTP_HOST=your_smtp_host
SMTP_PORT=465
SMTP_CRYPTO=ssl
CONTACT_EMAIL_USER=your_contact_email
CONTACT_EMAIL_PASS=your_contact_password
SUPPORT_EMAIL_USER=your_support_email
SUPPORT_EMAIL_PASS=your_support_password

# reCAPTCHA Configuration
RECAPTCHA_SECRET_KEY=your_recaptcha_secret_key
```

5. Run database migrations:
```bash
php spark migrate
```

6. Set up your web server to point to the `public` directory.

## Directory Structure

```
nugui-website/
├── app/
│   ├── Controllers/
│   │   ├── Home.php
│   │   └── PartnerProgram.php
│   ├── Models/
│   │   └── PartnerModel.php
│   ├── Views/
│   │   ├── layout.php
│   │   ├── home.php
│   │   ├── about.php
│   │   ├── products.php
│   │   ├── solutions.php
│   │   ├── partner_program.php
│   │   └── templates/
│   ├── Libraries/
│   │   └── CustomEmail.php
│   └── Database/
│       └── Migrations/
├── public/
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   └── index.php
└── vendor/
```

## Configuration

### Database Setup

The application uses a MySQL database with a `partners` table for storing partner program applications. The migration file includes all necessary fields:

- Business information (name, registration number, country)
- Contact details (name, email, phone, Skype/Teams)
- Application questions (4 custom fields)
- Terms acceptance and timestamps

### Email Configuration

The custom email library supports two email configurations:
- **Contact Email**: For general inquiries (info@nugui.co.za)
- **Support Email**: For support requests (support@nugui.co.za)

Both configurations use SMTP with SSL encryption and are configurable via environment variables.

### reCAPTCHA Setup

The partner program form includes reCAPTCHA protection. Configure your reCAPTCHA keys:
- Site Key: `6LeFaLYqAAAAAG7nmm6vUjjC16Ah_hUo4rQhPZTs`
- Secret Key: Set in `.env` file as `RECAPTCHA_SECRET_KEY`

### Security Features

- CSRF protection enabled
- reCAPTCHA integration for form protection
- Environment-based configuration for sensitive data
- Input validation and sanitization

## Usage

### Partner Program

The partner program allows businesses to apply for partnership opportunities. The application includes:

1. Business information collection
2. Contact details verification
3. Custom questionnaire
4. Terms and conditions acceptance
5. Email notifications to both applicant and administrators

### Pages

- **Home**: Main landing page with company overview
- **About**: Company story and team information
- **Products**: Product showcase and descriptions
- **Solutions**: Business solutions and services
- **Partner Program**: Partnership application form

## Development

### Local Development

For local development, update your `.env` file:

```env
CI_ENVIRONMENT = development
app.baseURL = 'https://www.nugui.co.za/'
app.forceGlobalSecureRequests = false
```

### Asset Management

All static assets are organized in the `public/assets/` directory:
- CSS files in `css/` subdirectory
- JavaScript files in `js/` subdirectory  
- Images in `images/` subdirectory (53+ professional images included)

## Deployment Options with Afrihost

### Option 1: cPanel Deployment (Recommended for Afrihost)

Afrihost provides cPanel with the following tools for deployment:

1. **Using cPanel File Manager**:
   - Upload your project files via File Manager
   - Ensure `public` directory contents are in `public_html`
   - Keep application files outside `public_html` for security

2. **Using Softaculous App Installer**:
   - Check if CodeIgniter4 is available in Softaculous
   - Use auto-installer for quick setup
   - Configure database during installation

3. **PHP Configuration**:
   - Use **MultiPHP Manager** to set PHP version to 8.1 or higher
   - Use **MultiPHP INI Editor** to configure:
     - `max_execution_time = 300`
     - `memory_limit = 256M`
     - `upload_max_filesize = 10M`
     - `post_max_size = 10M`

4. **Database Setup**:
   - Create MySQL database via cPanel
   - Create database user with full privileges
   - Update `.env` with database credentials

### Option 2: Docker Deployment (If Supported)

If Afrihost supports Docker containers:

```bash
# Build and run with Docker Compose
docker-compose up -d

# For production, use:
docker-compose -f docker-compose.yml up -d
```

### Option 3: Traditional FTP/SSH Deployment

1. **Prepare files locally**:
   ```bash
   # Install dependencies
   composer install --no-dev --optimize-autoloader
   
   # Build CSS for production
   npm run build:css
   ```

2. **Upload via FTP**:
   - Upload all files except `.git`, `node_modules`
   - Set proper file permissions (755 for directories, 644 for files)
   - Ensure `writable` directory has write permissions

3. **Configure production environment**:
   - Update `.env` for production settings
   - Set `CI_ENVIRONMENT = production`
   - Configure proper base URL

For detailed deployment instructions, see [DEPLOYMENT.md](DEPLOYMENT.md)

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is licensed under the MIT License.

## Support

For support and questions, contact:
- Email: support@nugui.co.za
- Website: https://nugui.co.za

## Technical Details

- **Framework**: CodeIgniter4
- **PHP Version**: 8.1+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Email**: SMTP with SSL
- **Security**: CSRF, reCAPTCHA, Input validation
- **Dependencies**: DomPDF for PDF generation
