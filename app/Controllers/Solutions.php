<?php
namespace App\Controllers;

class Solutions extends BaseController {
    public function index() {
        $data = [
            'title' => 'Solutions - NU GUI',
            'description' => 'Explore NU GUI solutions, including VoIP services, direct messaging, and telecoms software.',
            'ogTitle' => 'Solutions - NU GUI',
            'ogDescription' => 'Explore NU GUI solutions, including VoIP services, direct messaging, and telecoms software.',
            'ogImage' => base_url('assets/images/NUGUI-1.png'),
            'ogUrl' => base_url('/solutions'),
            'twitterTitle' => 'Solutions - NU GUI',
            'twitterDescription' => 'Explore NU GUI solutions, including VoIP services, direct messaging, and telecoms software.',
            'twitterImage' => base_url('assets/images/NUGUI-1.png')
        ];
        return view('solutions', $data);
    }
}
?>
