


/**
 added comment to confirm github works on ssh
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });


//for localhost
 import Echo from 'laravel-echo';

 import Pusher from 'pusher-js';
 window.Pusher = Pusher;

 window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    wsHost: '127.0.0.1', // Your domain
    encrypted: false,
    wsPort: 6001, // Yor http port
    disableStats: true, // Change this to your liking this disables statistics
    forceTLS: false,
    enabledTransports: ['ws', 'wss'],
    disabledTransports: ['sockjs', 'xhr_polling', 'xhr_streaming'] // Can be removed
});
//for localhost (end)


 /*

  import Echo from 'laravel-echo';

 import Pusher from 'pusher-js';
 window.Pusher = Pusher;

 window.Echo = new Echo({
     broadcaster: 'pusher',
     key: import.meta.env.VITE_PUSHER_APP_KEY,
     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
     wsHost:'agrikulturapp.com',
     wssPort: 443,
     forceTLS: true,//important forceTLS is important! do not remove it.
     disableStats: true,
     enabledTransports: ['ws', 'wss'],
     encrypted: true,
     disabledTransports: ['sockjs', 'xhr_polling', 'xhr_streaming']
 });


 */