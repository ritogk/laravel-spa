<template>
    <div class="col-3" id="sticky-sidebar">
        <div class="sticky-top">
            <div class="nav flex-column">
                <b-card-group deck>
                    <b-card header="検索" header-tag="header">
                        <div class="py-2">
                            <label for="exampleInputEmail1">カテゴリ</label>
                            <b-form-select :options="[1, 2, 3, 4, 5]"></b-form-select>
                            <small id="emailHelp" class="form-text text-muted">ちゃんと検索してね!</small>
                        </div>

                        <div class="py-2">
                            <label for="exampleInputEmail1">キワード</label>
                            <b-form-input placeholder="Enter your name"></b-form-input>
                            <small id="emailHelp" class="form-text text-muted">ちゃんと検索してね!</small>
                        </div>

                        <div class="py-2">
                            <b-form-checkbox
                            id="checkbox-1"
                            v-model="status"
                            name="checkbox-1"
                            value="accepted"
                            unchecked-value="not_accepted">
                            お気に入り
                            </b-form-checkbox>
                        </div>

                        <div class="py-2">
                            <b-form-checkbox
                            id="checkbox-2"
                            v-model="status"
                            name="checkbox-2"
                            value="accepted"
                            unchecked-value="not_accepted">
                            申込済
                            </b-form-checkbox>
                        </div>

                        <div class="py-2">
                            <b-button variant="primary">検索</b-button>
                        </div>
                    </b-card>
                </b-card-group>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Vue, Component } from 'vue-property-decorator';

    @Component
    export default class Search extends Vue {
    }
</script>
