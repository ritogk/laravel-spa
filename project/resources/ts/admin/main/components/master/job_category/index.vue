<template>
    <b-container fluid class="py-4">
    <h2>職種マスタ</h2>
    <msg-danger :message="message"></msg-danger>

        <!-- 抽出条件 -->
        <b-card
            header="抽出条件"
            header-tag="header">
            <b-row>
                <b-col lg="6" class="my-1">
                    <b-form-group label="名称" label-for="cond_name">
                    <b-input-group>
                        <b-form-input v-model="cond.name" type="search" id="cond_name"></b-form-input>
                    </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <template #footer>
                <b-button variant="primary" @click="getItem()">検索</b-button>
                <b-button variant="primary" @click="create()">新規作成</b-button>
                <btn-dl :dlUrl="dlMasterUrl">
                    <template v-slot:name>
                        <span>マスタ出力</span>
                    </template>
                </btn-dl>
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

                <template #cell(name))="row">
                    {{ row.item.name }}
                </template>

                <template #cell(content))="row">
                    {{ row.item.content }}
                </template>

                <template #cell(sort_no)="row">
                    {{ row.item.sort_no }}
                </template>

                <template #cell(actions)="row">
                <b-button @click="edit(row.item, row.index)" class="mr-1 btn-success">
                    編集
                </b-button>
                <b-button @click="destory(row.item)" class="mr-1 btn-danger">
                    削除
                </b-button>
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
    // モデル
    import Item from './models/Item';
    import Cond from './models/ICond';
    import DataTableFileds from '@root/models/data_table/IFileds';
    import DataTablePageOptions from '@root/models/data_table/IPageOptions';

    @Component({
        components: {
            'btn-dl': BtnDl,
            'msg-danger': MsgDanger,
        }
    })
    export default class BaseFrom extends Vue{
        @Prop({required: false })
        isInit!: boolean;

        // data
        items: Array<Item> = []
        cond: Cond = {name: ''}
        message: string = ""
        dlMasterUrl: string = '/api/job_categories/files/excel'
        // 以降はデータテーブルで使用する値
        fields: Array<DataTableFileds> = [
                        { key: 'name', label: '名称', sortable: true, sortDirection: 'desc' },
                        { key: 'content', label: '内容', sortable: true, sortDirection: 'desc' },
                        { key: 'sort_no', label: '並び順', sortable: true, class: 'text-left' },
                        { key: 'actions', label: 'Actions' }
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
            const cond_restore_json: string|null = localStorage.getItem('job_category_conds')
            if(cond_restore_json){
                const cond_restore: Cond = JSON.parse(cond_restore_json)
                this.cond.name = cond_restore.name
            }
            this.getItem();
        }

        // 一覧取得
        getItem(): void{
            // // 条件保存
            localStorage.setItem('job_category_conds',JSON.stringify(this.cond))

            // 抽出条件
            let filter:any  = []
            if(this.cond.name != ''){
                filter.push(['name', 'LIKE', '%' + this.cond.name + '%'])
            }
            // 一覧読込
            window.axios.get("/api/job_categories", {
                params:{
                    filter:
                        JSON.stringify(filter),
                    fields:
                        JSON.stringify(
                            ['*']
                        )
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

        // 編集
        edit(item: Item, index: number): void{
            this.$router.push({ name: "job_category_edit" , params: {id : item.id.toString()}});
        }

        // 新規
        create(): void {
            this.$router.push({ name: "job_category_create"});
        }

        // 削除
        destory(item: Item): void {
            this.$bvModal.msgBoxConfirm(window.format.sprintf('%1$s を削除します。よろしいですか?', item.name)).then(result => {
                if(result){
                    window.axios.delete("/api/job_categories/" + item.id).then(response => {
                        this.getItem();
                        this.message = "";
                    }).catch(error => {
                        this.message = error;
                    });
                }
            })
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
