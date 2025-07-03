<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NU GUI - Welcome</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/NUGUI-ICON-7 - Dark.png') ?>">
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
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            background-image: url('<?= base_url('assets/images/background-image.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 1s ease-out;
        }

        .landing-container.fade-out {
            opacity: 0;
            pointer-events: none;
            transition: opacity 2s ease-out;
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
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            animation: infiniteRotation 1.5s linear infinite;
            filter: drop-shadow(0 10px 30px rgba(0, 162, 232, 0.4));
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
    <div class="landing-container" id="landingContainer">
        <div class="logo-animation-container">
            <img src="<?= base_url('assets/images/NUGUI-ICON-7 - Dark.png') ?>" alt="NU GUI Icon" class="logo-icon" id="logoIcon">
        </div>

        <button class="audio-toggle" id="audioToggle" title="Toggle Sound">
            🔊
        </button>

        <button class="skip-intro" id="skipIntro">
            Skip Intro
        </button>

        <!-- Audio elements -->
        <audio id="logoSpinSound" preload="auto">
            <source src="<?= base_url('assets/sounds/logo-spin.mp3') ?>" type="audio/mpeg">
            <source src="<?= base_url('assets/sounds/logo-spin.wav') ?>" type="audio/wav">
        </audio>
        
        <audio id="logoTransformSound" preload="auto">
            <source src="<?= base_url('assets/sounds/logo-transform.mp3') ?>" type="audio/mpeg">
            <source src="<?= base_url('assets/sounds/logo-transform.wav') ?>" type="audio/wav">
        </audio>
    </div>

    <script>
        class LandingPageController {
            constructor() {
                this.audioEnabled = true;
                this.landingContainer = document.getElementById('landingContainer');
                this.audioToggle = document.getElementById('audioToggle');
                this.skipButton = document.getElementById('skipIntro');
                this.logoSpinSound = document.getElementById('logoSpinSound');
                this.logoTransformSound = document.getElementById('logoTransformSound');
                
                this.init();
            }

            init() {
                // Set initial audio volume
                this.logoSpinSound.volume = 0.3;
                this.logoTransformSound.volume = 0.3;

                // Event listeners
                this.audioToggle.addEventListener('click', () => this.toggleAudio());
                this.skipButton.addEventListener('click', () => this.skipIntro());

                // Start animation sequence
                this.startAnimationSequence();

                // Auto-redirect after animation completes (6 seconds for animation + 2 second pause)
                setTimeout(() => this.redirectToHome(), 8000);
            }

            startAnimationSequence() {
                // Play logo spin sound at start
                setTimeout(() => {
                    if (this.audioEnabled) {
                        this.logoSpinSound.play().catch(e => console.log('Audio play failed:', e));
                    }
                }, 100);

                // Play transform sound when logo reaches peak
                setTimeout(() => {
                    if (this.audioEnabled) {
                        this.logoTransformSound.play().catch(e => console.log('Audio play failed:', e));
                    }
                }, 3000); // When logo is at maximum size before fading
            }

            toggleAudio() {
                this.audioEnabled = !this.audioEnabled;
                this.audioToggle.textContent = this.audioEnabled ? '🔊' : '🔇';
                this.audioToggle.title = this.audioEnabled ? 'Disable Sound' : 'Enable Sound';
            }

            skipIntro() {
                this.redirectToHome();
            }

            redirectToHome() {
                // Add fade out class
                this.landingContainer.classList.add('fade-out');
                
                // Store session flag to prevent showing again
                sessionStorage.setItem('landing_shown', 'true');
                
                // Redirect after fade completes (longer fade for smoother transition)
                setTimeout(() => {
                    window.location.href = '<?= base_url('/home') ?>';
                }, 2000);
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            // Clear session storage for testing (remove this line once working)
            sessionStorage.removeItem('landing_shown');
            
            // Check if landing page was already shown in this session
            if (sessionStorage.getItem('landing_shown')) {
                console.log('Landing already shown, redirecting...');
                window.location.href = '<?= base_url('/home') ?>';
                return;
            }

            console.log('Starting landing page animation...');
            new LandingPageController();
        });

        // Prevent context menu and text selection for better UX
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());
    </script>
</body>
</html>