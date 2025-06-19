<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
Solutions
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .solution-detail {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        background-color: #1a1a1a;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .solution-detail img {
        max-width: 150px;
        height: auto;
        margin-right: 2rem;
        border-radius: 50%;
    }

    .solution-detail h2 {
        font-size: 2rem;
        color: #00A2E8;
        margin-bottom: 1rem;
    }

    .solution-detail p, .solution-detail ul {
        text-align: left;
        margin: 0;
        color: #e0e0e0;
    }

    .solution-detail ul {
        padding-left: 20px;
    }

    .solution-detail ul li {
        list-style-type: disc;
        margin-bottom: 0.5rem;
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="solutions-overview container">
        <h2>Our Solutions</h2>
        <p>Explore our tailored solutions designed to meet the unique needs of your business.</p>
    </section>

    <section class="solution-detail container">
        <img src="<?= base_url('assets/images/nu-sip.jpg') ?>" alt="NU SIP service image">
        <div>
            <h2>NU SIP (VoIP Services)</h2>
            <p>NU SIP offers advanced VoIP services that streamline business communications. Our VoIP solutions provide crystal-clear voice quality, reliable connectivity, and a host of features that enhance productivity and collaboration.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>Advanced Proxy Interconnect:</strong> Efficient routing and stringent security measures tailored for carriers.</li>
                <li><strong>Enhanced RTP Media Interconnect:</strong> Facilitates efficient domestic call termination and media management.</li>
                <li><strong>Advanced DID Database Management:</strong> Provides robust control over DID/ANI numbers.</li>
                <li><strong>Smart CLI Number Management:</strong> Enhances control over call routing.</li>
                <li><strong>Advanced DID/ANI & Carrier Reporting:</strong> In-depth insights and call analytics.</li>
                <li><strong>Comprehensive Whitelist Validation:</strong> Ensures trusted communication channels.</li>
                <li><strong>Efficient Blacklist Validation:</strong> Prevents fraudulent or unwanted calls.</li>
                <li><strong>Intelligent ANI Auto-Block Support:</strong> Automates the process of invalid ANI blocking.</li>
            </ul>
        </div>
    </section>

    <section class="solution-detail container">
        <img src="<?= base_url('assets/images/nu-ccs.jpg') ?>" alt="NU CCS service image">
        <div>
            <h2>NU CCS (Call Control Server)</h2>
            <p>NU CCS is a sophisticated call control server that brings advanced VoIP call management capabilities to carriers and telecom providers. Designed for efficient DID (Direct Inward Dialling) and CLI (Caller Line Identification) management, NU CCS enhances call routing precision and operational efficiency.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>Advanced Proxy Interconnect:</strong> Ensures consistency and control over voice traffic.</li>
                <li><strong>Enhanced Traffic Filtering:</strong> Optimizes network performance and efficiency.</li>
                <li><strong>Fixed Signalling and Media IP Security:</strong> Enhances security by maintaining fixed IPs.</li>
                <li><strong>Local Media Server Utilization:</strong> Ensures superior call quality and performance.</li>
                <li><strong>Comprehensive Reporting:</strong> Provides detailed insights into call activities and network performance.</li>
                <li><strong>Webhook API Integration:</strong> Enhances caller ID name display and data retrieval.</li>
            </ul>
        </div>
    </section>

    <section class="solution-detail container">
        <img src="<?= base_url('assets/images/nu-sms.jpg') ?>" alt="NU SMS service image">
        <div>
            <h2>NU SMS (Direct Messaging Services)</h2>
            <p>NU SMS provides comprehensive direct messaging services that enable businesses to communicate effectively with their customers. Our platform supports bulk SMS, automated messaging, and real-time delivery tracking.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>API Features:</strong> Easy integration with existing systems.</li>
                <li><strong>Bulk SMS and Automated Messaging:</strong> Streamlines communication processes.</li>
                <li><strong>Real-Time Delivery Tracking:</strong> Ensures messages are delivered promptly and accurately.</li>
                <li><strong>Comprehensive Reporting:</strong> Provides insights into messaging performance and customer engagement.</li>
            </ul>
        </div>
    </section>

    <section class="solution-detail container">
        <img src="<?= base_url('assets/images/nu-data.jpg') ?>" alt="NU DATA service image">
        <div>
            <h2>NU DATA (Data Enrichment Services)</h2>
            <p>NU DATA offers state-of-the-art data enrichment services that help businesses enhance their data quality and gain valuable insights. Our services include data cleansing, data validation, and data augmentation to ensure your business decisions are based on accurate and comprehensive information.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>Data Cleansing:</strong> Removes inaccuracies and inconsistencies.</li>
                <li><strong>Data Validation:</strong> Ensures data accuracy and reliability.</li>
                <li><strong>Data Augmentation:</strong> Enhances existing data with additional insights.</li>
                <li><strong>Real-Time Processing:</strong> Provides up-to-date information for better decision-making.</li>
                <li><strong>Secure and Compliant:</strong> Ensures data security and compliance with industry standards.</li>
            </ul>
        </div>
    </section>

    <section class="call-to-action container">
        <h2>Ready to Transform Your Business?</h2>
    </section>
</div>
<?= $this->endSection() ?>
