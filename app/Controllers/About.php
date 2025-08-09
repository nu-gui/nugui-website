<?php
namespace App\Controllers;

class About extends BaseController {
    public function index() {
        $data = [
            'title' => 'About Us - NU GUI',
            'description' => 'Learn more about NU GUI and our mission to provide innovative business solutions.',
            'ogTitle' => 'About Us - NU GUI',
            'ogDescription' => 'Learn more about NU GUI and our mission to provide innovative business solutions.',
            'ogImage' => base_url('assets/images/NUGUI-1.png'),
            'ogUrl' => base_url('/about'),
            'twitterTitle' => 'About Us - NU GUI',
            'twitterDescription' => 'Learn more about NU GUI and our mission to provide innovative business solutions.',
            'twitterImage' => base_url('assets/images/NUGUI-1.png')
        ];
        return view('about', $data);
    }
}
?>
