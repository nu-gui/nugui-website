<?php

use CodeIgniter\Boot;
use Config\Paths;

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.1'; // If you update this, don't forget to update `spark`.
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION,
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;

    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// LOAD OUR PATHS CONFIG FILE
// Production path configuration for cPanel deployment
$appPath = '/home/nuguiyhv/ci_app/app/Config/Paths.php';
if (file_exists($appPath)) {
    require $appPath;
} else {
    // Fallback for local development
    require FCPATH . '../app/Config/Paths.php';
}
// ^^^ Change this line if you move your application folder

$paths = new Paths();

// LOAD THE FRAMEWORK BOOTSTRAP FILE
$bootstrap = '/home/nuguiyhv/ci_app/system/Boot.php';
if (file_exists($bootstrap)) {
    require $bootstrap;
} else {
    // Fallback for local development
    require $paths->systemDirectory . '/Boot.php';
}

// Load environment configuration
$envPath = '/home/nuguiyhv/ci_app/.env';
if (file_exists($envPath)) {
    require_once '/home/nuguiyhv/ci_app/system/Config/DotEnv.php';
    (new CodeIgniter\Config\DotEnv('/home/nuguiyhv/ci_app'))->load();
}

exit(Boot::bootWeb($paths));
