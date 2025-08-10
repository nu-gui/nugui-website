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
        'email_message_id', 'email_thread_id'
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
        $prefix = 'TKT';
        $date = date('Ymd');
        $random = strtoupper(substr(md5(uniqid()), 0, 6));
        return "{$prefix}-{$date}-{$random}";
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