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
    import Header from './utility/Header.vue';
    import Footer from './utility/Footer.vue';

    @Component({
        components: {
            'app-header': Header,
            'app-footer': Footer,
        }
    })
    export default class App extends Vue {
    }
</script>
