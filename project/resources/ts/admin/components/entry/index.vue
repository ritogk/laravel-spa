<template>
    <b-container fluid class="py-4">
        <h2>選考一覧</h2>
        <msg-danger :message="message"></msg-danger>

        <!-- 抽出条件 -->
        <b-card
            header="抽出条件"
            header-tag="header">
            <b-row>
                <b-col lg="6" class="my-1">
                    <b-form-group label="氏名" label-for="cond_full_name">
                        <b-input-group>
                            <b-form-input v-model="cond.full_name" type="search" id="cond_full_name"></b-form-input>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <template #footer>
                <b-button variant="primary" @click="getItem()">検索</b-button>
            </template>
        </b-card>

        <b-card>
            <!-- User Interface controls -->
            <b-row>
                <b-col lg="6" class="my-1">
                    <b-form-group label="Filter" label-cols-sm="3" label-align-sm="right" label-for="filterInput">
                        <b-input-group>
                            <b-form-input v-model="filter" type="search" id="filterInput" placeholder="Type to Search"></b-form-input>
                            <b-input-group-append>
                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>

                <b-col sm="5" md="6" class="my-1">
                <b-form-group label="Per page" label-cols-sm="6" label-cols-md="4" label-cols-lg="3" label-align-sm="right" label-for="perPageSelect">
                    <b-form-select v-model="perPage" id="perPageSelect" :options="pageOptions"></b-form-select>
                </b-form-group>
                </b-col>
            </b-row>

            <!-- Main table element -->
            <b-table
                :items="items"
                :busy="isBusy"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                @filtered="onFiltered"
            >
                <template #table-busy>
                    <div class="text-center text-danger my-2">
                        <b-spinner class="align-middle"></b-spinner>
                        <strong>Loading...</strong>
                    </div>
                </template>

                <template #cell(job_nm))="row">
                    {{ row.item.job_nm }}
                </template>

                <template #cell(full_name))="row">
                    {{ row.item.full_name }}
                </template>

                <template #cell(email)="row">
                    {{ row.item.email }}
                </template>

                <template #cell(tel)="row">
                    {{ row.item.tel }}
                </template>

                <template #cell(self_pr)="row">
                    {{ row.item.self_pr }}
                </template>

                <template #cell(created_at)="row">
                    {{ entryDate(row.item.created_at) }}
                </template>
            </b-table>

            <!-- User Interface controls -->
            <b-row class="py-1">
                <b-col sm="5" md="6" class="my-1">
                    <span v-text="tableInfo()"></span>
                </b-col>

                <b-col sm="7" md="6" class="my-1">
                    <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                    ></b-pagination>
                </b-col>
            </b-row>
        </b-card>
    </b-container>
</template>

<script lang="ts">
    import { Vue, Component, Prop } from 'vue-property-decorator';
    // コンポーネント
    import BtnDl from '@root/admin/components/utility/btn_donwload.vue';
    import MsgDanger from '@root/admin/components/utility/msg_danger.vue';
    import BtnModalJobCategory from '@root/admin/components/utility/modal_job_category.vue'
    // モデル
    import Item from './models/Item';
    import JobCategory from '@root/admin/components/master/job_category/models/Item'
    import Cond from './models/Cond';
    import DataTableFileds from '@root/models/data_table/Fileds';
    import DataTablePageOptions from '@root/models/data_table/PageOptions';

    @Component({
        components: {
            'btn-dl': BtnDl,
            'btn-model-job-category': BtnModalJobCategory,
            'msg-danger': MsgDanger,
        }
    })
    export default class Index extends Vue{
        @Prop({required: false })
        isInit!: boolean;

        // data
        items: Array<Item> = []
        cond: Cond = {full_name: ''}
        message: string = ""
        // 以降はデータテーブルで使用する値
        fields: Array<DataTableFileds> = [
                        { key: 'job_nm', label: '求人名', sortable: true, sortDirection: 'desc' },
                        { key: 'full_name', label: '氏名'},
                        { key: 'email', label: 'メールアドレス'},
                        { key: 'tel', label: '電話番号' },
                        { key: 'self_pr', label: '自己PR'},
                        { key: 'created_at', label: '申込日時' }
                    ]
        isBusy: boolean = false
        totalRows: number = 1
        currentPage: number = 1
        perPage: number = 25
        pageOptions: Array<DataTablePageOptions> = [
                            {value: 15, text: '15'},
                            {value: 25, text: '25'},
                            {value: 50, text: '50'},
                            {value: 100, text: "Show a lot" }]
        sortBy: string = ''
        sortDesc: boolean = false
        sortDirection: string = 'asc'
        filter: string = ''

        // 初期化
        mounted(){
            this.isBusy = true;
            // 一覧取得
            window.axios.post("/admin/api/entry/get_conds", {isInit: this.isInit}).then(response => {
                if(!(this as any).isEmptyObject(response.data)){
                    this.cond.full_name = response.data.full_name
                }
                this.getItem();
            })
        }

        // 一覧取得
        getItem(): void{
            // 条件をセッションに保存
            window.axios.post("/admin/api/entry/set_conds", {
                full_name: this.cond.full_name
            }).catch();

            // 一覧読込
            window.axios.post("/admin/api/entry/list", {
                full_name: this.cond.full_name,
                isInit: this.isInit
            }).then(response => {
                this.items = response.data;
                this.totalRows = this.items.length
                this.isBusy = false;
                this.message = "";
            }).catch(erorr => {
                this.isBusy = false;
                this.message = erorr;
            });
        }

        entryDate(str: string): string{
            const date = new Date(str)
            return date.getFullYear() + '年' + date.getMonth() + '月' + date.getDate() + '日'
        }

        onFiltered(filteredItems: Array<Item>): void {
            // フィルタリング時のページネーション更新
            this.totalRows = filteredItems.length
            this.currentPage = 1
        }

        tableInfo(): string {
            let page_st = (this.currentPage - 1) * this.perPage + 1;
            let page_ed = (this.currentPage * this.perPage) > this.items.length ? this.items.length : (this.currentPage * this.perPage)
            return window.format.sprintf('%1$s 件中 %2$s から %3$s まで表示', this.items.length, page_st, page_ed);
        }
    }
</script>
