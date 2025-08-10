<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\CustomEmail;
use App\Libraries\AntiBotProtection;

class SupportTicket extends BaseController {
    
    protected $db;
    
    public function __construct() {
        $this->db = \Config\Database::connect();
    }
    
    public function index() {
        $data = [
            'title' => 'Support - NU GUI',
            'description' => 'Get support for NU GUI products and services. Contact our support team for assistance.',
            'ogTitle' => 'Support - NU GUI',
            'ogDescription' => 'Get support for NU GUI products and services. Contact our support team for assistance.',
            'ogImage' => base_url('assets/images/NUGUI-1.png'),
            'ogUrl' => base_url('/support'),
            'twitterTitle' => 'Support - NU GUI',
            'twitterDescription' => 'Get support for NU GUI products and services. Contact our support team for assistance.',
            'twitterImage' => base_url('assets/images/NUGUI-1.png')
        ];
        return view('support_ticket', $data);
    }
    
    public function submit_support_form() {
        $antiBotProtection = new AntiBotProtection();
        $clientIP = $this->request->getIPAddress();
        
        // Check if IP is temporarily blacklisted
        if ($antiBotProtection->isTemporarilyBlacklisted($clientIP)) {
            return redirect()->back()->withInput()->with('errors', 'Your IP is temporarily blocked. Please try again later.');
        }
        
        // Anti-bot validation
        $postData = $this->request->getPost();
        $botErrors = $antiBotProtection->validateSubmission($postData);
        
        if (!empty($botErrors)) {
            $antiBotProtection->addToBlacklist($clientIP);
            return redirect()->back()->withInput()->with('errors', $botErrors);
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'      => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'product'   => 'required|max_length[50]',
            'issue'     => 'required|min_length[3]|max_length[200]',
            'priority'  => 'required|in_list[Low,Medium,High]',
            'message'   => 'required|min_length[10]|max_length[2000]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $name = htmlspecialchars($this->request->getPost('name'), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($this->request->getPost('email'), ENT_QUOTES, 'UTF-8');
        $product = htmlspecialchars($this->request->getPost('product'), ENT_QUOTES, 'UTF-8');
        $issue = htmlspecialchars($this->request->getPost('issue'), ENT_QUOTES, 'UTF-8');
        $priority = htmlspecialchars($this->request->getPost('priority'), ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($this->request->getPost('message'), ENT_QUOTES, 'UTF-8');

        // Generate ticket ID
        $ticketId = $this->generateTicketId();
        
        // Map priority to database format
        $priorityMap = [
            'Low' => 'low',
            'Medium' => 'medium',
            'High' => 'high'
        ];
        
        // Determine category based on product
        $category = $this->determineCategory($product);
        
        try {
            // Insert ticket into database
            $ticketData = [
                'ticket_id' => $ticketId,
                'subject' => $issue,
                'customer_email' => $email,
                'customer_name' => $name,
                'status' => 'open',
                'priority' => $priorityMap[$priority] ?? 'medium',
                'category' => $category,
                'tags' => json_encode([$product, 'web-form']),
                'metadata' => json_encode([
                    'source' => 'website',
                    'product' => $product,
                    'ip_address' => $clientIP
                ])
            ];
            
            $this->db->table('tickets')->insert($ticketData);
            $ticketDbId = $this->db->insertID();
            
            // Insert initial message
            $messageData = [
                'ticket_id' => $ticketDbId,
                'message_id' => 'MSG-' . date('YmdHis'),
                'subject' => 'Re: ' . $issue,
                'body_text' => $message,
                'body_html' => nl2br($message),
                'sender_email' => $email,
                'sender_name' => $name,
                'sender_type' => 'customer',
                'direction' => 'inbound',
                'to_emails' => json_encode(['support@nugui.co.za']),
                'attachments' => json_encode([])
            ];
            
            $this->db->table('ticket_messages')->insert($messageData);
            
            // Create ticket created event
            $eventData = [
                'ticket_id' => $ticketDbId,
                'event_type' => 'ticket_created',
                'event_data' => json_encode([
                    'source' => 'website',
                    'customer_email' => $email,
                    'subject' => $issue,
                    'product' => $product
                ]),
                'triggered_by' => 'web_form',
                'actor_email' => $email,
                'actor_type' => 'customer'
            ];
            
            $this->db->table('ticket_events')->insert($eventData);
            
            // Process keyword triggers
            $this->processKeywordTriggers($ticketDbId, $issue . ' ' . $message);
            
            // Send email notifications
            $this->sendTicketEmails($ticketId, $name, $email, $product, $issue, $priority, $message);
            
            // Generate summary after ticket creation
            $summary = $this->generateTicketSummary($ticketDbId);
            
            return redirect()->to('/support')->with('success', 
                'Your support request has been received. Your ticket number is ' . $ticketId . 
                '. You will receive a confirmation email with your ticket details.');
                
        } catch (\Exception $e) {
            log_message('error', 'Failed to create ticket: ' . $e->getMessage());
            
            // Fallback to email-only if database fails
            $this->sendTicketEmails($ticketId, $name, $email, $product, $issue, $priority, $message);
            
            return redirect()->to('/support')->with('success', 
                'Your support request has been received. Your ticket number is ' . $ticketId);
        }
    }
    
    private function generateTicketId() {
        $date = date('Ymd');
        $random = strtoupper(substr(md5(uniqid()), 0, 8));
        return "TKT-{$date}-{$random}";
    }
    
    private function determineCategory($product) {
        $categories = [
            'NU-GUI' => 'general',
            'NU-CCS' => 'technical',
            'NU-SIP' => 'technical',
            'NU-DATA' => 'technical',
            'NU-SMS' => 'technical',
            'NU-CRON' => 'technical',
            'Partner Program' => 'account'
        ];
        
        return $categories[$product] ?? 'general';
    }
    
    private function processKeywordTriggers($ticketId, $content) {
        try {
            // Get active triggers
            $triggers = $this->db->table('ticket_keyword_triggers')
                ->where('is_active', true)
                ->orderBy('priority', 'DESC')
                ->get()
                ->getResultArray();
            
            foreach ($triggers as $trigger) {
                $keywords = json_decode($trigger['keywords'], true);
                $contentLower = strtolower($content);
                
                $matched = false;
                foreach ($keywords as $keyword) {
                    if (stripos($contentLower, strtolower($keyword)) !== false) {
                        $matched = true;
                        break;
                    }
                }
                
                if ($matched) {
                    // Execute trigger actions
                    $actions = json_decode($trigger['actions'], true);
                    foreach ($actions as $action) {
                        $this->executeTriggerAction($ticketId, $action);
                    }
                    
                    // Update trigger stats
                    $this->db->table('ticket_keyword_triggers')
                        ->where('id', $trigger['id'])
                        ->update([
                            'trigger_count' => $trigger['trigger_count'] + 1,
                            'last_triggered_at' => date('Y-m-d H:i:s')
                        ]);
                    
                    // Log trigger event
                    $this->db->table('ticket_events')->insert([
                        'ticket_id' => $ticketId,
                        'event_type' => 'trigger_executed',
                        'event_data' => json_encode([
                            'trigger_name' => $trigger['name'],
                            'keywords_matched' => $keywords
                        ]),
                        'triggered_by' => 'keyword',
                        'actor_type' => 'system'
                    ]);
                    
                    if ($trigger['stop_processing']) {
                        break;
                    }
                }
            }
        } catch (\Exception $e) {
            log_message('error', 'Failed to process keyword triggers: ' . $e->getMessage());
        }
    }
    
    private function executeTriggerAction($ticketId, $action) {
        $type = $action['type'] ?? '';
        $params = $action['params'] ?? [];
        
        switch ($type) {
            case 'change_priority':
                $this->db->table('tickets')
                    ->where('id', $ticketId)
                    ->update(['priority' => $params['priority'] ?? 'medium']);
                break;
                
            case 'change_status':
                $this->db->table('tickets')
                    ->where('id', $ticketId)
                    ->update(['status' => $params['status'] ?? 'open']);
                break;
                
            case 'add_tags':
                $ticket = $this->db->table('tickets')->where('id', $ticketId)->get()->getRowArray();
                if ($ticket) {
                    $currentTags = json_decode($ticket['tags'], true) ?? [];
                    $newTags = array_unique(array_merge($currentTags, $params['tags'] ?? []));
                    $this->db->table('tickets')
                        ->where('id', $ticketId)
                        ->update(['tags' => json_encode($newTags)]);
                }
                break;
        }
    }
    
    private function generateTicketSummary($ticketId) {
        try {
            $ticket = $this->db->table('tickets')->where('id', $ticketId)->get()->getRowArray();
            $messages = $this->db->table('ticket_messages')->where('ticket_id', $ticketId)->get()->getResultArray();
            $events = $this->db->table('ticket_events')->where('ticket_id', $ticketId)->get()->getResultArray();
            
            return [
                'ticket' => $ticket,
                'messages' => $messages,
                'events' => $events,
                'summary' => [
                    'total_messages' => count($messages),
                    'total_events' => count($events),
                    'created_at' => $ticket['created_at'] ?? date('Y-m-d H:i:s')
                ]
            ];
        } catch (\Exception $e) {
            log_message('error', 'Failed to generate ticket summary: ' . $e->getMessage());
            return null;
        }
    }
    
    private function sendTicketEmails($ticketId, $name, $email, $product, $issue, $priority, $message) {
        $emailService = new CustomEmail();
        $emailService->initializeConfig('support');

        // Email to Support Team
        try {
            $emailService->setTo('support@nugui.co.za');
            $emailService->setFrom('support@nugui.co.za', 'NU GUI Support');
            $emailService->setSubject("Support Request: {$issue} [Ticket #{$ticketId}]");
            $emailService->setMessage("
                <html>
                    <head>
                        <title>Support Request</title>
                    </head>
                    <body>
                        <h2>Support Request</h2>
                        <p><strong>Ticket Number:</strong> {$ticketId}</p>
                        <p><strong>Name:</strong> {$name}</p>
                        <p><strong>Email:</strong> {$email}</p>
                        <p><strong>Product:</strong> {$product}</p>
                        <p><strong>Issue:</strong> {$issue}</p>
                        <p><strong>Priority:</strong> {$priority}</p>
                        <p><strong>Message:</strong></p>
                        <p>{$message}</p>
                        <hr>
                        <p><small>This ticket has been automatically created in the database.</small></p>
                    </body>
                </html>
            ");
            $emailService->setAltMessage("
                Ticket Number: {$ticketId}\n
                Name: {$name}\n
                Email: {$email}\n
                Product: {$product}\n
                Issue: {$issue}\n
                Priority: {$priority}\n
                Message:\n
                {$message}
            ");
            $emailService->send();
        } catch (\Exception $e) {
            log_message('warning', 'Failed to send support team email: ' . $e->getMessage());
        }
        
        // Confirmation email to customer
        try {
            $emailService->clear();
            $emailService->initializeConfig('support');
            $emailService->setTo($email);
            $emailService->setFrom('support@nugui.co.za', 'NU GUI Support');
            $emailService->setSubject("Support Request Received: [Ticket #{$ticketId}]");
            $emailService->setMessage("
                <html>
                    <head>
                        <title>Support Request Confirmation</title>
                    </head>
                    <body>
                        <h2>Support Request Confirmation</h2>
                        <p>Dear {$name},</p>
                        <p>Thank you for contacting NU GUI support. Your support request has been received and logged in our ticketing system.</p>
                        <p><strong>Ticket Number:</strong> {$ticketId}</p>
                        <p><strong>Issue:</strong> {$issue}</p>
                        <p><strong>Priority:</strong> {$priority}</p>
                        <p>Our support team will review your request and respond within 24-48 hours.</p>
                        <p>You will receive email updates as your ticket is processed.</p>
                        <p>Thank you,<br>NU GUI Support Team</p>
                    </body>
                </html>
            ");
            $emailService->setAltMessage("
                Dear {$name},

                Thank you for contacting NU GUI support. Your support request has been received and logged in our ticketing system.

                Ticket Number: {$ticketId}
                Issue: {$issue}
                Priority: {$priority}

                Our support team will review your request and respond within 24-48 hours.
                You will receive email updates as your ticket is processed.

                Thank you,
                NU GUI Support Team
            ");
            $emailService->send();
        } catch (\Exception $e) {
            log_message('warning', 'Failed to send customer confirmation email: ' . $e->getMessage());
        }
    }
    
    public function view_ticket($ticketId = null) {
        if (!$ticketId) {
            return redirect()->to('/support');
        }
        
        try {
            $ticket = $this->db->table('tickets')
                ->where('ticket_id', $ticketId)
                ->get()
                ->getRowArray();
            
            if (!$ticket) {
                return redirect()->to('/support')->with('error', 'Ticket not found.');
            }
            
            $messages = $this->db->table('ticket_messages')
                ->where('ticket_id', $ticket['id'])
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();
            
            $events = $this->db->table('ticket_events')
                ->where('ticket_id', $ticket['id'])
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();
            
            $data = [
                'title' => 'Ticket ' . $ticketId . ' - NU GUI Support',
                'ticket' => $ticket,
                'messages' => $messages,
                'events' => $events
            ];
            
            return view('ticket_view', $data);
            
        } catch (\Exception $e) {
            log_message('error', 'Failed to view ticket: ' . $e->getMessage());
            return redirect()->to('/support')->with('error', 'Unable to load ticket details.');
        }
    }
}
?>