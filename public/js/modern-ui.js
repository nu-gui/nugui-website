/**
 * Modern UI JavaScript Enhancements
 * Handles animations, interactions, and responsive behaviors
 */

document.addEventListener('DOMContentLoaded', function() {
    // ===== Intersection Observer for Scroll Animations =====
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const fadeInObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                fadeInObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with fade-in class
    document.querySelectorAll('.fade-in').forEach(el => {
        fadeInObserver.observe(el);
    });

    // ===== Enhanced Mobile Navigation =====
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const hamburger = document.querySelector('.hamburger');

    if (mobileMenuButton && mobileMenu) {
        // Create overlay if it doesn't exist
        if (!mobileMenuOverlay) {
            const overlay = document.createElement('div');
            overlay.className = 'mobile-menu-overlay';
            document.body.appendChild(overlay);
        }

        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        
        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        }

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            }
        });

        // Close menu when clicking on a link
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });
    }

    function toggleMobileMenu() {
        const menu = document.querySelector('.mobile-menu');
        const overlay = document.querySelector('.mobile-menu-overlay');
        const hamb = document.querySelector('.hamburger');
        const body = document.body;
        
        if (menu) {
            const isActive = menu.classList.contains('active');
            menu.classList.toggle('active');
            
            // Handle body scroll lock
            if (!isActive) {
                // Store current scroll position
                const scrollY = window.scrollY;
                body.classList.add('mobile-menu-open');
                body.style.top = `-${scrollY}px`;
            } else {
                closeMobileMenu();
            }
        }
        
        if (overlay) {
            overlay.classList.toggle('active');
        }
        
        if (hamb) {
            hamb.classList.toggle('active');
        }
    }

    function closeMobileMenu() {
        const menu = document.querySelector('.mobile-menu');
        const overlay = document.querySelector('.mobile-menu-overlay');
        const hamb = document.querySelector('.hamburger');
        const body = document.body;
        
        if (menu) {
            menu.classList.remove('active');
        }
        
        if (overlay) {
            overlay.classList.remove('active');
        }
        
        if (hamb) {
            hamb.classList.remove('active');
        }
        
        // Restore body scroll
        if (body.classList.contains('mobile-menu-open')) {
            const scrollY = body.style.top;
            body.classList.remove('mobile-menu-open');
            body.style.top = '';
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
        }
    }

    // ===== Smooth Scrolling for Anchor Links =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                const headerOffset = 80; // Account for fixed header
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ===== Form Enhancement with Floating Labels =====
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        // Add placeholder if not present
        if (!input.hasAttribute('placeholder')) {
            input.setAttribute('placeholder', ' ');
        }

        // Check on page load if input has value
        if (input.value) {
            input.classList.add('has-value');
        }

        // Add event listeners
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
            if (this.value) {
                this.classList.add('has-value');
            } else {
                this.classList.remove('has-value');
            }
        });
    });

    // ===== Responsive Image Loading =====
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for browsers without IntersectionObserver
        lazyImages.forEach(img => {
            img.src = img.dataset.src;
            img.classList.add('loaded');
        });
    }

    // ===== Touch-friendly Dropdown Menus =====
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.dropdown-trigger');
        const menu = dropdown.querySelector('.dropdown-menu');

        if (trigger && menu) {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                menu.classList.toggle('active');
            });

            // Close on outside click
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    menu.classList.remove('active');
                }
            });
        }
    });

    // ===== Parallax Scrolling Effect =====
    const parallaxElements = document.querySelectorAll('.parallax');
    
    if (parallaxElements.length > 0) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            
            parallaxElements.forEach(element => {
                const speed = element.dataset.speed || 0.5;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    }

    // ===== Auto-resize Textareas =====
    const textareas = document.querySelectorAll('textarea.auto-resize');
    textareas.forEach(textarea => {
        function adjustHeight() {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        textarea.addEventListener('input', adjustHeight);
        adjustHeight(); // Initial adjustment
    });

    // ===== Scroll Progress Indicator =====
    const progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: var(--color-primary);
        z-index: 9999;
        transition: width 0.3s ease;
    `;
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', function() {
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight - windowHeight;
        const scrolled = window.scrollY;
        const progress = (scrolled / documentHeight) * 100;
        progressBar.style.width = progress + '%';
    });

    // ===== Debounce Utility Function =====
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // ===== Responsive Table Wrapper =====
    const tables = document.querySelectorAll('table:not(.no-wrap)');
    tables.forEach(table => {
        const wrapper = document.createElement('div');
        wrapper.className = 'table-responsive';
        wrapper.style.cssText = 'overflow-x: auto; -webkit-overflow-scrolling: touch;';
        table.parentNode.insertBefore(wrapper, table);
        wrapper.appendChild(table);
    });

    // ===== Add Animation Classes on Scroll =====
    const animateOnScroll = document.querySelectorAll('.animate-on-scroll');
    
    if (animateOnScroll.length > 0) {
        const animateObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    animateObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        animateOnScroll.forEach(el => {
            animateObserver.observe(el);
        });
    }

    // ===== Focus Trap for Modals =====
    window.trapFocus = function(element) {
        const focusableElements = element.querySelectorAll(
            'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
        );
        const firstFocusableElement = focusableElements[0];
        const lastFocusableElement = focusableElements[focusableElements.length - 1];

        element.addEventListener('keydown', function(e) {
            const isTabPressed = e.key === 'Tab' || e.keyCode === 9;

            if (!isTabPressed) return;

            if (e.shiftKey) {
                if (document.activeElement === firstFocusableElement) {
                    lastFocusableElement.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastFocusableElement) {
                    firstFocusableElement.focus();
                    e.preventDefault();
                }
            }
        });

        firstFocusableElement.focus();
    };
});