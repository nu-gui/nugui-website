<?php
/**
 * Form Testing Script for NU GUI Website
 * Tests all three forms: Partner Program, Contact, and Support
 */

// Load CodeIgniter
$pathsConfig = FCPATH . '../app/Config/Paths.php';
require realpath($pathsConfig) ?: $pathsConfig;
$paths = new Config\Paths();
$bootstrap = rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';
$app = require realpath($bootstrap) ?: $bootstrap;

// Test results
$results = [];

// Color codes for output
$green = "\033[32m";
$red = "\033[31m";
$yellow = "\033[33m";
$reset = "\033[0m";

echo "\n{$yellow}===== NU GUI Form Testing Script ====={$reset}\n\n";

// Test 1: Check if routes are accessible
echo "{$yellow}Testing Route Accessibility...{$reset}\n";

$routes = [
    '/partner-program' => 'Partner Program',
    '/contact' => 'Contact',
    '/support' => 'Support'
];

foreach ($routes as $route => $name) {
    $url = 'http://localhost:8080' . $route;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200) {
        echo "  {$green}✓{$reset} {$name} page ({$route}): Accessible\n";
        $results[$name]['route'] = true;
    } else {
        echo "  {$red}✗{$reset} {$name} page ({$route}): HTTP {$httpCode}\n";
        $results[$name]['route'] = false;
    }
}

// Test 2: Check form fields presence
echo "\n{$yellow}Testing Form Fields Presence...{$reset}\n";

$formFields = [
    'Partner Program' => [
        'businessName', 'registrationNumber', 'countryBusiness',
        'contactName', 'contactEmail', 'contactPhone', 'Skype_Teams',
        'question1', 'question2', 'question3', 'question4',
        'solutions[]', 'question6', 'question7'
    ],
    'Contact' => [
        'name', 'email', 'subject', 'message'
    ],
    'Support' => [
        'name', 'email', 'product', 'priority', 'issue', 'message'
    ]
];

foreach ($routes as $route => $name) {
    $url = 'http://localhost:8080' . $route;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $fieldsFound = 0;
    $totalFields = count($formFields[$name]);
    
    echo "\n  {$name} Form Fields:\n";
    foreach ($formFields[$name] as $field) {
        $fieldName = str_replace('[]', '', $field);
        if (strpos($response, 'name="' . $field . '"') !== false || 
            strpos($response, "name='" . $field . "'") !== false) {
            echo "    {$green}✓{$reset} Field '{$fieldName}' found\n";
            $fieldsFound++;
        } else {
            echo "    {$red}✗{$reset} Field '{$fieldName}' missing\n";
        }
    }
    
    $results[$name]['fields'] = $fieldsFound === $totalFields;
    echo "  {$yellow}Result:{$reset} {$fieldsFound}/{$totalFields} fields found\n";
}

// Test 3: Check form submission endpoints
echo "\n{$yellow}Testing Form Submission Endpoints...{$reset}\n";

$endpoints = [
    'Partner Program' => '/submit_partner_form',
    'Contact' => '/submit_contact_form',
    'Support' => '/submit_support_form'
];

foreach ($endpoints as $name => $endpoint) {
    $url = 'http://localhost:8080' . $endpoint;
    
    // Test with empty POST (should get validation errors)
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, []);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // 302/303 redirect is expected (redirect back with errors)
    if ($httpCode === 302 || $httpCode === 303) {
        echo "  {$green}✓{$reset} {$name} endpoint ({$endpoint}): Responds correctly\n";
        $results[$name]['endpoint'] = true;
    } else {
        echo "  {$red}✗{$reset} {$name} endpoint ({$endpoint}): HTTP {$httpCode}\n";
        $results[$name]['endpoint'] = false;
    }
}

// Test 4: Check email configuration
echo "\n{$yellow}Testing Email Configuration...{$reset}\n";

$emailConfig = [
    'SMTP_HOST' => $_ENV['SMTP_HOST'] ?? 'mail.nugui.co.za',
    'SMTP_PORT' => $_ENV['SMTP_PORT'] ?? 465,
    'CONTACT_EMAIL_USER' => $_ENV['CONTACT_EMAIL_USER'] ?? 'not configured',
    'SUPPORT_EMAIL_USER' => $_ENV['SUPPORT_EMAIL_USER'] ?? 'not configured'
];

