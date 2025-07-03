<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Contact NU GUI | Get Your Free Telecom Consultation<?= $this->endSection() ?>

<?php
// SEO Meta Tags for Contact Page
$this->setVar('description', 'Contact NU GUI for carrier-grade telecom solutions. Free consultation, 24/7 support, 30-day free trial. VoIP, SMS, call control & billing experts ready to help.');
$this->setVar('ogTitle', 'Contact NU GUI - Free Telecom Consultation | 24/7 Expert Support');
$this->setVar('ogDescription', 'Get expert telecom consultation from NU GUI. Free trial setup, migration assistance, 24/7 support. Contact us for VoIP, SMS, billing solutions.');
$this->setVar('twitterTitle', 'Contact NU GUI - Free Telecom Consultation');
$this->setVar('twitterDescription', 'Expert telecom consultation, free trial setup, 24/7 support. Contact NU GUI for VoIP, SMS & billing solutions.');
?>

<?= $this->section('content') ?>
<style>
    body {
        background: var(--color-background);
        color: var(--color-text-primary);
        font-family: var(--font-family-primary);
        margin: 0;
        padding: 0;
    }
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--color-primary);
        letter-spacing: -0.01em;
    }
    .btn-primary {
        display: inline-block;
        padding: 15px 40px;
        border-radius: 999px;
        font-size: 1.15rem;
        font-weight: 600;
        text-decoration: none;
        background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
        color: #18181A;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        transition: background 0.3s, color 0.3s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        color: #fff;
    }
    /* Custom styles for the contact page to align with the Apple design system */
    .hero-section {
        background-color: var(--color-background);
        color: var(--color-text-primary);
        text-align: center;
        padding: 80px 20px;
    }
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: -0.02em;
    }
    .hero-section .text-gradient {
        background: -webkit-linear-gradient(45deg, var(--color-accent), var(--color-accent-secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hero-section p {
        font-size: 1.5rem;
        max-width: 48rem;
        margin: 0 auto 30px;
        color: var(--color-text-secondary);
    }
    .section {
        padding: 80px 20px;
        background-color: var(--color-background-secondary);
    }
    .section.alt {
        background-color: var(--color-background);
    }
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .section-header p {
        font-size: 1.2rem;
        max-width: 42rem;
        margin: 0 auto;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }
    .contact-card {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .contact-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .contact-card p {
        color: var(--color-text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .contact-form {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        max-width: 56rem;
        margin: 0 auto;
    }
    .btn-primary {
        display: inline-block;
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        background-color: var(--color-accent);
        color: white;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: var(--color-accent-hover);
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--color-text-primary);
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--color-border);
        border-radius: 10px;
        background-color: var(--color-background-secondary);
        color: var(--color-text-primary);
        font-size: 1rem;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--color-accent);
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }
    .max-w-7xl {
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    @media (min-width: 640px) {
        .max-w-7xl {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
    @media (min-width: 1024px) {
        .max-w-7xl {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="max-w-7xl">
        <h1>
            Let's
            <span class="text-gradient">Connect</span>
        </h1>
        <p>
            Ready to transform your business with innovative technology solutions? Our team of experts is here to help you succeed.
        </p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Send us a Message</h2>
            <p>We'd love to hear about your project and how we can help</p>
        </div>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-2xl p-6 mb-8">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-green-800 dark:text-green-200 font-medium"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-2xl p-6 mb-8">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-red-800 dark:text-red-200">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <p class="font-medium"><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="contact-form">
                <form action="<?= base_url('/submit_contact_form') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <!-- Honeypot fields - hidden from users but visible to bots -->
                    <div class="hidden">
                        <input type="text" name="website" tabindex="-1" autocomplete="off">
                        <input type="text" name="phone" tabindex="-1" autocomplete="off">
                        <input type="email" name="email_verify" tabindex="-1" autocomplete="off">
                    </div>
                    
                    <!-- Time-based validation -->
                    <input type="hidden" name="form_start_time" value="<?= time() ?>">
                    <input type="hidden" name="form_token" value="<?= bin2hex(random_bytes(16)) ?>">
                    
                    <div class="card-grid">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" 
                                   name="name" 
                                   value="<?= old('name') ?>" 
                                   required
                                   placeholder="John Doe">
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address *</label>
                            <input type="email" 
                                   name="email" 
                                   value="<?= old('email') ?>" 
                                   required
                                   placeholder="john@example.com">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Subject *</label>
                        <input type="text" 
                               name="subject" 
                               value="<?= old('subject') ?>" 
                               required
                               placeholder="How can we help?">
                    </div>
                    
                    <div class="form-group">
                        <label>Message *</label>
                        <textarea name="message" 
                                  rows="6" 
                                  required
                                  placeholder="Tell us about your project and requirements..."><?= old('message') ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn-primary">Send Message</button>
                    </div>
                </form>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="section alt">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Get in Touch</h2>
            <p>
                Our team is ready to help you implement the right technology solutions for your business.
            </p>
        </div>
        
        <div class="card-grid">
            <!-- Email -->
            <div class="contact-card">
                <h3>Email Us</h3>
                <p>Send us an email and we'll get back to you within 24 hours</p>
                <a href="mailto:info@nugui.co.za" style="color: var(--color-accent); font-weight: 600;">
                    info@nugui.co.za
                </a>
            </div>
            
            <!-- Phone -->
            <div class="contact-card">
                <h3>Call Us</h3>
                <p>Speak directly with our team during business hours</p>
                <a href="tel:+27123456789" style="color: var(--color-accent); font-weight: 600;">
                    +27 12 345 6789
                </a>
            </div>
            
            <!-- Location -->
            <div class="contact-card">
                <h3>Visit Us</h3>
                <p>Located in the beautiful Mother City of South Africa</p>
                <span style="color: var(--color-accent); font-weight: 600;">Cape Town, South Africa</span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Quick answers to common questions</p>
        </div>
        
        <div class="card-grid">
            <div class="contact-card">
                <h3>What services do you offer?</h3>
                <p>We offer web development, mobile app development, digital transformation consulting, e-commerce solutions, cloud services, and IT consulting.</p>
            </div>
            
            <div class="contact-card">
                <h3>How long does a typical project take?</h3>
                <p>Project timelines vary depending on complexity and scope. Simple websites can take 2-4 weeks, while complex applications may take 3-6 months. We'll provide a detailed timeline during our initial consultation.</p>
            </div>
            
            <div class="contact-card">
                <h3>Do you provide ongoing support?</h3>
                <p>Yes, we offer comprehensive maintenance and support packages to ensure your solution continues to perform optimally after launch.</p>
            </div>
            
            <div class="contact-card">
                <h3>What technologies do you work with?</h3>
                <p>We work with modern technologies including React, Vue.js, Node.js, PHP, Python, cloud platforms (AWS, Azure), and mobile frameworks (React Native, Flutter).</p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>