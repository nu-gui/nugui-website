/**
 * Page Gradient Enhancement Script
 * Adds dynamic gradient effects and product theming
 */

document.addEventListener('DOMContentLoaded', function() {
    // Apply product-specific gradients to sections based on content
    const productSections = document.querySelectorAll('[data-product-theme]');
    productSections.forEach(section => {
        const product = section.getAttribute('data-product-theme');
        if (product) {
            section.classList.add(`theme-${product}`);
            
            // Find hero section within and apply gradient
            const heroSection = section.querySelector('.hero-section');
            if (heroSection) {
                heroSection.classList.add(`hero-gradient-${product}`);
            }
        }
    });
    
    // REMOVED: Mesh overlay was causing background layer conflicts
    // The hero-mesh-overlay was creating an additional layer that interfered with backgrounds
    
    // Dynamic gradient based on scroll position (optional enhancement)
    if (window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
        const dynamicHero = document.querySelector('.page-home .hero-section');
        if (dynamicHero) {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const maxScroll = 500;
                const scrollPercent = Math.min(scrolled / maxScroll, 1);
                
                // Subtle gradient shift based on scroll
                dynamicHero.style.backgroundPosition = `${scrollPercent * 50}% ${scrollPercent * 50}%`;
            });
        }
    }
    
    // Apply gradient to specific elements with class
    const gradientElements = document.querySelectorAll('[data-gradient]');
    gradientElements.forEach(element => {
        const gradientType = element.getAttribute('data-gradient');
        element.classList.add(`hero-gradient-${gradientType}`);
    });
});

// Utility function to apply gradient programmatically
window.applyPageGradient = function(element, gradientType) {
    if (!element) return;
    
    // Remove existing gradient classes
    const gradientClasses = Array.from(element.classList).filter(c => c.startsWith('hero-gradient-'));
    gradientClasses.forEach(c => element.classList.remove(c));
    
    // Add new gradient class
    if (gradientType) {
        element.classList.add(`hero-gradient-${gradientType}`);
    }
};

// Function to cycle through product gradients (for demo/showcase)
window.cycleProductGradients = function(element) {
    const products = ['ccs', 'data', 'sip', 'sms'];
    let currentIndex = 0;
    
    setInterval(() => {
        window.applyPageGradient(element, products[currentIndex]);
        currentIndex = (currentIndex + 1) % products.length;
    }, 3000);
};