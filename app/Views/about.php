<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 py-20 lg:py-28">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                About <span class="text-gradient">NU GUI</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-4xl mx-auto">
                Leading telecommunications infrastructure provider established in 2018, specializing in carrier-grade VoIP services and enterprise communication solutions.
            </p>
        </div>
    </div>
</section>

<!-- Company Story -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                <p class="text-lg text-gray-600 mb-6">
                    NU GUI began with a vision to revolutionize telecommunications infrastructure for the modern digital age. Founded in 2018, we recognized the growing need for reliable, scalable, and secure communication solutions in an increasingly connected world.
                </p>
                <p class="text-lg text-gray-600">
                    Today, we serve telecommunications operators, enterprises, and service providers across multiple continents, delivering mission-critical infrastructure that powers millions of communications daily.
                </p>
            </div>
            <div class="lg:pl-8">
                <img src="<?= base_url('assets/images/our-story.jpg') ?>" alt="NU GUI telecommunications infrastructure" class="rounded-xl shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Company Overview -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Telecommunications Excellence</h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto">
                NU GUI was founded with the vision of transforming telecommunications infrastructure through innovative technology solutions. We specialize in carrier-grade services that enable seamless communication across global networks.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Vision -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Our Vision</h3>
                <p class="text-gray-600">To be the leading provider of telecommunications infrastructure solutions that enable seamless global communication and drive digital transformation.</p>
            </div>
            
            <!-- Mission -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Our Mission</h3>
                <p class="text-gray-600">To deliver carrier-grade telecommunications solutions that exceed expectations through innovation, reliability, and exceptional technical support.</p>
            </div>
            
            <!-- Values -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Our Values</h3>
                <p class="text-gray-600">Technical Excellence, Customer Partnership, Security Focus, Continuous Innovation, and Operational Integrity.</p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Leadership Team</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Meet the telecommunications experts and technical leaders driving innovation at NU GUI.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- CEO & Founder -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/wes-profile.jpg') ?>" alt="Wesley - CEO and Founder" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Wesley</h3>
                <p class="text-blue-600 font-medium mb-4">CEO & Founder</p>
                <p class="text-gray-600">
                    Visionary leader with extensive experience in telecommunications infrastructure. Wesley founded NU GUI with the mission to deliver enterprise-grade communication solutions that scale with business growth.
                </p>
            </div>
            
            <!-- CTO -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/suren-profile.jpg') ?>" alt="Suren - Chief Technology Officer" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Suren</h3>
                <p class="text-blue-600 font-medium mb-4">Chief Technology Officer</p>
                <p class="text-gray-600">
                    Technical architect overseeing our telecommunications infrastructure. Suren ensures our platforms maintain carrier-grade reliability while incorporating cutting-edge innovations in VoIP and data processing.
                </p>
            </div>
            
            <!-- Senior Executive Assistant -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/gali-profile.jpg') ?>" alt="Gali - Senior Executive Assistant" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Gali</h3>
                <p class="text-blue-600 font-medium mb-4">Senior Executive Assistant</p>
                <p class="text-gray-600">
                    Operations coordinator ensuring seamless business operations and client relationship management. Gali's attention to detail keeps our telecommunications services running smoothly.
                </p>
            </div>
            
            <!-- Senior Infrastructure Developer -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/ajay-profile.jpg') ?>" alt="Ajay - Senior Infrastructure Developer" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Ajay</h3>
                <p class="text-blue-600 font-medium mb-4">Senior Infrastructure Developer</p>
                <p class="text-gray-600">
                    Backend systems specialist focusing on scalable telecommunications infrastructure. Ajay develops and maintains the core systems that power our VoIP and messaging platforms.
                </p>
            </div>
            
            <!-- Systems Integration Specialist -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/pavan-profile.jpg') ?>" alt="Pavan - Systems Integration Specialist" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Pavan</h3>
                <p class="text-blue-600 font-medium mb-4">Systems Integration Specialist</p>
                <p class="text-gray-600">
                    Integration expert specializing in API development and third-party system connectivity. Pavan ensures seamless integration between our platforms and client infrastructure.
                </p>
            </div>
            
            <!-- Platform Interface Designer -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/ankit-profile.jpg') ?>" alt="Ankit - Platform Interface Designer" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Ankit</h3>
                <p class="text-blue-600 font-medium mb-4">Platform Interface Designer</p>
                <p class="text-gray-600">
                    Interface designer creating intuitive management dashboards for our telecommunications platforms. Ankit focuses on user-centered design for complex technical systems.
                </p>
            </div>
            
            <!-- Technical Project Manager -->
            <div class="card text-center hover:scale-105 transition-transform duration-200">
                <img src="<?= base_url('assets/images/mihir-profile.jpg') ?>" alt="Mihir - Technical Project Manager" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Mihir</h3>
                <p class="text-blue-600 font-medium mb-4">Technical Project Manager</p>
                <p class="text-gray-600">
                    Project coordinator bridging technical development and client delivery. Mihir ensures telecommunications projects are delivered on time with complete technical specifications.
                </p>
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
            Discover how our telecommunications infrastructure solutions can enhance your business operations and drive growth.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= base_url('/solutions'); ?>" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                Explore Our Solutions
            </a>
            <a href="<?= base_url('/contact'); ?>" class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors duration-200">
                Contact Our Team
            </a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
