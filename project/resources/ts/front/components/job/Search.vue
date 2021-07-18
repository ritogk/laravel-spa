<template>
    <div class="col-3" id="sticky-sidebar">
        <div class="sticky-top">
            <div class="nav flex-column">
                <b-card-group deck>
                    <b-card
                        border-variant="info"
                        header-bg-variant="primary"
                        header-text-variant="white"
                        header="検索"
                        header-tag="header"
                        class="mb-3"
                        no-body
                    >
                        <div class="m-3">
                            <div class="py-2">
                                <label for="exampleInputEmail1">職種</label>
                                <b-form-select :options="cmb_categories" v-model="category"></b-form-select>

                            </div>

                            <div class="py-2">
                                <label for="exampleInputEmail1">仕事内容</label>
                                <b-form-input placeholder="どんな求人をお探しですか?" v-model="content"></b-form-input>
                            </div>

                            <div class="py-2">
                                <label for="exampleInputEmail1">金額</label>
                                <b-form-input type="number" placeholder="最低金額を入力して下さい。" v-model="price"></b-form-input>
                            </div>

                            <div class="py-2">
                                <b-form-checkbox
                                v-model="attention"
                                id="checkbox-1"
                                name="checkbox-1">
                                注目の求人
                                </b-form-checkbox>
                            </div>

                            <div class="py-2">
                                <b-button variant="primary" @click="search()">検索</b-button>
                            </div>
                        </div>
                    </b-card>
                </b-card-group>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Vue, Component } from 'vue-property-decorator';

    // モデル
    import ICond from "@root/front/models/ICond";
    import ICategory from "@root/front/models/ICategory";
    // 状態管理
    import { state } from "@root/front/state";

    @Component
    export default class Search extends Vue {
        category: string = state.getCond.category
        content: string = state.getCond.content
        price: string = state.getCond.price
        attention: boolean = state.getCond.attention
        // コンボボックスの選択一覧
        cmb_categories: {[key:string]:string} = {}

        mounted(){
            // コンボボックのカテゴリ値取得
            window.axios.get('/api/front/categories').then(response => {
                const categories: ICategory = response.data
                for (var key in categories) {
                    this.cmb_categories[categories[key].id] = categories[key].name
                }
                this.cmb_categories = {...this.cmb_categories}
            });
        }
        search(): void{
            const cond: ICond = {category: this.category
                                , content: this.content
                                , price: this.price
                                , attention: this.attention}
            state.search(cond)
        }
    }
</script>
