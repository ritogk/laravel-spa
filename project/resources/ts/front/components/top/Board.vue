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
            v-for="(category, index) in categories"
            :key="`category-${index}`"
            :category="category"
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
    // モデル
    import ICond from "@root/front/models/ICond";
    import ICategory from "@root/front/models/ICategory";
    // 状態管理
    import { state } from "@root/front/state";

    @Component({
        components: {
            'app-category': Category,
        }
    })
    export default class App extends Vue {
        categories: Array<ICategory> = []

        pageTransition(){
            const cond: ICond = {category: '1', content: '', price: null, attention: false}
            state.searchJob(cond)
            this.$router.push({ name: 'main'})
        }

        // 初期化
        mounted(){
            window.axios.post('/front/categories').then(response => {
                this.categories = response.data
            })
        }
    }
</script>
