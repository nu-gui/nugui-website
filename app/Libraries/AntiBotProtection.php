<?php

namespace App\Libraries;

use CodeIgniter\HTTP\RequestInterface;
use App\Config\AntiBotConfig;

class AntiBotProtection
{
    protected $request;
    protected $session;
    protected $logger;
    protected $config;

    public function __construct()
    {
        $this->request = service('request');
        $this->session = service('session');
        $this->logger = service('logger');
        $this->config = new AntiBotConfig();
    }

    /**
     * Validate form submission against bot attacks
     */
    public function validateSubmission($postData): array
    {
        $errors = [];
        
        // 1. Honeypot validation - Check if any honeypot fields are filled
        foreach ($this->config->honeypotFields as $field) {
            if (!empty($postData[$field])) {
                $this->logger->warning('Bot detected: Honeypot field filled', [
                    'field' => $field,
                    'value' => $postData[$field],
                    'ip' => $this->request->getIPAddress(),
                    'user_agent' => $this->request->getUserAgent()
                ]);
                $errors[] = 'Spam detection triggered.';
                break;
            }
        }

        // 2. Time-based validation - Form must take at least 3 seconds to complete
        if (isset($postData['form_start_time'])) {
            $formStartTime = (int)$postData['form_start_time'];
            $currentTime = time();
            $timeTaken = $currentTime - $formStartTime;
            
            if ($timeTaken < $this->config->minimumFormTime) {
                $this->logger->warning('Bot detected: Form submitted too quickly', [
                    'time_taken' => $timeTaken,
                    'ip' => $this->request->getIPAddress(),
                    'user_agent' => $this->request->getUserAgent()
                ]);
                $errors[] = 'Form submitted too quickly. Please try again.';
            }
            
            // Also check if form is too old
            if ($timeTaken > $this->config->maximumFormTime) {
                $this->logger->warning('Form session expired', [
                    'time_taken' => $timeTaken,
                    'ip' => $this->request->getIPAddress()
                ]);
                $errors[] = 'Form session expired. Please refresh the page and try again.';
            }
        }

        // 3. Rate limiting - Check submission frequency from same IP
        $ipAddress = $this->request->getIPAddress();
        $rateLimitKey = 'rate_limit_' . hash('sha256', $ipAddress);
        $submissions = $this->session->get($rateLimitKey) ?: [];
        
        // Clean old submissions
        $submissions = array_filter($submissions, function($timestamp) {
            return (time() - $timestamp) < $this->config->rateLimitWindow;
        });
        
        // Check if exceeded maximum submissions
        if (count($submissions) >= $this->config->maxSubmissionsPerHour) {
            $this->logger->warning('Rate limit exceeded', [
                'ip' => $ipAddress,
                'submissions_count' => count($submissions),
                'user_agent' => $this->request->getUserAgent()
            ]);
            $errors[] = 'Too many submissions. Please try again later.';
        } else {
            // Add current submission
            $submissions[] = time();
            $this->session->set($rateLimitKey, $submissions);
        }

        // 4. User Agent validation
        $userAgent = $this->request->getUserAgent();
        if (empty($userAgent) || $this->isKnownBot($userAgent)) {
            $this->logger->warning('Suspicious user agent detected', [
                'user_agent' => $userAgent,
                'ip' => $ipAddress
            ]);
            $errors[] = 'Invalid browser detected.';
        }

        // 5. Form token validation (basic CSRF alternative)
        if (!isset($postData['form_token']) || empty($postData['form_token'])) {
            $this->logger->warning('Missing form token', [
                'ip' => $ipAddress
            ]);
            $errors[] = 'Security token missing. Please refresh the page and try again.';
        } else {
            $tokenKey = 'form_tokens';
            $tokens = $this->session->get($tokenKey) ?: [];
            
            if (!in_array($postData['form_token'], $tokens)) {
                $this->logger->warning('Invalid form token', [
                    'token' => $postData['form_token'],
                    'ip' => $ipAddress
                ]);
                $errors[] = 'Invalid form token. Please refresh the page and try again.';
            } else {
                // Remove used token
                $tokens = array_diff($tokens, [$postData['form_token']]);
                $this->session->set($tokenKey, $tokens);
            }
        }

        return $errors;
    }

    /**
     * Check if user agent matches known bot patterns
     */
    private function isKnownBot($userAgent): bool
    {
        $userAgentLower = strtolower($userAgent);
        foreach ($this->config->botPatterns as $pattern) {
            if (strpos($userAgentLower, $pattern) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Store form token in session for validation
     */
    public function storeFormToken($token): void
    {
        $tokenKey = 'form_tokens';
        $tokens = $this->session->get($tokenKey) ?: [];
        
        // Keep only last N tokens to prevent memory issues
        if (count($tokens) >= $this->config->maxTokensInSession) {
            array_shift($tokens);
        }
        
        $tokens[] = $token;
        $this->session->set($tokenKey, $tokens);
    }

    /**
     * Check if IP is in blacklist
     */
    public function isBlacklistedIP($ip): bool
    {
        // Load blacklisted IPs from config or database
        $blacklistedIPs = [
            // Add known malicious IPs here
        ];
        
        return in_array($ip, $blacklistedIPs);
    }

    /**
     * Add IP to temporary blacklist
     */
    public function addToBlacklist($ip, $duration = null): void
    {
        if ($duration === null) {
            $duration = $this->config->defaultBlacklistDuration;
        }
        
        $blacklistKey = 'blacklist_' . hash('sha256', $ip);
        $this->session->set($blacklistKey, time() + $duration);
        
        $this->logger->info('IP added to temporary blacklist', [
            'ip' => $ip,
            'duration' => $duration
        ]);
    }

    /**
     * Check if IP is temporarily blacklisted
     */
    public function isTemporarilyBlacklisted($ip): bool
    {
        // Always allow localhost IPs for local development/testing
        if (in_array($ip, ['127.0.0.1', '::1'])) {
            return false;
        }

        $blacklistKey = 'blacklist_' . hash('sha256', $ip);
        $blacklistUntil = $this->session->get($blacklistKey);

        if ($blacklistUntil && time() < $blacklistUntil) {
            return true;
        }

        // Clean expired blacklist entry
        if ($blacklistUntil) {
            $this->session->remove($blacklistKey);
        }

        return false;
    }
}