<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\CustomEmail;
use App\Libraries\AntiBotProtection;

class Support extends BaseController {
    public function index() {
        $data = [
            'title' => 'Support - NU GUI',
            'description' => 'Get support for NU GUI products and services. Contact our support team for assistance.',
            'ogTitle' => 'Support - NU GUI',
            'ogDescription' => 'Get support for NU GUI products and services. Contact our support team for assistance.',
            'ogImage' => base_url('assets/images/NUGUI-1.png'),
            'ogUrl' => base_url('/support'),
            'twitterTitle' => 'Support - NU GUI',
            'twitterDescription' => 'Get support for NU GUI products and services. Contact our support team for assistance.',
            'twitterImage' => base_url('assets/images/NUGUI-1.png')
        ];
        return view('support', $data);
    }

    public function submit_support_form() {
        $antiBotProtection = new AntiBotProtection();
        $clientIP = $this->request->getIPAddress();
        
        // Check if IP is temporarily blacklisted
        if ($antiBotProtection->isTemporarilyBlacklisted($clientIP)) {
            return redirect()->back()->withInput()->with('errors', 'Your IP is temporarily blocked. Please try again later.');
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
            'name'      => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'product'   => 'required|max_length[50]',
            'issue'     => 'required|min_length[3]|max_length[200]',
            'priority'  => 'required|in_list[Low,Medium,High]',
            'message'   => 'required|min_length[10]|max_length[2000]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $name = htmlspecialchars($this->request->getPost('name'), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($this->request->getPost('email'), ENT_QUOTES, 'UTF-8');
        $product = htmlspecialchars($this->request->getPost('product'), ENT_QUOTES, 'UTF-8');
        $issue = htmlspecialchars($this->request->getPost('issue'), ENT_QUOTES, 'UTF-8');
        $priority = htmlspecialchars($this->request->getPost('priority'), ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($this->request->getPost('message'), ENT_QUOTES, 'UTF-8');

        $ticketNumber = strtoupper(uniqid('TICKET_'));

        $emailService = new CustomEmail();
        $emailService->initializeConfig('support');

        // Email to Support Team
        $emailService->setTo('support@nugui.co.za');
        $emailService->setFrom('support@nugui.co.za', 'NU GUI Support');
        $emailService->setSubject("Support Request: {$issue} [Ticket #{$ticketNumber}]");
        $emailService->setMessage("
            <html>
                <head>
                    <title>Support Request</title>
                </head>
                <body>
                    <h2>Support Request</h2>
                    <p><strong>Ticket Number:</strong> {$ticketNumber}</p>
                    <p><strong>Name:</strong> {$name}</p>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Product:</strong> {$product}</p>
                    <p><strong>Issue:</strong> {$issue}</p>
                    <p><strong>Priority:</strong> {$priority}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$message}</p>
                </body>
            </html>
        ");
        $emailService->setAltMessage("
            Ticket Number: {$ticketNumber}\n
            Name: {$name}\n
            Email: {$email}\n
            Product: {$product}\n
            Issue: {$issue}\n
            Priority: {$priority}\n
            Message:\n
            {$message}
        ");

        // Try to send email (may fail in local development)
        $emailSent = false;
        $emailError = '';
        
        try {
            $emailSent = $emailService->send();
            if (!$emailSent) {
                $emailError = $emailService->printDebugger();
            }
        } catch (\Exception $e) {
            $emailError = $e->getMessage();
        }
        
        // In local development, we'll consider the form successful even if email fails
        $isLocalEnv = (getenv('CI_ENVIRONMENT') === 'development' || 
                       getenv('CI_ENVIRONMENT') === 'testing' || 
                       getenv('CI_ENVIRONMENT') === 'local');
        
        if ($emailSent) {
            // Try to send confirmation email to user (optional)
            try {
                $emailService->clear();
                $emailService->initializeConfig('support');
                $emailService->setTo($email);
                $emailService->setFrom('support@nugui.co.za', 'NU GUI Support');
                $emailService->setSubject("Support Request: {$issue} [Ticket #{$ticketNumber}]");
                $emailService->setMessage("
                    <html>
                        <head>
                            <title>Support Request Confirmation</title>
                        </head>
                        <body>
                            <h2>Support Request Confirmation</h2>
                            <p>Dear {$name},</p>
                            <p>Thank you for contacting NU GUI support. Your support request has been received and logged.</p>
                            <p><strong>Ticket Number:</strong> {$ticketNumber}</p>
                            <p><strong>Issue:</strong> {$issue}</p>
                            <p>Our support team will review your request and get back to you as soon as possible.</p>
                            <p>Thank you,<br>NU GUI Support Team</p>
                        </body>
                    </html>
                ");
                $emailService->setAltMessage("
                    Dear {$name},

                    Thank you for contacting NU GUI support. Your support request has been received and logged.

                    Ticket Number: {$ticketNumber}
                    Issue: {$issue}

                    Our support team will review your request and get back to you as soon as possible.

                    Thank you,
                    NU GUI Support Team
                ");
                $emailService->send();
            } catch (\Exception $e) {
                // Confirmation email failure is not critical
                log_message('warning', 'Support confirmation email failed: ' . $e->getMessage());
            }
        }
        
        if ($emailSent || $isLocalEnv) {
            // Log email failure in development but still show success
            if (!$emailSent && $isLocalEnv) {
                log_message('warning', 'Support form email failed (local dev): ' . $emailError);
            }
            return redirect()->to('/support')
                ->with('success', 'Your support request has been received. Your ticket number is ' . $ticketNumber)
                ->with('ticketNumber', $ticketNumber)
                ->with('email', $email)
                ->with('name', $name)
                ->with('product', $product)
                ->with('priority', $priority)
                ->with('issue', $issue)
                ->with('message', $message);
        } else {
            // In production, email failure is an error
            return redirect()->back()->withInput()->with('errors', ['Unable to submit your support request. Please try again later.']);
        }
    }

}
?>
