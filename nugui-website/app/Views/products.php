<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="products-overview container">
        <h2>Our Products</h2>
        <p>Discover the innovative solutions offered by NU GUI, each designed to enhance your business operations.</p>
        <div class="product-buttons cta-buttons">
            <button><a href="#nu-sip">NU SIP - VoIP Services</a></button>
            <button><a href="#nu-sms">NU SMS - Direct Messaging Services</a></button>
            <button><a href="#nu-ccs">NU CCS - Telecoms Software Call Control Server</a></button>
            <button><a href="#nu-data">NU DATA - Data Enrichment Services</a></button>
        </div>
    </section>

    <section id="nu-sip" class="nu-sip container">
        <div class="parallax" style="background-image: url('<?= base_url('assets/images/nu-sip-banner.jpg') ?>');"></div>
        <h2>NU SIP (VoIP Services)</h2>
        <p>NU SIP offers advanced VoIP services designed to streamline your business communications. Our VoIP solutions provide crystal-clear voice quality, reliable connectivity, and a host of features that enhance productivity and collaboration.</p>
        <p><strong>Key Features:</strong> Advanced Proxy Interconnect, Enhanced RTP Media Interconnect, Advanced DID Database Management, Smart CLI Number Management, Enhanced Voice Call Billing System.</p>
        <div class="button-wrapper">
            <button><a href="#">Learn More</a></button>
        </div>
    </section>

    <section id="nu-sms" class="nu-sms container">
        <div class="parallax" style="background-image: url('<?= base_url('assets/images/nu-sms-banner.jpg') ?>');"></div>
        <h2>NU SMS (Direct Messaging Services)</h2>
        <p>NU SMS provides a comprehensive direct messaging service that enables businesses to communicate effectively with their customers. Our platform supports bulk SMS, automated messaging, and real-time delivery tracking.</p>
        <p><strong>Key Features:</strong> API Features, Sending an SMS, Replies and Inbox Forwarding, Delivery Reports.</p>
        <div class="button-wrapper">
            <button><a href="#">Learn More</a></button>
        </div>
    </section>

    <section id="nu-ccs" class="nu-ccs container">
        <div class="parallax" style="background-image: url('<?= base_url('assets/images/nu-ccs-banner.jpg') ?>');"></div>
        <h2>NU CCS (Telecoms Software Call Control Server)</h2>
        <p>NU CCS is a robust telecoms software call control server that provides comprehensive call management solutions. Designed for telecom operators and large enterprises, NU CCS offers advanced features to manage, monitor, and optimize voice communications.</p>
        <p><strong>Key Features:</strong> Advanced Proxy Interconnect, Enhanced RTP Media Interconnect, Advanced DID Database Management, Smart CLI Number Management, Enhanced Voice Call Billing System.</p>
        <div class="button-wrapper">
            <button><a href="#">Learn More</a></button>
        </div>
    </section>

    <section id="nu-data" class="nu-data container">
        <div class="parallax" style="background-image: url('<?= base_url('assets/images/nu-data-banner.jpg') ?>');"></div>
        <h2>NU DATA (Data Enrichment Services)</h2>
        <p>NU DATA offers state-of-the-art data enrichment services that help businesses enhance their data quality and gain valuable insights. Our services include data cleansing, data validation, and data augmentation to ensure your business decisions are based on accurate and comprehensive information.</p>
        <p><strong>Key Features:</strong> Data Cleansing, Data Validation, Data Augmentation, Real-Time Processing, Secure and Compliant.</p>
        <div class="button-wrapper">
            <button><a href="#">Learn More</a></button>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
