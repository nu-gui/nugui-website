<?php
namespace App\Controllers;

use App\Models\PartnerModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Libraries\CustomEmail;
use CodeIgniter\Log\Logger;

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

    public function submit_partner_form() {
        $partnerModel = new PartnerModel();
        $logger = service('logger');

        $logger->info('Form submission started.');

        // Log incoming POST data
        $logger->info('Raw POST data: ' . json_encode($this->request->getPost()));

        $data = [
            'businessName' => $this->request->getPost('businessName'),
            'registrationNumber' => $this->request->getPost('registrationNumber'),
            'countryBusiness' => $this->request->getPost('countryBusiness'),
            'contactName' => $this->request->getPost('contactName'),
            'contactEmail' => $this->request->getPost('contactEmail'),
            'contactPhone' => $this->request->getPost('contactPhone'),
            'Skype_Teams' => $this->request->getPost('Skype_Teams'),
            'question1' => $this->request->getPost('question1'),
            'question2' => $this->request->getPost('question2'),
            'question3' => $this->request->getPost('question3'),
            'question4' => $this->request->getPost('question4'),
            'question5' => $this->request->getPost('question5'),
            'question6' => $this->request->getPost('question6'),
            'question7' => $this->request->getPost('question7'),
        ];

        $data = filter_var_array($data, [
            'businessName' => FILTER_SANITIZE_SPECIAL_CHARS,
            'registrationNumber' => FILTER_SANITIZE_SPECIAL_CHARS,
            'countryBusiness' => FILTER_SANITIZE_SPECIAL_CHARS,
            'contactName' => FILTER_SANITIZE_SPECIAL_CHARS,
            'contactEmail' => FILTER_SANITIZE_EMAIL,
            'contactPhone' => FILTER_SANITIZE_SPECIAL_CHARS,
            'Skype_Teams' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question1' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question2' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question3' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question4' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question5' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question6' => FILTER_SANITIZE_SPECIAL_CHARS,
            'question7' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);

        $logger->info('Sanitized data: ' . json_encode($data));

        $reference = 'REF' . strtoupper(uniqid());
        $data['reference'] = $reference;

        $logger->info('Reference generated: ' . $reference);

        try {
            $logger->info('Attempting to insert data into the database.');
            if ($partnerModel->insert($data)) {
                $logger->info('Data inserted into the database successfully.');

                // Generate PDF
                try {
                    require_once FCPATH . 'vendor/dompdf/autoload.inc.php'; // Ensure this path is correct
                    $pdfOptions = new Options();
                    $pdfOptions->set('isHtml5ParserEnabled', true);
                    $pdfOptions->set('isRemoteEnabled', true);

                    $pdf = new Dompdf($pdfOptions);
                    $pdf->loadHtml(view('partner_application_pdf', $data + ['reference' => $reference]));
                    $pdf->render();
                    $output = $pdf->output();
                    $filename = 'Partner_Application_' . $reference . '.pdf';
                    file_put_contents(WRITEPATH . 'uploads/' . $filename, $output);
                    $logger->info('PDF generated and saved successfully.');
                } catch (\Exception $e) {
                    $logger->error('PDF generation failed: ' . $e->getMessage());
                    throw new \Exception('PDF generation failed');
                }

                // Send confirmation email
                try {
                    $email = new CustomEmail();
                    $email->initializeConfig('contact');
                    $email->setFrom('info@nugui.co.za', 'NU GUI');
                    $email->setTo($data['contactEmail']);
                    $email->setCC('info@nugui.co.za');
                    $email->setSubject('Partner Application Confirmation');
                    $email->setMessage(view('partner_application_email', $data));
                    $email->attach(WRITEPATH . 'uploads/' . $filename);

                    if ($email->send()) {
                        $logger->info('Confirmation email sent successfully.');
                        return $this->response->setJSON(['status' => 'success', 'reference' => $reference]);
                    } else {
                        $logger->error('Email sending failed: ' . $email->printDebugger(['headers']));
                        throw new \Exception('Email sending failed');
                    }
                } catch (\Exception $e) {
                    $logger->error('Email sending failed: ' . $e->getMessage());
                    throw new \Exception('Email sending failed');
                }
            } else {
                $logger->error('Database insertion failed: ' . json_encode($partnerModel->errors()));
                throw new \Exception('Database insertion failed');
            }
        } catch (\Exception $e) {
            $logger->error('Form submission error: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
