<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketMessageModel extends Model
{
    protected $table = 'ticket_messages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'ticket_id', 'message_type', 'direction',
        'subject', 'message_body', 'message_html', 'message_plain',
        'sender_name', 'sender_email', 'sender_type',
        'email_message_id', 'email_in_reply_to', 'email_references', 'email_headers',
        'recipients_to', 'recipients_cc', 'recipients_bcc',
        'is_read', 'is_sent', 'sent_at', 'delivery_status',
        'detected_keywords', 'triggered_action'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    protected $validationRules = [
        'ticket_id' => 'required|integer',
        'message_body' => 'required',
        'sender_name' => 'required|max_length[100]',
        'sender_email' => 'required|valid_email|max_length[100]'
    ];

    /**
     * Get all messages for a ticket
     */
    public function getTicketMessages($ticketId)
    {
        return $this->where('ticket_id', $ticketId)
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }

    /**
     * Get unread messages for a ticket
     */
    public function getUnreadMessages($ticketId)
    {
        return $this->where('ticket_id', $ticketId)
                    ->where('is_read', false)
                    ->where('sender_type', 'customer')
                    ->findAll();
    }

    /**
     * Mark messages as read
     */
    public function markAsRead($messageIds)
    {
        if (!is_array($messageIds)) {
            $messageIds = [$messageIds];
        }
        
        return $this->whereIn('id', $messageIds)
                    ->set(['is_read' => true])
                    ->update();
    }

    /**
     * Add message with keyword detection
     */
    public function addMessage($data)
    {
        // Detect keywords in message
        $keywords = $this->detectKeywords($data['message_body']);
        if (!empty($keywords)) {
            $data['detected_keywords'] = implode(',', $keywords);
        }
        
        // Insert message
        $messageId = $this->insert($data);
        
        // Update ticket response count
        if ($messageId && isset($data['ticket_id'])) {
            $ticketModel = new TicketModel();
            $ticket = $ticketModel->find($data['ticket_id']);
            if ($ticket) {
                $ticketModel->update($data['ticket_id'], [
                    'response_count' => $ticket['response_count'] + 1
                ]);
                
                // Set first response time if this is from agent
                if ($data['sender_type'] === 'agent' && !$ticket['first_response_at']) {
                    $ticketModel->update($data['ticket_id'], [
                        'first_response_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }
        
        return $messageId;
    }

    /**
     * Detect keywords in message body
     */
    private function detectKeywords($messageBody)
    {
        $keywordModel = new EmailKeywordModel();
        $keywords = $keywordModel->where('is_active', true)->findAll();
        
        $detectedKeywords = [];
        $messageBodyLower = strtolower($messageBody);
        
        foreach ($keywords as $keyword) {
            if (strpos($messageBodyLower, strtolower($keyword['keyword'])) !== false) {
                $detectedKeywords[] = $keyword['keyword'];
            }
        }
        
        return $detectedKeywords;
    }

    /**
     * Get messages by email thread
     */
    public function getByEmailThread($emailMessageId)
    {
        return $this->where('email_message_id', $emailMessageId)
                    ->orWhere('email_in_reply_to', $emailMessageId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}