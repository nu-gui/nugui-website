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
        log_message('info', 'Contact form submission started');
        
        // Initialize security services
        $formSecurity = new \App\Libraries\EnhancedFormSecurity();
        $businessValidator = new \App\Libraries\BusinessEmailValidator();
        $clientIP = $this->request->getIPAddress();
        
        // Get form data
        $postData = $this->request->getPost();
        
        // 1. Validate form security token
        $securityErrors = $formSecurity->validateFormSecurity(
            $postData['form_token'] ?? '', 
            $postData
        );
        
        if (!empty($securityErrors)) {
            log_message('warning', 'Form security validation failed: ' . json_encode($securityErrors));
            return redirect()->back()->withInput()->with('errors', $securityErrors);
        }
        
        // 2. Validate challenge question
        if (!$formSecurity->validateChallenge(
            $postData['challenge_id'] ?? '', 
            $postData['challenge_answer'] ?? ''
        )) {
            return redirect()->back()->withInput()->with('errors', ['Security question answer incorrect. Please try again.']);
        }

        // 3. Standard field validation
        $validation = \Config\Services::validation();

        $validation->setRules([
            'business_name' => 'required|min_length[2]|max_length[255]',
            'name'    => 'required|min_length[2]|max_length[100]',
            'email'   => 'required|valid_email|max_length[100]',
            'subject' => 'required|min_length[3]|max_length[200]',
            'message' => 'required|min_length[10]|max_length[2000]',
            'company_website' => 'permit_empty|max_length[255]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Get sanitized form data
        $businessName = htmlspecialchars($this->request->getPost('business_name'), ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($this->request->getPost('name'), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($this->request->getPost('email'), ENT_QUOTES, 'UTF-8');
        $subject = htmlspecialchars($this->request->getPost('subject'), ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($this->request->getPost('message'), ENT_QUOTES, 'UTF-8');
        $companyWebsite = htmlspecialchars($this->request->getPost('company_website'), ENT_QUOTES, 'UTF-8');
        
        // 4. Validate business email
        $emailValidation = $formSecurity->validateBusinessEmail($email, $companyWebsite);
        
        if (!$emailValidation['valid']) {
            return redirect()->back()->withInput()->with('errors', [$emailValidation['message']]);
        }
        
        // Log form submission for security tracking
        $this->logFormSubmission('contact', [
            'business_name' => $businessName,
            'email' => $email,
            'email_domain' => $businessValidator->extractDomain($email),
            'has_website' => !empty($companyWebsite),
            'ip' => $clientIP
        ]);

        $emailService = new CustomEmail();
        $emailService->initializeConfig('contact');

        $emailService->setTo('info@nugui.co.za'); // Change to your email address
        $emailService->setFrom('info@nugui.co.za', 'NU GUI Contact');
        $emailService->setSubject($subject);
        $emailService->setMessage("
            <html>
                <head>
                    <title>Business Contact Form Submission</title>
                </head>
                <body>
                    <h2>Business Contact Form Submission</h2>
                    <p><strong>Business Name:</strong> {$businessName}</p>
                    <p><strong>Contact Name:</strong> {$name}</p>
                    <p><strong>Business Email:</strong> {$email}</p>
                    " . (!empty($companyWebsite) ? "<p><strong>Company Website:</strong> {$companyWebsite}</p>" : "") . "
                    <p><strong>Subject:</strong> {$subject}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$message}</p>
                    <hr>
                    <p><small>Email Domain Verified: " . ($emailValidation['verified'] ?? 'Yes') . "</small></p>
                </body>
            </html>
        ");
        $emailService->setAltMessage("
            Business Name: {$businessName}\n
            Contact Name: {$name}\n
            Business Email: {$email}\n
            " . (!empty($companyWebsite) ? "Company Website: {$companyWebsite}\n" : "") . "
            Subject: {$subject}\n
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
        
        if ($emailSent || $isLocalEnv) {
            // Log email failure in development but still show success
            if (!$emailSent && $isLocalEnv) {
                log_message('warning', 'Contact form email failed (local dev): ' . $emailError);
            }
            log_message('info', 'Contact form submitted successfully, redirecting to /contact');
            return redirect()->to(base_url('contact'))
                ->with('success', 'Your message has been received. We will get back to you soon.')
                ->with('email', $email);
        } else {
            // In production, email failure is an error
            return redirect()->back()->withInput()->with('errors', ['Unable to send your message. Please try again later.']);
        }
    }
    
    /**
     * Log form submission for security tracking
     */
    private function logFormSubmission($formType, $data)
    {
        try {
            $db = \Config\Database::connect();
            $builder = $db->table('form_submissions');
            
            $submissionData = [
                'form_type' => $formType,
                'submission_token' => $this->request->getPost('form_token') ?? uniqid(),
                'ip_address' => $this->request->getIPAddress(),
                'user_agent' => $this->request->getUserAgent(),
                'email' => $data['email'] ?? '',
                'business_name' => $data['business_name'] ?? null,
                'company_website' => $data['company_website'] ?? null,
                'email_domain' => $data['email_domain'] ?? '',
                'is_business_email' => $data['is_business_email'] ?? true,
                'domain_verified' => $data['domain_verified'] ?? false,
                'submission_time' => time() - ($this->request->getPost('form_timestamp') ?? time()),
                'interaction_count' => $data['interaction_count'] ?? 0,
                'challenge_passed' => true,
                'status' => 'approved'
            ];
            
            $builder->insert($submissionData);
        } catch (\Exception $e) {
            log_message('error', 'Failed to log form submission: ' . $e->getMessage());
        }
    }

}
?>
