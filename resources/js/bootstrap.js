import 'bootstrap';
import { Modal, Alert, Toast } from 'bootstrap';
window.Modal = Modal;

window.toast =  (status, icon, message, delay=3000) => {
    $('#toastElement').addClass(`text-bg-${status}`)
    $('#toastIcon').addClass(`fa-circle-${icon}`)
    $('#toastText').text(message)
    
    new Toast('#toastElement', { delay: delay }).show();
}

import $ from 'jquery';
window.$ = $;

import jszip from 'jszip';
import pdfMake from 'pdfmake';
import DataTable from 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import DateTime from 'datatables.net-datetime';
import 'datatables.net-responsive-bs5';
import 'datatables.net-rowgroup-bs5';

window.jszip = jszip;
window.pdfMake = pdfMake;
window.DataTable = DataTable;
window.DateTime = DateTime;
/**
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
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
