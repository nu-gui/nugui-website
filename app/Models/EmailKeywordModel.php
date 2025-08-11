<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailKeywordModel extends Model
{
    protected $table = 'email_keywords';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'keyword', 'action', 'status_change', 'priority_change',
        'auto_response_template', 'notify_admin', 'is_active', 'description'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    /**
     * Get keyword by exact match
     */
    public function getKeyword($keyword)
    {
        return $this->where('keyword', strtolower($keyword))
                    ->where('is_active', true)
                    ->first();
    }

    /**
     * Get all active keywords
     */
    public function getActiveKeywords()
    {
        return $this->where('is_active', true)->findAll();
    }
}