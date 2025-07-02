<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class AntiBotConfig extends BaseConfig
{
    /**
     * Honeypot fields to check for spam detection
     */
    public array $honeypotFields = [
        'website',
        'email_confirm', 
        'company',
        'comments',
        'phone',
        'email_verify',
        'company_name',
        'backup_email'
    ];

    /**
     * Minimum time (in seconds) a form must take to complete
     */
    public int $minimumFormTime = 3;

    /**
     * Maximum time (in seconds) before a form session expires
     */
    public int $maximumFormTime = 3600; // 1 hour

    /**
     * Maximum submissions per hour per IP address
     */
    public int $maxSubmissionsPerHour = 5;

    /**
     * Rate limit time window (in seconds)
     */
    public int $rateLimitWindow = 3600; // 1 hour

    /**
     * Default IP blacklist duration (in seconds)
     */
    public int $defaultBlacklistDuration = 1800; // 30 minutes

    /**
     * Maximum number of form tokens to store in session
     */
    public int $maxTokensInSession = 10;

    /**
     * Known bot user agent patterns
     */
    public array $botPatterns = [
        'curl',
        'wget',
        'python',
        'scrapy',
        'bot',
        'crawler',
        'spider',
        'headless',
        'phantom',
        'selenium'
    ];

    /**
     * Minimum mouse movements required for human interaction
     */
    public int $minimumMouseMovements = 5;

    /**
     * Minimum key presses required for human interaction
     */
    public int $minimumKeyPresses = 1;
}