<template>
    <div class="col-3" id="sticky-sidebar">
        <div class="sticky-top">
            <div class="nav flex-column">
                <b-card-group deck>
                    <b-card header="検索" header-tag="header">
                        <div class="py-2">
                            <label for="exampleInputEmail1">職種</label>
                            <b-form-select :options="[1, 2, 3, 4, 5]" v-model="category"></b-form-select>

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
    // 状態管理
    import { state } from "@root/front/state";

    @Component
    export default class Search extends Vue {
        category: string = state.getCond.category
        content: string = state.getCond.content
        price: number|null = state.getCond.price
        attention: boolean = state.getCond.attention

        search(): void{
            const cond: ICond = {category: this.category
                                , content: this.content
                                , price: this.price
                                , attention: this.attention}
            state.searchJob(cond)
        }
    }
</script>
