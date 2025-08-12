-- =============================================
-- COMPLETE DATABASE SETUP FOR NU GUI WEBSITE
-- This file includes ALL required tables
-- =============================================

-- 1. PARTNERS TABLE (from migration)
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

-- 3. Import the ticketing system tables
-- Run: database/ticketing_system.sql

-- 4. Import additional business fields
-- Run: database/add_business_fields.sql