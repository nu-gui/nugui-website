-- =============================================
-- FIX PARTNERS TABLE - Add ALL Missing Question Columns
-- Run this file in phpMyAdmin to fix form submission errors
-- Date: August 13, 2025
-- =============================================

-- USE YOUR DATABASE
USE nuguiyhv_nugui_website_prod;

-- First, let's see what columns currently exist
SELECT COLUMN_NAME 
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'nuguiyhv_nugui_website_prod' 
AND TABLE_NAME = 'partners'
ORDER BY ORDINAL_POSITION;

-- Add ALL question columns if they don't exist
-- Using individual ALTER statements to avoid dependency issues
ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question1` TEXT DEFAULT NULL AFTER `Skype_Teams`;

ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question2` TEXT DEFAULT NULL AFTER `question1`;

ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question3` TEXT DEFAULT NULL AFTER `question2`;

ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question4` TEXT DEFAULT NULL AFTER `question3`;

ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question5` TEXT DEFAULT NULL AFTER `question4`;

ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question6` TEXT DEFAULT NULL AFTER `question5`;

ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question7` TEXT DEFAULT NULL AFTER `question6`;

-- Verify all columns were added successfully
SELECT 
    COLUMN_NAME,
    DATA_TYPE,
    IS_NULLABLE,
    ORDINAL_POSITION
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'nuguiyhv_nugui_website_prod' 
AND TABLE_NAME = 'partners'
ORDER BY ORDINAL_POSITION;

-- Show success message
SELECT 'Partners table has been updated successfully. All question columns (1-7) have been added.' AS Result;