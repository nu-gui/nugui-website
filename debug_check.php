<?php
/*
 * CodeIgniter 4 Debug Check Script
 * This script helps diagnose common issues with your CI4 installation
 */

echo "<h1>CodeIgniter 4 Debug Report</h1>\n";
echo "<style>body{font-family:Arial,sans-serif;margin:20px;} .error{color:red;} .success{color:green;} .warning{color:orange;}</style>\n";

// Check PHP Version
echo "<h2>PHP Environment</h2>\n";
$minPhpVersion = '8.1';
$currentPhp = PHP_VERSION;
if (version_compare($currentPhp, $minPhpVersion, '>=')) {
    echo "<p class='success'>✓ PHP Version: {$currentPhp} (Required: {$minPhpVersion}+)</p>\n";
} else {
    echo "<p class='error'>✗ PHP Version: {$currentPhp} (Required: {$minPhpVersion}+)</p>\n";
}

// Check if CodeIgniter bootstrap exists
echo "<h2>CodeIgniter Installation</h2>\n";
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo "<p class='success'>✓ Composer autoload found</p>\n";
} else {
    echo "<p class='error'>✗ Composer autoload missing - Run 'composer install'</p>\n";
}

if (file_exists(__DIR__ . '/app/Config/App.php')) {
    echo "<p class='success'>✓ App config found</p>\n";
} else {
    echo "<p class='error'>✗ App config missing</p>\n";
}

// Check writable directories
echo "<h2>Directory Permissions</h2>\n";
$writableDirs = ['writable', 'writable/cache', 'writable/logs', 'writable/session', 'writable/uploads'];
foreach ($writableDirs as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    if (is_dir($fullPath)) {
        if (is_writable($fullPath)) {
            echo "<p class='success'>✓ {$dir} is writable</p>\n";
        } else {
            echo "<p class='error'>✗ {$dir} is not writable</p>\n";
        }
    } else {
        echo "<p class='warning'>! {$dir} directory missing</p>\n";
    }
}

// Check .env file
echo "<h2>Environment Configuration</h2>\n";
if (file_exists(__DIR__ . '/.env')) {
    echo "<p class='success'>✓ .env file found</p>\n";
    
    // Read .env and check key settings
    $envContent = file_get_contents(__DIR__ . '/.env');
    $patterns = [
        'CI_ENVIRONMENT' => '/CI_ENVIRONMENT\s*=\s*(.+)/i',
        'app.baseURL' => '/app\.baseURL\s*=\s*(.+)/i',
        'database.default.hostname' => '/database\.default\.hostname\s*=\s*(.+)/i',
        'database.default.database' => '/database\.default\.database\s*=\s*(.+)/i'
    ];
    
    foreach ($patterns as $key => $pattern) {
        if (preg_match($pattern, $envContent, $matches)) {
            $value = trim($matches[1], "' \"");
            echo "<p class='success'>✓ {$key}: {$value}</p>\n";
        } else {
            echo "<p class='warning'>! {$key} not found in .env</p>\n";
        }
    }
} else {
    echo "<p class='error'>✗ .env file missing</p>\n";
}

// Check database connection (if possible)
echo "<h2>Database Connection</h2>\n";
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    try {
        require_once __DIR__ . '/vendor/autoload.php';
        
        // Load environment variables
        $envFile = __DIR__ . '/.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                    list($key, $value) = explode('=', $line, 2);
                    $key = trim($key);
                    $value = trim($value, "' \"");
                    $_ENV[$key] = $value;
                }
            }
        }
        
        // Try database connection
        $hostname = $_ENV['database.default.hostname'] ?? 'localhost';
        $database = $_ENV['database.default.database'] ?? '';
        $username = $_ENV['database.default.username'] ?? '';
        $password = $_ENV['database.default.password'] ?? '';
        
        if ($hostname && $database && $username) {
            $mysqli = new mysqli($hostname, $username, $password, $database);
            if ($mysqli->connect_error) {
                echo "<p class='error'>✗ Database connection failed: " . $mysqli->connect_error . "</p>\n";
            } else {
                echo "<p class='success'>✓ Database connection successful</p>\n";
                $mysqli->close();
            }
        } else {
            echo "<p class='warning'>! Database credentials incomplete</p>\n";
        }
    } catch (Exception $e) {
        echo "<p class='error'>✗ Database test failed: " . $e->getMessage() . "</p>\n";
    }
} else {
    echo "<p class='warning'>! Cannot test database - Composer dependencies missing</p>\n";
}

// Check for recent log files
echo "<h2>Recent Logs</h2>\n";
$logDir = __DIR__ . '/writable/logs';
if (is_dir($logDir)) {
    $logFiles = glob($logDir . '/*.log');
    if (empty($logFiles)) {
        echo "<p class='warning'>! No log files found</p>\n";
    } else {
        foreach ($logFiles as $logFile) {
            echo "<h3>" . basename($logFile) . "</h3>\n";
            $lines = file($logFile);
            $lastLines = array_slice($lines, -5);
            echo "<pre>" . implode('', $lastLines) . "</pre>\n";
        }
    }
} else {
    echo "<p class='error'>✗ Log directory missing</p>\n";
}

echo "<h2>Recommendations</h2>\n";
echo "<ul>\n";
echo "<li>If PHP is not found, install PHP 8.1+ and add it to your PATH</li>\n";
echo "<li>If Composer dependencies are missing, run: <code>composer install</code></li>\n";
echo "<li>Check file permissions on writable directories</li>\n";
echo "<li>Verify database credentials in .env file</li>\n";
echo "<li>Check web server configuration (Apache/Nginx)</li>\n";
echo "</ul>\n";
?>
