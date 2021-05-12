<template>
    <b-card-group deck>
        <div
            v-for="(category, index) in categories"
            :key="`category-${index}`"
            :category="category"
        >
            <b-card
                :title='category.name'
                :img-src='category.image'
                img-alt="Image"
                img-top
                img-height="200px"
                text-variant="white"
                tag="article"
                class="mb-4"
                style="max-width: 20rem;"
                overlay
            >
                <b-card-text>
                    <span v-text='category.content'></span>
                    <a href="#" @click.prevent="pageTransition(category)" class="stretched-link"></a>
                </b-card-text>
            </b-card>
        </div>
    </b-card-group>
</template>

<script lang="ts">
    import { Vue, Component, Prop, Emit } from 'vue-property-decorator';
    // モデル
    import ICond from "@root/front/models/ICond";
    import ICategory from "@root/front/models/ICategory";
    // 状態管理
    import { state } from "@root/front/state";

    @Component
    export default class Category extends Vue {
        categories: Array<ICategory> = []

        // 初期化
        mounted(){
            window.axios.post('/front/categories').then(response => {
                this.categories = response.data
            })
        }

        pageTransition(category: ICategory){
            const cond: ICond = {category: category.id, content: '', price: null, attention: false}
            state.searchJob(cond)
            this.$router.push({ name: 'main'})
        }
    }
</script>
