/**
 * NU GUI Website Page Preloader
 * Intelligently preloads and caches critical pages for instant navigation
 */

class PagePreloader {
    constructor() {
        this.preloadedPages = new Map();
        this.preloadQueue = [];
        this.isPreloading = false;
        this.maxConcurrentPreloads = 2;
        this.currentPreloads = 0;
        
        // Critical pages to preload (in priority order)
        this.criticalPages = [
            { url: '/home', priority: 'high' },
            { url: '/solutions', priority: 'high' },
            { url: '/about', priority: 'medium' },
            { url: '/contact', priority: 'medium' },
            { url: '/partner-program', priority: 'low' },
            { url: '/support', priority: 'low' }
        ];
        
        // Critical resources to preload
        this.criticalResources = [
            // CSS files
            { url: '/css/01-base/reset.css', type: 'style' },
            { url: '/css/01-base/variables.css', type: 'style' },
            { url: '/css/01-base/typography.css', type: 'style' },
            { url: '/css/02-layout/layout.css', type: 'style' },
            { url: '/css/02-layout/navigation.css', type: 'style' },
            { url: '/css/03-components/hero-sections.css', type: 'style' },
            { url: '/css/03-components/cards.css', type: 'style' },
            { url: '/css/03-components/buttons.css', type: 'style' },
            { url: '/css/03-components/footer.css', type: 'style' },
            { url: '/css/04-utilities/animations.css', type: 'style' },
            { url: '/css/04-utilities/product-themes.css', type: 'style' },
            
            // JavaScript files
            { url: '/js/globalnav-apple.js', type: 'script' },
            { url: '/js/modern-website.js', type: 'script' },
            { url: '/js/theme-controller.js', type: 'script' },
            { url: '/js/audio-controller.js', type: 'script' },
            
            // Images
            { url: '/assets/images/NUGUI-1.png', type: 'image' },
            { url: '/assets/images/NUGUI-2.png', type: 'image' },
            
            // Audio
            { url: '/assets/sounds/nugui-ambient-sound.mp3', type: 'audio' }
        ];
        
        this.init();
    }
    
