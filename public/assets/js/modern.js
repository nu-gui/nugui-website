/**
 * Modern JavaScript for NU GUI Website
 * Includes animations, interactions, and enhanced user experience
 */

class NuGuiWebsite {
    constructor() {
        this.init();
    }

    init() {
        this.setupScrollAnimations();
        this.setupMobileMenu();
        this.setupSmoothScrolling();
        this.setupFormEnhancements();
        this.setupLoadingStates();
        this.setupIntersectionObserver();
        this.setupProductNavigationScrolling();
        this.setupParallaxEffects();
        this.setupButtonAnimations();
    }

    // Scroll animations for elements coming into view
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements for animation
        const animateElements = document.querySelectorAll('.grid > div, .space-y-3 > div, .max-w-7xl > div');
        animateElements.forEach(el => {
            el.classList.add('animate-on-scroll');
            observer.observe(el);
        });
    }

    // Mobile menu functionality
    setupMobileMenu() {
        const mobileMenuButton = document.querySelector('[data-mobile-menu-toggle]');
        const mobileMenu = document.querySelector('[data-mobile-menu]');
        const menuOverlay = document.querySelector('[data-menu-overlay]');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.contains('translate-x-0');
                
                if (isOpen) {
                    this.closeMobileMenu();
                } else {
                    this.openMobileMenu();
                }
            });

            // Close menu when clicking overlay
            if (menuOverlay) {
                menuOverlay.addEventListener('click', () => {
                    this.closeMobileMenu();
                });
            }

            // Close menu on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileMenu.classList.contains('translate-x-0')) {
                    this.closeMobileMenu();
                }
            });
        }
    }

    openMobileMenu() {
        const mobileMenu = document.querySelector('[data-mobile-menu]');
        const menuOverlay = document.querySelector('[data-menu-overlay]');
        
        if (mobileMenu) {
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenu.classList.add('translate-x-0');
        }
        
        if (menuOverlay) {
            menuOverlay.classList.remove('hidden');
            menuOverlay.classList.add('block');
        }
        
        document.body.style.overflow = 'hidden';
    }

    closeMobileMenu() {
        const mobileMenu = document.querySelector('[data-mobile-menu]');
        const menuOverlay = document.querySelector('[data-menu-overlay]');
        
        if (mobileMenu) {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('-translate-x-full');
        }
        
        if (menuOverlay) {
            menuOverlay.classList.remove('block');
            menuOverlay.classList.add('hidden');
        }
        
        document.body.style.overflow = '';
    }

    // Smooth scrolling for anchor links
    setupSmoothScrolling() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    const headerHeight = 80; // Account for fixed header
                    const targetPosition = targetElement.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Enhanced form functionality
    setupFormEnhancements() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            // Add floating label effect
            this.setupFloatingLabels(form);
            
            // Add form validation feedback
            this.setupFormValidation(form);
            
            // Add loading state on submission
            this.setupFormSubmissionStates(form);
        });
    }

    setupFloatingLabels(form) {
        const inputs = form.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            // Add focus/blur handlers for floating label effect
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', () => {
                if (!input.value) {
                    input.parentElement.classList.remove('focused');
                }
            });
            
            // Check if input has value on load
            if (input.value) {
                input.parentElement.classList.add('focused');
            }
        });
    }

    setupFormValidation(form) {
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        
        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                this.validateField(input);
            });
            
            input.addEventListener('input', () => {
                if (input.classList.contains('error')) {
                    this.validateField(input);
                }
            });
        });
    }

    validateField(field) {
        const isValid = field.checkValidity();
        
        field.classList.remove('error', 'success');
        
        if (field.value) {
            field.classList.add(isValid ? 'success' : 'error');
        }
        
        return isValid;
    }

    setupFormSubmissionStates(form) {
        form.addEventListener('submit', (e) => {
            const submitButton = form.querySelector('button[type="submit"]');
            
            if (submitButton) {
                // Add loading state
                submitButton.disabled = true;
                submitButton.classList.add('loading');
                
                const originalText = submitButton.textContent;
                submitButton.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending...
                `;
                
                // Reset after 5 seconds if no redirect occurs
                setTimeout(() => {
                    submitButton.disabled = false;
                    submitButton.classList.remove('loading');
                    submitButton.textContent = originalText;
                }, 5000);
            }
        });
    }

    // Loading states for page transitions
    setupLoadingStates() {
        // Add loading indicator for internal links
        const internalLinks = document.querySelectorAll('a[href^="/"], a[href^="./"], a[href^="../"]');
        
        internalLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                // Skip if opening in new tab or has special attributes
                if (e.ctrlKey || e.metaKey || link.target === '_blank') return;
                
                this.showPageLoader();
            });
        });
    }

    showPageLoader() {
        // Create and show a subtle loading indicator
        const loader = document.createElement('div');
        loader.className = 'fixed top-0 left-0 w-full h-1 bg-blue-600 z-50 animate-pulse';
        loader.style.background = 'linear-gradient(90deg, transparent, #3b82f6, transparent)';
        document.body.appendChild(loader);
        
        // Remove loader after page load or timeout
        setTimeout(() => {
            if (document.body.contains(loader)) {
                loader.remove();
            }
        }, 3000);
    }

    // Intersection Observer for animations
    setupIntersectionObserver() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const fadeInObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Apply to sections and cards
        const fadeElements = document.querySelectorAll('section, .bg-white.shadow-xl, .grid > div');
        fadeElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            fadeInObserver.observe(el);
        });
    }

    // Product navigation smooth scrolling (for products page)
    setupProductNavigationScrolling() {
        const productNavLinks = document.querySelectorAll('a[href^="#nu-"]');
        
        productNavLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const headerHeight = 100;
                    const targetPosition = targetElement.offsetTop - headerHeight;
                    
                    // Add active state to clicked navigation item
                    productNavLinks.forEach(navLink => {
                        navLink.parentElement.classList.remove('bg-white/20');
                    });
                    link.parentElement.classList.add('bg-white/20');
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Subtle parallax effects
    setupParallaxEffects() {
        const parallaxElements = document.querySelectorAll('.bg-gradient-to-br');
        
        if (parallaxElements.length > 0) {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                parallaxElements.forEach(element => {
                    element.style.transform = `translateY(${rate}px)`;
                });
            });
        }
    }

    // Button hover animations
    setupButtonAnimations() {
        const buttons = document.querySelectorAll('.btn-primary, button[type="submit"], .inline-flex.items-center');
        
        buttons.forEach(button => {
            button.addEventListener('mouseenter', () => {
                button.style.transform = 'translateY(-2px)';
                button.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
            });
            
            button.addEventListener('mouseleave', () => {
                button.style.transform = 'translateY(0)';
                button.style.boxShadow = '';
            });
        });
    }
}

// Utility functions
const utils = {
    // Debounce function for performance
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Throttle function for scroll events
    throttle(func, delay) {
        let timeoutId;
        let lastExecTime = 0;
        return function (...args) {
            const currentTime = Date.now();
            
            if (currentTime - lastExecTime > delay) {
                func.apply(this, args);
                lastExecTime = currentTime;
            } else {
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    func.apply(this, args);
                    lastExecTime = Date.now();
                }, delay - (currentTime - lastExecTime));
            }
        };
    },

    // Animate number counting
    animateNumber(element, start, end, duration) {
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            element.textContent = Math.floor(current);
            
            if (current >= end) {
                element.textContent = end;
                clearInterval(timer);
            }
        }, 16);
    }
};

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new NuGuiWebsite();
});

// Add CSS animations via JavaScript
const styles = `
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    
    .focused label {
        transform: translateY(-20px) scale(0.9);
        color: #3b82f6;
    }
    
    input.error, textarea.error {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }
    
    input.success, textarea.success {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }
    
    .loading {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    @media (prefers-reduced-motion: reduce) {
        .animate-fade-in-up,
        .animate-on-scroll,
        * {
            animation: none !important;
            transition: none !important;
        }
    }
`;

// Inject styles
const styleSheet = document.createElement('style');
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);