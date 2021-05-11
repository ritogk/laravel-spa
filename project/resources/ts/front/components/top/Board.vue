<template>
    <div class="p-4">
        <b-card
            header="職種"
            header-tag="header"
            sub-title='ご希望の職種を選択して下さい。'
            tag="article"
        >
        <b-card-group deck>
            <app-category
            v-for="sample in [1,2,3,4,5]"
            :key="sample"
            @click.native='pageTransition()'
            ></app-category>
        </b-card-group>
        </b-card>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // コンポーネント
    import Category from './Category.vue';
    // 状態管理
    import { state } from "@root/front/state";

    @Component({
        components: {
            'app-category': Category,
        }
    })
    export default class App extends Vue {
        pageTransition(){
            state.searchJob({category: '1', keyword: '', favorite: false, entry: false})
            this.$router.push({ name: 'main'})
        }
    }
</script>
