# Database Setup Guide for cPanel Deployment

## Quick Setup Steps

### 1. Create Database (in cPanel)
- [ ] Login to cPanel
- [ ] Go to "MySQL® Databases"
- [ ] Create new database (e.g., `nuguiyhv_nugui_website`)
- [ ] Create new user (e.g., `nuguiyhv_nugui_user`)
- [ ] Generate and save password
- [ ] Add user to database with ALL PRIVILEGES

### 2. Import Database Structure (in phpMyAdmin)
- [ ] Open phpMyAdmin from cPanel
- [ ] Select your new database
- [ ] Click "Import" tab
- [ ] Upload and import IN THIS ORDER:
  1. `database/complete_database.sql` (partners & sessions tables)
  2. `database/ticketing_system.sql` (ticket system)
  3. `database/add_business_fields.sql` (form submissions & security)

### 3. Configure .env File
```ini
database.default.hostname = localhost
database.default.database = [YOUR_DB_NAME]
database.default.username = [YOUR_DB_USER]
database.default.password = [YOUR_DB_PASSWORD]
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Update Session Table (if using database sessions)
If your .env has `session.driver = 'CodeIgniter\Session\Handlers\DatabaseHandler'`, create this table:

```sql
CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(128) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`)
);
```

## Tables Created

After import, you'll have these tables:
- **tickets** - Support ticket system
- **ticket_messages** - Ticket conversations
- **ticket_attachments** - File attachments
- **ticket_tags** - Ticket categorization
- **ticket_history** - Audit trail
- **ticket_templates** - Response templates
- **ticket_notifications** - Email notifications
- **ci_sessions** - Session storage (if using database sessions)

## Testing Database Connection

Create a temporary test file `test-db.php`:

```php
<?php
$host = 'localhost';
$db = 'YOUR_DB_NAME';
$user = 'YOUR_DB_USER';
$pass = 'YOUR_DB_PASSWORD';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "✅ Database connected successfully!";
} catch(PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
```

Upload, test, then DELETE this file.

## Important Notes

1. **Database Prefix**: cPanel usually adds your account prefix (e.g., `nuguiyhv_`)
2. **Permissions**: User needs ALL PRIVILEGES for CodeIgniter to work properly
3. **Character Set**: Ensure database uses `utf8mb4` for full Unicode support
4. **Collation**: Use `utf8mb4_general_ci` or `utf8mb4_unicode_ci`

## Troubleshooting

If you get database errors:
1. Check credentials in .env file
2. Verify database and user exist in cPanel
3. Confirm user has ALL PRIVILEGES
4. Check if tables were imported correctly in phpMyAdmin
5. Ensure .env file has correct formatting (no extra spaces)

---
Last Updated: 2025-08-12