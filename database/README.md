# Database Schema Documentation

## Current Schema File
- **`schema.sql`** - Complete database schema with all required tables (August 2025)
  - Safe to run multiple times (uses `CREATE TABLE IF NOT EXISTS`)
  - Includes all tables for forms, tickets, sessions, and security
  - Pre-populated with email validation rules

## Directory Structure

### `/migrations/`
Directory for future database migrations (currently empty)

### `/archive/`
Historical SQL files (for reference only):
- `01_add_business_fields.sql` - Added business validation fields
- `02_complete_database.sql` - Initial complete database setup
- `03_ticketing_system.sql` - Ticketing system tables

## How to Deploy Database

### Option 1: Via cPanel phpMyAdmin
1. Log into cPanel
2. Open phpMyAdmin
3. Select database: `nuguiyhv_nugui_website_prod`
4. Click "Import" tab
5. Upload `schema.sql`
6. Click "Go"

### Option 2: Via SSH Terminal
```bash
cd ~/ci_app/database
mysql -u nuguiyhv_nugui_db_user -p nuguiyhv_nugui_website_prod < schema.sql
```

## Tables Included

1. **partners** - Partner program applications
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
- Always backup database before running updates
- The schema.sql is idempotent (safe to run multiple times)
- All foreign keys and indexes are properly configured