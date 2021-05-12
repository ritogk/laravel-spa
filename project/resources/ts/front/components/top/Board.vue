<template>
    <div class="p-4">
        <app-category></app-category>
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
