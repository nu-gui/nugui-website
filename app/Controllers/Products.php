<?php
namespace App\Controllers;

class Products extends BaseController {
    public function index() {
        $data = [
            'title' => 'Products - NU GUI',
            'description' => 'Discover NU GUI products designed to enhance your business operations. Learn more today.',
            'ogTitle' => 'Products - NU GUI',
            'ogDescription' => 'Discover NU GUI products designed to enhance your business operations. Learn more today.',
            'ogImage' => base_url('assets/images/preview-image.jpg'),
            'ogUrl' => base_url('/products'),
            'twitterTitle' => 'Products - NU GUI',
            'twitterDescription' => 'Discover NU GUI products designed to enhance your business operations. Learn more today.',
            'twitterImage' => base_url('assets/images/preview-image.jpg')
        ];
        return view('products', $data);
    }
}
?>
