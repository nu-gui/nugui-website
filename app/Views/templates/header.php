<header class="fixed top-0 w-full z-50 bg-gray-900/95 backdrop-blur-sm border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="<?= base_url(); ?>" class="flex items-center">
                    <img src="<?= base_url('assets/images/nugui-logo-secondary.png'); ?>" alt="NU GUI Logo" class="h-8 w-auto">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="<?= base_url('/home'); ?>" class="navbar-link">Home</a>
                <a href="<?= base_url('/about'); ?>" class="navbar-link">About Us</a>
                <a href="<?= base_url('/solutions'); ?>" class="navbar-link">Solutions</a>
                <a href="<?= base_url('/partner-program'); ?>" class="navbar-link">Partner Program</a>
                <a href="<?= base_url('/contact'); ?>" class="navbar-link">Contact Us</a>
                <a href="<?= base_url('/support'); ?>" class="navbar-link">Support</a>
            </nav>

            <!-- Right side buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Dark mode toggle -->
                <button id="theme-toggle" class="p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors duration-200">
                    <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- WhatsApp button -->
                <a href="https://wa.me/message/TGGYMYT6YAI5O1" target="_blank" 
                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <img src="<?= base_url('assets/images/whatsapp-icon.png'); ?>" alt="WhatsApp" class="w-5 h-5 mr-2">
                    <span class="hidden lg:inline">WhatsApp</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button data-mobile-menu-toggle class="p-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div data-mobile-menu class="md:hidden fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform -translate-x-full transition-transform duration-300 ease-in-out">
            <div class="px-2 pt-16 pb-3 space-y-1">
                <a href="<?= base_url('/home'); ?>" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors duration-200">Home</a>
                <a href="<?= base_url('/about'); ?>" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors duration-200">About Us</a>
                <a href="<?= base_url('/solutions'); ?>" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors duration-200">Solutions</a>
                <a href="<?= base_url('/partner-program'); ?>" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors duration-200">Partner Program</a>
                <a href="<?= base_url('/contact'); ?>" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors duration-200">Contact Us</a>
                <a href="<?= base_url('/support'); ?>" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors duration-200">Support</a>
                
                <!-- Mobile WhatsApp button -->
                <div class="pt-4 border-t border-gray-800">
                    <a href="https://wa.me/message/TGGYMYT6YAI5O1" target="_blank" 
                       class="flex items-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                        <img src="<?= base_url('assets/images/whatsapp-icon.png'); ?>" alt="WhatsApp" class="w-5 h-5 mr-2">
                        WhatsApp Business
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Overlay -->
    <div data-menu-overlay class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
</header>
