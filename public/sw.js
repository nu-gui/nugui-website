/**
 * NU GUI Website Service Worker
 * Advanced caching strategy for instant page loads
 */

const CACHE_NAME = 'nugui-cache-v1';
const STATIC_CACHE = 'nugui-static-v1';
const DYNAMIC_CACHE = 'nugui-dynamic-v1';

// Resources to cache immediately on install
const STATIC_ASSETS = [
    // Core CSS
    '/css/01-base/reset.css',
    '/css/01-base/variables.css',
    '/css/01-base/typography.css',
    '/css/02-layout/layout.css',
    '/css/02-layout/navigation.css',
    '/css/03-components/hero-sections.css',
    '/css/03-components/cards.css',
    '/css/03-components/buttons.css',
    '/css/03-components/footer.css',
    '/css/04-utilities/animations.css',
    '/css/04-utilities/utilities.css',
    '/css/04-utilities/theme.css',
    '/css/04-utilities/product-themes.css',
    '/assets/css/tailwind.css',
    
    // Core JavaScript
    '/js/globalnav-apple.js',
    '/js/modern-website.js',
    '/js/theme-controller.js',
    '/js/audio-controller.js',
    '/js/page-preloader.js',
    '/js/page-gradients.js',
    '/js/form-fix.js',
    '/assets/js/script.js',
    '/assets/js/business-validation.js',
    
    // Images
    '/assets/images/NUGUI-1.png',
    '/assets/images/NUGUI-2.png',
    '/assets/images/NUGUI-icon-1.png',
    '/assets/images/NUGUI-icon-2.png',
    
    // Audio
    '/assets/sounds/nugui-ambient-sound.mp3',
    '/assets/sounds/nugui-ambient-sound.wav'
];

// Pages to cache dynamically
const CACHE_PAGES = [
    '/',
    '/home',
    '/about',
    '/solutions',
    '/contact',
    '/partner-program',
    '/support'
];

// Install event - cache static assets
self.addEventListener('install', event => {
    console.log('🔧 Service Worker: Installing...');
    
    event.waitUntil(
        Promise.all([
            // Cache static assets
            caches.open(STATIC_CACHE).then(cache => {
                console.log('📦 Service Worker: Caching static assets');
                return cache.addAll(STATIC_ASSETS.map(url => new Request(url, {
                    cache: 'reload' // Bypass cache for fresh assets
                })));
            }),
            
            // Pre-cache critical pages
            caches.open(DYNAMIC_CACHE).then(cache => {
                console.log('📄 Service Worker: Pre-caching critical pages');
                return Promise.all(
                    CACHE_PAGES.map(url => 
                        fetch(url, { cache: 'reload' })
                            .then(response => {
                                if (response.ok) {
                                    return cache.put(url, response.clone());
                                }
                            })
                            .catch(err => console.warn(`Failed to cache ${url}:`, err))
                    )
                );
            })
        ])
    );
    
    // Skip waiting to activate immediately
    self.skipWaiting();
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
    console.log('✅ Service Worker: Activating...');
    
    event.waitUntil(
        Promise.all([
            // Clean up old caches
            caches.keys().then(cacheNames => {
                return Promise.all(
                    cacheNames
                        .filter(cacheName => 
                            cacheName !== STATIC_CACHE && 
                            cacheName !== DYNAMIC_CACHE &&
                            cacheName.startsWith('nugui-')
                        )
                        .map(cacheName => {
                            console.log('🗑️ Service Worker: Deleting old cache:', cacheName);
                            return caches.delete(cacheName);
                        })
                );
            }),
            
            // Take control of all clients immediately
            self.clients.claim()
        ])
    );
});

// Fetch event - serve from cache with network fallback
self.addEventListener('fetch', event => {
    const { request } = event;
    const url = new URL(request.url);
    
    // Only handle same-origin requests
    if (url.origin !== location.origin) {
        return;
    }
    
    // Different strategies for different types of requests
    if (request.destination === 'document') {
        // HTML pages: Cache-first with network fallback
        event.respondWith(handlePageRequest(request));
    } else if (STATIC_ASSETS.some(asset => request.url.endsWith(asset))) {
        // Static assets: Cache-first with network fallback
        event.respondWith(handleStaticRequest(request));
    } else {
        // Other requests: Network-first with cache fallback
        event.respondWith(handleDynamicRequest(request));
    }
});

