<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class DatabaseTest extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        try {
            $db->connect();
            echo 'Database connection successful.';
        } catch (DatabaseException $e) {
            echo 'Database connection failed: ' . $e->getMessage();
        }
    }
}
