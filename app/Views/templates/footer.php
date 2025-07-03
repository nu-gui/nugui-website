<footer class="bg-gray-900 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="lg:col-span-2">
                <div class="flex items-center mb-4">
                    <img src="<?= base_url('assets/images/NUGUI-ICON-6 - Light.png'); ?>" 
                         alt="NuGui Logo" 
                         class="logo-light h-8 w-auto">
                    <img src="<?= base_url('assets/images/NUGUI-ICON-7 - Dark.png'); ?>" 
                         alt="NuGui Logo" 
                         class="logo-dark h-8 w-auto">
                </div>
                <p class="text-gray-400 mb-4 max-w-md">
                    Leading telecommunications infrastructure provider specializing in VoIP services, call control systems, SMS solutions, and data enrichment services for carriers and enterprises.
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.linkedin.com/company/nu-gui/" target="_blank" 
                       class="p-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition-colors duration-200">
                        <img src="<?= base_url('assets/images/linkedin-icon.png'); ?>" alt="LinkedIn" class="w-5 h-5">
                    </a>
                    <a href="https://wa.me/27211100555" target="_blank" 
                       class="p-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition-colors duration-200">
                        <img src="<?= base_url('assets/images/whatsapp-icon.png'); ?>" alt="WhatsApp" class="w-5 h-5">
                    </a>
                </div>
            </div>

            <!-- Contact Information -->
            <div>
                <h3 class="text-white font-semibold mb-4">Contact Us</h3>
                <div class="space-y-3 text-gray-400">
                    <div>
                        <h4 class="text-sm font-medium text-gray-300">General Inquiries</h4>
                        <a href="mailto:info@nugui.co.za" class="hover:text-white transition-colors duration-200">
                            info@nugui.co.za
                        </a>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-300">Sales</h4>
                        <a href="mailto:sales@nugui.co.za" class="hover:text-white transition-colors duration-200">
                            sales@nugui.co.za
                        </a>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-300">Phone</h4>
                        <a href="tel:+27211100565" class="hover:text-white transition-colors duration-200">
                            +27 21 110 0565
                        </a>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-300">Location</h4>
                        <p>Cape Town, South Africa</p>
                    </div>
                </div>
            </div>

            <!-- Legal -->
            <div>
                <h3 class="text-white font-semibold mb-4">Legal</h3>
                <div class="space-y-2">
                    <a href="javascript:void(0);" onclick="openPopup('privacy')" 
                       class="block text-gray-400 hover:text-white transition-colors duration-200">
                        Privacy Terms
                    </a>
                    <a href="javascript:void(0);" onclick="openPopup('exclusive')" 
                       class="block text-gray-400 hover:text-white transition-colors duration-200">
                        Exclusive Use Rights
                    </a>
                    <a href="javascript:void(0);" onclick="openPopup('trademark')" 
                       class="block text-gray-400 hover:text-white transition-colors duration-200">
                        Trademark
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm">
                &copy; <?= date('Y') ?> NU GUI (PTY) LTD - Established in 2018. All rights reserved.
            </p>
            <div class="mt-4 md:mt-0">
                <p class="text-gray-400 text-sm">
                    Advanced Telecommunications Infrastructure Solutions
                </p>
            </div>
        </div>
    </div>

    <!-- Popup Modal -->
    <div id="popup-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Information</h2>
                    <button onclick="closePopup()" class="p-1 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="popup-text" class="text-gray-600 dark:text-gray-300 prose prose-sm max-w-none"></div>
            </div>
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
        document.getElementById('popup-modal').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup-modal').classList.add('hidden');
    }

    window.onclick = function(event) {
        var modal = document.getElementById('popup-modal');
        if (event.target == modal) {
            modal.classList.add('hidden');
        }
    }
</script>
