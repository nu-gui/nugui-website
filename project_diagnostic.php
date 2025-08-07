<?php
/**
 * CodeIgniter 4 Project Diagnostic Tool
 * Run this script to check your project health and identify issues
 */

echo "=== CodeIgniter 4 Project Diagnostic Tool ===\n\n";

// Basic PHP environment check
echo "PHP Version: " . PHP_VERSION . "\n";
echo "PHP SAPI: " . php_sapi_name() . "\n";

// Check required PHP extensions
$required_extensions = [
    'curl', 'intl', 'json', 'libxml', 'mbstring', 
    'mysqlnd', 'openssl', 'tokenizer', 'xml'
];

echo "\n=== PHP Extensions Check ===\n";
foreach ($required_extensions as $ext) {
    $status = extension_loaded($ext) ? '✓' : '✗';
    echo sprintf("%-15s %s\n", $ext, $status);
}

// Check file permissions
echo "\n=== File Permissions Check ===\n";
$writable_dirs = ['writable', 'writable/cache', 'writable/logs', 'writable/session', 'writable/uploads'];

foreach ($writable_dirs as $dir) {
    if (is_dir($dir)) {
        $writable = is_writable($dir) ? '✓' : '✗';
        echo sprintf("%-20s %s\n", $dir, $writable);
    } else {
        echo sprintf("%-20s ✗ (not found)\n", $dir);
    }
}

// Check for environment file
echo "\n=== Configuration Check ===\n";
if (file_exists('.env')) {
    echo ".env file: ✓ Found\n";
    
    // Read .env file and check key settings
    $env_content = file_get_contents('.env');
    $env_lines = explode("\n", $env_content);
    
    $settings_to_check = [
        'CI_ENVIRONMENT',
        'app.baseURL',
        'database.default.hostname',
        'database.default.database',
        'encryption.key'
    ];
    
    foreach ($settings_to_check as $setting) {
        $found = false;
        foreach ($env_lines as $line) {
            if (strpos(trim($line), $setting) === 0 && strpos($line, '#') !== 0) {
                echo sprintf("%-25s ✓ Set\n", $setting);
                $found = true;
                break;
            }
        }
        if (!$found) {
            echo sprintf("%-25s ✗ Not set\n", $setting);
        }
    }
} else {
    echo ".env file: ✗ Not found (copy from 'env' file)\n";
}

// Check composer dependencies
echo "\n=== Composer Dependencies ===\n";
if (file_exists('vendor/autoload.php')) {
    echo "Composer vendor: ✓ Installed\n";
    
    // Check if CodeIgniter is properly installed
    if (file_exists('vendor/codeigniter4/framework')) {
        echo "CodeIgniter 4: ✓ Installed\n";
    } else {
        echo "CodeIgniter 4: ✗ Not found\n";
    }
} else {
    echo "Composer vendor: ✗ Run 'composer install'\n";
}

// Check routes
echo "\n=== Routes Check ===\n";
if (file_exists('app/Config/Routes.php')) {
    echo "Routes file: ✓ Found\n";
    
    // Basic syntax check
    $routes_content = file_get_contents('app/Config/Routes.php');
    if (strpos($routes_content, '$routes->get(') !== false) {
        echo "Route definitions: ✓ Found\n";
    } else {
        echo "Route definitions: ? No routes found\n";
    }
} else {
    echo "Routes file: ✗ Missing\n";
}

// Check controllers
echo "\n=== Controllers Check ===\n";
$controllers_dir = 'app/Controllers';
if (is_dir($controllers_dir)) {
    $controllers = glob($controllers_dir . '/*.php');
    echo sprintf("Controllers found: %d\n", count($controllers));
    
    foreach ($controllers as $controller) {
        $controller_name = basename($controller, '.php');
        
        // Basic syntax check
        $content = file_get_contents($controller);
        if (strpos($content, 'class ' . $controller_name) !== false) {
            echo sprintf("  %-20s ✓\n", $controller_name);
        } else {
            echo sprintf("  %-20s ✗ Syntax issue\n", $controller_name);
        }
    }
}

// Check recent logs for errors
echo "\n=== Recent Errors ===\n";
$log_dir = 'writable/logs';
if (is_dir($log_dir)) {
    $log_files = glob($log_dir . '/*.log');
    
    if (!empty($log_files)) {
        // Get the most recent log file
        usort($log_files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        
        $recent_log = $log_files[0];
        echo "Recent log: " . basename($recent_log) . "\n";
        
        // Read last 10 lines
        $lines = file($recent_log);
        $last_lines = array_slice($lines, -10);
        
        echo "Last 10 log entries:\n";
        foreach ($last_lines as $line) {
            if (trim($line)) {
                echo "  " . trim($line) . "\n";
            }
        }
    } else {
        echo "No log files found\n";
    }
} else {
    echo "Log directory not found\n";
}

// Database connection test (if configured)
echo "\n=== Database Connection ===\n";
try {
    if (file_exists('.env')) {
        // Try to load basic database config
        $env_content = file_get_contents('.env');
        
        if (strpos($env_content, 'database.default.hostname') !== false) {
            echo "Database config: ✓ Found in .env\n";
            
            // If vendor is available, try to test connection
            if (file_exists('vendor/autoload.php')) {
                echo "Note: Full database test requires running this through CodeIgniter framework\n";
            }
        } else {
            echo "Database config: ✗ Not configured\n";
        }
    }
} catch (Exception $e) {
    echo "Database test: ✗ " . $e->getMessage() . "\n";
}

echo "\n=== Recommendations ===\n";

if (!file_exists('.env')) {
    echo "1. Copy 'env' to '.env' and configure your settings\n";
}

if (!file_exists('vendor/autoload.php')) {
    echo "2. Run 'composer install' to install dependencies\n";
}

if (!is_writable('writable')) {
    echo "3. Fix writable directory permissions\n";
}

echo "\n=== Next Steps ===\n";
echo "1. Fix any issues marked with ✗ above\n";
echo "2. Configure your .env file with proper database credentials\n";
echo "3. Run 'php spark serve' to start the development server\n";
echo "4. Access your site at https://www.nugui.co.za\n";

echo "\nDiagnostic complete!\n";
