<style scoped>
    .card img{
        filter: brightness(0.65);
    }
</style>

<template>
    <b-card
        border-variant="info"
        header-bg-variant="primary"
        header-text-variant="white"
        header="職種"
        header-tag="header"
        sub-title='ご希望の職種を選択して下さい。'
        class="mb-3"
    >
        <b-card-group deck>
            <vue-loading type="spiningDubbles" color="#3490dc" :size="{ width: '50%', height: '50%' }" v-show="loading"></vue-loading>
            <div
                v-for="(category, index) in categories"
                :key="`category-${index}`"
                :category="category"
                v-show="!loading"
            >
                <b-card
                    :img-src='category.image'
                    img-alt="Image"
                    img-top
                    img-height="200px"
                    text-variant="white"
                    tag="article"
                    class="mb-4 category-card"
                    style="max-width: 20rem;"
                    overlay
                >
                    <b-card-title>
                        <h2 v-text='category.name'></h2>
                    </b-card-title>
                    <b-card-text>
                        <span v-text='category.content'></span>
                        <a href="#" @click.prevent="pageTransition(category)" class="stretched-link"></a>
                    </b-card-text>
                </b-card>
            </div>
        </b-card-group>
    </b-card>
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
        loading: boolean = true

        // 初期化
        mounted(){
            this.loading = true
            window.axios.post('/front/categories').then(response => {
                this.categories = response.data
                this.loading = false
            })
        }

        pageTransition(category: ICategory){
            const cond: ICond = {category: category.id, content: '', price: null, attention: false}
            state.searchJob(cond)
            this.$router.push({ name: 'main'})
        }
    }
</script>
