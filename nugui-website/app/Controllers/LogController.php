<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class LogController extends BaseController {
    public function logToFile() {
        $input = $this->request->getJSON();
        $message = $input->message ?? 'No message provided';

        log_message('error', $message);  // Log message to CodeIgniter log

        $logfile = WRITEPATH . 'logs/custom_log.log';  // Custom log file path
        file_put_contents($logfile, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);

        return $this->response->setJSON(['status' => 'success']);
    }
}
?>
