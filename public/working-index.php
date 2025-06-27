<?php

/**
 * NU GUI Website - Alternative Working Index
 * This bypasses CodeIgniter complexity and uses your controllers directly
 */

// Basic error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define basic paths
define('APPPATH', __DIR__ . '/../app/');
define('ROOTPATH', __DIR__ . '/../');
define('FCPATH', __DIR__ . '/');
define('WRITEPATH', __DIR__ . '/../writable/');

// Load environment variables
if (file_exists(ROOTPATH . '.env')) {
    $env = file_get_contents(ROOTPATH . '.env');
    $lines = explode("\n", $env);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// Simple helper functions to mimic CodeIgniter
function base_url($path = '') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    return rtrim($protocol . $host, '/') . '/' . ltrim($path, '/');
}

function view($viewName, $data = []) {
    extract($data);
    $viewFile = APPPATH . 'Views/' . $viewName . '.php';
    if (file_exists($viewFile)) {
        ob_start();
        include $viewFile;
        return ob_get_clean();
    }
    return "<h1>View not found: {$viewName}</h1>";
}

// Simple autoloader for your app classes
spl_autoload_register(function ($class) {
    // Handle App\Controllers
    if (strpos($class, 'App\\Controllers\\') === 0) {
        $file = APPPATH . 'Controllers/' . substr($class, 16) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
    
    // Handle Config classes
    if (strpos($class, 'Config\\') === 0) {
        $file = APPPATH . 'Config/' . substr($class, 7) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Simple routing
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

// Define routes based on your Routes.php
$routes = [
    '' => 'Home',
    'home' => 'Home',
    'about' => 'About', 
    'products' => 'Products',
    'solutions' => 'Solutions',
    'partner-program' => 'PartnerProgram',
    'contact' => 'Contact',
    'support' => 'Support'
];

// Get controller name
$controllerName = $routes[$uri] ?? 'Home';
$controllerClass = "App\\Controllers\\{$controllerName}";

// Check if controller file exists
$controllerFile = APPPATH . "Controllers/{$controllerName}.php";

if (!file_exists($controllerFile)) {
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1>";
    echo "<p>Controller file not found: {$controllerFile}</p>";
    exit;
}

// Include the base controller with mock functionality
if (!class_exists('CodeIgniter\\Controller')) {
    class BaseController {
        protected $request;
        protected $response;
        protected $helpers = [];
        
        public function __construct() {
            // Mock initialization
        }
    }
} else {
    if (file_exists(APPPATH . 'Controllers/BaseController.php')) {
        require_once APPPATH . 'Controllers/BaseController.php';
    }
}

// Include the controller
require_once $controllerFile;

// Check if class exists
if (!class_exists($controllerClass)) {
    http_response_code(500);
    echo "<h1>500 - Server Error</h1>";
    echo "<p>Controller class not found: {$controllerClass}</p>";
    exit;
}

// Create controller instance and call index method
try {
    $controller = new $controllerClass();
    
    // Handle POST requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? 'index';
        if (method_exists($controller, $action)) {
            $result = $controller->$action();
            if (is_string($result)) {
                echo $result;
            }
        } else {
            echo "<h1>Method not found: {$action}</h1>";
        }
    } else {
        // Handle GET requests
        if (method_exists($controller, 'index')) {
            $result = $controller->index();
            if (is_string($result)) {
                echo $result;
            }
        } else {
            echo "<h1>Index method not found in {$controllerClass}</h1>";
        }
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo "<h1>500 - Server Error</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    if ($_ENV['CI_ENVIRONMENT'] ?? 'production' !== 'production') {
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    }
}

?>
