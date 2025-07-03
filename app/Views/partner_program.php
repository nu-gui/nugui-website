<?= $this->extend('layout') ?>

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
    /* Custom styles for the partner program page */
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
    }
    .hero-section p {
        font-size: 1.5rem;
        max-w-3xl mx-auto;
        color: var(--color-text-secondary);
        margin-bottom: 30px;
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
    }
    .section-header p {
        font-size: 1.2rem;
        max-w-3xl mx-auto;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }
    .benefit-card {
        background: linear-gradient(135deg, var(--color-surface) 80%, var(--color-accent-secondary) 100%);
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        border: 2px solid var(--color-accent);
        box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        transition: transform 0.3s var(--transition-bounce), box-shadow 0.3s var(--transition-bounce), border-color 0.3s;
    }
    .benefit-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        border-color: var(--color-primary);
    }
    .benefit-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .benefit-card p {
        color: var(--color-text-secondary);
        line-height: 1.6;
        margin-bottom: 0;
    }
    .how-it-works-steps {
        display: flex;
        justify-content: center;
        text-align: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    .step {
        background: linear-gradient(135deg, var(--color-surface) 80%, var(--color-accent-secondary) 100%);
        border-radius: 24px;
        padding: 32px 24px 28px 24px;
        text-align: center;
        border: 2px solid var(--color-accent);
        box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        margin-bottom: 0;
        max-width: 300px;
        min-width: 220px;
        flex: 1 1 220px;
        transition: transform 0.3s var(--transition-bounce), box-shadow 0.3s var(--transition-bounce), border-color 0.3s;
    }
    .step:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 32px rgba(0,0,0,0.22);
        border-color: var(--color-primary);
    }
    .step h3 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--color-primary);
    }
    .step p {
        color: var(--color-text-secondary);
        font-size: 1.05rem;
        font-weight: 500;
        margin-bottom: 0;
    }
    .cta-section {
        background: var(--color-background);
        padding: 80px 20px;
        text-align: center;
    }
    .cta-section h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .cta-section p {
        font-size: 1.2rem;
        max-w-2xl mx-auto;
        margin-bottom: 30px;
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
    }
    .btn-primary:hover {
        background-color: var(--color-accent-hover);
    }
    
    /* Popup Modal Styles */
    .popup-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
        overflow-y: auto;
        padding: 20px;
    }
    
    .popup-content {
        background-color: var(--color-background);
        margin: 50px auto;
        padding: 40px;
        border-radius: 20px;
        max-width: 600px;
        position: relative;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .close {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        font-weight: 300;
        cursor: pointer;
        color: var(--color-text-secondary);
        transition: color 0.3s ease;
    }
    
    .close:hover {
        color: var(--color-text-primary);
    }
    
    /* Wizard Steps */
    .wizard-step {
        display: none;
    }
    
    .wizard-step.active {
        display: block;
    }
    
    .wizard-step h2 {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 30px;
        color: var(--color-text-primary);
    }
    
    .button-container {
        display: flex;
        gap: 20px;
        justify-content: flex-end;
        margin-top: 30px;
    }
    
    .button-container button {
        padding: 12px 24px;
        border-radius: 10px;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .button-container button[type="button"] {
        background-color: var(--color-background-secondary);
        color: var(--color-text-primary);
        border: 1px solid var(--color-border);
    }
    
    .button-container button[type="button"]:hover {
        background-color: var(--color-border);
    }
    
    .button-container button[type="submit"] {
        background-color: var(--color-accent);
        color: white;
    }
    
    .button-container button[type="submit"]:hover {
        background-color: var(--color-accent-hover);
    }
    
    .error {
        color: #ff3b30;
        font-size: 0.875rem;
        margin-top: 5px;
    }
</style>

<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(120deg, var(--color-background) 60%, var(--color-accent-secondary) 100%); color: var(--color-text-primary); text-align: center; padding: 100px 20px 80px 20px; border-radius: 0 0 48px 48px; box-shadow: 0 8px 32px rgba(0,0,0,0.3);">
    <div class="max-w-7xl mx-auto">
        <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: -0.02em; line-height: 1.1;">
            Join the <span class="text-gradient" style="background: linear-gradient(90deg, var(--color-primary), var(--color-accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">NU GUI Partner Program</span>
        </h1>
        <p style="font-size: 1.5rem; max-width: 48rem; margin: 0 auto 30px; color: var(--color-text-secondary);">
            Grow your business with our innovative solutions, dedicated support, and exclusive resources.
        </p>
        <a href="#application-form" class="btn-primary">Apply Now</a>
    </div>
</section>

<!-- Why Partner With Us -->
<section class="section alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>Why Partner with NU GUI?</h2>
            <p>Gain a competitive edge with our carrier-grade solutions and collaborative approach.</p>
        </div>
        <div class="card-grid">
            <div class="benefit-card">
                <h3>Exclusive Resources</h3>
                <p>Access our latest tools, technologies, and industry insights to stay ahead of the curve.</p>
            </div>
            <div class="benefit-card">
                <h3>Dedicated Support</h3>
                <p>Enjoy personalized support from our expert team, dedicated to your success.</p>
            </div>
            <div class="benefit-card">
                <h3>Co-Branding Options</h3>
                <p>Offer our solutions under your own brand with our white-labeling and co-branding opportunities.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2>How to Become a Partner</h2>
        </div>
        <div class="how-it-works-steps">
            <div class="step">
                <h3>1. Apply</h3>
                <p>Complete our straightforward application form to express your interest.</p>
            </div>
            <div class="step">
                <h3>2. Get Approved</h3>
                <p>Our team will review your application and get back to you promptly.</p>
            </div>
            <div class="step">
                <h3>3. Start Growing</h3>
                <p>Leverage our resources and solutions to accelerate your business growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- Application Form CTA -->
<section id="application-form" class="cta-section">
    <div class="max-w-4xl mx-auto">
        <h2>Ready to Get Started?</h2>
        <p>Fill out the application form below to take the first step towards a successful partnership.</p>
        <button onclick="openPopup()" class="btn-primary">Open Application Form</button>
    </div>
</section>

<!-- Popup Modal -->
<div id="popup-modal" class="popup-modal" role="dialog" aria-labelledby="form-title" aria-hidden="true">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <div id="popup-form-content">
            <form id="partner-form" method="post" enctype="multipart/form-data" action="<?= base_url('submit_partner_form') ?>">
                <?= csrf_field() ?>
                
                <!-- Honeypot fields - hidden from users but visible to bots -->
                <div style="display:none;">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                    <input type="email" name="email_confirm" tabindex="-1" autocomplete="off">
                    <input type="text" name="company" tabindex="-1" autocomplete="off">
                    <textarea name="comments" tabindex="-1" autocomplete="off"></textarea>
                </div>
                
                <!-- Time-based validation -->
                <input type="hidden" name="form_start_time" value="<?= time() ?>">
                <input type="hidden" name="form_token" value="<?= bin2hex(random_bytes(16)) ?>">
                <div id="step1" class="wizard-step active">
                    <h2>Step 1: Business Information</h2>
                    <div class="form-group">
                        <label for="businessName">Business Name</label>
                        <input type="text" id="businessName" name="businessName" required>
                    </div>
                    <div class="form-group">
                        <label for="registrationNumber">Registration Number</label>
                        <input type="text" id="registrationNumber" name="registrationNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="countryBusiness">Country of Business</label>
                        <select id="countryBusiness" name="countryBusiness" required></select>
                    </div>
                    <div class="button-container">
                        <button type="button" onclick="nextStep(2)">Next</button>
                    </div>
                </div>
                <div id="step2" class="wizard-step">
                    <h2>Step 2: Contact Information</h2>
                    <div class="form-group">
                        <label for="contactName">Contact Name</label>
                        <input type="text" id="contactName" name="contactName" required>
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Contact Email</label>
                        <input type="email" id="contactEmail" name="contactEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="contactPhone">Contact Phone</label>
                        <input type="tel" id="contactPhone" name="contactPhone" required>
                    </div>
                    <div class="form-group">
                        <label for="Skype_Teams">Skype/Teams</label>
                        <input type="text" id="Skype_Teams" name="Skype_Teams" required>
                    </div>
                    <div class="button-container">
                        <button type="button" onclick="prevStep(1)">Previous</button>
                        <button type="button" id="step2NextButton">Next</button>
                    </div>
                    <div class="error" id="emailError" style="display: none;">Email is required.</div>
                </div>
                <div id="step3" class="wizard-step">
                    <h2>Step 3: Questionnaire</h2>
                    <div class="form-group">
                        <label for="question1">What is your annual turnover for the last financial year?</label>
                        <select id="question1" name="question1" required>
                            <option value="">Select an option</option>
                            <option value="100k-500k">100k - 500k</option>
                            <option value="500k-1mil">500k - 1mil</option>
                            <option value="1mil-5mil">1mil - 5mil</option>
                            <option value="5mil-10mil">5mil - 10mil</option>
                            <option value="10mil+">10mil+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question2">Do you have financial statements for the last two years?</label>
                        <select id="question2" name="question2" required>
                            <option value="">Select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question3">What industry does your business primarily operate in?</label>
                        <select id="question3" name="question3" required>
                            <option value="">Select an option</option>
                            <option value="VoIP Wholesale">VoIP Wholesale</option>
                            <option value="Contact Center">Contact Center</option>
                            <option value="BPO">BPO (Business Process Outsourcing)</option>
                            <option value="PBX">PBX (Private Branch Exchange)</option>
                            <option value="SMS">SMS Services</option>
                            <option value="CRM">CRM (Customer Relationship Management)</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Lead Generation">Lead Generation</option>
                            <option value="Software Development">Software Development</option>
                            <option value="Telecom Equipment">Telecom Equipment</option>
                            <option value="Telecom Infrastructure">Telecom Infrastructure</option>
                            <option value="Telecom Carrier">Telecom Carrier</option>
                            <option value="Internet Service Provider">Internet Service Provider</option>
                            <option value="Unified Communications">Unified Communications</option>
                            <option value="Cloud Services">Cloud Services</option>
                            <option value="Data Center Services">Data Center Services</option>
                            <option value="IT Services">IT Services</option>
                            <option value="Network Security">Network Security</option>
                            <option value="Managed Services">Managed Services</option>
                            <option value="Mobile Network Operator">Mobile Network Operator</option>
                            <option value="Satellite Communications">Satellite Communications</option>
                            <option value="IoT (Internet of Things)">IoT (Internet of Things)</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="Big Data">Big Data</option>
                            <option value="Enterprise Solutions">Enterprise Solutions</option>
                            <option value="Consulting Services">Consulting Services</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="E-commerce">E-commerce</option>
                            <option value="Financial Services">Financial Services</option>
                            <option value="Healthcare Technology">Healthcare Technology</option>
                            <option value="Education Technology">Education Technology</option>
                            <option value="Media and Entertainment">Media and Entertainment</option>
                            <option value="Retail Technology">Retail Technology</option>
                            <option value="Travel and Hospitality">Travel and Hospitality</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question4">What type of partnership are you interested in?</label>
                        <select id="question4" name="question4" required>
                            <option value="">Select an option</option>
                            <option value="reseller">Reseller</option>
                            <option value="distributor">Distributor</option>
                            <option value="service">Service Provider</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question5">Which of our products are you most interested in?</label>
                        <select id="question5" name="question5" required>
                            <option value="">Select an option</option>
                            <option value="NU SIP">NU SIP - VoIP Services</option>
                            <option value="NU SMS">NU SMS - Direct Messaging Services</option>
                            <option value="NU CCS">NU CCS - Telecoms Software Call Control Server</option>
                            <option value="NU DATA">NU DATA - Data Enrichment Services</option>
                            <option value="NU GUI">NU GUI - Custom Build UI UX Portal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question6">How do you plan to market our solutions to your customers?</label>
                        <textarea id="question6" name="question6" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="question7">Describe your current customer base and target market.</label>
                        <textarea id="question7" name="question7" required></textarea>
                    </div>
                    <div class="button-container">
                        <button type="button" onclick="prevStep(2)">Previous</button>
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="confirmation-message" style="display: none;"></div>
    </div>
</div>

<script>
    // Popup functions
    function openPopup() {
        const modal = document.getElementById('popup-modal');
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closePopup() {
        const modal = document.getElementById('popup-modal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('popup-modal');
        if (event.target === modal) {
            closePopup();
        }
    }
    
    // Wizard navigation functions
    function nextStep(step) {
        const currentStep = document.querySelector('.wizard-step.active');
        const nextStep = document.getElementById('step' + step);
        
        if (currentStep && nextStep) {
            currentStep.classList.remove('active');
            nextStep.classList.add('active');
        }
    }
    
    function prevStep(step) {
        const currentStep = document.querySelector('.wizard-step.active');
        const prevStep = document.getElementById('step' + step);
        
        if (currentStep && prevStep) {
            currentStep.classList.remove('active');
            prevStep.classList.add('active');
        }
    }
    
    // Initialize partner form once DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Use the functions from script.js which should already be loaded
        if (typeof initializePartnerForm === 'function') {
            initializePartnerForm();
        }
        
        // Handle step 2 next button
        const step2NextButton = document.getElementById('step2NextButton');
        if (step2NextButton) {
            step2NextButton.addEventListener('click', function() {
                const email = document.getElementById('contactEmail').value;
                if (email) {
                    nextStep(3);
                } else {
                    document.getElementById('emailError').style.display = 'block';
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>
