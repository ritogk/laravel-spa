<template>
    <div class="col-3" id="sticky-sidebar">
        <div class="sticky-top">
            <div class="nav flex-column">
                <b-card-group deck>
                    <b-card header="検索" header-tag="header">
                        <div class="py-2">
                            <label for="exampleInputEmail1">カテゴリ</label>
                            <b-form-select :options="[1, 2, 3, 4, 5]" v-model="category"></b-form-select>
                            <small id="emailHelp" class="form-text text-muted">ちゃんと検索してね!</small>
                        </div>

                        <div class="py-2">
                            <label for="exampleInputEmail1">キワード</label>
                            <b-form-input placeholder="Enter your name" v-model="keyword"></b-form-input>
                            <small id="emailHelp" class="form-text text-muted">ちゃんと検索してね!</small>
                        </div>

                        <div class="py-2">
                            <b-form-checkbox
                            v-model="favorite"
                            id="checkbox-1"
                            name="checkbox-1">
                            お気に入り
                            </b-form-checkbox>
                        </div>

                        <div class="py-2">
                            <b-form-checkbox
                            v-model="entry"
                            id="checkbox-2"
                            name="checkbox-2">
                            申込済
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

    // 状態管理
    import { state } from "@root/front/state";

    @Component
    export default class Search extends Vue {
        category: string = state.getCond.category
        keyword: string = state.getCond.keyword
        favorite: boolean = state.getCond.favorite
        entry: boolean = state.getCond.entry

        search(): void{
            state.searchJob({category: this.category
                            , keyword: this.keyword
                            , favorite: this.favorite
                            , entry: this.entry})
        }
    }
</script>
