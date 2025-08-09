// Simple Service Worker for NU GUI Website
// This is a placeholder service worker to prevent 404 errors

self.addEventListener('install', function(event) {
    console.log('Service Worker installing.');
    self.skipWaiting();
});

self.addEventListener('activate', function(event) {
    console.log('Service Worker activating.');
    event.waitUntil(clients.claim());
});

// For now, just pass through all fetch requests
self.addEventListener('fetch', function(event) {
    event.respondWith(fetch(event.request));
});