<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\CustomEmail;
use App\Libraries\AntiBotProtection;

class Contact extends BaseController {
    public function index() {
        $data = [
            'title' => 'Contact Us - NU GUI',
            'description' => 'Contact NU GUI for inquiries about our business solutions. Reach out to our team today.',
            'ogTitle' => 'Contact Us - NU GUI',
            'ogDescription' => 'Contact NU GUI for inquiries about our business solutions. Reach out to our team today.',
            'ogImage' => base_url('assets/images/NUGUI-1.png'),
            'ogUrl' => base_url('/contact'),
            'twitterTitle' => 'Contact Us - NU GUI',
            'twitterDescription' => 'Contact NU GUI for inquiries about our business solutions. Reach out to our team today.',
            'twitterImage' => base_url('assets/images/NUGUI-1.png')
        ];
        return view('contact', $data);
    }

    public function submit_contact_form() {
        $antiBotProtection = new AntiBotProtection();
        $clientIP = $this->request->getIPAddress();
        
        // Check if IP is temporarily blacklisted
        if ($antiBotProtection->isTemporarilyBlacklisted($clientIP)) {
            return redirect()->back()->withInput()->with('errors', ['Your IP is temporarily blocked. Please try again later.']);
        }
        
        // Anti-bot validation
        $postData = $this->request->getPost();
        $botErrors = $antiBotProtection->validateSubmission($postData);
        
        if (!empty($botErrors)) {
            $antiBotProtection->addToBlacklist($clientIP);
            return redirect()->back()->withInput()->with('errors', $botErrors);
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'    => 'required|min_length[2]|max_length[100]',
            'email'   => 'required|valid_email|max_length[100]',
            'subject' => 'required|min_length[3]|max_length[200]',
            'message' => 'required|min_length[10]|max_length[2000]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $name = htmlspecialchars($this->request->getPost('name'), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($this->request->getPost('email'), ENT_QUOTES, 'UTF-8');
        $subject = htmlspecialchars($this->request->getPost('subject'), ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($this->request->getPost('message'), ENT_QUOTES, 'UTF-8');

        $emailService = new CustomEmail();
        $emailService->initializeConfig('contact');

        $emailService->setTo('info@nugui.co.za'); // Change to your email address
        $emailService->setFrom('info@nugui.co.za', 'NU GUI Contact');
        $emailService->setSubject($subject);
        $emailService->setMessage("
            <html>
                <head>
                    <title>Contact Form Submission</title>
                </head>
                <body>
                    <h2>Contact Form Submission</h2>
                    <p><strong>Name:</strong> {$name}</p>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Subject:</strong> {$subject}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$message}</p>
                </body>
            </html>
        ");
        $emailService->setAltMessage("
            Name: {$name}\n
            Email: {$email}\n
            Subject: {$subject}\n
            Message:\n
            {$message}
        ");

        if ($emailService->send()) {
            return redirect()->to('/contact')->with('success', 'Your message has been sent.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['Email could not be sent.']);
        }
    }

}
?>
