<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 py-20 lg:py-28">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Our <span class="text-gradient">Products</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto">
                Discover the innovative telecommunications solutions offered by NU GUI, each designed to enhance your business operations and drive growth.
            </p>
            
            <!-- Quick Navigation -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">
                <a href="#nu-sip" class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg p-4 text-white hover:bg-white/20 transition-all duration-200 group">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">NU SIP</span>
                        <span class="text-sm text-gray-300">VoIP Services</span>
                    </div>
                </a>
                
                <a href="#nu-sms" class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg p-4 text-white hover:bg-white/20 transition-all duration-200 group">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">NU SMS</span>
                        <span class="text-sm text-gray-300">Messaging</span>
                    </div>
                </a>
                
                <a href="#nu-ccs" class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg p-4 text-white hover:bg-white/20 transition-all duration-200 group">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">NU CCS</span>
                        <span class="text-sm text-gray-300">Call Control</span>
                    </div>
                </a>
                
                <a href="#nu-data" class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg p-4 text-white hover:bg-white/20 transition-all duration-200 group">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">NU DATA</span>
                        <span class="text-sm text-gray-300">Data Services</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- NU SIP Product -->
<section id="nu-sip" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="lg:pr-8">
                <img src="<?= base_url('assets/images/nu-sip-banner.jpg') ?>" alt="NU SIP VoIP Services" class="w-full rounded-xl shadow-xl">
            </div>
            <div>
                <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-full mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    VoIP Services
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU SIP</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU SIP offers advanced VoIP services designed to streamline your business communications. Our VoIP solutions provide crystal-clear voice quality, reliable connectivity, and comprehensive features that enhance productivity and collaboration.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Advanced Proxy Interconnect</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Enhanced RTP Media</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">DID Database Management</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Smart CLI Management</span>
                    </div>
                </div>
                <a href="<?= base_url('/solutions#nu-sip'); ?>" class="btn-primary text-lg px-8 py-3">
                    Learn More About NU SIP
                </a>
            </div>
        </div>
    </div>
</section>

<!-- NU SMS Product -->
<section id="nu-sms" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 text-sm font-medium rounded-full mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Messaging Platform
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU SMS</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU SMS provides a comprehensive direct messaging service that enables businesses to communicate effectively with their customers. Our platform supports bulk SMS, automated messaging, and real-time delivery tracking.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">RESTful API Integration</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Bulk SMS Campaigns</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Real-time Delivery</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Delivery Reports</span>
                    </div>
                </div>
                <a href="<?= base_url('/solutions#nu-sms'); ?>" class="btn-primary text-lg px-8 py-3">
                    Learn More About NU SMS
                </a>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/nu-sms-banner.jpg') ?>" alt="NU SMS Messaging Services" class="w-full rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- NU CCS Product -->
<section id="nu-ccs" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="lg:pr-8">
                <img src="<?= base_url('assets/images/nu-ccs-banner.jpg') ?>" alt="NU CCS Call Control Server" class="w-full rounded-xl shadow-xl">
            </div>
            <div>
                <div class="inline-flex items-center px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                    Call Control Server
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU CCS</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU CCS is a robust telecoms software call control server that provides comprehensive call management solutions. Designed for telecom operators and large enterprises, NU CCS offers advanced features to manage, monitor, and optimize voice communications.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Traffic Filtering</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Security & Monitoring</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Advanced Reporting</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">API Integration</span>
                    </div>
                </div>
                <a href="<?= base_url('/solutions#nu-ccs'); ?>" class="btn-primary text-lg px-8 py-3">
                    Learn More About NU CCS
                </a>
            </div>
        </div>
    </div>
</section>

<!-- NU DATA Product -->
<section id="nu-data" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center px-4 py-2 bg-orange-100 text-orange-800 text-sm font-medium rounded-full mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Data Enrichment
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU DATA</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU DATA offers state-of-the-art data enrichment services that help businesses enhance their data quality and gain valuable insights. Our services ensure your business decisions are based on accurate and comprehensive information.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-orange-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Data Cleansing</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-orange-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Data Validation</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-orange-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">Real-Time Processing</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-orange-600 rounded-full mr-3"></div>
                        <span class="text-gray-700 font-medium">GDPR Compliant</span>
                    </div>
                </div>
                <a href="<?= base_url('/solutions#nu-data'); ?>" class="btn-primary text-lg px-8 py-3">
                    Learn More About NU DATA
                </a>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/nu-data-banner.jpg') ?>" alt="NU DATA Enrichment Services" class="w-full rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Ready to Get Started?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Choose the telecommunications solution that best fits your business needs, or contact us to discuss a custom implementation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= base_url('/contact'); ?>" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                Contact Sales Team
            </a>
            <a href="<?= base_url('/solutions'); ?>" class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-200">
                View Detailed Solutions
            </a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
