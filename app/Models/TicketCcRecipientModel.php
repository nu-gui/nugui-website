<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketCcRecipientModel extends Model
{
    protected $table = 'ticket_cc_recipients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'ticket_id', 'email', 'name', 'added_by', 'is_active'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'added_at';
    protected $updatedField = false;

    protected $validationRules = [
        'ticket_id' => 'required|integer',
        'email' => 'required|valid_email|max_length[100]'
    ];

    /**
     * Get active CC recipients for a ticket
     */
    public function getActiveRecipients($ticketId)
    {
        return $this->where('ticket_id', $ticketId)
                    ->where('is_active', true)
                    ->findAll();
    }

    /**
     * Add CC recipients from email string
     */
    public function addRecipientsFromString($ticketId, $ccString, $addedBy)
    {
        if (empty($ccString)) {
            return [];
        }
        
        $emails = $this->parseEmailString($ccString);
        $added = [];
        
        foreach ($emails as $email => $name) {
            // Check if already exists
            $existing = $this->where('ticket_id', $ticketId)
                             ->where('email', $email)
                             ->first();
            
            if (!$existing) {
                $this->insert([
                    'ticket_id' => $ticketId,
                    'email' => $email,
                    'name' => $name,
                    'added_by' => $addedBy,
                    'is_active' => true
                ]);
                $added[] = $email;
            } elseif (!$existing['is_active']) {
                // Reactivate if inactive
                $this->update($existing['id'], ['is_active' => true]);
                $added[] = $email;
            }
        }
        
        return $added;
    }

    /**
     * Remove CC recipients
     */
    public function removeRecipients($ticketId, $emails)
    {
        if (!is_array($emails)) {
            $emails = [$emails];
        }
        
        return $this->where('ticket_id', $ticketId)
                    ->whereIn('email', $emails)
                    ->set(['is_active' => false])
                    ->update();
    }

    /**
     * Parse email string into array
     * Handles formats like "Name <email@example.com>, email2@example.com"
     */
    private function parseEmailString($emailString)
    {
        $emails = [];
        $parts = explode(',', $emailString);
        
        foreach ($parts as $part) {
            $part = trim($part);
            if (empty($part)) continue;
            
            // Check for "Name <email>" format
            if (preg_match('/^(.+?)\s*<(.+?)>$/', $part, $matches)) {
                $emails[$matches[2]] = trim($matches[1]);
            } else {
                // Just email address
                $emails[$part] = null;
            }
        }
        
        return $emails;
    }
}