<?php

namespace App\Libraries;

/**
 * Business Email Validator
 * Validates business emails and handles personal email verification
 */
class BusinessEmailValidator
{
    /**
     * List of common personal email domains
     */
    private $personalEmailDomains = [
        // Major providers
        'gmail.com', 'googlemail.com', 'yahoo.com', 'yahoo.co.uk', 'yahoo.fr', 
        'yahoo.de', 'yahoo.es', 'yahoo.ca', 'yahoo.in', 'yahoo.com.au',
        'hotmail.com', 'hotmail.co.uk', 'hotmail.fr', 'hotmail.de',
        'outlook.com', 'outlook.fr', 'outlook.de', 'outlook.es',
        'live.com', 'live.co.uk', 'live.fr', 'live.de',
        'msn.com', 'icloud.com', 'me.com', 'mac.com',
        'aol.com', 'aim.com', 'zoho.com', 'yandex.com', 'yandex.ru',
        'mail.com', 'email.com', 'usa.com', 'myself.com',
        'protonmail.com', 'protonmail.ch', 'pm.me', 'proton.me',
        'tutanota.com', 'tutanota.de', 'tuta.io', 'tutamail.com',
        
        // Regional providers
        'qq.com', '163.com', '126.com', 'sina.com', 'foxmail.com', // China
        'naver.com', 'daum.net', 'hanmail.net', // Korea
        'mail.ru', 'inbox.ru', 'list.ru', 'bk.ru', // Russia
        'gmx.com', 'gmx.de', 'gmx.net', 'web.de', // Germany
        'orange.fr', 'wanadoo.fr', 'laposte.net', // France
        'libero.it', 'virgilio.it', 'alice.it', // Italy
        'rediffmail.com', 'indiatimes.com', // India
        
        // ISP emails
        'comcast.net', 'verizon.net', 'att.net', 'sbcglobal.net',
        'cox.net', 'charter.net', 'earthlink.net', 'optonline.net',
        'btinternet.com', 'virginmedia.com', 'sky.com', 'talktalk.net',
        'telstra.com.au', 'optusnet.com.au', 'bigpond.com',
        
        // Disposable/Temporary
        'guerrillamail.com', 'mailinator.com', '10minutemail.com',
        'tempmail.com', 'throwaway.email', 'yopmail.com'
    ];
    
    /**
     * Known business email providers that are acceptable
     */
    private $businessEmailProviders = [
        'microsoft365.com', 'office365.com', 'microsoftonline.com',
        'google.com', 'googlemail.com', // Google Workspace
        'zoho.com', 'zohomail.com', // Zoho business
        'fastmail.com', 'fastmail.fm',
        'runbox.com', 'pobox.com'
    ];
    
    /**
     * Validate if email is from a business domain
     */
    public function isBusinessEmail($email)
    {
        $domain = $this->extractDomain($email);
        if (!$domain) {
            return false;
        }
        
        // Check if it's a known personal email domain
        if ($this->isPersonalEmailDomain($domain)) {
            return false;
        }
        
        // Check if it's a known business provider (like Google Workspace)
        // These need additional verification
        if ($this->isBusinessProvider($domain)) {
            return 'requires_verification';
        }
        
        // Assume custom domains are business emails
        return true;
    }
    
    /**
     * Check if domain is a personal email provider
     */
    public function isPersonalEmailDomain($domain)
    {
        $domain = strtolower($domain);
        return in_array($domain, $this->personalEmailDomains);
    }
    
    /**
     * Check if domain is a business email provider
     */
    public function isBusinessProvider($domain)
    {
        $domain = strtolower($domain);
        return in_array($domain, $this->businessEmailProviders);
    }
    
    /**
     * Extract domain from email address
     */
    public function extractDomain($email)
    {
        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            return false;
        }
        return strtolower($parts[1]);
    }
    
    /**
     * Validate company website URL
     */
    public function validateCompanyWebsite($url, $email = null)
    {
        // Clean up URL
        $url = trim($url);
        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = 'https://' . $url;
        }
        
        // Parse URL
        $parsed = parse_url($url);
        if (!$parsed || !isset($parsed['host'])) {
            return ['valid' => false, 'error' => 'Invalid URL format'];
        }
        
        $domain = $parsed['host'];
        // Remove www. prefix
        $domain = preg_replace('/^www\./i', '', $domain);
        
        // Check if domain exists (DNS check)
        if (!$this->domainExists($domain)) {
            return ['valid' => false, 'error' => 'Domain does not exist'];
        }
        
        // If email provided, check if domains are related
        if ($email) {
            $emailDomain = $this->extractDomain($email);
            if ($emailDomain && !$this->isPersonalEmailDomain($emailDomain)) {
                // Check if email domain matches website domain
                if ($emailDomain === $domain || 
                    $this->areDomainsRelated($emailDomain, $domain)) {
                    return ['valid' => true, 'verified' => true, 'domain' => $domain];
                }
            }
        }
        
        return ['valid' => true, 'domain' => $domain];
    }
    
    /**
     * Check if domain exists via DNS
     */
    public function domainExists($domain)
    {
        // Check DNS records
        $dnsRecords = @dns_get_record($domain, DNS_A + DNS_AAAA + DNS_MX);
        return !empty($dnsRecords);
    }
    
    /**
     * Check if two domains are related (same organization)
     */
    public function areDomainsRelated($domain1, $domain2)
    {
        // Remove subdomains for comparison
        $base1 = $this->getBaseDomain($domain1);
        $base2 = $this->getBaseDomain($domain2);
        
        return $base1 === $base2;
    }
    
    /**
     * Get base domain (remove subdomains)
     */
    private function getBaseDomain($domain)
    {
        $parts = explode('.', $domain);
        if (count($parts) <= 2) {
            return $domain;
        }
        
        // Handle known TLDs with multiple parts (co.uk, com.au, etc.)
        $multiPartTlds = ['co.uk', 'com.au', 'co.za', 'co.nz', 'co.in', 'com.br'];
        $lastTwo = implode('.', array_slice($parts, -2));
        
        if (in_array($lastTwo, $multiPartTlds)) {
            return implode('.', array_slice($parts, -3));
        }
        
        return implode('.', array_slice($parts, -2));
    }
    
    /**
     * Verify company website is accessible
     */
    public function verifyWebsiteAccessible($url, $timeout = 5)
    {
        // Clean up URL
        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = 'https://' . $url;
        }
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; NU-GUI-Validator/1.0)');
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true); // HEAD request only
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Consider 200-399 as successful
        return $httpCode >= 200 && $httpCode < 400;
    }
    
    /**
     * Generate verification token for domain ownership
     */
    public function generateVerificationToken($domain, $email)
    {
        $secret = getenv('APP_KEY') ?: 'default-secret-key';
        $data = $domain . '|' . $email . '|' . date('Y-m-d');
        return hash_hmac('sha256', $data, $secret);
    }
    
    /**
     * Get suggested business email format
     */
    public function suggestBusinessEmailFormat($personalEmail, $companyDomain)
    {
        $parts = explode('@', $personalEmail);
        if (count($parts) !== 2) {
            return null;
        }
        
        $username = $parts[0];
        // Remove numbers and special characters for suggestion
        $cleanUsername = preg_replace('/[0-9_.-]+/', '', $username);
        
        if (empty($cleanUsername)) {
            $cleanUsername = 'contact';
        }
        
        return $cleanUsername . '@' . $companyDomain;
    }
}