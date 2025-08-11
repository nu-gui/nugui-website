-- =============================================
-- Add business validation fields to existing tables
-- =============================================

-- Add business_name and company_website to tickets table
ALTER TABLE `tickets` 
ADD COLUMN `business_name` VARCHAR(255) NULL AFTER `customer_name`,
ADD COLUMN `company_website` VARCHAR(255) NULL AFTER `customer_company`,
ADD COLUMN `email_verified` BOOLEAN DEFAULT FALSE AFTER `customer_email`,
ADD COLUMN `domain_verified` BOOLEAN DEFAULT FALSE AFTER `company_website`;

-- Add index for business_name searches
CREATE INDEX idx_tickets_business_name ON tickets(business_name);

-- Create email domain whitelist/blacklist table
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

-- Create form submission tracking table for security
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

-- Create suspicious activity log
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

-- Pre-populate some known business domains as whitelist
INSERT INTO `email_domain_rules` (`domain`, `rule_type`, `business_name`, `notes`) VALUES
-- Known South African businesses
('vodacom.co.za', 'whitelist', 'Vodacom', 'Major telecom provider'),
('mtn.co.za', 'whitelist', 'MTN', 'Major telecom provider'),
('telkom.co.za', 'whitelist', 'Telkom', 'Major telecom provider'),
('cellc.co.za', 'whitelist', 'Cell C', 'Telecom provider'),
('absa.co.za', 'whitelist', 'ABSA Bank', 'Major bank'),
('standardbank.co.za', 'whitelist', 'Standard Bank', 'Major bank'),
('fnb.co.za', 'whitelist', 'FNB', 'Major bank'),
('nedbank.co.za', 'whitelist', 'Nedbank', 'Major bank'),
('discovery.co.za', 'whitelist', 'Discovery', 'Insurance and financial services'),
('oldmutual.co.za', 'whitelist', 'Old Mutual', 'Financial services'),
('sanlam.co.za', 'whitelist', 'Sanlam', 'Financial services'),

-- Known personal email domains as blacklist
('gmail.com', 'blacklist', NULL, 'Personal email - requires company website'),
('yahoo.com', 'blacklist', NULL, 'Personal email - requires company website'),
('hotmail.com', 'blacklist', NULL, 'Personal email - requires company website'),
('outlook.com', 'blacklist', NULL, 'Personal email - requires company website'),

-- Disposable email services - hard block
('mailinator.com', 'blacklist', NULL, 'Disposable email - blocked'),
('guerrillamail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('10minutemail.com', 'blacklist', NULL, 'Disposable email - blocked'),
('tempmail.com', 'blacklist', NULL, 'Disposable email - blocked');

-- Update existing contact form submissions (if table exists)
-- This is for migration purposes
-- ALTER TABLE `contact_submissions` 
-- ADD COLUMN `business_name` VARCHAR(255) NULL AFTER `name`,
-- ADD COLUMN `company_website` VARCHAR(255) NULL AFTER `email`;

-- Create stored procedure for checking email domain rules
DELIMITER $$
CREATE PROCEDURE `check_email_domain`(IN email_address VARCHAR(255))
BEGIN
    DECLARE domain VARCHAR(255);
    DECLARE rule VARCHAR(50);
    
    -- Extract domain from email
    SET domain = SUBSTRING_INDEX(email_address, '@', -1);
    
    -- Check domain rules
    SELECT rule_type INTO rule
    FROM email_domain_rules
    WHERE domain = domain AND is_active = TRUE
    LIMIT 1;
    
    IF rule IS NULL THEN
        -- No rule found, treat as potential business email
        SELECT 'unknown' as status, NULL as rule_type;
    ELSE
        SELECT 'found' as status, rule as rule_type;
    END IF;
END$$
DELIMITER ;