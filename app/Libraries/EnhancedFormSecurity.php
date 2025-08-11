<?php

namespace App\Libraries;

/**
 * Enhanced Form Security
 * Advanced bot protection and form validation
 */
class EnhancedFormSecurity
{
    protected $session;
    protected $request;
    protected $businessValidator;
    
    public function __construct()
    {
        $this->session = service('session');
        $this->request = service('request');
        $this->businessValidator = new BusinessEmailValidator();
    }
    
    /**
     * Generate form security token
     */
    public function generateFormToken($formType)
    {
        $token = bin2hex(random_bytes(32));
        $timestamp = time();
        $formId = uniqid('form_', true);
        
        // Store in session with metadata
        $tokenData = [
            'token' => $token,
            'timestamp' => $timestamp,
            'form_type' => $formType,
            'form_id' => $formId,
            'ip' => $this->request->getIPAddress(),
            'user_agent' => $this->request->getUserAgent(),
            'interaction_count' => 0,
            'field_focus_times' => []
        ];
        
        $this->session->set('form_token_' . $token, $tokenData);
        
        // Clean old tokens (older than 1 hour)
        $this->cleanOldTokens();
        
        return [
            'token' => $token,
            'form_id' => $formId,
            'timestamp' => $timestamp
        ];
    }
    
    /**
     * Validate form token and security measures
     */
    public function validateFormSecurity($token, $formData)
    {
        $errors = [];
        
        // 1. Validate token exists
        $tokenData = $this->session->get('form_token_' . $token);
        if (!$tokenData) {
            $errors[] = 'Invalid or expired form token. Please refresh the page.';
            return $errors;
        }
        
        // 2. Check token age (max 1 hour)
        $tokenAge = time() - $tokenData['timestamp'];
        if ($tokenAge > 3600) {
            $errors[] = 'Form session expired. Please refresh the page.';
            $this->session->remove('form_token_' . $token);
            return $errors;
        }
        
        // 3. Minimum time check (at least 5 seconds)
        if ($tokenAge < 5 && getenv('CI_ENVIRONMENT') === 'production') {
            $errors[] = 'Form submitted too quickly. Please take your time.';
            $this->logSuspiciousActivity('fast_submission', $tokenData);
        }
        
        // 4. Maximum time check (max 30 minutes for active form)
        if ($tokenAge > 1800) {
            $errors[] = 'Form session timeout. Please refresh and try again.';
        }
        
        // 5. Check IP consistency
        if ($tokenData['ip'] !== $this->request->getIPAddress()) {
            $this->logSuspiciousActivity('ip_change', $tokenData);
            // Don't block, but log for monitoring
        }
        
        // 6. Check User Agent consistency
        if ($tokenData['user_agent'] !== $this->request->getUserAgent()) {
            $this->logSuspiciousActivity('user_agent_change', $tokenData);
        }
        
        // 7. Check interaction count (should have some interactions)
        if ($tokenData['interaction_count'] < 2 && getenv('CI_ENVIRONMENT') === 'production') {
            $this->logSuspiciousActivity('low_interaction', $tokenData);
        }
        
        // 8. Validate honeypot fields
        $honeypotErrors = $this->validateHoneypots($formData);
        if (!empty($honeypotErrors)) {
            $errors = array_merge($errors, $honeypotErrors);
            $this->logSuspiciousActivity('honeypot_triggered', $tokenData);
        }
        
        // 9. Check for suspicious patterns
        $patternErrors = $this->checkSuspiciousPatterns($formData);
        if (!empty($patternErrors)) {
            $errors = array_merge($errors, $patternErrors);
        }
        
        // Remove token after validation (one-time use)
        if (empty($errors)) {
            $this->session->remove('form_token_' . $token);
        }
        
        return $errors;
    }
    
    /**
     * Validate business email requirements
     */
    public function validateBusinessEmail($email, $companyWebsite = null)
    {
        $result = [
            'valid' => false,
            'requiresWebsite' => false,
            'message' => '',
            'suggestions' => []
        ];
        
        // Check if it's a business email
        $businessCheck = $this->businessValidator->isBusinessEmail($email);
        
        if ($businessCheck === false) {
            // Personal email detected
            $result['requiresWebsite'] = true;
            $result['message'] = 'Personal email detected. Please provide your company website for verification.';
            
            if ($companyWebsite) {
                // Validate the provided website
                $websiteValidation = $this->businessValidator->validateCompanyWebsite($companyWebsite, $email);
                
                if ($websiteValidation['valid']) {
                    $result['valid'] = true;
                    $result['message'] = 'Personal email accepted with valid company website.';
                    
                    // Suggest business email format
                    $suggestion = $this->businessValidator->suggestBusinessEmailFormat($email, $websiteValidation['domain']);
                    if ($suggestion) {
                        $result['suggestions'][] = "Consider using a business email like: $suggestion";
                    }
                } else {
                    $result['message'] = 'Company website validation failed: ' . $websiteValidation['error'];
                }
            }
        } elseif ($businessCheck === 'requires_verification') {
            // Business provider that needs verification
            $result['requiresWebsite'] = true;
            $result['message'] = 'Please provide your company website to verify your business email.';
            
            if ($companyWebsite) {
                $websiteValidation = $this->businessValidator->validateCompanyWebsite($companyWebsite, $email);
                $result['valid'] = $websiteValidation['valid'];
                if (!$result['valid']) {
                    $result['message'] = 'Website verification failed: ' . $websiteValidation['error'];
                }
            }
        } else {
            // Valid business email
            $result['valid'] = true;
            $result['message'] = 'Valid business email.';
        }
        
        return $result;
    }
    
