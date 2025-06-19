<?php

namespace App\Libraries;

use CodeIgniter\Email\Email;

class CustomEmail extends Email
{
    public function __construct($config = null)
    {
        parent::__construct($config);
    }

    public function initializeConfig($type)
    {
        $contactConfig = [
            'protocol'    => 'smtp',
            'SMTPHost'    => env('SMTP_HOST', 'mail.nugui.co.za'),
            'SMTPUser'    => env('CONTACT_EMAIL_USER', 'info@nugui.co.za'),
            'SMTPPass'    => env('CONTACT_EMAIL_PASS', ''),
            'SMTPPort'    => env('SMTP_PORT', 465),
            'SMTPCrypto'  => env('SMTP_CRYPTO', 'ssl'),
            'mailType'    => 'html',
            'charset'     => 'UTF-8',
            'wordWrap'    => true,
        ];

        $supportConfig = [
            'protocol'    => 'smtp',
            'SMTPHost'    => env('SMTP_HOST', 'mail.nugui.co.za'),
            'SMTPUser'    => env('SUPPORT_EMAIL_USER', 'support@nugui.co.za'),
            'SMTPPass'    => env('SUPPORT_EMAIL_PASS', ''),
            'SMTPPort'    => env('SMTP_PORT', 465),
            'SMTPCrypto'  => env('SMTP_CRYPTO', 'ssl'),
            'mailType'    => 'html',
            'charset'     => 'UTF-8',
            'wordWrap'    => true,
        ];

        if ($type === 'contact') {
            $this->initialize($contactConfig);
        } elseif ($type === 'support') {
            $this->initialize($supportConfig);
        }
    }
}
