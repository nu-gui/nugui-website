<?php
namespace App\Controllers;

use App\Models\PartnerModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Libraries\CustomEmail;
use App\Libraries\AntiBotProtection;

class PartnerProgram extends BaseController {
    public function index() {
        $data = [
            'title' => 'Partner Program - NU GUI',
            'description' => 'Join the NU GUI Partner Program and grow your business with our innovative solutions.',
            'ogTitle' => 'Partner Program - NU GUI',
            'ogDescription' => 'Join the NU GUI Partner Program and grow your business with our innovative solutions.',
            'ogImage' => base_url('assets/images/preview-image.jpg'),
            'ogUrl' => base_url('/partner-program'),
            'twitterTitle' => 'Partner Program - NU GUI',
            'twitterDescription' => 'Join the NU GUI Partner Program and grow your business with our innovative solutions.',
            'twitterImage' => base_url('assets/images/preview-image.jpg')
        ];
        return view('partner_program', $data);
    }


    /**
     * Handle partner form submission.
     */
    public function submit_partner_form() {
        $partnerModel = new PartnerModel();
        $antiBotProtection = new AntiBotProtection();
        $logger = service('logger');
        
        // Get client IP
        $clientIP = $this->request->getIPAddress();
        
        $logger->info('Form submission started.', ['ip' => $clientIP]);
        
        // Check if IP is temporarily blacklisted
        if ($antiBotProtection->isTemporarilyBlacklisted($clientIP)) {
            $logger->warning('Submission blocked: IP temporarily blacklisted', ['ip' => $clientIP]);
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Your IP is temporarily blocked. Please try again later.'
            ]);
        }
        
        // Anti-bot validation
        $postData = $this->request->getPost();
        $botErrors = $antiBotProtection->validateSubmission($postData);
        
        if (!empty($botErrors)) {
            // Add IP to temporary blacklist for repeated violations
            $antiBotProtection->addToBlacklist($clientIP);
            
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Submission validation failed.',
                'errors' => $botErrors
            ]);
        }

        // Validate form input
        $rules = [
            'businessName' => 'required|string|max_length[255]',
            'registrationNumber' => 'string|max_length[100]',
            'countryBusiness' => 'required|string|max_length[255]',
            'contactName' => 'required|string|max_length[255]',
            'contactEmail' => 'required|valid_email',
            'contactPhone' => 'required|regex_match[/^\+?[0-9\s\-]+$/]',
            'Skype_Teams' => 'string|max_length[100]',
            'question1' => 'string|max_length[500]',
            'question2' => 'string|max_length[10]',
            'question3' => 'string|max_length[255]',
            'question4' => 'string|max_length[50]',
            'question5' => 'string|max_length[255]',
            'question6' => 'string|max_length[1000]',
            'question7' => 'string|max_length[1000]'
            // Note: g-recaptcha-response is optional for fallback mode
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            $logger->error('Validation failed: ' . json_encode($errors));
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation failed. Please check your inputs and try again.',
                'errors' => $errors
            ]);
        }

        // CAPTCHA verification
        $captchaResponse = $this->request->getPost('g-recaptcha-response');
        if (!$this->verifyCaptcha($captchaResponse)) {
            $logger->error('CAPTCHA verification failed.');
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'CAPTCHA verification failed. Please try again.'
            ]);
        }

        // Sanitize input
        $data = $this->request->getPost();
        $logger->info('Form data sanitized.');

        // Rate limiting
        $ipAddress = $this->request->getIPAddress();
        if ($this->isRateLimited($ipAddress)) {
            $logger->error('Rate limit exceeded for IP: ' . $ipAddress);
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Too many requests. Please try again later.'
            ]);
        }

        // Add unique reference
        $reference = 'REF' . strtoupper(uniqid());
        $data['reference'] = $reference;

        try {
            $logger->info('Attempting to insert data into the database.');
            if ($partnerModel->insert($data)) {
                $logger->info('Data inserted into the database successfully.');

                // Generate and save PDF
                $this->generatePDF($data, $reference);

                // Send confirmation email
                $this->sendConfirmationEmail($data, $reference);

                return $this->response->setJSON([
                    'status' => 'success',
                    'reference' => $reference
                ]);
            } else {
                $errors = $partnerModel->errors();
                $logger->error('Database insertion failed: ' . json_encode($errors));
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Database insertion failed.'
                ]);
            }
        } catch (\Exception $e) {
            $logger->error('Form submission error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Verify CAPTCHA response with Google's reCAPTCHA API.
     */
    private function verifyCaptcha($token) {
        $secretKey = getenv('RECAPTCHA_SECRET_KEY'); // Get the secret key from the .env file
        $url = "https://www.google.com/recaptcha/api/siteverify";
    
        if (empty($secretKey)) {
            log_message('error', 'CAPTCHA secret key is missing from environment variables.');
            return false;
        }
    
        if (empty($token)) {
            log_message('error', 'CAPTCHA token is missing from the request.');
            return false;
        }
    
        // Initialize a cURL session for better error handling
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'secret' => $secretKey,
            'response' => $token
        ]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);
    
        if ($response === false) {
            log_message('error', 'Failed to reach reCAPTCHA API. cURL error: ' . $curlError);
            return false;
        }
    
        if ($httpCode !== 200) {
            log_message('error', 'Non-200 HTTP response from reCAPTCHA API: ' . $httpCode);
            return false;
        }
    
        $responseKeys = json_decode($response, true);
    
        // Check if CAPTCHA verification was successful
        if (empty($responseKeys['success']) || !$responseKeys['success']) {
            $errorCodes = $responseKeys['error-codes'] ?? [];
            log_message('error', 'CAPTCHA verification failed: ' . implode(', ', $errorCodes));
            return false;
        }
    
        log_message('info', 'CAPTCHA verification successful.');
        return true;
    }

    /**
     * Rate limiting based on IP address.
     */
    private function isRateLimited($ip) {
        $cache = \Config\Services::cache();
        $attempts = $cache->get($ip) ?? 0;

        if ($attempts >= 1) { // Allow 1 requests per minute
            return true;
        }

        $cache->save($ip, $attempts + 1, 60); // Increment counter, expires in 60 seconds
        return false;
    }

    /**
     * Generate and save PDF for partner application.
     */
    private function generatePDF($data, $reference) {
        require_once FCPATH . 'vendor/dompdf/autoload.inc.php';
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);

        $pdf = new Dompdf($pdfOptions);
        $pdf->loadHtml(view('partner_application_pdf', $data + ['reference' => $reference]));
        $pdf->render();
        $output = $pdf->output();
        $filename = 'Partner_Application_' . $reference . '.pdf';
        file_put_contents(WRITEPATH . 'uploads/' . $filename);
    }

    /**
     * Send confirmation email with PDF attachment.
     */
    private function sendConfirmationEmail($data, $reference) {
        $email = new CustomEmail();
        $email->initializeConfig('contact');
        $email->setFrom('info@nugui.co.za', 'NU GUI');
        $email->setTo($data['contactEmail']);
        $email->setCC('info@nugui.co.za');
        $email->setSubject('Partner Application Confirmation');
        $email->setMessage(view('partner_application_email', $data));
        $email->attach(WRITEPATH . 'uploads/' . 'Partner_Application_' . $reference . '.pdf');

        if (!$email->send()) {
            throw new \Exception('Failed to send confirmation email.');
        }
    }
}
