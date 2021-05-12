<template>
    <div class="p-4">
        <b-card
            header="職種"
            header-tag="header"
            sub-title='ご希望の職種を選択して下さい。'
            tag="article"
        >
            <app-category></app-category>
        </b-card>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // コンポーネント
    import Category from './Category.vue';

    @Component({
        components: {
            'app-category': Category,
        }
    })
    export default class App extends Vue {
    }
</script>
