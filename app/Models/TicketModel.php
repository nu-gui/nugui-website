<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'ticket_number', 'subject', 'status', 'priority', 'category', 'product',
        'customer_name', 'customer_email', 'customer_phone', 'customer_company',
        'assigned_to', 'assigned_email', 'department',
        'resolved_at', 'closed_at', 'first_response_at',
        'response_count', 'customer_satisfaction', 'resolution_time_hours',
        'email_message_id', 'email_thread_id', 'tags', 'metadata'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'ticket_number' => 'required|is_unique[tickets.ticket_number]',
        'subject' => 'required|min_length[3]|max_length[255]',
        'customer_name' => 'required|min_length[2]|max_length[100]',
        'customer_email' => 'required|valid_email|max_length[100]',
        'status' => 'in_list[open,in_progress,follow_up,escalated,resolved,closed]',
        'priority' => 'in_list[low,medium,high,urgent]'
    ];

    /**
     * Generate unique ticket number
     */
    public function generateTicketNumber(): string
    {
        do {
            $prefix = 'TKT';
            $date = date('Ymd');
            // Use cryptographically secure random instead of weak md5
            $random = strtoupper(bin2hex(random_bytes(4))); // 4 bytes -> 8 character hex string
            $ticketNumber = "{$prefix}-{$date}-{$random}";
        } while ($this->where('ticket_number', $ticketNumber)->first());
        
        return $ticketNumber;
    }

    /**
     * Get ticket by email thread ID
     */
    public function getByEmailThread($threadId)
    {
        return $this->where('email_thread_id', $threadId)->first();
    }

    /**
     * Get active tickets for a customer
     */
    public function getActiveTicketsByCustomer($email)
    {
        return $this->whereIn('status', ['open', 'in_progress', 'follow_up', 'escalated'])
                    ->where('customer_email', $email)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Update ticket status with history tracking
     */
    public function updateStatus($ticketId, $newStatus, $changedBy = 'system', $reason = null, $triggeredByKeyword = null)
    {
        $ticket = $this->find($ticketId);
        if (!$ticket) {
            return false;
        }

        $oldStatus = $ticket['status'];
        
        // Update ticket status
        $updateData = ['status' => $newStatus];
        
        // Set resolution/closed timestamps
        if ($newStatus === 'resolved' && !$ticket['resolved_at']) {
            $updateData['resolved_at'] = date('Y-m-d H:i:s');
            $updateData['resolution_time_hours'] = $this->calculateResolutionTime($ticket['created_at']);
        }
        
        if ($newStatus === 'closed' && !$ticket['closed_at']) {
            $updateData['closed_at'] = date('Y-m-d H:i:s');
        }
        
        // Update ticket
        $this->update($ticketId, $updateData);
        
        // Record status history
        $historyModel = new TicketStatusHistoryModel();
        $historyModel->insert([
            'ticket_id' => $ticketId,
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'changed_by' => $changedBy,
            'change_reason' => $reason,
            'triggered_by_keyword' => $triggeredByKeyword
        ]);
        
        return true;
    }
    
    /**
     * Update ticket priority
     */
    public function updatePriority($ticketId, $newPriority, $changedBy = 'system')
    {
        return $this->update($ticketId, ['priority' => $newPriority]);
    }
    
    /**
     * Add tags to a ticket
     */
    public function addTags($ticketId, array $newTags)
    {
        $ticket = $this->find($ticketId);
        if (!$ticket) {
            return false;
        }
        
        $currentTags = json_decode($ticket['tags'] ?? '[]', true);
        $mergedTags = array_unique(array_merge($currentTags, $newTags));
        
        return $this->update($ticketId, ['tags' => json_encode($mergedTags)]);
    }
    
    /**
     * Create a new ticket with initial message
     */
    public function createTicketWithMessage(array $ticketData, array $messageData)
    {
        $this->db->transStart();
        
        try {
            // Generate ticket number if not provided
            if (!isset($ticketData['ticket_number'])) {
                $ticketData['ticket_number'] = $this->generateTicketNumber();
            }
            
            // Insert ticket
            $this->insert($ticketData);
            $ticketId = $this->insertID();
            
            // Insert initial message
            $messageModel = new TicketMessageModel();
            $messageData['ticket_id'] = $ticketId;
            $messageModel->insert($messageData);
            
            $this->db->transComplete();
            
            if ($this->db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }
            
            return [
                'ticket_id' => $ticketId,
                'ticket_number' => $ticketData['ticket_number']
            ];
        } catch (\Exception $e) {
            $this->db->transRollback();
            throw $e;
        }
    }

    /**
     * Calculate resolution time in hours
     */
    private function calculateResolutionTime($createdAt)
    {
        $created = strtotime($createdAt);
        $resolved = time();
        $diff = $resolved - $created;
        return round($diff / 3600, 2); // Convert to hours
    }

    /**
     * Get tickets requiring follow-up
     */
    public function getFollowUpTickets()
    {
        return $this->where('status', 'follow_up')
                    ->where('updated_at <', date('Y-m-d H:i:s', strtotime('-24 hours')))
                    ->findAll();
    }

    /**
     * Get escalated tickets
     */
    public function getEscalatedTickets()
    {
        return $this->where('status', 'escalated')
                    ->orderBy('priority', 'DESC')
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }
}