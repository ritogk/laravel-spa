<template>
    <div class="wrapper">
        <app-header></app-header>

        <transition>
            <router-view/>
        </transition>

        <app-footer></app-footer>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // コンポーネント
    import Header from './Header.vue';
    import Footer from './Footer.vue';
    import VueLoading from 'vue-loading-template';
    Vue.use(VueLoading, /** options **/)

    @Component({
        components: {
            'app-header': Header,
            'app-footer': Footer,
        }
    })
    export default class App extends Vue {
    }
</script>
