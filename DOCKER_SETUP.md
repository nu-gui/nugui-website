# Docker Local Development Setup

## ✅ Docker Configuration Status

Your repository **DOES support** local Docker container builds with localhost .env configuration for development testing.

## 📁 Docker Configuration Structure

```
nugui-website/
├── dev-tools/docker/
│   ├── docker-compose.yml    # Main compose configuration
│   ├── Dockerfile            # PHP 8.1 + Apache setup
│   ├── .env                  # Local environment variables
│   └── nginx-config/         # Nginx configuration (if needed)
├── .env                      # Main environment file
├── .env.docker              # Docker-specific environment
├── .env.docker.example      # Docker environment template
└── docker-local-test.sh     # Helper script for testing
```

## 🚀 Quick Start

### 1. Prerequisites
- Docker Desktop installed and running
- Docker Compose (included with Docker Desktop)

### 2. Using the Test Script

```bash
# Make the script executable
chmod +x docker-local-test.sh

# Run the test script
./docker-local-test.sh
```

### 3. Manual Docker Commands

```bash
# Navigate to docker directory
cd dev-tools/docker

# Build and start containers
docker-compose up -d --build

# Stop containers
docker-compose down

# View logs
docker-compose logs -f
```

## 🔧 Current Configuration

### Services
1. **Web Server (nugui-web)**
   - PHP 8.1 with Apache
   - CodeIgniter 4 ready
   - Port: 8080

2. **MySQL Database (nugui-db)**
   - MySQL 8.0
   - Port: 3307
   - Database: nugui_website

3. **PHPMyAdmin (nugui-phpmyadmin)**
   - Web-based MySQL management
   - Port: 8081

### Access Points
- **Website**: http://localhost:8080
- **PHPMyAdmin**: http://localhost:8081
- **MySQL**: localhost:3307

## 📝 Environment Configuration

### Key Settings in `.env`

```env
# Application
CI_ENVIRONMENT = development        # Change for local testing
app.baseURL = 'http://localhost:8080/'

# Database (Docker internal)
database.default.hostname = host.docker.internal
database.default.database = nugui_website
database.default.username = root
database.default.password = secure_root_password_change_me
database.default.port = 3307

# Email (for testing)
CONTACT_EMAIL_USER = info@nugui.co.za
SUPPORT_EMAIL_USER = support@nugui.co.za
```

## 🛠️ Common Tasks

### Import Database
```bash
# Copy SQL file to container
docker cp database/schema.sql nugui-db:/tmp/

# Import into MySQL
docker exec -it nugui-db mysql -uroot -psecure_root_password_change_me nugui_website < /tmp/schema.sql
```

### Access Container Shell
```bash
# Web container
docker exec -it nugui-web bash

# Database container
docker exec -it nugui-db mysql -uroot -p
```

### Clear Cache
```bash
docker exec nugui-web rm -rf writable/cache/*
```

### View Logs
```bash
# All services
docker-compose logs -f

# Specific service
docker-compose logs -f web
docker-compose logs -f db
```

## 🔍 Troubleshooting

### Port Conflicts
If ports are already in use:
1. Change ports in `docker-compose.yml`:
   ```yaml
   ports:
     - "8090:80"  # Change 8080 to 8090
   ```

2. Update `.env`:
   ```env
   app.baseURL = 'http://localhost:8090/'
   ```

### Database Connection Issues
1. Ensure `host.docker.internal` is used for hostname
2. Check port mapping (3307 external → 3306 internal)
3. Verify credentials match in both `.env` and `docker-compose.yml`

### Permission Issues
```bash
# Fix writable directory permissions
docker exec nugui-web chmod -R 777 writable
docker exec nugui-web chown -R www-data:www-data writable
```

### Clean Rebuild
```bash
cd dev-tools/docker
docker-compose down -v  # Remove volumes
docker-compose build --no-cache
docker-compose up -d
```

## ✨ Features

- ✅ **Hot Reload**: Changes to PHP files reflect immediately
- ✅ **Persistent Database**: Data survives container restarts
- ✅ **Session Management**: Sessions stored in volume
- ✅ **PHPMyAdmin**: Visual database management
- ✅ **Isolated Environment**: No conflicts with local setup

## 🔒 Security Notes

For local development only! Before production:
1. Change all default passwords
2. Remove PHPMyAdmin service
3. Update environment to `production`
4. Use proper SSL certificates
5. Implement proper secrets management

## 📚 Additional Resources

- [Docker Documentation](https://docs.docker.com/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [CodeIgniter 4 Documentation](https://codeigniter.com/user_guide/)

## 💡 Tips

1. **Performance**: Use Docker Desktop's resource settings to allocate more RAM/CPU
2. **Debugging**: Enable CodeIgniter's debug toolbar in development
3. **Database GUI**: Use PHPMyAdmin at http://localhost:8081
4. **Live Reload**: Consider adding browser-sync for frontend development

---

Your Docker setup is **ready for local development testing**! 🚀