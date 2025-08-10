<?php
/**
 * Check ticket system status
 */

// Database configuration
$dbHost = 'localhost';
$dbPort = 3307;
$dbName = 'nugui_website';
$dbUser = 'root';
$dbPass = 'secure_root_password_change_me';

try {
    // Connect to MySQL
    $dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8mb4";
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✅ Connected to MySQL database\n\n";
    
    // Check tickets
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM tickets");
    $tickets = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM ticket_messages");
    $messages = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM ticket_events");
    $events = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM ticket_keyword_triggers");
    $triggers = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    echo "📊 Ticket System Summary:\n";
    echo "   Tickets: $tickets\n";
    echo "   Messages: $messages\n";
    echo "   Events: $events\n";
    echo "   Triggers: $triggers\n\n";
    
    // Show recent tickets
    $stmt = $pdo->query("SELECT ticket_id, subject, customer_email, status, priority, created_at 
                         FROM tickets 
                         ORDER BY created_at DESC 
                         LIMIT 5");
    $recentTickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($recentTickets) > 0) {
        echo "📝 Recent Tickets:\n";
        foreach ($recentTickets as $ticket) {
            echo "   [{$ticket['ticket_id']}] {$ticket['subject']}\n";
            echo "      Customer: {$ticket['customer_email']}\n";
            echo "      Status: {$ticket['status']} | Priority: {$ticket['priority']}\n";
            echo "      Created: {$ticket['created_at']}\n\n";
        }
    }
    
    echo "✅ Ticket system is operational!\n";
    echo "📌 Access the support page at: /support\n";
    echo "📌 New ticket system at: /support-ticket\n";
    
} catch (PDOException $e) {
    echo "❌ Database connection error: " . $e->getMessage() . "\n";
    echo "Make sure the MySQL container is running on port 3307\n";
}
?>