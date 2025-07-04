<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Blog & Resources | Telecom Industry Insights',
            'description' => 'Latest telecom industry insights, VoIP best practices, SMS gateway guides, and technical resources. Stay updated with carrier-grade solutions and trends.',
            'ogTitle' => 'NU GUI Blog - Telecom Industry Insights & Resources',
            'ogDescription' => 'Expert insights on VoIP, SMS gateways, call control systems, and telecom infrastructure. Technical guides and industry trends from NU GUI experts.',
            'twitterTitle' => 'NU GUI Blog - Telecom Insights & Resources',
            'twitterDescription' => 'Latest telecom trends, technical guides, and industry insights from the experts at NU GUI.'
        ];
        
        return view('blog/index', $data);
    }
    
    public function category($category)
    {
        $categories = [
            'voip' => [
                'title' => 'VoIP Resources',
                'description' => 'Everything about Voice over IP technology, SIP trunking, and carrier interconnects.'
            ],
            'sms' => [
                'title' => 'SMS Gateway Guides',
                'description' => 'Bulk SMS best practices, SMPP protocols, and messaging platform insights.'
            ],
            'telecom' => [
                'title' => 'Telecom Infrastructure',
                'description' => 'Call control systems, billing integration, and carrier-grade solutions.'
            ],
            'technical' => [
                'title' => 'Technical Guides',
                'description' => 'API documentation, integration tutorials, and development resources.'
            ]
        ];
        
        // Check if category exists
        if (!isset($categories[$category])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Category '{$category}' not found");
        }
        
        $data = [
            'category' => $category,
            'categoryInfo' => $categories[$category]
        ];
        
        return view('blog/category', $data);
    }
    
    public function post($slug)
    {
        // This would normally fetch from database
        $data = [
            'slug' => $slug
        ];
        
        return view('blog/post', $data);
    }
}