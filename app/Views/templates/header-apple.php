<!-- Apple-Style Professional Header -->
<header class="globalnav" id="globalnav">
    <div class="globalnav-content">
        <nav class="globalnav-nav" role="navigation" aria-label="Global">
            <!-- Logo/Brand -->
            <div class="globalnav-item globalnav-item-apple">
                <a href="<?= base_url(); ?>" class="globalnav-link globalnav-link-apple" aria-label="NuGui">
                    <span class="globalnav-image-apple">
                        <img src="<?= base_url('assets/images/NUGUI-2.png') ?>?cb=<?= date('YmdHis') ?>" alt="NU GUI Logo - Dark Version" class="globalnav-logo" style="filter: brightness(1) !important;">
                    </span>
                </a>
            </div>

            <!-- Navigation Items -->
            <div class="globalnav-item globalnav-item-home">
                <a href="<?= base_url('/home'); ?>" class="globalnav-link globalnav-link-home" data-analytics-title="home">
                    <span class="globalnav-link-text">Home</span>
                </a>
            </div>

            <div class="globalnav-item globalnav-item-about">
                <a href="<?= base_url('/about'); ?>" class="globalnav-link globalnav-link-about" data-analytics-title="about">
                    <span class="globalnav-link-text">About</span>
                </a>
            </div>

            <div class="globalnav-item globalnav-item-solutions">
                <a href="<?= base_url('/solutions'); ?>" class="globalnav-link globalnav-link-solutions" data-analytics-title="solutions">
                    <span class="globalnav-link-text">Solutions</span>
                </a>
            </div>

            <div class="globalnav-item globalnav-item-partners">
                <a href="<?= base_url('/partner-program'); ?>" class="globalnav-link globalnav-link-partners" data-analytics-title="partners">
                    <span class="globalnav-link-text">Partners</span>
                </a>
            </div>

            <div class="globalnav-item globalnav-item-contact">
                <a href="<?= base_url('/contact'); ?>" class="globalnav-link globalnav-link-contact" data-analytics-title="contact">
                    <span class="globalnav-link-text">Contact</span>
                </a>
            </div>

            <div class="globalnav-item globalnav-item-support">
                <a href="<?= base_url('/support'); ?>" class="globalnav-link globalnav-link-support" data-analytics-title="support">
                    <span class="globalnav-link-text">Support</span>
                </a>
            </div>

            <!-- Theme Switcher -->
            <div class="globalnav-item globalnav-item-theme">
                <button class="globalnav-link globalnav-link-theme" 
                        id="theme-switcher-nav" 
                        aria-label="Toggle theme"
                        title="Switch between light and dark theme">
                    <span class="globalnav-image-theme">
                        <svg class="theme-icon-light" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <svg class="theme-icon-dark" width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Audio Controls -->
            <div class="globalnav-item globalnav-item-audio">
                <button class="globalnav-link globalnav-link-audio" 
                        id="audio-control-nav" 
                        aria-label="Toggle audio"
                        title="Toggle background music">
                    <span class="globalnav-image-audio">
                        <svg class="audio-icon-on" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                        </svg>
                        <svg class="audio-icon-off" width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Search/CTA -->
            <div class="globalnav-item globalnav-item-cta">
                <a href="https://wa.me/message/TGGYMYT6YAI5O1" 
                   target="_blank"
                   rel="noopener noreferrer"
                   class="globalnav-link globalnav-link-cta" 
                   data-analytics-title="get started"
                   aria-label="Get Started">
                    <span class="globalnav-image-cta">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="globalnav-item globalnav-item-menu">
                <button class="globalnav-link globalnav-link-menu" 
                        id="globalnav-menubutton" 
                        aria-label="Menu" 
                        data-analytics-title="menu">
                    <span class="globalnav-image-menu">
                        <svg width="18" height="18" viewBox="0 0 18 18">
                            <polyline id="globalnav-menutrigger-bread-top" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2,12 16,12"></polyline>
                            <polyline id="globalnav-menutrigger-bread-bottom" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2,6 16,6"></polyline>
                        </svg>
                    </span>
                </button>
            </div>
        </nav>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="globalnav-menu" id="globalnav-menu">
        <div class="globalnav-menu-content">
            <ul class="globalnav-menu-list">
                <li class="globalnav-menu-item">
                    <a href="<?= base_url('/home'); ?>" class="globalnav-menu-link">Home</a>
                </li>
                <li class="globalnav-menu-item">
                    <a href="<?= base_url('/about'); ?>" class="globalnav-menu-link">About</a>
                </li>
                <li class="globalnav-menu-item">
                    <a href="<?= base_url('/solutions'); ?>" class="globalnav-menu-link">Solutions</a>
                </li>
                <li class="globalnav-menu-item">
                    <a href="<?= base_url('/partner-program'); ?>" class="globalnav-menu-link">Partners</a>
                </li>
                <li class="globalnav-menu-item">
                    <a href="<?= base_url('/contact'); ?>" class="globalnav-menu-link">Contact</a>
                </li>
                <li class="globalnav-menu-item">
                    <a href="<?= base_url('/support'); ?>" class="globalnav-menu-link">Support</a>
                </li>
                <li class="globalnav-menu-item globalnav-menu-item-cta">
                    <a href="https://wa.me/message/TGGYMYT6YAI5O1" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="globalnav-menu-link globalnav-menu-link-cta">Get Started</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Add some spacing for fixed header -->
<style>
    /* Mobile menu overlay styles */
    @media (max-width: 768px) {
        .nav__menu.active {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .nav__menu.active::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            z-index: -1;
        }
    }
</style>
