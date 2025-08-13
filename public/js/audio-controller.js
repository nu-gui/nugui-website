/**
 * NU GUI Website Audio Controller
 * Manages persistent background music across all pages
 * Based on AI Music Brief specifications
 */

class AudioController {
    constructor() {
        // Audio state management
        this.audio = null;
        this.isPlaying = false;
        this.currentVolume = 0.2; // Default 20% volume for ambient playback
        this.fadeInDuration = 2000; // 2 seconds fade in
        this.fadeOutDuration = 1000; // 1 second fade out
        this.isLandingPage = false;
        
        // Volume levels for different contexts
        this.volumeLevels = {
            landing: 0.3,      // 30% on landing page
            ambient: 0.15,     // 15% for general browsing
            muted: 0,          // Muted
            demo: 0.25,        // 25% for product demos
            video: 0.1         // 10% when video content is playing
        };
        
        // Check if we're on landing page
        this.isLandingPage = window.location.pathname === '/' || 
                            window.location.pathname === '/landing';
        
        // Initialize on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.init());
        } else {
            this.init();
        }
    }
    
    init() {
        // Create audio element
        this.createAudioElement();
        
        // Restore user preferences
        this.restorePreferences();
        
        // Setup controls
        this.setupControls();
        
        // Handle page visibility changes
        this.handleVisibilityChange();
        
        // Always try to start playing
        this.startAudioWithRetry();
        
        // Listen for landing page signal
        this.listenForLandingPageSignal();
    }
    
    startAudioWithRetry() {
        // Try to play immediately
        this.play();
        
        // If that fails, try on user interaction
        if (!this.isPlaying) {
            const attemptPlay = () => {
                if (!this.isPlaying) {
                    this.play();
                }
            };
            
            // Try on various user interactions
            document.addEventListener('click', attemptPlay, { once: true });
            document.addEventListener('touchstart', attemptPlay, { once: true });
            document.addEventListener('keydown', attemptPlay, { once: true });
            document.addEventListener('mousemove', attemptPlay, { once: true });
        }
    }
    
    createAudioElement() {
        // Check if audio already exists (from previous page)
        const existingAudio = document.getElementById('nugui-ambient-audio');
        if (existingAudio) {
            this.audio = existingAudio;
            return;
        }
        
        // Create new audio element
        this.audio = document.createElement('audio');
        this.audio.id = 'nugui-ambient-audio';
        this.audio.loop = true;
        this.audio.preload = 'auto';
        
        // Add source elements
        const mp3Source = document.createElement('source');
        mp3Source.src = '/assets/sounds/nugui-ambient-sound.mp3';
        mp3Source.type = 'audio/mpeg';
        
        const wavSource = document.createElement('source');
        wavSource.src = '/assets/sounds/nugui-ambient-sound.wav';
        wavSource.type = 'audio/wav';
        
        this.audio.appendChild(mp3Source);
        this.audio.appendChild(wavSource);
        
        // Add to body (hidden)
        document.body.appendChild(this.audio);
        
        // Set initial volume
        this.audio.volume = 0;
    }
    
    restorePreferences() {
        // Check localStorage for audio preferences
        const audioEnabled = localStorage.getItem('audioEnabled');
        const savedVolume = localStorage.getItem('audioVolume');
        
        // Default to playing (true) unless explicitly disabled
        if (audioEnabled === null) {
            // First visit - default to playing
            this.isPlaying = true;
            localStorage.setItem('audioEnabled', 'true');
        } else {
            this.isPlaying = audioEnabled === 'true';
        }
        
        // Set volume level
        if (savedVolume) {
            this.currentVolume = parseFloat(savedVolume);
        } else {
            // Set default volume based on page context
            this.currentVolume = this.isLandingPage ? 
                this.volumeLevels.landing : 
                this.volumeLevels.ambient;
        }
        
        // Update UI to reflect state
        this.updateAudioIcon();
    }
    
    setupControls() {
        // Get control button
        const audioButton = document.getElementById('audio-control-nav');
        if (!audioButton) return;
        
        // Add click handler
        audioButton.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggle();
        });
        
        // Add keyboard support
        audioButton.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.toggle();
            }
        });
    }
    
    shouldAutoPlay() {
        // Mark as visited
        if (!localStorage.getItem('hasVisited')) {
            localStorage.setItem('hasVisited', 'true');
        }
        
        // Check if user has explicitly set audio preference
        const audioEnabled = localStorage.getItem('audioEnabled');
        
        // If coming from landing page with audio enabled
        if (sessionStorage.getItem('landing_audio_enabled') === 'true') {
            sessionStorage.removeItem('landing_audio_enabled');
            return true;
        }
        
        // Default to true (playing) if no preference set
        if (audioEnabled === null) {
            localStorage.setItem('audioEnabled', 'true');
            return true;
        }
        
        return audioEnabled === 'true';
    }
    
    play() {
        if (!this.audio || this.isPlaying) return;
        
        // Start playing
        const playPromise = this.audio.play();
        
        if (playPromise !== undefined) {
            playPromise
                .then(() => {
                    this.isPlaying = true;
                    this.fadeIn();
                    this.savePreferences();
                    this.updateAudioIcon();
                })
                .catch(error => {
                    console.log('Audio autoplay prevented:', error);
                    // Autoplay was prevented, wait for user interaction
                    this.isPlaying = false;
                    this.updateAudioIcon();
                });
        }
    }
    
    pause() {
        if (!this.audio || !this.isPlaying) return;
        
        this.fadeOut(() => {
            this.audio.pause();
            this.isPlaying = false;
            this.savePreferences();
            this.updateAudioIcon();
        });
    }
    
    toggle() {
        if (this.isPlaying) {
            this.pause();
        } else {
            this.play();
        }
    }
    
    fadeIn() {
        const targetVolume = this.currentVolume;
        const startVolume = 0;
        const volumeStep = (targetVolume - startVolume) / (this.fadeInDuration / 50);
        
        this.audio.volume = startVolume;
        
        const fadeInterval = setInterval(() => {
            if (this.audio.volume < targetVolume - volumeStep) {
                this.audio.volume += volumeStep;
            } else {
                this.audio.volume = targetVolume;
                clearInterval(fadeInterval);
            }
        }, 50);
    }
    
    fadeOut(callback) {
        const startVolume = this.audio.volume;
        const volumeStep = startVolume / (this.fadeOutDuration / 50);
        
        const fadeInterval = setInterval(() => {
            if (this.audio.volume > volumeStep) {
                this.audio.volume -= volumeStep;
            } else {
                this.audio.volume = 0;
                clearInterval(fadeInterval);
                if (callback) callback();
            }
        }, 50);
    }
    
    setVolume(level) {
        this.currentVolume = Math.max(0, Math.min(1, level));
        if (this.audio && this.isPlaying) {
            this.audio.volume = this.currentVolume;
        }
        this.savePreferences();
    }
    
    setContextVolume(context) {
        if (this.volumeLevels[context] !== undefined) {
            this.setVolume(this.volumeLevels[context]);
        }
    }
    
    handleVisibilityChange() {
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                // Reduce volume when tab is not visible
                if (this.isPlaying) {
                    this.setVolume(this.currentVolume * 0.5);
                }
            } else {
                // Restore volume when tab becomes visible
                if (this.isPlaying) {
                    this.setVolume(this.currentVolume * 2);
                }
            }
        });
    }
    
    listenForLandingPageSignal() {
        // Listen for message from landing page
        window.addEventListener('message', (event) => {
            if (event.data && event.data.type === 'landingAudioState') {
                if (event.data.audioEnabled) {
                    this.play();
                    this.setContextVolume('ambient');
                }
            }
        });
    }
    
    updateAudioIcon() {
        const audioButton = document.getElementById('audio-control-nav');
        if (!audioButton) return;
        
        const iconOn = audioButton.querySelector('.audio-icon-on');
        const iconOff = audioButton.querySelector('.audio-icon-off');
        
        if (this.isPlaying) {
            iconOn.style.display = 'block';
            iconOff.style.display = 'none';
            audioButton.setAttribute('aria-label', 'Mute audio');
            audioButton.title = 'Mute background music';
        } else {
            iconOn.style.display = 'none';
            iconOff.style.display = 'block';
            audioButton.setAttribute('aria-label', 'Unmute audio');
            audioButton.title = 'Play background music';
        }
    }
    
    savePreferences() {
        localStorage.setItem('audioEnabled', this.isPlaying.toString());
        localStorage.setItem('audioVolume', this.currentVolume.toString());
    }
    
    // Public API for page-specific controls
    mute() {
        this.setContextVolume('muted');
    }
    
    unmute() {
        this.setContextVolume('ambient');
    }
    
    playForDemo() {
        this.play();
        this.setContextVolume('demo');
    }
    
    reduceForVideo() {
        this.setContextVolume('video');
    }
    
    destroy() {
        if (this.audio) {
            this.pause();
            this.audio.remove();
            this.audio = null;
        }
    }
}

// Initialize audio controller globally
window.NuGuiAudio = new AudioController();

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = AudioController;
}