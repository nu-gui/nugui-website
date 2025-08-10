<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketStatusHistoryModel extends Model
{
    protected $table = 'ticket_status_history';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'ticket_id', 'old_status', 'new_status', 
        'changed_by', 'change_reason', 'triggered_by_keyword'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'changed_at';
    protected $updatedField = false;

    /**
     * Get status history for a ticket
     */
    public function getTicketHistory($ticketId)
    {
        return $this->where('ticket_id', $ticketId)
                    ->orderBy('changed_at', 'DESC')
                    ->findAll();
    }
}