<template>
    <div class="wrapper">
        <app-header></app-header>

        <router-link :to="{ name: 'top'}">
            <p>トップ</p>
        </router-link>
        <router-link :to="{ name: 'main'}">
            <p>メイン</p>
        </router-link>
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

    @Component({
        components: {
            'app-header': Header,
            'app-footer': Footer,
        }
    })
    export default class App extends Vue {
    }
</script>
