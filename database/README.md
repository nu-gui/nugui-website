# Database Documentation

## Database Setup File

### **`rebuild_database.sql`** - Complete Database Schema
- **WARNING**: This script DROPS and RECREATES all tables (deletes all data)
- Use this to fix any database structure issues
- Creates all tables with correct structure including all question columns
- Includes default email domain rules

## How to Deploy Database

### Via cPanel phpMyAdmin (Recommended)
1. **BACKUP YOUR DATA FIRST** if you have important records
2. Log into cPanel
3. Open phpMyAdmin
4. Select database: `nuguiyhv_nugui_website_prod`
5. Click "Import" tab
6. Upload `rebuild_database.sql`
7. Click "Go"

### Via SSH Terminal
```bash
cd ~/ci_app/database
mysql -u nuguiyhv_nugui_db_user -p nuguiyhv_nugui_website_prod < rebuild_database.sql
```
(Enter password when prompted)

## Tables Created

1. **partners** - Partner program applications (includes question1-7 columns)
2. **ci_sessions** - Session management
3. **form_submissions** - Form submission tracking
4. **email_domain_rules** - Email validation rules
5. **security_logs** - Security event logging
6. **tickets** - Support ticket system
7. **ticket_messages** - Ticket conversations
8. **ticket_cc_recipients** - CC recipients
9. **ticket_status_history** - Status change history

## Database Credentials
Located in `.env.production`:
- Database: `nuguiyhv_nugui_website_prod`
- Username: `nuguiyhv_nugui_db_user`
- Password: [See .env.production]

## Important Notes
- **This script will DELETE ALL EXISTING DATA**
- Always backup your database before running this script
- The script includes verification queries to confirm successful rebuild
- All foreign keys and indexes are properly configured