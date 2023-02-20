/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import App from './views/App';
import tt from '@tomtom-international/web-sdk-maps';

const map = tt.map({
    key: 'bCA9waVZD04StnT2jWnglVMqwjHK75ve',
    container: 'map'
});

const app = new Vue({
    el: '#root',
    render: h=> h(App),
});
