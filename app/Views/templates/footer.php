<footer>
    <div class="footer-links">
        <a href="javascript:void(0);" onclick="openPopup('privacy')">Privacy Terms</a> | 
        <a href="javascript:void(0);" onclick="openPopup('exclusive')">Exclusive Use and Rights Information</a> | 
        <a href="javascript:void(0);" onclick="openPopup('trademark')">Trademark</a>
    </div>
    <div class="contact-info">
        <p>For more information about our solutions and how they can benefit your business, contact NU GUI</p> 
        <p>General Inquiry Email: <a href="mailto:info@nugui.co.za">info@nugui.co.za</a> | Sales Email: <a href="mailto:sales@nugui.co.za">sales@nugui.co.za</a></p>
        <p>Phone: <a href="tel:+27211100565">+27 21 110 0565</a> | WhatsApp Business: <a href="https://wa.me/27211100555">+27 21 110 0555</a></p>
        <p>Area: NU GUI (PTY) LTD, Cape Town, South Africa</p>
    </div>
    <div class="footer-bottom">
        <div class="footer-info">
            <p>&copy; NU GUI - Established in 2018. All rights reserved.</p>
            <div class="social-media">
                <a href="https://www.linkedin.com/company/nu-gui/" target="_blank">
                    <img src="<?= base_url('assets/images/linkedin-icon.png'); ?>" alt="LinkedIn Icon" class="linkedin-icon">
                </a>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css'); ?>">

    <!-- Popup Modal -->
    <div id="popup-modal" class="popup-modal">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <div id="popup-text"></div>
        </div>
    </div>
</footer>

<script>
    function openPopup(type) {
        var text = '';
        switch(type) {
            case 'privacy':
                text = '<h2>Privacy Terms</h2><p>At NU GUI, we value your privacy and are committed to protecting your personal information. Our Privacy Terms outline how we collect, use, and safeguard your data. We ensure that your information is used responsibly and only for the purposes for which it was collected.</p>';
                break;
            case 'exclusive':
                text = '<h2>Exclusive Use and Rights Information</h2><p>NU GUI provides exclusive use rights to our partners, ensuring that our solutions are tailored specifically to meet your needs. All materials and information provided as part of our services are protected by intellectual property rights and cannot be used without our explicit permission.</p>';
                break;
            case 'trademark':
                text = '<h2>Trademark</h2><p>The NU GUI name and logo are registered trademarks of NU GUI (PTY) LTD. Unauthorized use of our trademark is strictly prohibited and will be pursued to the fullest extent of the law. Our trademark represents our commitment to quality and excellence in UI/UX design.</p>';
                break;
        }
        document.getElementById('popup-text').innerHTML = text;
        document.getElementById('popup-modal').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup-modal').style.display = 'none';
    }

    window.onclick = function(event) {
        var modal = document.getElementById('popup-modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