    /**
     * Update form interaction tracking
     */
    public function trackInteraction($token, $interactionType, $data = [])
    {
        $tokenData = $this->session->get('form_token_' . $token);
        if (!$tokenData) {
            return false;
        }
        
        $tokenData['interaction_count']++;
        
        if ($interactionType === 'field_focus') {
            $fieldName = $data['field'] ?? 'unknown';
            if (!isset($tokenData['field_focus_times'][$fieldName])) {
                $tokenData['field_focus_times'][$fieldName] = 0;
            }
            $tokenData['field_focus_times'][$fieldName]++;
        }
        
        $tokenData['last_interaction'] = time();
        $this->session->set('form_token_' . $token, $tokenData);
        
        return true;
    }
    
    /**
     * Validate honeypot fields
     */
    private function validateHoneypots($formData)
    {
        $errors = [];
        $honeypotFields = [
            'website_url' => 'Hidden field filled',
            'company_fax' => 'Hidden field filled',
            'additional_info' => 'Hidden field filled',
            'confirm_email' => 'Hidden field filled'
        ];
        
        foreach ($honeypotFields as $field => $error) {
            if (isset($formData[$field]) && !empty($formData[$field])) {
                $errors[] = 'Suspicious activity detected. Please try again.';
                break; // Don't reveal which field triggered
            }
        }
        
        return $errors;
    }
    
    /**
     * Check for suspicious patterns in form data
     */
    private function checkSuspiciousPatterns($formData)
    {
        $errors = [];
        
        // Check for excessive URLs in message fields
        foreach (['message', 'description', 'comments'] as $field) {
            if (isset($formData[$field])) {
                $urlCount = preg_match_all('/https?:\/\/[^\s]+/i', $formData[$field]);
                if ($urlCount > 3) {
                    $errors[] = 'Too many URLs detected in message. Please reduce links.';
                }
                
                // Check for suspicious keywords
                $suspiciousKeywords = [
                    'viagra', 'cialis', 'casino', 'lottery', 'prize',
                    'click here', 'act now', 'limited time', 'make money fast'
                ];
                
                $lowercaseContent = strtolower($formData[$field]);
                foreach ($suspiciousKeywords as $keyword) {
                    if (strpos($lowercaseContent, $keyword) !== false) {
                        $errors[] = 'Message contains restricted content.';
                        break;
                    }
                }
            }
        }
        
        // Check for script injections
        foreach ($formData as $value) {
            if (is_string($value)) {
                if (preg_match('/<script|javascript:|onclick|onerror|onload/i', $value)) {
                    $errors[] = 'Invalid characters detected in form submission.';
                    break;
                }
            }
        }
        
        return $errors;
    }
    
    /**
     * Log suspicious activity
     */
    private function logSuspiciousActivity($type, $data)
    {
        $logData = [
            'type' => $type,
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $this->request->getIPAddress(),
            'user_agent' => $this->request->getUserAgent(),
            'token_data' => $data
        ];
        
        log_message('warning', 'Suspicious form activity: ' . json_encode($logData));
    }
    
    /**
     * Clean old tokens from session
     */
    private function cleanOldTokens()
    {
        $sessionData = $this->session->get();
        $currentTime = time();
        
        foreach ($sessionData as $key => $value) {
            if (strpos($key, 'form_token_') === 0 && is_array($value)) {
                if (isset($value['timestamp']) && ($currentTime - $value['timestamp']) > 3600) {
                    $this->session->remove($key);
                }
            }
        }
    }
    
    /**
     * Generate challenge question for additional verification
     */
    public function generateChallenge()
    {
        $challenges = [
            ['question' => 'What is 5 + 3?', 'answer' => '8'],
            ['question' => 'What is 10 - 4?', 'answer' => '6'],
            ['question' => 'What is 2 × 4?', 'answer' => '8'],
            ['question' => 'What is the capital of France?', 'answer' => 'paris'],
            ['question' => 'What color is the sky?', 'answer' => 'blue'],
            ['question' => 'How many days in a week?', 'answer' => '7']
        ];
        
        $challenge = $challenges[array_rand($challenges)];
        $challengeId = uniqid('challenge_', true);
        
        $this->session->set('challenge_' . $challengeId, [
            'answer' => strtolower($challenge['answer']),
            'timestamp' => time()
        ]);
        
        return [
            'id' => $challengeId,
            'question' => $challenge['question']
        ];
    }
    
    /**
     * Validate challenge answer
     */
    public function validateChallenge($challengeId, $answer)
    {
        $challenge = $this->session->get('challenge_' . $challengeId);
        
        if (!$challenge) {
            return false;
        }
        
        // Check if challenge is not too old (5 minutes)
        if ((time() - $challenge['timestamp']) > 300) {
            $this->session->remove('challenge_' . $challengeId);
            return false;
        }
        
        $isValid = strtolower(trim($answer)) === $challenge['answer'];
        
        // Remove challenge after validation
        $this->session->remove('challenge_' . $challengeId);
        
        return $isValid;
    }
}