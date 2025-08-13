-- =============================================
-- FIX PARTNERS TABLE - Add Missing Columns
-- Run this file in phpMyAdmin to fix form submission errors
-- Date: August 13, 2025
-- =============================================

-- USE YOUR DATABASE
USE nuguiyhv_nugui_website_prod;

-- Add missing columns to existing partners table
ALTER TABLE `partners` 
ADD COLUMN IF NOT EXISTS `question6` TEXT DEFAULT NULL AFTER `question5`,
ADD COLUMN IF NOT EXISTS `question7` TEXT DEFAULT NULL AFTER `question6`;

-- Verify the columns were added successfully
SELECT 
    COLUMN_NAME,
    DATA_TYPE,
    IS_NULLABLE,
    COLUMN_DEFAULT
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'nuguiyhv_nugui_website_prod' 
AND TABLE_NAME = 'partners' 
AND COLUMN_NAME IN ('question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7')
ORDER BY ORDINAL_POSITION;

-- Show success message
SELECT 'Partners table has been updated successfully. Columns question6 and question7 have been added.' AS Result;