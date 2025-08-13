-- =============================================
-- COMPLETE DATABASE REBUILD SCRIPT
-- This will DROP and RECREATE all tables with correct structure
-- WARNING: This will DELETE ALL EXISTING DATA!
-- Date: August 13, 2025
-- =============================================

-- USE YOUR DATABASE
USE nuguiyhv_nugui_website_prod;

-- =============================================
-- DISABLE FOREIGN KEY CHECKS TO ALLOW DROPPING TABLES
-- =============================================
SET FOREIGN_KEY_CHECKS = 0;

-- =============================================
-- DROP EXISTING TABLES
-- =============================================

DROP TABLE IF EXISTS `ticket_status_history`;
DROP TABLE IF EXISTS `ticket_cc_recipients`;
DROP TABLE IF EXISTS `ticket_messages`;
DROP TABLE IF EXISTS `tickets`;
DROP TABLE IF EXISTS `security_logs`;
DROP TABLE IF EXISTS `email_domain_rules`;
DROP TABLE IF EXISTS `form_submissions`;
DROP TABLE IF EXISTS `ci_sessions`;
DROP TABLE IF EXISTS `partners`;

-- =============================================
-- RE-ENABLE FOREIGN KEY CHECKS
-- =============================================
SET FOREIGN_KEY_CHECKS = 1;

-- =============================================
-- RECREATE ALL TABLES WITH CORRECT STRUCTURE
-- =============================================

