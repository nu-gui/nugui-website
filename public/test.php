<?php

// Simple test page to verify server is working
echo "<h1>NU GUI Website</h1>";
echo "<h2>Server Test Successful!</h2>";
echo "<p>PHP Version: " . PHP_VERSION . "</p>";
echo "<p>Current Time: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>Server: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";

// Check if your controllers exist
$controllers = [
    'Home', 'About', 'Contact', 'Products', 'Solutions', 
    'PartnerProgram', 'Support', 'LeadController'
];

echo "<h3>Controller Check:</h3>";
echo "<ul>";
foreach ($controllers as $controller) {
    $file = "../app/Controllers/{$controller}.php";
    $status = file_exists($file) ? "✅ Found" : "❌ Missing";
    echo "<li>{$controller}: {$status}</li>";
}
echo "</ul>";

// Check configuration
echo "<h3>Configuration Check:</h3>";
echo "<ul>";
$configs = [
    '../.env' => 'Environment file',
    '../app/Config/Routes.php' => 'Routes configuration',
    '../app/Config/App.php' => 'App configuration'
];

foreach ($configs as $file => $desc) {
    $status = file_exists($file) ? "✅ Found" : "❌ Missing";
    echo "<li>{$desc}: {$status}</li>";
}
echo "</ul>";

echo "<h3>Next Steps:</h3>";
echo "<p>Your basic server is working! Now we need to get CodeIgniter 4 fully operational.</p>";
echo "<p>We'll resolve the autoloader issues and get your full website running.</p>";

?>
