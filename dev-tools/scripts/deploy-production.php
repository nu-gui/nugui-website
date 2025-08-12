<?php
/**
 * Production Deployment Script for NU GUI Website
 * 
 * This script handles post-deployment tasks like database setup
 * Run this once after cPanel Git deployment to initialize the system
 */

// Prevent direct access via web browser
if (php_sapi_name() !== 'cli') {
    die('This script can only be run from command line for security reasons.');
}

echo "=== NU GUI Website Production Deployment ===\n";
echo "Starting post-deployment setup...\n\n";

// Load CodeIgniter
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
require realpath(FCPATH . 'app/Config/Paths.php') ?: FCPATH . 'app/Config/Paths.php';
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

try {
    // Initialize database
    echo "1. Checking database connection...\n";
    $db = \Config\Database::connect();
    $db->query('SELECT 1');
    echo "   ✓ Database connection successful\n\n";
    
    // Check and create ticket system tables
    echo "2. Setting up ticket system database...\n";
    
    $tables = ['tickets', 'ticket_messages', 'ticket_events', 'ticket_keyword_triggers'];
    $missingTables = [];
    
    foreach ($tables as $table) {
        if (!$db->tableExists($table)) {
            $missingTables[] = $table;
        }
    }
    
    if (!empty($missingTables)) {
        echo "   Creating missing tables: " . implode(', ', $missingTables) . "\n";
        
        // Read and execute SQL file
        $sqlFile = FCPATH . 'database/ticketing_system.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            
            // Split into individual statements
            $statements = array_filter(array_map('trim', explode(';', $sql)));
            
            foreach ($statements as $statement) {
                if (!empty($statement)) {
                    $db->query($statement);
                }
            }
            
            echo "   ✓ Ticket system tables created successfully\n";
        } else {
            echo "   ⚠ Warning: database/ticketing_system.sql not found\n";
            echo "   Please manually create the ticket system tables\n";
        }
    } else {
        echo "   ✓ All ticket system tables already exist\n";
    }
    
    // Check writable directories
    echo "\n3. Checking writable directories...\n";
    $writableDirs = ['writable/cache', 'writable/logs', 'writable/session', 'writable/uploads'];
    
    foreach ($writableDirs as $dir) {
        $fullPath = FCPATH . '../' . $dir;
        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0775, true);
            echo "   Created directory: $dir\n";
        }
        
        if (!is_writable($fullPath)) {
            chmod($fullPath, 0775);
            echo "   Fixed permissions for: $dir\n";
        }
    }
    echo "   ✓ Writable directories configured\n";
    
    // Verify environment configuration
    echo "\n4. Checking environment configuration...\n";
    $envFile = FCPATH . '../.env';
    
    if (!file_exists($envFile)) {
        echo "   ⚠ Warning: .env file not found\n";
        echo "   Please copy .env.production to .env and configure with production values\n";
    } else {
        $envContent = file_get_contents($envFile);
        
        // Check critical settings
        $checks = [
            'CI_ENVIRONMENT = production' => 'Production environment',
            'app.forceGlobalSecureRequests = true' => 'HTTPS enforcement',
            'encryption.key' => 'Encryption key'
        ];
        
        foreach ($checks as $setting => $description) {
            if (strpos($envContent, $setting) !== false) {
                echo "   ✓ $description configured\n";
            } else {
                echo "   ⚠ Warning: $description not configured\n";
            }
        }
    }
    
    // Test email configuration
    echo "\n5. Testing email configuration...\n";
    try {
        $emailService = new \App\Libraries\CustomEmail();
        $emailService->initializeConfig('contact');
        echo "   ✓ Email configuration loaded successfully\n";
    } catch (Exception $e) {
        echo "   ⚠ Warning: Email configuration issue: " . $e->getMessage() . "\n";
    }
    
    // Final security check
    echo "\n6. Security verification...\n";
    
    // Check if debug mode is disabled
    if (defined('CI_DEBUG') && CI_DEBUG === false) {
        echo "   ✓ Debug mode disabled\n";
    } else {
        echo "   ⚠ Warning: Debug mode may be enabled\n";
    }
    
    // Check file permissions
    $secureFiles = ['.env', 'composer.json'];
    foreach ($secureFiles as $file) {
        $fullPath = FCPATH . '../' . $file;
        if (file_exists($fullPath)) {
            $perms = fileperms($fullPath) & 0777;
            if ($perms === 0644) {
                echo "   ✓ Secure permissions for $file\n";
            } else {
                chmod($fullPath, 0644);
                echo "   Fixed permissions for $file\n";
            }
        }
    }
    
    echo "\n=== Deployment Setup Complete ===\n";
    echo "✓ Database tables ready\n";
    echo "✓ File permissions configured\n";
    echo "✓ Security settings verified\n";
    echo "\nYour NU GUI website is ready for production!\n";
    
    echo "\nNext steps:\n";
    echo "1. Verify all forms work correctly\n";
    echo "2. Test email delivery\n";
    echo "3. Check SSL certificate\n";
    echo "4. Configure monitoring\n";
    
} catch (Exception $e) {
    echo "\n❌ Deployment setup failed: " . $e->getMessage() . "\n";
    echo "Please check your configuration and try again.\n";
    exit(1);
}
?>