foreach ($emailConfig as $key => $value) {
    if ($value !== 'not configured' && !empty($value)) {
        echo "  {$green}✓{$reset} {$key}: {$value}\n";
    } else {
        echo "  {$yellow}!{$reset} {$key}: Not configured (forms may not send emails)\n";
    }
}

// Test 5: Check database connectivity for Partner Program
echo "\n{$yellow}Testing Database Connectivity...{$reset}\n";

try {
    $db = \Config\Database::connect();
    $db->initialize();
    
    // Check if partners table exists
    if ($db->tableExists('partners')) {
        echo "  {$green}✓{$reset} Partners table exists\n";
        $results['Database']['partners_table'] = true;
        
        // Check table structure
        $fields = $db->getFieldData('partners');
        $requiredFields = ['businessName', 'contactEmail', 'question5'];
        $foundFields = array_column($fields, 'name');
        
        foreach ($requiredFields as $field) {
            if (in_array($field, $foundFields)) {
                echo "  {$green}✓{$reset} Field '{$field}' exists in partners table\n";
            } else {
                echo "  {$red}✗{$reset} Field '{$field}' missing from partners table\n";
            }
        }
    } else {
        echo "  {$yellow}!{$reset} Partners table does not exist (Partner form submissions will fail)\n";
        $results['Database']['partners_table'] = false;
    }
} catch (\Exception $e) {
    echo "  {$yellow}!{$reset} Database connection failed: " . $e->getMessage() . "\n";
    $results['Database']['connection'] = false;
}

// Summary
echo "\n{$yellow}===== Test Summary ====={$reset}\n\n";

$allPassed = true;
foreach ($results as $section => $tests) {
    $sectionPassed = !in_array(false, $tests, true);
    $status = $sectionPassed ? "{$green}PASS{$reset}" : "{$red}FAIL{$reset}";
    echo "  {$section}: {$status}\n";
    
    foreach ($tests as $test => $passed) {
        $testStatus = $passed ? "{$green}✓{$reset}" : "{$red}✗{$reset}";
        echo "    {$testStatus} {$test}\n";
    }
    
    if (!$sectionPassed) {
        $allPassed = false;
    }
}

echo "\n{$yellow}===== Recommendations ====={$reset}\n\n";

if (!isset($results['Database']['partners_table']) || !$results['Database']['partners_table']) {
    echo "  1. Create the partners table in your database:\n";
    echo "     {$yellow}CREATE TABLE partners (\n";
    echo "       id INT AUTO_INCREMENT PRIMARY KEY,\n";
    echo "       businessName VARCHAR(255),\n";
    echo "       registrationNumber VARCHAR(100),\n";
    echo "       countryBusiness VARCHAR(255),\n";
    echo "       contactName VARCHAR(255),\n";
    echo "       contactEmail VARCHAR(255),\n";
    echo "       contactPhone VARCHAR(50),\n";
    echo "       Skype_Teams VARCHAR(100),\n";
    echo "       question1 VARCHAR(500),\n";
    echo "       question2 VARCHAR(10),\n";
    echo "       question3 VARCHAR(255),\n";
    echo "       question4 VARCHAR(50),\n";
    echo "       question5 VARCHAR(1000),\n";
    echo "       question6 TEXT,\n";
    echo "       question7 TEXT,\n";
    echo "       reference VARCHAR(50),\n";
    echo "       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP\n";
    echo "     );{$reset}\n\n";
}

if (empty($_ENV['CONTACT_EMAIL_PASS']) || $_ENV['CONTACT_EMAIL_PASS'] === 'changeme123') {
    echo "  2. Update email passwords in .env file\n";
    echo "     {$yellow}CONTACT_EMAIL_PASS = your_actual_password{$reset}\n";
    echo "     {$yellow}SUPPORT_EMAIL_PASS = your_actual_password{$reset}\n\n";
}

if (empty($_ENV['RECAPTCHA_SECRET_KEY'])) {
    echo "  3. Add reCAPTCHA configuration to .env file:\n";
    echo "     {$yellow}RECAPTCHA_SECRET_KEY = your_recaptcha_secret_key{$reset}\n\n";
}

$overallStatus = $allPassed ? "{$green}ALL TESTS PASSED{$reset}" : "{$red}SOME TESTS FAILED{$reset}";
echo "\n{$yellow}Overall Status:{$reset} {$overallStatus}\n\n";