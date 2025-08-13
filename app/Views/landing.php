<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NU GUI - Welcome</title>
    <!-- Use only light icon for landing page -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/NUGUI-icon-1.png') ?>">
    
    <!-- Load CSS variables first -->
    <link rel="stylesheet" href="<?= base_url('css/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            overflow: hidden;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .landing-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: 
                radial-gradient(ellipse at center, rgba(0, 162, 232, 0.2) 0%, rgba(0, 0, 0, 0.8) 100%),
                linear-gradient(135deg, rgba(26, 26, 26, 0.85) 0%, rgba(45, 45, 45, 0.6) 50%, rgba(26, 26, 26, 0.85) 100%),
                url('<?= base_url('assets/images/background-image.jpg') ?>');
            background-size: cover, cover, cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 1s ease-out;
            /* Add subtle animation to the background */
            animation: subtleZoom 20s ease-in-out infinite alternate;
        }
        
        @keyframes subtleZoom {
            0% {
                background-size: cover, cover, 100% auto;
            }
            100% {
                background-size: cover, cover, 110% auto;
            }
        }

        .landing-container.fade-out {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.8s ease-out;
            z-index: 8999; /* Lower than normal to allow home page to show through */
        }

        /* Preloaded home page container */
        .home-page-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 8998; /* Behind landing page initially */
            opacity: 0;
            transition: opacity 0.8s ease-in;
            overflow: hidden;
        }

        .home-page-container.visible {
            opacity: 1;
        }

        .home-page-iframe {
            width: 100%;
            height: 100%;
            border: none;
            background: white;
        }

        .logo-animation-container {
            position: fixed;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            z-index: 1000;
            animation: logoGrowMoveAndFade 6s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            /* Add glow effect for better visibility on wallpaper */
            filter: drop-shadow(0 0 20px rgba(0, 162, 232, 0.8));
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            animation: infiniteRotation 1.5s linear infinite;
            filter: 
                drop-shadow(0 10px 30px rgba(0, 162, 232, 0.6))
                drop-shadow(0 0 10px rgba(255, 255, 255, 0.5))
                brightness(1.1);
        }

        /* Theme switcher button - appears after timer */
        .theme-switcher {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            padding: 20px 40px;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(20px);
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: none;
        }

        .theme-switcher.show {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
            animation: glowingPulse 2s ease-in-out infinite;
        }

        .theme-switcher.hide {
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
        }

        @keyframes glowingPulse {
            0%, 100% {
                box-shadow: 
                    0 0 20px rgba(0, 162, 232, 0.8),
                    0 0 40px rgba(0, 162, 232, 0.6),
                    0 0 60px rgba(0, 162, 232, 0.4),
                    inset 0 0 20px rgba(0, 162, 232, 0.2);
            }
            50% {
                box-shadow: 
                    0 0 30px rgba(0, 162, 232, 1),
                    0 0 60px rgba(0, 162, 232, 0.8),
                    0 0 80px rgba(0, 162, 232, 0.6),
                    inset 0 0 30px rgba(0, 162, 232, 0.3);
            }
        }

        .theme-icon {
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .theme-switcher:hover .theme-icon {
            transform: rotate(180deg);
        }

        /* Animations */
        @keyframes logoGrowMoveAndFade {
            0% {
                opacity: 1;
                transform: translateX(-50%) translateY(0px) scale(1);
            }
            10% {
                opacity: 1;
                transform: translateX(-50%) translateY(-80px) scale(3.4);
            }
            20% {
                opacity: 1;
                transform: translateX(-50%) translateY(-160px) scale(5.8);
            }
            30% {
                opacity: 0.95;
                transform: translateX(-50%) translateY(-240px) scale(8.2);
            }
            40% {
                opacity: 0.8;
                transform: translateX(-50%) translateY(-320px) scale(10.6);
            }
            50% {
                opacity: 0.6;
                transform: translateX(-50%) translateY(-400px) scale(13);
            }
            55% {
                opacity: 0.5;
                transform: translateX(-50%) translateY(-440px) scale(14.2);
            }
            60% {
                opacity: 0.4;
                transform: translateX(-50%) translateY(-480px) scale(15.4);
            }
            65% {
                opacity: 0.25;
                transform: translateX(-50%) translateY(-520px) scale(16.6);
            }
            70% {
                opacity: 0.1;
                transform: translateX(-50%) translateY(-560px) scale(17.8);
            }
            75% {
                opacity: 0.02;
                transform: translateX(-50%) translateY(-600px) scale(19);
            }
            80% {
                opacity: 0;
                transform: translateX(-50%) translateY(-640px) scale(20.2);
            }
            85% {
                opacity: 0;
                transform: translateX(-50%) translateY(-680px) scale(21.4);
            }
            90% {
                opacity: 0;
                transform: translateX(-50%) translateY(-720px) scale(22.6);
            }
            95% {
                opacity: 0;
                transform: translateX(-50%) translateY(-760px) scale(23.8);
            }
            100% {
                opacity: 0;
                transform: translateX(-50%) translateY(-800px) scale(25);
            }
        }

        @keyframes infiniteRotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .logo-animation-container {
                animation: logoGrowMoveAndFadeMobile 6s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            }
            
            .logo-icon {
                width: 50px;
                height: 50px;
                animation: infiniteRotation 1s linear infinite;
            }

            .theme-switcher {
                padding: 15px 30px;
                font-size: 1rem;
            }
            
            @keyframes logoGrowMoveAndFadeMobile {
                0% {
                    opacity: 1;
                    transform: translateX(-50%) translateY(0px) scale(0.5);
                }
                10% {
                    opacity: 1;
                    transform: translateX(-50%) translateY(-60px) scale(1.5);
                }
                20% {
                    opacity: 1;
                    transform: translateX(-50%) translateY(-120px) scale(2.5);
                }
                35% {
                    opacity: 1;
                    transform: translateX(-50%) translateY(-200px) scale(4);
                }
                50% {
                    opacity: 1;
                    transform: translateX(-50%) translateY(-280px) scale(6);
                }
                65% {
                    opacity: 1;
                    transform: translateX(-50%) translateY(-360px) scale(8);
                }
                75% {
                    opacity: 0.8;
                    transform: translateX(-50%) translateY(-420px) scale(10);
                }
                85% {
                    opacity: 0.4;
                    transform: translateX(-50%) translateY(-480px) scale(12);
                }
                95% {
                    opacity: 0.1;
                    transform: translateX(-50%) translateY(-540px) scale(14);
                }
                100% {
                    opacity: 0;
                    transform: translateX(-50%) translateY(-560px) scale(15);
                }
            }
        }

        /* Audio button */
        .audio-toggle {
            position: absolute;
            top: 30px;
            right: 30px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .audio-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .skip-intro {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .skip-intro:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #00A2E8;
            color: #00A2E8;
        }
    </style>
</head>
<body>
    <!-- Preloaded home page container (behind landing page) -->
    <div class="home-page-container" id="homePageContainer">
        <iframe class="home-page-iframe" id="homePageIframe" src="<?= base_url('/home') ?>" title="Home Page"></iframe>
    </div>

    <!-- Landing page overlay -->
    <div class="landing-container" id="landingContainer">
        <div class="logo-animation-container">
            <!-- Use only the light icon for both themes on landing page -->
            <img src="<?= base_url('assets/images/NUGUI-icon-1.png') ?>" alt="NU GUI Icon" class="logo-icon">
        </div>

        <!-- Theme switcher button (hidden initially) -->
        <button class="theme-switcher" id="themeSwitcher">
            <span class="theme-icon" id="themeIcon">🌓</span>
            <span>Choose Your Theme</span>
        </button>

        <button class="audio-toggle" id="audioToggle" title="Toggle Sound">
            🔊
        </button>

        <button class="skip-intro" id="skipIntro">
            Skip Intro
        </button>

        <!-- Audio element for relaxed electric tone -->
        <audio id="electricTone" preload="auto" loop>
            <source src="<?= base_url('assets/sounds/electric-relaxed-tone.mp3') ?>" type="audio/mpeg">
            <source src="<?= base_url('assets/sounds/electric-relaxed-tone.wav') ?>" type="audio/wav">
        </audio>
    </div>

    <script>
        class LandingPageController {
            constructor() {
                this.audioEnabled = true;
                this.landingContainer = document.getElementById('landingContainer');
                this.homePageContainer = document.getElementById('homePageContainer');
                this.homePageIframe = document.getElementById('homePageIframe');
                this.audioToggle = document.getElementById('audioToggle');
                this.skipButton = document.getElementById('skipIntro');
                this.themeSwitcher = document.getElementById('themeSwitcher');
                this.themeIcon = document.getElementById('themeIcon');
                this.electricTone = document.getElementById('electricTone');
                this.homePageLoaded = false;
                this.themeSelected = false;
                this.themeSwitcherTimeout = null;
                this.autoTransitionTimeout = null;
                
                this.init();
            }

            init() {
                // Set initial audio volume
                this.electricTone.volume = 0.2; // Relaxed volume

                // Setup home page preloading
                this.setupHomePagePreloading();

                // Event listeners
                this.audioToggle.addEventListener('click', () => this.toggleAudio());
                this.skipButton.addEventListener('click', () => this.skipIntro());
                this.themeSwitcher.addEventListener('click', () => this.selectTheme());

                // Listen for animation completion
                this.setupAnimationListener();

                // Start animation sequence
                this.startAnimationSequence();

                // Show theme switcher after 5.5 seconds (near end of animation)
                setTimeout(() => this.showThemeSwitcher(), 5500);

                // Fallback redirect in case animation event doesn't fire
                this.autoTransitionTimeout = setTimeout(() => this.transitionToHomePage(), 9000);
            }

            setupHomePagePreloading() {
                // Monitor iframe loading
                this.homePageIframe.addEventListener('load', () => {
                    // Home page preloaded successfully
                    this.homePageLoaded = true;
                    
                    // Inject theme preference into iframe if selected
                    if (this.themeSelected) {
                        this.applyThemeToIframe();
                    }
                });

                // Handle iframe loading errors
                this.homePageIframe.addEventListener('error', () => {
                    console.warn('Home page preloading failed, will use traditional redirect');
                    this.homePageLoaded = false;
                });
            }

            setupAnimationListener() {
                const logoContainer = document.querySelector('.logo-animation-container');
                
                // Listen for animation end event
                logoContainer.addEventListener('animationend', (event) => {
                    if (event.animationName === 'logoGrowMoveAndFade' || event.animationName === 'logoGrowMoveAndFadeMobile') {
                        // Don't transition yet - wait for theme selection
                    }
                });
            }

            startAnimationSequence() {
                // Play relaxed electric tone
                if (this.audioEnabled) {
                    this.electricTone.play().catch(() => {/* Audio play failed */});
                }
            }

            toggleAudio() {
                this.audioEnabled = !this.audioEnabled;
                this.audioToggle.textContent = this.audioEnabled ? '🔊' : '🔇';
                this.audioToggle.title = this.audioEnabled ? 'Disable Sound' : 'Enable Sound';
                
                if (this.audioEnabled) {
                    this.electricTone.play().catch(() => {/* Audio play failed */});
                } else {
                    this.electricTone.pause();
                }
            }

            showThemeSwitcher() {
                this.themeSwitcher.classList.add('show');
                
                // Auto-hide and select default theme after 3 seconds
                this.themeSwitcherTimeout = setTimeout(() => {
                    if (!this.themeSelected) {
                        this.selectDefaultTheme();
                    }
                }, 3000);
            }

            selectTheme() {
                // Toggle between light and dark theme
                const currentTheme = localStorage.getItem('theme') || 'light';
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                // Store theme preference
                localStorage.setItem('theme', newTheme);
                this.themeSelected = true;
                
                // Update icon
                this.themeIcon.textContent = newTheme === 'dark' ? '🌙' : '☀️';
                
                // Hide theme switcher
                this.themeSwitcher.classList.remove('show');
                this.themeSwitcher.classList.add('hide');
                
                // Clear timeouts
                if (this.themeSwitcherTimeout) {
                    clearTimeout(this.themeSwitcherTimeout);
                }
                
                // Apply theme to iframe if loaded
                if (this.homePageLoaded) {
                    this.applyThemeToIframe();
                }
                
                // Transition to home page after short delay
                setTimeout(() => this.transitionToHomePage(), 500);
            }

            selectDefaultTheme() {
                // Use system preference or default to light
                const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                const defaultTheme = prefersDark ? 'dark' : 'light';
                
                localStorage.setItem('theme', defaultTheme);
                this.themeSelected = true;
                
                // Hide theme switcher
                this.themeSwitcher.classList.remove('show');
                this.themeSwitcher.classList.add('hide');
                
                // Apply theme to iframe if loaded
                if (this.homePageLoaded) {
                    this.applyThemeToIframe();
                }
                
                // Transition to home page
                setTimeout(() => this.transitionToHomePage(), 500);
            }

            applyThemeToIframe() {
                try {
                    const theme = localStorage.getItem('theme') || 'light';
                    const iframeDoc = this.homePageIframe.contentDocument || this.homePageIframe.contentWindow.document;
                    
                    if (iframeDoc && iframeDoc.documentElement) {
                        iframeDoc.documentElement.setAttribute('data-theme', theme);
                    }
                } catch (e) {
                    // Cross-origin restriction, theme will be applied when page loads
                }
            }

            skipIntro() {
                // Clear all timeouts
                if (this.themeSwitcherTimeout) {
                    clearTimeout(this.themeSwitcherTimeout);
                }
                if (this.autoTransitionTimeout) {
                    clearTimeout(this.autoTransitionTimeout);
                }
                
                // If theme switcher is showing, select default theme
                if (this.themeSwitcher.classList.contains('show')) {
                    this.selectDefaultTheme();
                } else {
                    this.transitionToHomePage();
                }
            }

            transitionToHomePage() {
                // Stop audio
                this.electricTone.pause();
                
                // Store audio state for next page
                if (this.audioEnabled) {
                    sessionStorage.setItem('landing_audio_enabled', 'true');
                }
                
                // Store session flag to prevent showing again
                sessionStorage.setItem('landing_shown', 'true');

                if (this.homePageLoaded) {
                    // Seamless transition: fade out landing page while revealing home page
                    this.homePageContainer.classList.add('visible');
                    this.landingContainer.classList.add('fade-out');
                    
                    // After landing page fades out, navigate to actual home page
                    setTimeout(() => {
                        window.location.replace('<?= base_url('/home') ?>');
                    }, 800);
                } else {
                    // Fallback: traditional redirect if preload failed
                    this.landingContainer.classList.add('fade-out');
                    setTimeout(() => {
                        window.location.href = '<?= base_url('/home') ?>');
                    }, 800);
                }
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM loaded - Initializing landing page');
            
            // Check if landing page was already shown in this session
            // Always show for testing
            sessionStorage.removeItem('landing_shown');
            
            /*
            if (sessionStorage.getItem('landing_shown')) {
                console.log('Landing already shown in this session, redirecting to home');
                window.location.href = '<?= base_url('/home') ?>';
                return;
            }
            */

            console.log('Starting landing page animation');
            try {
                window.landingController = new LandingPageController();
                console.log('LandingPageController initialized successfully');
            } catch (error) {
                console.error('Error initializing LandingPageController:', error);
                alert('Error: ' + error.message);
            }
        });

        // Prevent context menu and text selection for better UX
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());
    </script>
</body>
</html>