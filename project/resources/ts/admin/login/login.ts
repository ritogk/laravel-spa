import "core-js/stable";
import "regenerator-runtime/runtime";

import axios, { AxiosStatic } from 'axios';
import Vue from 'vue';

declare global {
    interface Window {
      axios:  AxiosStatic;
      format: any;
    }
    interface Element {
      content: string;
    }
}

// axios 初期設定
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

require('bootstrap');

window.Vue = require('vue');

// bootstrapvueの初期値設定
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
Vue.use(BootstrapVue, {
    BButton: {
        size: 'sm',
    },
    BFormSelect: {
        size: 'sm',
    },
    BFormInput: {
        placeholder: '',
        size: 'sm',
        autocomplete: "off",
    },
    BFormGroup: {
        labelSize: 'sm',
        labelAlignSm: 'left',
        labelColsSm: "2",
    },
    BInputGroup: {
        size: 'sm',
    },
})
Vue.use(IconsPlugin);

import component from './components/App.vue';
new Vue({
    el: '#app',
    render: h => h(component),
});
