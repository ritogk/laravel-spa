/**
 * ある程度規模が大きくなってくると1つのjsファイルに全て書くのではなく機能毎にjsファイルを分ける
 * 
 * require = モジュールの読み込み。
 * import [モジュール名] from [パス]
 * 
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

require('admin-lte');

import Vue from 'vue';
import VueRouter from "vue-router";
import router from './router';

window.Vue = require('vue');
Vue.use(VueRouter);

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
    BTable: {
        stacked: 'md',
        hover: true ,
        showEmpty: true,
        small: true,
        striped: true,
    },
    BPagination: {
        align: 'fill',
        size: 'sm',
        class: 'my-0'
    },
})
Vue.use(IconsPlugin);

// jsで文字列フォーマットを使うライブラリ
window.format = require('sprintf-js');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// blade上で使用可能な自作タグ作成
Vue.component('admin', require('./components/App.vue').default);

// vueにグローバル定数セット
import gv from '../mixins/utils';
import gv2 from '../mixins/form_validation';
Vue.mixin(gv);
Vue.mixin(gv2);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    router: router,
});