// Handle page requests (HTML documents)
async function handlePageRequest(request) {
    try {
        // Try cache first
        const cachedResponse = await caches.match(request);
        if (cachedResponse) {
            console.log('⚡ Service Worker: Serving page from cache:', request.url);
            
            // Update cache in background
            updateCacheInBackground(request);
            
            return cachedResponse;
        }
        
        // Network fallback
        console.log('🌐 Service Worker: Fetching page from network:', request.url);
        const networkResponse = await fetch(request);
        
        if (networkResponse.ok) {
            // Cache the response
            const cache = await caches.open(DYNAMIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
        
    } catch (error) {
        console.error('❌ Service Worker: Page request failed:', error);
        
        // Try to serve a cached fallback
        const fallback = await caches.match('/');
        if (fallback) {
            return fallback;
        }
        
        // Ultimate fallback
        return new Response('Page not available offline', {
            status: 503,
            statusText: 'Service Unavailable',
            headers: { 'Content-Type': 'text/plain' }
        });
    }
}

// Handle static asset requests
async function handleStaticRequest(request) {
    try {
        // Check cache first
        const cachedResponse = await caches.match(request);
        if (cachedResponse) {
            return cachedResponse;
        }
        
        // Network fallback
        const networkResponse = await fetch(request);
        
        if (networkResponse.ok) {
            // Cache the response
            const cache = await caches.open(STATIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
        
    } catch (error) {
        console.error('❌ Service Worker: Static request failed:', error);
        throw error;
    }
}

// Handle dynamic requests (API calls, etc.)
async function handleDynamicRequest(request) {
    try {
        // Network first
        const networkResponse = await fetch(request);
        
        if (networkResponse.ok && request.method === 'GET') {
            // Cache GET requests
            const cache = await caches.open(DYNAMIC_CACHE);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
        
    } catch (error) {
        // Cache fallback for GET requests
        if (request.method === 'GET') {
            const cachedResponse = await caches.match(request);
            if (cachedResponse) {
                console.log('📦 Service Worker: Serving from cache (offline):', request.url);
                return cachedResponse;
            }
        }
        
        throw error;
    }
}

// Update cache in background (stale-while-revalidate)
async function updateCacheInBackground(request) {
    try {
        const networkResponse = await fetch(request);
        if (networkResponse.ok) {
            const cache = await caches.open(DYNAMIC_CACHE);
            cache.put(request, networkResponse.clone());
            console.log('🔄 Service Worker: Updated cache in background:', request.url);
        }
    } catch (error) {
        console.warn('⚠️ Service Worker: Background update failed:', error);
    }
}

// Message handling for cache management
self.addEventListener('message', event => {
    const { data } = event;
    
    switch (data.action) {
        case 'SKIP_WAITING':
            self.skipWaiting();
            break;
            
        case 'GET_CACHE_STATS':
            getCacheStats().then(stats => {
                event.ports[0].postMessage(stats);
            });
            break;
            
        case 'CLEAR_CACHE':
            clearAllCaches().then(() => {
                event.ports[0].postMessage({ success: true });
            });
            break;
            
        case 'PRELOAD_PAGE':
            preloadPage(data.url).then(() => {
                event.ports[0].postMessage({ success: true });
            });
            break;
    }
});

// Get cache statistics
async function getCacheStats() {
    const cacheNames = await caches.keys();
    const stats = {};
    
    for (const cacheName of cacheNames) {
        const cache = await caches.open(cacheName);
        const keys = await cache.keys();
        stats[cacheName] = keys.length;
    }
    
    return stats;
}

// Clear all caches
async function clearAllCaches() {
    const cacheNames = await caches.keys();
    await Promise.all(cacheNames.map(name => caches.delete(name)));
    console.log('🗑️ Service Worker: All caches cleared');
}

// Preload a specific page
async function preloadPage(url) {
    try {
        const response = await fetch(url);
        if (response.ok) {
            const cache = await caches.open(DYNAMIC_CACHE);
            await cache.put(url, response);
            console.log('📄 Service Worker: Preloaded page:', url);
        }
    } catch (error) {
        console.error('❌ Service Worker: Failed to preload page:', error);
    }
}