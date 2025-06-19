<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="hero container">
        <h1>Welcome to NU GUI</h1>
        <p>Innovative UI/UX Solutions for Your Business</p>
        <p>Transform your digital presence with our cutting-edge UI/UX solutions. Experience the perfect blend of innovation and functionality designed to enhance your business operations.</p>
    </section>
    <section class="nu-gui container">
        <div class="parallax">
            <img src="<?= base_url('assets/images/nu-gui-banner.jpg') ?>" alt="Banner for NU GUI services">
        </div>
    </section>
    <section class="about-us container">
        <h2>About NU GUI</h2>
        <p>Welcome to NU GUI. Our Vision. Our Mission. Our Values.</p>
        <p>At NU GUI, we are driven by a passion for innovation and excellence. Our mission is to provide top-tier UI/UX solutions that empower businesses to thrive in the digital landscape. Our values of integrity, customer-centricity, and continuous improvement guide everything we do.</p>
        <div class="button-wrapper">
            <a href="/about" class="button">Learn More</a>
        </div>
    </section>
    <section id="products-overview" class="products-overview container">
        <h2>Our Products</h2>
        <p>Discover the innovative solutions offered by NU GUI, each designed to enhance your business operations.</p>
        <div class="product-buttons cta-buttons">
            <div class="product-button">
                <a href="#nu-sip">
                    <img src="<?= base_url('assets/images/nu-sip-icon.jpg') ?>" alt="NU SIP - VoIP Services">
                </a>
                <div class="product-description">NU SIP - VoIP Services</div>
            </div>
            <div class="product-button">
                <a href="#nu-sms">
                    <img src="<?= base_url('assets/images/nu-sms-icon.jpg') ?>" alt="NU SMS - Direct Messaging Services">
                </a>
                <div class="product-description">NU SMS - Direct Messaging Services</div>
            </div>
            <div class="product-button">
                <a href="#nu-ccs">
                    <img src="<?= base_url('assets/images/nu-ccs-icon.jpg') ?>" alt="NU CCS - Telecoms Software Call Control Server">
                </a>
                <div class="product-description">NU CCS - Call Control Server</div>
            </div>
            <div class="product-button">
                <a href="#nu-data">
                    <img src="<?= base_url('assets/images/nu-data-icon.jpg') ?>" alt="NU DATA - Data Enrichment Services">
                </a>
                <div class="product-description">NU DATA - Data Enrichment Services</div>
            </div>
        </div>
    </section>
    <section id="nu-sip" class="nu-sip container">
        <div class="parallax">
            <img src="<?= base_url('assets/images/nu-sip-banner.jpg') ?>" alt="Banner for NU SIP service">
        </div>
        <h2>NU SIP (VoIP Services)</h2>
        <p>NU SIP offers advanced VoIP services designed to streamline your business communications. Enjoy crystal-clear voice quality, reliable connectivity, and features that enhance productivity and collaboration.</p>
        <p><strong>Key Features:</strong> Advanced Proxy Interconnect, Enhanced RTP Media Interconnect, Advanced DID Database Management, Smart CLI Number Management, Enhanced Voice Call Billing System.</p>
    </section>
    <section id="nu-sms" class="nu-sms container">
        <div class="parallax">
            <img src="<?= base_url('assets/images/nu-sms-banner.jpg') ?>" alt="Banner for NU SMS service">
        </div>
        <h2>NU SMS (Direct Messaging Services)</h2>
        <p>NU SMS provides comprehensive direct messaging services that enable businesses to communicate effectively with their customers. Our platform supports bulk SMS, automated messaging, and real-time delivery tracking.</p>
        <p><strong>Key Features:</strong> API Features, Sending an SMS, Replies and Inbox Forwarding, Delivery Reports.</p>
        <p></p>
    </section>
    <section id="nu-ccs" class="nu-ccs container">
        <div class="parallax">
            <img src="<?= base_url('assets/images/nu-ccs-banner.jpg') ?>" alt="Banner for NU CCS service">
        </div>
        <h2>NU CCS (Telecoms Software Call Control Server)</h2>
        <p>NU CCS is a robust telecoms software call control server providing comprehensive call management solutions for telecom operators and large enterprises. Manage, monitor, and optimize voice communications with advanced features.</p>
        <p><strong>Key Features:</strong> Advanced DID Database Management, Smart CLI Number Management, CLI Protect Solution, BI Reporting, Enhanced Voice Call Billing System.</p>
        <p></p>
    </section>
    <section id="nu-data" class="nu-data container">
        <div class="parallax">
            <img src="<?= base_url('assets/images/nu-data-banner.jpg') ?>" alt="Banner for NU DATA service">
        </div>
        <h2>NU DATA (Data Enrichment Services)</h2>
        <p>NU DATA offers state-of-the-art data enrichment services that help businesses enhance their data quality and gain valuable insights. Services include data cleansing, validation, reverse phone number lookup, RPC (Right Party Contact), and data augmentation.</p>
        <p><strong>Key Features:</strong> Data Cleansing, Data Validation, Data Augmentation, Right Party Contact, Phone Number Verification, Secure and Compliant.</p>
        <p></p>
    </section>
    <section class="technology-features container">
        <h2>Advanced Technology</h2>
        <p>Overview of technology and features for each product</p>
        <p>Our products leverage the latest technologies to deliver exceptional performance and reliability. Explore the advanced features that set NU GUI apart in the industry.</p>
        <p></p>
    </section>
    <section class="partner-program container">
        <h2>Partner with Us</h2>
        <p>Benefits of joining the NU GUI Partner Program</p>
        <p>Join our Partner Program and gain access to exclusive resources, support, and opportunities to grow your business. Partner with NU GUI and let's achieve success together. Join the Partner Program</p>
        <div class="button-wrapper">
        <p></p>
        <p>Join the Partner Program</p>
        <div class="button-wrapper">
            <a href="/partner-program" class="button">Join the Partner Program</a>
        </div>
    </section>
    <section class="contact-us container">
        <h2>Get in Touch</h2>
        <p>Contact Information</p>
    </section>
</div>
<?= $this->endSection() ?>
