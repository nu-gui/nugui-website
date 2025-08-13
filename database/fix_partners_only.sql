-- =============================================
-- FIX PARTNERS TABLE ONLY - Add Missing Columns
-- This does NOT drop tables, just adds missing columns
-- Date: August 13, 2025
-- =============================================

USE nuguiyhv_nugui_website_prod;

-- Check current columns in partners table
SELECT 'Current partners table columns:' AS Status;
SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'nuguiyhv_nugui_website_prod' 
AND TABLE_NAME = 'partners'
ORDER BY ORDINAL_POSITION;

-- Add missing columns one by one (ignoring errors if they exist)
-- Using separate statements to avoid dependency issues

-- Try to add question1
ALTER TABLE `partners` ADD COLUMN `question1` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Try to add question2  
ALTER TABLE `partners` ADD COLUMN `question2` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Try to add question3
ALTER TABLE `partners` ADD COLUMN `question3` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Try to add question4
ALTER TABLE `partners` ADD COLUMN `question4` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Try to add question5
ALTER TABLE `partners` ADD COLUMN `question5` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Try to add question6
ALTER TABLE `partners` ADD COLUMN `question6` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Try to add question7
ALTER TABLE `partners` ADD COLUMN `question7` TEXT DEFAULT NULL;
-- If it fails, column already exists, continue

-- Show final structure
SELECT 'Updated partners table structure:' AS Status;
DESCRIBE partners;

SELECT '✅ Partners table has been updated. All question columns should now exist.' AS Result;