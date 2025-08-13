-- =============================================
-- PRODUCTION DATABASE UPDATE SCRIPT
-- Run this on your webserver to ensure all tables exist
-- Date: August 13, 2025
-- =============================================

-- USE YOUR DATABASE
USE nuguiyhv_nugui_website_prod;

-- 1. PARTNERS TABLE (for partner program form)
CREATE TABLE IF NOT EXISTS `partners` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessName` VARCHAR(255) NOT NULL,
  `registrationNumber` VARCHAR(100) DEFAULT NULL,
  `countryBusiness` VARCHAR(100) NOT NULL,
  `contactName` VARCHAR(255) NOT NULL,
  `contactEmail` VARCHAR(255) NOT NULL,
  `contactPhone` VARCHAR(50) NOT NULL,
  `Skype_Teams` VARCHAR(255) DEFAULT NULL,
  `question1` TEXT DEFAULT NULL,
  `question2` TEXT DEFAULT NULL,
  `question3` TEXT DEFAULT NULL,
  `question4` TEXT DEFAULT NULL,
  `question5` TEXT DEFAULT NULL,
  `question6` TEXT DEFAULT NULL,
  `question7` TEXT DEFAULT NULL,
  `reference` VARCHAR(255) DEFAULT NULL,
  `terms_accepted` BOOLEAN DEFAULT FALSE NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_contactEmail` (`contactEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. SESSION TABLE (for database session handler)
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` VARCHAR(128) NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `timestamp` INT(10) UNSIGNED DEFAULT 0 NOT NULL,
  `data` BLOB NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. FORM SUBMISSIONS TABLE (for tracking all form submissions)
CREATE TABLE IF NOT EXISTS `form_submissions` (
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
  KEY `idx_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. EMAIL DOMAIN RULES TABLE
CREATE TABLE IF NOT EXISTS `email_domain_rules` (
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

-- 5. SECURITY LOGS TABLE
CREATE TABLE IF NOT EXISTS `security_logs` (
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
CREATE TABLE IF NOT EXISTS `tickets` (
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

-- 7. TICKET MESSAGES TABLE
CREATE TABLE IF NOT EXISTS `ticket_messages` (
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

-- 8. TICKET CC RECIPIENTS TABLE
CREATE TABLE IF NOT EXISTS `ticket_cc_recipients` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) DEFAULT NULL,
  `added_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ticket_email` (`ticket_id`, `email`),
  CONSTRAINT `fk_ticket_cc_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. TICKET STATUS HISTORY TABLE
CREATE TABLE IF NOT EXISTS `ticket_status_history` (
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

-- 10. INSERT DEFAULT EMAIL DOMAIN RULES (only if table is empty)
INSERT IGNORE INTO `email_domain_rules` (`domain`, `rule_type`, `business_name`, `notes`) VALUES
-- South African businesses
('vodacom.co.za', 'whitelist', 'Vodacom', 'Major telecom provider'),
('mtn.co.za', 'whitelist', 'MTN', 'Major telecom provider'),
('telkom.co.za', 'whitelist', 'Telkom', 'Major telecom provider'),
('cellc.co.za', 'whitelist', 'Cell C', 'Telecom provider'),
-- Personal email domains
('gmail.com', 'blacklist', NULL, 'Personal email - requires company website'),
('yahoo.com', 'blacklist', NULL, 'Personal email - requires company website'),
('hotmail.com', 'blacklist', NULL, 'Personal email - requires company website'),
('outlook.com', 'blacklist', NULL, 'Personal email - requires company website'),
-- Disposable emails
('mailinator.com', 'blacklist', NULL, 'Disposable email - blocked'),
('guerrillamail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('10minutemail.com', 'blacklist', NULL, 'Disposable email - blocked');

-- =============================================
-- VERIFICATION QUERIES
-- Run these to check if tables were created
-- =============================================
-- SELECT 'Tables Created:' as Status;
-- SHOW TABLES;