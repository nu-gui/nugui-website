<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        // Serve the landing page HTML directly
        $landingPath = FCPATH . 'landing.html';
        if (file_exists($landingPath)) {
            return file_get_contents($landingPath);
        }
        // Fallback to view if HTML file doesn't exist
        return view('landing');
    }
}