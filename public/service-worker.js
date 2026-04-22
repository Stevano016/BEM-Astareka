const CACHE_NAME = 'bem-ush-cache-v2';

// hanya cache file penting (JANGAN favicon / logo)
const urlsToCache = [
  '/',
  '/css/astareka-custom.css'
];

// INSTALL
self.addEventListener('install', event => {
  self.skipWaiting();
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => cache.addAll(urlsToCache))
  );
});

// ACTIVATE (hapus cache lama)
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            return caches.delete(cache);
          }
        })
      );
    })
  );
  self.clients.claim();
});

// FETCH (SMART, bukan asal cache)
self.addEventListener('fetch', event => {
  const url = new URL(event.request.url);

  // 🚫 JANGAN ganggu favicon / logo / image
  if (
    url.pathname.includes('favicon') ||
    url.pathname.includes('logo') ||
    url.pathname.match(/\.(png|jpg|jpeg|svg|ico)$/)
  ) {
    return;
  }

  // ✅ network-first (biar selalu update)
  event.respondWith(
    fetch(event.request)
      .then(response => {
        return caches.open(CACHE_NAME).then(cache => {
          cache.put(event.request, response.clone());
          return response;
        });
      })
      .catch(() => caches.match(event.request))
  );
});