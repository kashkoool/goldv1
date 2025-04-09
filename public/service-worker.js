const CACHE_NAME = 'customer-dashboard-v1';
const CACHE_URLS = [
    '/customer/dashboard',
    // Add other assets like CSS, JS, and images
];

// Install the service worker and cache resources
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => cache.addAll(CACHE_URLS))
    );
});

// Serve cached responses
self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then((response) => response || fetch(event.request))
    );
});
