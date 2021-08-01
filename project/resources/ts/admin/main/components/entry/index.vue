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

                <template #cell(job_id)="row">
                    {{ jobNms[row.item.job_id] }}
                </template>

                <template #cell(full_name)="row">
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
    import BtnDl from '@admin/main/components/utility/btn_donwload.vue';
    import MsgDanger from '@admin/main/components/utility/msg_danger.vue';
    import BtnModalJobCategory from '@admin/main/components/utility/modal_job_category.vue'
    // モデル
    import Item from './models/IItem';
    import Cond from './models/ICond';
    import Job from '@admin/main/components/master/job/models/IItem'
    import DataTableFileds from '@root/models/data_table/IFileds';
    import DataTablePageOptions from '@root/models/data_table/IPageOptions';

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
        jobNms: {[key: string]: string} = {}
        // 以降はデータテーブルで使用する値
        fields: Array<DataTableFileds> = [
                        { key: 'job_id', label: '求人名', sortable: true, sortDirection: 'desc' },
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
            // 条件復元
            const cond_restore_json: string|null = localStorage.getItem('entry_conds')
            if(cond_restore_json){
                const cond_restore: Cond = JSON.parse(cond_restore_json)
                this.cond.full_name = cond_restore.full_name
            }
            this.getItem();

            // 仕事名称取得
            window.axios.get('/api/jobs'
                , {
                    params:{
                        filters_json:JSON.stringify(''),
                        fields:['id', 'title']
                    }
                }
            ).then(response => {
                let keyValues: {[key: string]: string;} = {}
                response.data.map((x: Job) => keyValues[x.id] = x.title)
                this.jobNms = keyValues
            })
        }

        // 一覧取得
        getItem(): void{
            // 条件保存
            localStorage.setItem('entry_conds',JSON.stringify(this.cond))
            // 一覧読込
            window.axios.get("/api/entries", {
                params:{
                    filters_json:JSON.stringify({full_name: this.cond.full_name}),
                    fields:['*']
                }
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
