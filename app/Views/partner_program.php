<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
Partner Program
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .partner-overview, .why-partner, .exclusive-benefits, .how-to-partner {
        text-align: left;
        margin-bottom: 2rem;
        padding: 0 20px;
    }

    .partner-overview h2, .why-partner h2, .exclusive-benefits h2, .how-to-partner h2 {
        font-size: 2rem;
        color: #00A2E8;
    }

    .partner-overview p, .why-partner p, .exclusive-benefits ul, .how-to-partner ol {
        color: #e0e0e0;
    }

    .partner-overview ul, .exclusive-benefits ul, .how-to-partner ol {
        list-style: none;
        padding: 0;
    }

    .partner-overview ul li, .exclusive-benefits ul li, .how-to-partner ol li {
        margin-bottom: 1rem;
    }

    .button-wrapper {
        margin-top: 1rem;
        text-align: center;
    }

    .button-wrapper button {
        margin: 10px 0;
    }

    .image-frame {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        overflow: hidden;
        margin: 20px 0;
        border: 10px solid #333; /* Frame for the image */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Add some shadow for better effect */
    }

    .image-frame img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensure the image covers the area and maintains aspect ratio */
        object-position: center; /* Center the image within the frame */
    }

    /* Media Queries */
    @media (max-width: 1200px) {
        .image-frame {
            padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio */
        }
    }

    @media (max-width: 768px) {
        .image-frame {
            padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio */
        }
    }

    @media (max-width: 480px) {
        .image-frame {
            padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio */
        }
    }

    /* Popup Modal Styles */
    .popup-modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    .popup-content {
        background-color: #1a1a1a;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        border-radius: 10px;
    }

    .popup-content h2 {
        color: #00A2E8;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #e0e0e0;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border-radius: 4px;
        border: 1px solid #333;
        background-color: #2a2a2a;
        color: #e0e0e0;
        font-size: 1rem;
        box-sizing: border-box;
    }

    .button-container {
        text-align: right;
        margin-top: 1rem;
    }

    .wizard-step {
        display: none;
    }

    .wizard-step.active {
        display: block;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .error {
        color: red;
        font-size: 0.9rem;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="partner-overview container">
        <h2>Partner with Us</h2>
        <p>Join the NU GUI Partner Program and unlock exclusive benefits designed to propel your business to new heights. As a valued partner, you will receive personalized support, cutting-edge marketing materials, and comprehensive training programs that ensure your success.</p>
        <p>At NU GUI, we focus on building long-lasting partnerships with businesses in the telecommunications and direct marketing industries. We do not service the end-user clients directly but pride ourselves on the success of our partners, which is our preferred business model. Our solutions are tailored to meet the specific needs of our business partners, offering co-branding and white labeling options for each of our services.</p>
        <div class="button-wrapper">
            <button onclick="openPopup()">Apply Now</button>
        </div>
    </section>

    <section class="why-partner container">
        <h2>Why Partner with NU GUI?</h2>
        <p>By partnering with us, you'll gain access to a range of exclusive benefits and resources tailored to help you grow and succeed in a competitive market. Our program is designed to provide you with everything you need to enhance your business operations and achieve your goals.</p>
        <p>NU GUI has helped build niche software solutions that cater specifically to the needs of our partners. Our expertise in telecommunications and direct marketing allows us to deliver high-quality, reliable, and scalable solutions that drive business growth. Additionally, our co-branding and white labeling options enable our partners to offer these solutions under their own brand, strengthening their market presence.</p>
        <div class="image-frame">
            <img src="<?= base_url('assets/images/why-partner.jpg') ?>" alt="Image representing the benefits of partnership with NU GUI">
        </div>
    </section>

    <section class="exclusive-benefits container">
        <h2>Exclusive Benefits</h2>
        <ul>
            <li><strong>Access to Exclusive Resources:</strong> Get privileged access to our latest tools, technologies, and industry insights to stay ahead of the curve.</li>
            <li><strong>Dedicated Support:</strong> Enjoy personalized support from our expert team, dedicated to assisting you with any challenges you may face.</li>
            <li><strong>Marketing Materials:</strong> Receive high-quality marketing materials to effectively promote our solutions and drive your business growth.</li>
            <li><strong>Training Programs:</strong> Participate in comprehensive training programs to enhance your skills and knowledge, ensuring you can make the most of our partnership.</li>
            <li><strong>Co-Branding and White Labeling:</strong> Offer our solutions under your brand to strengthen your market presence and build customer loyalty.</li>
            <li><strong>Tailored Solutions:</strong> Leverage our expertise to develop niche software solutions that meet the specific needs of your business.</li>
        </ul>
    </section>

    <section class="how-to-partner container">
        <h2>How to Become a Partner</h2>
        <ol>
            <li><strong>Fill Out the Application Form:</strong> Complete our straightforward application form to express your interest in becoming a partner.</li>
            <li><strong>Receive Approval and Onboarding:</strong> Once approved, you'll undergo a seamless onboarding process to get you up and running quickly.</li>
            <li><strong>Start Benefiting from the Program:</strong> Begin leveraging the exclusive benefits and resources available to you as a NU GUI partner to accelerate your business growth.</li>
        </ol>
    </section>
</div>

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
    // Initialize partner form once DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Use the functions from script.js which should already be loaded
        if (typeof initializePartnerForm === 'function') {
            initializePartnerForm();
        }
    });
</script>
<?= $this->endSection() ?>
