<template>
    <div>
        <b-container>
            <b-row class="py-3">
                <app-seach></app-seach>
                <app-list></app-list>
            </b-row>
        </b-container>
        <app-detail></app-detail>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // コンポーネント
    import Detail from './Detail.vue';
    import List from './List.vue';
    import Search from './Search.vue';

    @Component({
        components: {
            'app-detail': Detail,
            'app-list': List,
            'app-seach': Search,
        }
    })
    export default class App extends Vue {
    }
</script>
