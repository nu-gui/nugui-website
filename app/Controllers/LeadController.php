<?php

namespace App\Controllers;

class LeadController extends BaseController
{
    public function logLead()
    {
        // Set JSON response header
        $this->response->setContentType('application/json');
        
        try {
            // Get POST data
            $postData = $this->request->getPost();
            
            if (empty($postData)) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'No data received'
                ]);
            }
            
            // Prepare lead data
            $leadData = [
                'timestamp' => date('Y-m-d H:i:s'),
                'ip_address' => $this->request->getIPAddress(),
                'user_agent' => $this->request->getUserAgent(),
                'referrer' => $this->request->getServer('HTTP_REFERER') ?? 'Direct',
                'form_data' => $postData
            ];
            
            // Log to file
            $logFile = WRITEPATH . 'logs/leads_' . date('Y-m') . '.log';
            $logEntry = date('Y-m-d H:i:s') . ' - ' . json_encode($leadData) . PHP_EOL;
            
            if (file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Lead logged successfully'
                ]);
            } else {
                return $this->response->setStatusCode(500)->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to log lead'
                ]);
            }
            
        } catch (\Exception $e) {
            log_message('error', 'LeadController::logLead - ' . $e->getMessage());
            
            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                'message' => 'Internal server error'
            ]);
        }
    }
}
