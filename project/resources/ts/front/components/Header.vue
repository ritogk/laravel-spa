<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="primary ">
            <b-navbar-brand href="#">求人検索</b-navbar-brand>
            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
                <b-navbar-nav>
                    <b-nav-item href="/admin">管理画面</b-nav-item>
                </b-navbar-nav>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';

    @Component
    export default class Detail extends Vue {
    }
</script>
