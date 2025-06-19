<?php
namespace App\Controllers;

class Home extends BaseController {
    public function index() {
        $data = [
            'title' => 'Home - NU GUI',
            'description' => 'Welcome to NU GUI. Discover our comprehensive business solutions designed to meet your needs.',
            'ogTitle' => 'Home - NU GUI',
            'ogDescription' => 'Welcome to NU GUI. Discover our comprehensive business solutions designed to meet your needs.',
            'ogImage' => base_url('assets/images/preview-image.jpg'),
            'ogUrl' => base_url('/'),
            'twitterTitle' => 'Home - NU GUI',
            'twitterDescription' => 'Welcome to NU GUI. Discover our comprehensive business solutions designed to meet your needs.',
            'twitterImage' => base_url('assets/images/preview-image.jpg')
        ];
        return view('home', $data);
    }
}
?>
