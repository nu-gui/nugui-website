<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900 py-20 lg:py-32">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6">
                Advanced Telecommunications 
                <span class="text-gradient">Infrastructure</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-4xl mx-auto">
                Leading provider of carrier-grade VoIP services, call control systems, SMS solutions, and data enrichment services for telecommunications operators and enterprises globally.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= base_url('/solutions'); ?>" class="btn-primary text-lg px-8 py-4">
                    Explore Solutions
                </a>
                <a href="<?= base_url('/partner-program'); ?>" class="btn-secondary text-lg px-8 py-4">
                    Partner Program
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Carrier-Grade Solutions
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive telecommunications infrastructure solutions designed for mission-critical operations with enterprise-grade reliability and scalability.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- NU SIP -->
            <div class="card group hover:scale-105 transition-transform duration-200">
                <div class="text-center">
                    <img src="<?= base_url('assets/images/nu-sip-icon.jpg') ?>" alt="NU SIP VoIP Services" class="w-20 h-20 mx-auto mb-4 rounded-full">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">NU SIP</h3>
                    <p class="text-gray-600 mb-4">Advanced VoIP services with carrier-grade routing, enhanced RTP media handling, and comprehensive call management.</p>
                    <a href="#nu-sip" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>

            <!-- NU SMS -->
            <div class="card group hover:scale-105 transition-transform duration-200">
                <div class="text-center">
                    <img src="<?= base_url('assets/images/nu-sms-icon.jpg') ?>" alt="NU SMS Messaging Services" class="w-20 h-20 mx-auto mb-4 rounded-full">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">NU SMS</h3>
                    <p class="text-gray-600 mb-4">Enterprise messaging platform with bulk SMS capabilities, API integration, and real-time delivery tracking.</p>
                    <a href="#nu-sms" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>

            <!-- NU CCS -->
            <div class="card group hover:scale-105 transition-transform duration-200">
                <div class="text-center">
                    <img src="<?= base_url('assets/images/nu-ccs-icon.jpg') ?>" alt="NU CCS Call Control Server" class="w-20 h-20 mx-auto mb-4 rounded-full">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">NU CCS</h3>
                    <p class="text-gray-600 mb-4">Robust telecoms call control server with traffic filtering, advanced billing, and comprehensive monitoring.</p>
                    <a href="#nu-ccs" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>

            <!-- NU DATA -->
            <div class="card group hover:scale-105 transition-transform duration-200">
                <div class="text-center">
                    <img src="<?= base_url('assets/images/nu-data-icon.jpg') ?>" alt="NU DATA Enrichment Services" class="w-20 h-20 mx-auto mb-4 rounded-full">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">NU DATA</h3>
                    <p class="text-gray-600 mb-4">Data enrichment services including validation, cleansing, phone verification, and right party contact solutions.</p>
                    <a href="#nu-data" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Service Sections -->
<section id="nu-sip" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU SIP VoIP Services</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Enterprise-grade VoIP infrastructure designed for telecommunications carriers and service providers requiring high-availability voice services with advanced routing capabilities.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Advanced Proxy Interconnect</h4>
                            <p class="text-gray-600">Seamless integration with multiple carriers and routing protocols.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Enhanced RTP Media Management</h4>
                            <p class="text-gray-600">Optimized media handling for crystal-clear voice quality.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">DID Database Management</h4>
                            <p class="text-gray-600">Comprehensive number management and routing solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/nu-sip-banner.jpg') ?>" alt="NU SIP Infrastructure" class="rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<section id="nu-sms" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="lg:pr-8">
                <img src="<?= base_url('assets/images/nu-sms-banner.jpg') ?>" alt="NU SMS Platform" class="rounded-xl shadow-xl">
            </div>
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU SMS Messaging Platform</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Scalable SMS infrastructure for high-volume messaging operations with comprehensive API integration and real-time monitoring capabilities.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">RESTful API Integration</h4>
                            <p class="text-gray-600">Easy integration with existing systems and applications.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Bulk Messaging Support</h4>
                            <p class="text-gray-600">High-throughput processing for large-scale campaigns.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Delivery Tracking & Reports</h4>
                            <p class="text-gray-600">Real-time delivery status and comprehensive analytics.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="nu-ccs" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU CCS Call Control Server</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Mission-critical call control infrastructure for telecom operators requiring advanced traffic management, security, and comprehensive reporting capabilities.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Traffic Filtering & Security</h4>
                            <p class="text-gray-600">Advanced fraud protection and traffic analysis.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">CLI Protection Solutions</h4>
                            <p class="text-gray-600">Number verification and caller ID management.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Business Intelligence Reporting</h4>
                            <p class="text-gray-600">Advanced analytics and performance monitoring.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/nu-ccs-banner.jpg') ?>" alt="NU CCS Control Center" class="rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<section id="nu-data" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="lg:pr-8">
                <img src="<?= base_url('assets/images/nu-data-banner.jpg') ?>" alt="NU DATA Processing" class="rounded-xl shadow-xl">
            </div>
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU DATA Enrichment Services</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Advanced data processing and enrichment solutions for telecommunications and marketing operations requiring accurate contact verification and data quality assurance.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Real-time Data Validation</h4>
                            <p class="text-gray-600">Instant verification of phone numbers and contact data.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Right Party Contact (RPC)</h4>
                            <p class="text-gray-600">Advanced algorithms for contact accuracy verification.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Compliance & Security</h4>
                            <p class="text-gray-600">GDPR and industry-compliant data processing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Features -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Enterprise-Grade Technology
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Built on proven telecommunications infrastructure with 99.9% uptime guarantee and 24/7 monitoring.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Security First</h3>
                <p class="text-gray-600">End-to-end encryption and comprehensive security protocols.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">High Performance</h3>
                <p class="text-gray-600">Optimized for low latency and high-throughput operations.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">24/7 Support</h3>
                <p class="text-gray-600">Round-the-clock technical support and monitoring.</p>
            </div>
        </div>
    </div>
</section>

<!-- Partner Program CTA -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                Join Our Partner Network
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                Access exclusive resources, dedicated support, and growth opportunities through our comprehensive partner program designed for telecommunications service providers.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= base_url('/partner-program'); ?>" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    Learn More About Partnership
                </a>
                <a href="<?= base_url('/contact'); ?>" class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-200">
                    Contact Sales Team
                </a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
