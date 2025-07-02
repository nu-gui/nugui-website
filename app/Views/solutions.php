<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
Solutions
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 py-20 lg:py-28">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Telecommunications <span class="text-gradient">Solutions</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-4xl mx-auto">
                Comprehensive carrier-grade solutions designed to meet the unique needs of telecommunications operators and enterprises worldwide.
            </p>
        </div>
    </div>
</section>

<!-- NU SIP Solution -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="lg:pr-8">
                <img src="<?= base_url('assets/images/nu-sip.jpg') ?>" alt="NU SIP VoIP Services" class="w-full max-w-md mx-auto lg:mx-0 rounded-xl shadow-xl">
            </div>
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU SIP VoIP Services</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU SIP offers advanced VoIP services that streamline business communications. Our VoIP solutions provide crystal-clear voice quality, reliable connectivity, and comprehensive features that enhance productivity and collaboration.
                </p>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Key Features:</h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Advanced Proxy Interconnect</h4>
                            <p class="text-gray-600 text-sm">Efficient routing and stringent security measures tailored for carriers.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Enhanced RTP Media Interconnect</h4>
                            <p class="text-gray-600 text-sm">Facilitates efficient domestic call termination and media management.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Advanced DID Database Management</h4>
                            <p class="text-gray-600 text-sm">Provides robust control over DID/ANI numbers.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Smart CLI Number Management</h4>
                            <p class="text-gray-600 text-sm">Enhances control over call routing and caller identification.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Advanced Reporting & Analytics</h4>
                            <p class="text-gray-600 text-sm">In-depth insights and comprehensive call analytics.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Security & Validation</h4>
                            <p class="text-gray-600 text-sm">Comprehensive whitelist/blacklist validation and intelligent ANI auto-blocking.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NU CCS Solution -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU CCS Call Control Server</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU CCS is a sophisticated call control server that brings advanced VoIP call management capabilities to carriers and telecom providers. Designed for efficient DID and CLI management, NU CCS enhances call routing precision and operational efficiency.
                </p>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Key Features:</h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Advanced Proxy Interconnect</h4>
                            <p class="text-gray-600 text-sm">Ensures consistency and control over voice traffic routing.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Enhanced Traffic Filtering</h4>
                            <p class="text-gray-600 text-sm">Optimizes network performance and operational efficiency.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Fixed IP Security</h4>
                            <p class="text-gray-600 text-sm">Enhanced security through fixed signalling and media IP management.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Local Media Server</h4>
                            <p class="text-gray-600 text-sm">Ensures superior call quality and optimized performance.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Comprehensive Reporting</h4>
                            <p class="text-gray-600 text-sm">Detailed insights into call activities and network performance.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-purple-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Webhook API Integration</h4>
                            <p class="text-gray-600 text-sm">Enhanced caller ID name display and real-time data retrieval.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/nu-ccs.jpg') ?>" alt="NU CCS Call Control Server" class="w-full max-w-md mx-auto lg:mx-0 rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- NU SMS Solution -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="lg:pr-8">
                <img src="<?= base_url('assets/images/nu-sms.jpg') ?>" alt="NU SMS Direct Messaging Services" class="w-full max-w-md mx-auto lg:mx-0 rounded-xl shadow-xl">
            </div>
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU SMS Direct Messaging</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU SMS provides comprehensive direct messaging services that enable businesses to communicate effectively with their customers. Our platform supports bulk SMS, automated messaging, and real-time delivery tracking.
                </p>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Key Features:</h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">RESTful API Integration</h4>
                            <p class="text-gray-600 text-sm">Easy integration with existing systems and applications.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Bulk SMS & Automation</h4>
                            <p class="text-gray-600 text-sm">Streamlines communication processes with high-volume capabilities.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Real-Time Delivery Tracking</h4>
                            <p class="text-gray-600 text-sm">Ensures messages are delivered promptly with detailed status updates.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-green-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Comprehensive Analytics</h4>
                            <p class="text-gray-600 text-sm">Detailed insights into messaging performance and customer engagement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NU DATA Solution -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">NU DATA Enrichment Services</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU DATA offers state-of-the-art data enrichment services that help businesses enhance their data quality and gain valuable insights. Our services ensure your business decisions are based on accurate and comprehensive information.
                </p>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Key Features:</h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Data Cleansing</h4>
                            <p class="text-gray-600 text-sm">Removes inaccuracies and inconsistencies from your data sets.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Data Validation</h4>
                            <p class="text-gray-600 text-sm">Ensures data accuracy and reliability through comprehensive verification.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Data Augmentation</h4>
                            <p class="text-gray-600 text-sm">Enhances existing data with additional insights and contextual information.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Real-Time Processing</h4>
                            <p class="text-gray-600 text-sm">Provides up-to-date information for better decision-making.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Security & Compliance</h4>
                            <p class="text-gray-600 text-sm">Ensures data security and compliance with industry standards and GDPR.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/nu-data.jpg') ?>" alt="NU DATA Enrichment Services" class="w-full max-w-md mx-auto lg:mx-0 rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Ready to Transform Your Communications?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Discover how our telecommunications solutions can enhance your business operations and drive growth through reliable, scalable infrastructure.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= base_url('/contact'); ?>" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                Get Started Today
            </a>
            <a href="<?= base_url('/partner-program'); ?>" class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-200">
                Explore Partnership
            </a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
