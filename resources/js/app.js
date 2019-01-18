window._ = require('lodash');
window.Popper = require('popper.js').default;
window.swal = require('sweetalert2');
try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}
