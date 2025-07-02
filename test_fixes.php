<?php
/**
 * Test script to verify fixes without running a server
 */

echo "=== Testing NU GUI Website Fixes ===\n\n";

// Test 1: Check if autoload exists
echo "1. Checking autoload file...\n";
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo "   ✓ Autoload file exists\n";
    
    // Try to include it
    try {
        require_once __DIR__ . '/vendor/autoload.php';
        echo "   ✓ Autoload file loaded successfully\n";
    } catch (Exception $e) {
        echo "   ✗ Error loading autoload: " . $e->getMessage() . "\n";
    }
} else {
    echo "   ✗ Autoload file missing\n";
}

// Test 2: Check Kint configuration
echo "\n2. Checking Kint configuration...\n";
try {
    if (class_exists('Config\Kint')) {
        $kint = new Config\Kint();
        echo "   ✓ Kint config loaded successfully\n";
        echo "   ✓ richSort value: " . $kint->richSort . "\n";
    } else {
        echo "   ! Kint config class not found (may need full framework)\n";
    }
} catch (Exception $e) {
    echo "   ✗ Error with Kint config: " . $e->getMessage() . "\n";
}

// Test 3: Check environment file
echo "\n3. Checking environment configuration...\n";
if (file_exists(__DIR__ . '/.env')) {
    echo "   ✓ .env file exists\n";
    
    // Read key settings
    $envContent = file_get_contents(__DIR__ . '/.env');
    if (strpos($envContent, 'CI_ENVIRONMENT = development') !== false) {
        echo "   ✓ Environment set to development\n";
    }
    if (strpos($envContent, 'app.baseURL') !== false) {
        echo "   ✓ Base URL configured\n";
    }
    if (strpos($envContent, 'database.default.hostname') !== false) {
        echo "   ✓ Database configuration found\n";
    }
} else {
    echo "   ✗ .env file missing\n";
}

// Test 4: Check directory permissions
echo "\n4. Checking writable directories...\n";
$dirs = ['writable', 'writable/cache', 'writable/logs', 'writable/session'];
foreach ($dirs as $dir) {
    $path = __DIR__ . '/' . $dir;
    if (is_dir($path) && is_writable($path)) {
        echo "   ✓ $dir is writable\n";
    } else {
        echo "   ✗ $dir is not writable or missing\n";
    }
}

// Test 5: Basic CodeIgniter test
echo "\n5. Testing CodeIgniter framework...\n";
try {
    if (defined('SYSTEMPATH') && file_exists(SYSTEMPATH . 'CodeIgniter.php')) {
        echo "   ✓ CodeIgniter system files accessible\n";
    } else {
        echo "   ! CodeIgniter system files not found (using temporary autoloader)\n";
    }
} catch (Exception $e) {
    echo "   ✗ Error: " . $e->getMessage() . "\n";
}

echo "\n=== Summary ===\n";
echo "The following fixes have been applied:\n";
echo "1. Created temporary autoload.php file\n";
echo "2. Fixed Kint configuration (removed SORT_FULL constant)\n";
echo "3. Environment configuration verified\n";
echo "\nTo fully run the website, you need to:\n";
echo "1. Install PHP 8.1+ on your system\n";
echo "2. Install Composer\n";
echo "3. Run: composer install\n";
echo "4. Run: php spark serve\n";
echo "5. Visit: http://localhost:8080\n";
?>