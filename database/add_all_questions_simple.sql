-- =============================================
-- SIMPLE FIX - Add ALL Question Columns
-- Run this in phpMyAdmin to add all missing question columns
-- Date: August 13, 2025
-- =============================================

USE nuguiyhv_nugui_website_prod;

-- Add each question column separately (safe approach)
ALTER TABLE `partners` ADD COLUMN `question1` TEXT DEFAULT NULL;
ALTER TABLE `partners` ADD COLUMN `question2` TEXT DEFAULT NULL;
ALTER TABLE `partners` ADD COLUMN `question3` TEXT DEFAULT NULL;
ALTER TABLE `partners` ADD COLUMN `question4` TEXT DEFAULT NULL;
ALTER TABLE `partners` ADD COLUMN `question5` TEXT DEFAULT NULL;
ALTER TABLE `partners` ADD COLUMN `question6` TEXT DEFAULT NULL;
ALTER TABLE `partners` ADD COLUMN `question7` TEXT DEFAULT NULL;

-- Show current structure
DESCRIBE `partners`;