    init() {
        // Wait for page load before starting preloading
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.startPreloading());
        } else {
            // Page already loaded, start preloading after a short delay
            setTimeout(() => this.startPreloading(), 1000);
        }
        
        // Setup navigation interception for instant loading
        this.setupNavigationInterception();
        
        // Setup cache management
        this.setupCacheManagement();
    }
    
    startPreloading() {
        console.log('🚀 Starting page preloading for enhanced UX');
        
        // First, preload critical resources
        this.preloadCriticalResources();
        
        // Then, preload pages based on priority
        setTimeout(() => {
            this.preloadPages();
        }, 2000); // Start page preloading after resources
    }
    
    preloadCriticalResources() {
        console.log('📦 Preloading critical resources...');
        
        this.criticalResources.forEach(resource => {
            this.preloadResource(resource.url, resource.type);
        });
    }
    
    preloadResource(url, type) {
        return new Promise((resolve, reject) => {
            let element;
            
            switch (type) {
                case 'style':
                    element = document.createElement('link');
                    element.rel = 'preload';
                    element.as = 'style';
                    element.href = url;
                    break;
                    
                case 'script':
                    element = document.createElement('link');
                    element.rel = 'preload';
                    element.as = 'script';
                    element.href = url;
                    break;
                    
                case 'image':
                    element = document.createElement('link');
                    element.rel = 'preload';
                    element.as = 'image';
                    element.href = url;
                    break;
                    
                case 'audio':
                    element = document.createElement('link');
                    element.rel = 'preload';
                    element.as = 'audio';
                    element.href = url;
                    break;
                    
                default:
                    element = document.createElement('link');
                    element.rel = 'prefetch';
                    element.href = url;
            }
            
            element.onload = () => resolve(url);
            element.onerror = () => reject(new Error(`Failed to preload ${url}`));
            
            document.head.appendChild(element);
        });
    }
    
    preloadPages() {
        console.log('📄 Starting page preloading...');
        
        // Sort pages by priority
        const sortedPages = this.criticalPages.sort((a, b) => {
            const priorities = { high: 3, medium: 2, low: 1 };
            return priorities[b.priority] - priorities[a.priority];
        });
        
        // Add to preload queue
        this.preloadQueue = [...sortedPages];
        
        // Start preloading
        this.processPreloadQueue();
    }
    
    processPreloadQueue() {
        if (this.preloadQueue.length === 0 || this.currentPreloads >= this.maxConcurrentPreloads) {
            return;
        }
        
        const page = this.preloadQueue.shift();
        this.currentPreloads++;
        
        this.preloadPage(page.url, page.priority)
            .then(() => {
                console.log(`✅ Preloaded: ${page.url} (${page.priority} priority)`);
                this.currentPreloads--;
                this.processPreloadQueue(); // Continue with next page
            })
            .catch(error => {
                console.warn(`⚠️ Failed to preload ${page.url}:`, error);
                this.currentPreloads--;
                this.processPreloadQueue(); // Continue despite error
            });
        
        // Start next preload if we haven't hit the limit
        if (this.currentPreloads < this.maxConcurrentPreloads) {
            setTimeout(() => this.processPreloadQueue(), 100);
        }
    }
    
    preloadPage(url, priority = 'low') {
        return new Promise((resolve, reject) => {
            // Don't preload if already cached
            if (this.preloadedPages.has(url)) {
                resolve(this.preloadedPages.get(url));
                return;
            }
            
            // Use fetch with proper caching
            fetch(url, {
                method: 'GET',
                mode: 'same-origin',
                cache: 'force-cache',
                priority: priority
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                return response.text();
            })
            .then(html => {
                // Cache the HTML content
                this.preloadedPages.set(url, {
                    html: html,
                    timestamp: Date.now(),
                    priority: priority
                });
                
                // Also parse and preload any additional resources found in the HTML
                this.extractAndPreloadResources(html, url);
                
                resolve(html);
            })
            .catch(error => {
                reject(error);
            });
        });
    }
    
    extractAndPreloadResources(html, baseUrl) {
        // Create a temporary DOM to parse the HTML
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        
        // Extract and preload images
        const images = doc.querySelectorAll('img[src]');
        images.forEach(img => {
            const src = img.getAttribute('src');
            if (src && !src.startsWith('data:')) {
                this.preloadResource(src, 'image').catch(() => {}); // Silent fail
            }
        });
        
        // Extract and preload CSS files not already preloaded
        const stylesheets = doc.querySelectorAll('link[rel="stylesheet"]');
        stylesheets.forEach(link => {
            const href = link.getAttribute('href');
            if (href && !this.criticalResources.some(r => r.url === href)) {
                this.preloadResource(href, 'style').catch(() => {}); // Silent fail
            }
        });
    }
    
    setupNavigationInterception() {
        // Intercept navigation clicks for instant loading
        document.addEventListener('click', (e) => {
            const link = e.target.closest('a[href]');
            if (!link) return;
            
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('mailto:') || 
                href.startsWith('tel:') || href.includes('://') || 
                link.getAttribute('target') === '_blank') {
                return;
            }
            
            // Check if we have this page cached
            if (this.preloadedPages.has(href)) {
                e.preventDefault();
                this.navigateInstantly(href);
            }
        });
    }
    
    navigateInstantly(url) {
        const cachedPage = this.preloadedPages.get(url);
        if (!cachedPage) {
            // Fallback to normal navigation
            window.location.href = url;
            return;
        }
        
        console.log(`⚡ Instant navigation to: ${url}`);
        
        // Update the URL without triggering a page load
        history.pushState(null, '', url);
        
        // Replace current page content with cached content
        document.documentElement.innerHTML = cachedPage.html;
        
        // Re-initialize JavaScript components
        this.reinitializeComponents();
        
        // Update page title
        document.title = document.querySelector('title')?.textContent || 'NU GUI';
        
        // Trigger page change events
        window.dispatchEvent(new PopStateEvent('popstate'));
    }
    
    reinitializeComponents() {
        // Re-initialize critical components after instant navigation
        try {
            // Re-initialize audio controller
            if (window.NuGuiAudio) {
                window.NuGuiAudio.destroy();
                window.NuGuiAudio = new AudioController();
            }
            
            // Re-initialize theme controller
            if (window.initializeThemeController) {
                window.initializeThemeController();
            }
            
            // Re-initialize navigation
            if (window.initializeNavigation) {
                window.initializeNavigation();
            }
            
            // Apply theme from localStorage
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
            
        } catch (error) {
            console.warn('Error reinitializing components:', error);
        }
    }
    
    setupCacheManagement() {
        // Clean up old cache entries
        setInterval(() => {
            this.cleanupCache();
        }, 5 * 60 * 1000); // Every 5 minutes
        
        // Handle browser back/forward buttons
        window.addEventListener('popstate', (e) => {
            const url = window.location.pathname;
            if (this.preloadedPages.has(url)) {
                // Load from cache if available
                const cachedPage = this.preloadedPages.get(url);
                document.documentElement.innerHTML = cachedPage.html;
                this.reinitializeComponents();
            }
        });
    }
    
    cleanupCache() {
        const maxAge = 10 * 60 * 1000; // 10 minutes
        const now = Date.now();
        
        for (const [url, data] of this.preloadedPages.entries()) {
            if (now - data.timestamp > maxAge) {
                this.preloadedPages.delete(url);
                console.log(`🗑️ Cleaned up cached page: ${url}`);
            }
        }
    }
    
    // Public API
    preloadSpecificPage(url) {
        return this.preloadPage(url, 'high');
    }
    
    clearCache() {
        this.preloadedPages.clear();
        console.log('🗑️ Cache cleared');
    }
    
    getCacheStats() {
        return {
            cachedPages: this.preloadedPages.size,
            cacheEntries: Array.from(this.preloadedPages.keys()),
            memoryUsage: JSON.stringify(Array.from(this.preloadedPages.values())).length
        };
    }
}

// Initialize preloader when page loads
window.NuGuiPreloader = new PagePreloader();

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = PagePreloader;
}