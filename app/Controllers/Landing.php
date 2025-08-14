<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        // Serve the new landing page HTML directly
        $landingPath = FCPATH . 'landing-simple.html';
        if (file_exists($landingPath)) {
            return file_get_contents($landingPath);
        }
        // Fallback to old view if new file doesn't exist
        return view('landing');
    }
}