-- 1. PARTNERS TABLE (with ALL question columns)
CREATE TABLE `partners` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessName` VARCHAR(255) NOT NULL,
  `registrationNumber` VARCHAR(100) DEFAULT NULL,
  `countryBusiness` VARCHAR(100) NOT NULL,
  `contactName` VARCHAR(255) NOT NULL,
  `contactEmail` VARCHAR(255) NOT NULL,
  `contactPhone` VARCHAR(50) NOT NULL,
  `Skype_Teams` VARCHAR(255) DEFAULT NULL,
  `question1` TEXT DEFAULT NULL COMMENT 'Annual Turnover',
  `question2` TEXT DEFAULT NULL COMMENT 'Industry',
  `question3` TEXT DEFAULT NULL COMMENT 'Partnership Type',
  `question4` TEXT DEFAULT NULL COMMENT 'Solutions of Interest',
  `question5` TEXT DEFAULT NULL COMMENT 'Additional Services',
  `question6` TEXT DEFAULT NULL COMMENT 'Business Goals',
  `question7` TEXT DEFAULT NULL COMMENT 'Additional Information',
  `reference` VARCHAR(255) DEFAULT NULL,
  `terms_accepted` BOOLEAN DEFAULT FALSE NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_contactEmail` (`contactEmail`),
  KEY `idx_businessName` (`businessName`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. CI_SESSIONS TABLE (for CodeIgniter session management)
CREATE TABLE `ci_sessions` (
  `id` VARCHAR(128) NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `timestamp` INT(10) UNSIGNED DEFAULT 0 NOT NULL,
  `data` BLOB NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. FORM_SUBMISSIONS TABLE (for tracking all form submissions)
CREATE TABLE `form_submissions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_type` ENUM('contact', 'support', 'partner') NOT NULL,
  `submission_token` VARCHAR(64) NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `user_agent` TEXT,
  `email` VARCHAR(255) NOT NULL,
  `business_name` VARCHAR(255) NULL,
  `company_website` VARCHAR(255) NULL,
  `email_domain` VARCHAR(255) NOT NULL,
  `is_business_email` BOOLEAN DEFAULT FALSE,
  `domain_verified` BOOLEAN DEFAULT FALSE,
  `submission_time` INT(11) NOT NULL COMMENT 'Time taken to fill form in seconds',
  `interaction_count` INT(11) DEFAULT 0,
  `challenge_passed` BOOLEAN DEFAULT NULL,
  `status` ENUM('pending', 'approved', 'rejected', 'suspicious') DEFAULT 'pending',
  `rejection_reason` TEXT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_token` (`submission_token`),
  KEY `idx_email` (`email`),
  KEY `idx_ip` (`ip_address`),
  KEY `idx_status` (`status`),
  KEY `idx_created` (`created_at`),
  KEY `idx_form_type` (`form_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. EMAIL_DOMAIN_RULES TABLE
CREATE TABLE `email_domain_rules` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `domain` VARCHAR(255) NOT NULL,
  `rule_type` ENUM('whitelist', 'blacklist', 'requires_verification') NOT NULL,
  `business_name` VARCHAR(255) NULL COMMENT 'Associated business name if known',
  `notes` TEXT NULL,
  `is_active` BOOLEAN DEFAULT TRUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_domain` (`domain`),
  KEY `idx_rule_type` (`rule_type`),
  KEY `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. SECURITY_LOGS TABLE
CREATE TABLE `security_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_type` VARCHAR(50) NOT NULL,
  `severity` ENUM('info', 'warning', 'critical') DEFAULT 'info',
  `ip_address` VARCHAR(45) NOT NULL,
  `user_agent` TEXT,
  `form_type` VARCHAR(50) NULL,
  `email` VARCHAR(255) NULL,
  `details` JSON,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_log_type` (`log_type`),
  KEY `idx_severity` (`severity`),
  KEY `idx_ip` (`ip_address`),
  KEY `idx_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. TICKETS TABLE (main support tickets)
CREATE TABLE `tickets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_number` VARCHAR(50) NOT NULL UNIQUE,
  `subject` VARCHAR(255) NOT NULL,
  `status` ENUM('open', 'in_progress', 'follow_up', 'escalated', 'resolved', 'closed') NOT NULL DEFAULT 'open',
  `priority` ENUM('low', 'medium', 'high', 'urgent') NOT NULL DEFAULT 'medium',
  `category` VARCHAR(100) DEFAULT NULL,
  `product` VARCHAR(100) DEFAULT NULL,
  `customer_name` VARCHAR(100) NOT NULL,
  `business_name` VARCHAR(255) NULL,
  `customer_email` VARCHAR(100) NOT NULL,
  `email_verified` BOOLEAN DEFAULT FALSE,
  `customer_phone` VARCHAR(50) DEFAULT NULL,
  `customer_company` VARCHAR(100) DEFAULT NULL,
  `company_website` VARCHAR(255) NULL,
  `domain_verified` BOOLEAN DEFAULT FALSE,
  `assigned_to` VARCHAR(100) DEFAULT NULL,
  `assigned_email` VARCHAR(100) DEFAULT NULL,
  `department` VARCHAR(50) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resolved_at` TIMESTAMP NULL DEFAULT NULL,
  `closed_at` TIMESTAMP NULL DEFAULT NULL,
  `first_response_at` TIMESTAMP NULL DEFAULT NULL,
  `response_count` INT DEFAULT 0,
  `customer_satisfaction` TINYINT DEFAULT NULL,
  `resolution_time_hours` DECIMAL(10,2) DEFAULT NULL,
  `email_message_id` VARCHAR(255) DEFAULT NULL,
  `email_thread_id` VARCHAR(255) DEFAULT NULL,
  `tags` JSON DEFAULT NULL,
  `metadata` JSON DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ticket_number` (`ticket_number`),
  KEY `idx_status` (`status`),
  KEY `idx_priority` (`priority`),
  KEY `idx_customer_email` (`customer_email`),
  KEY `idx_assigned_to` (`assigned_to`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_tickets_business_name` (`business_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. TICKET_MESSAGES TABLE
CREATE TABLE `ticket_messages` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `sender_type` ENUM('customer', 'agent', 'system') NOT NULL,
  `sender_name` VARCHAR(100) NOT NULL,
  `sender_email` VARCHAR(100) DEFAULT NULL,
  `message` TEXT NOT NULL,
  `is_internal_note` BOOLEAN DEFAULT FALSE,
  `attachments` JSON DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email_message_id` VARCHAR(255) DEFAULT NULL,
  `metadata` JSON DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ticket_id` (`ticket_id`),
  KEY `idx_created_at` (`created_at`),
  CONSTRAINT `fk_ticket_messages_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. TICKET_CC_RECIPIENTS TABLE
CREATE TABLE `ticket_cc_recipients` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) DEFAULT NULL,
  `added_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ticket_email` (`ticket_id`, `email`),
  CONSTRAINT `fk_ticket_cc_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. TICKET_STATUS_HISTORY TABLE
CREATE TABLE `ticket_status_history` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `status` VARCHAR(50) NOT NULL,
  `changed_by` VARCHAR(100) DEFAULT NULL,
  `notes` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_ticket_id` (`ticket_id`),
  KEY `idx_created_at` (`created_at`),
  CONSTRAINT `fk_status_history_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- INSERT DEFAULT EMAIL DOMAIN RULES
-- =============================================

INSERT INTO `email_domain_rules` (`domain`, `rule_type`, `business_name`, `notes`) VALUES
-- South African businesses
('vodacom.co.za', 'whitelist', 'Vodacom', 'Major telecom provider'),
('mtn.co.za', 'whitelist', 'MTN', 'Major telecom provider'),
('telkom.co.za', 'whitelist', 'Telkom', 'Major telecom provider'),
('cellc.co.za', 'whitelist', 'Cell C', 'Telecom provider'),
('rain.co.za', 'whitelist', 'Rain', 'Telecom provider'),
('afrihost.com', 'whitelist', 'Afrihost', 'ISP provider'),
('webafrica.co.za', 'whitelist', 'WebAfrica', 'ISP provider'),
('mweb.co.za', 'whitelist', 'MWEB', 'ISP provider'),
-- International telecoms
('verizon.com', 'whitelist', 'Verizon', 'US telecom'),
('att.com', 'whitelist', 'AT&T', 'US telecom'),
('t-mobile.com', 'whitelist', 'T-Mobile', 'US telecom'),
('bt.com', 'whitelist', 'British Telecom', 'UK telecom'),
('orange.com', 'whitelist', 'Orange', 'European telecom'),
('telefonica.com', 'whitelist', 'Telefonica', 'Spanish telecom'),
-- Personal email domains (require business verification)
('gmail.com', 'requires_verification', NULL, 'Personal email - requires company website'),
('yahoo.com', 'requires_verification', NULL, 'Personal email - requires company website'),
('hotmail.com', 'requires_verification', NULL, 'Personal email - requires company website'),
('outlook.com', 'requires_verification', NULL, 'Personal email - requires company website'),
('icloud.com', 'requires_verification', NULL, 'Personal email - requires company website'),
('protonmail.com', 'requires_verification', NULL, 'Personal email - requires company website'),
-- Disposable emails (blocked)
('mailinator.com', 'blacklist', NULL, 'Disposable email - blocked'),
('guerrillamail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('10minutemail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('tempmail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('throwawaymail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('yopmail.com', 'blacklist', NULL, 'Disposable email - blocked');

-- =============================================
-- VERIFICATION QUERIES
-- =============================================

-- Show all created tables
SELECT 'Database rebuild complete. Tables created:' AS Status;
SHOW TABLES;

-- Verify partners table structure
SELECT 'Partners table structure:' AS Status;
DESCRIBE partners;

-- Count records in each table
SELECT 'Record counts:' AS Status;
SELECT 'partners' as table_name, COUNT(*) as record_count FROM partners
UNION ALL
SELECT 'ci_sessions', COUNT(*) FROM ci_sessions
UNION ALL
SELECT 'form_submissions', COUNT(*) FROM form_submissions
UNION ALL
SELECT 'email_domain_rules', COUNT(*) FROM email_domain_rules
UNION ALL
SELECT 'security_logs', COUNT(*) FROM security_logs
UNION ALL
SELECT 'tickets', COUNT(*) FROM tickets
UNION ALL
SELECT 'ticket_messages', COUNT(*) FROM ticket_messages
UNION ALL
SELECT 'ticket_cc_recipients', COUNT(*) FROM ticket_cc_recipients
UNION ALL
SELECT 'ticket_status_history', COUNT(*) FROM ticket_status_history;

-- Final success message
SELECT '✅ Database rebuild completed successfully! All tables have been recreated with correct structure.' AS Result;