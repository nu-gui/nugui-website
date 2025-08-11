<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Api extends ResourceController
{
    use ResponseTrait;
    
    /**
     * Check email domain against rules
     */
    public function checkEmailDomain()
    {
        $domain = $this->request->getJSON()->domain ?? '';
        
        if (empty($domain)) {
            return $this->respond(['error' => 'Domain required'], 400);
        }
        
        try {
            $db = \Config\Database::connect();
            
            // Check domain rules
            $builder = $db->table('email_domain_rules');
            $rule = $builder->where('domain', $domain)
                           ->where('is_active', true)
                           ->get()
                           ->getRowArray();
            
            if ($rule) {
                if ($rule['rule_type'] === 'blacklist') {
                    return $this->respond([
                        'blocked' => true,
                        'message' => 'Personal email detected. Please provide your company website for verification.',
                        'requires_website' => true
                    ]);
                } elseif ($rule['rule_type'] === 'whitelist') {
                    return $this->respond([
                        'blocked' => false,
                        'verified' => true,
                        'business_name' => $rule['business_name']
                    ]);
                }
            }
            
            // No rule found - check if it looks like a business domain
            $businessValidator = new \App\Libraries\BusinessEmailValidator();
            if ($businessValidator->domainExists($domain)) {
                return $this->respond([
                    'blocked' => false,
                    'verified' => false,
                    'message' => 'Domain verified'
                ]);
            } else {
                return $this->respond([
                    'blocked' => true,
                    'message' => 'Invalid email domain'
                ]);
            }
            
        } catch (\Exception $e) {
            log_message('error', 'Domain check failed: ' . $e->getMessage());
            return $this->respond(['error' => 'Validation failed'], 500);
        }
    }
    
    /**
     * Track form interaction
     */
    public function trackInteraction()
    {
        $data = $this->request->getJSON();
        $token = $data->token ?? '';
        $type = $data->type ?? '';
        $interactionData = $data->data ?? [];
        
        if (empty($token)) {
            return $this->respond(['error' => 'Token required'], 400);
        }
        
        try {
            $formSecurity = new \App\Libraries\EnhancedFormSecurity();
            $result = $formSecurity->trackInteraction($token, $type, $interactionData);
            
            return $this->respond(['success' => $result]);
        } catch (\Exception $e) {
            log_message('error', 'Interaction tracking failed: ' . $e->getMessage());
            return $this->respond(['error' => 'Tracking failed'], 500);
        }
    }
    
    /**
     * Track email validation attempt
     */
    public function trackEmailValidation()
    {
        $data = $this->request->getJSON();
        $token = $data->token ?? '';
        $email = $data->email ?? '';
        $domain = $data->domain ?? '';
        $isPersonal = $data->is_personal ?? false;
        
        try {
            // Log to security logs
            $db = \Config\Database::connect();
            $builder = $db->table('security_logs');
            
            $logData = [
                'log_type' => 'email_validation',
                'severity' => 'info',
                'ip_address' => $this->request->getIPAddress(),
                'user_agent' => $this->request->getUserAgent(),
                'email' => $email,
                'details' => json_encode([
                    'domain' => $domain,
                    'is_personal' => $isPersonal,
                    'token' => $token
                ])
            ];
            
            $builder->insert($logData);
            
            return $this->respond(['success' => true]);
        } catch (\Exception $e) {
            log_message('error', 'Email validation tracking failed: ' . $e->getMessage());
            return $this->respond(['error' => 'Tracking failed'], 500);
        }
    }
    
    /**
     * Validate company website
     */
    public function validateCompanyWebsite()
    {
        $data = $this->request->getJSON();
        $website = $data->website ?? '';
        $email = $data->email ?? '';
        
        if (empty($website)) {
            return $this->respond(['error' => 'Website required'], 400);
        }
        
        try {
            $businessValidator = new \App\Libraries\BusinessEmailValidator();
            $result = $businessValidator->validateCompanyWebsite($website, $email);
            
            if ($result['valid']) {
                // Check if website is accessible
                $accessible = $businessValidator->verifyWebsiteAccessible($website);
                $result['accessible'] = $accessible;
            }
            
            return $this->respond($result);
        } catch (\Exception $e) {
            log_message('error', 'Website validation failed: ' . $e->getMessage());
            return $this->respond(['error' => 'Validation failed'], 500);
        }
    }
    
    /**
     * Get security challenge
     */
    public function getChallenge()
    {
        try {
            $formSecurity = new \App\Libraries\EnhancedFormSecurity();
            $challenge = $formSecurity->generateChallenge();
            
            return $this->respond($challenge);
        } catch (\Exception $e) {
            log_message('error', 'Challenge generation failed: ' . $e->getMessage());
            return $this->respond(['error' => 'Challenge generation failed'], 500);
        }
    }
}