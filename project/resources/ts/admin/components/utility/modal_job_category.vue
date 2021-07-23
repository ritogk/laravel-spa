<template>
    <b-input-group>
        <b-form-input v-bind:value="localValueName" type="text" disabled　id="job_category_id"></b-form-input>
        <b-form-input v-model="localValue" type="text" hidden></b-form-input>
        <b-input-group-append>
            <b-button variant="outline-info" @click="delValue()">削除</b-button>
            <b-button variant="outline-info" v-b-modal.modal-1>選択</b-button>

            <b-modal id="modal-1" size="lg" @ok="submit" title="選択">
                <b-card>
                    <!-- User Interface controls -->
                    <b-row>
                    <b-col lg="6" class="my-1">
                        <b-form-group
                        label="Filter"
                        label-cols-sm="3"
                        label-for="filterInput">
                        <b-input-group>
                            <b-form-input
                            v-model="filter"
                            type="search"
                            id="filterInput"
                            placeholder="Type to Search"
                            ></b-form-input>
                            <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                        </b-form-group>
                    </b-col>

                    <b-col sm="5" md="6" class="my-1">
                        <b-form-group
                        label="Per page"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-for="perPageSelect"
                        >
                        <b-form-select
                            v-model="perPage"
                            id="perPageSelect"
                            :options="pageOptions"
                        ></b-form-select>
                        </b-form-group>
                    </b-col>
                    </b-row>

                    <b-table
                    ref="selectableTable"
                    selectable
                    :select-mode="selectMode"
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
                    @row-selected="onRowSelected">
                        <template #table-busy>
                            <div class="text-center text-danger my-2">
                            <b-spinner class="align-middle"></b-spinner>
                            <strong>Loading...</strong>
                            </div>
                        </template>

                        <template #cell(name)="row">
                            {{ row.item.name }}
                        </template>

                        <template #cell(content)="row">
                            {{ row.item.content }}
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
            </b-modal>
        </b-input-group-append>
    </b-input-group>
</template>

<script lang="ts">
    import { Vue, Component, Emit, Prop } from 'vue-property-decorator';
    // モデル
    import JobCategry from '@root/admin/components/master/job_category/models/Item'
    import DataTableFileds from '@root/models/data_table/IFileds';
    import DataTablePageOptions from '@root/models/data_table/IPageOptions';

    @Component
    export default class Modal extends Vue{
        // 親子でバインドするためのおまじない。
        @Prop() public value!: string;
        @Emit()
        public input(value: string) {}
        private get localValue(): string {
            return this.value;
        }
        private set localValue(value: string) {
            this.input(value);
        }
        private get localValueName(): string{
            if(this.items.length && this.localValue != ''){
                return this.items.filter(item => item.id == this.localValue)[0].name
            }else{
                return ''
            }
        }

        items: Array<JobCategry> = []
        message: string = ''
        selected: JobCategry = {id: '', name: '', content: '', image: '', sort_no: 1, updated_at: ''}
        // 以降はデータテーブルで使用する値
        fields: Array<DataTableFileds> = [
                        { key: 'name', label: '名称', sortable: true, sortDirection: 'desc' },
                        { key: 'content', label: '内容', sortable: true, sortDirection: 'desc' }
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
        selectMode: string = 'single'

        // 初期化
        mounted(){
            this.isBusy = true;
            window.axios.get('/api/job_categories'
                , {
                    params:{
                        filters_json:JSON.stringify(''),
                        fields:['*']
                    }
                }
            ).then(response => {
                this.items = response.data;
                this.totalRows = this.items.length
                this.isBusy = false;
                this.message = "";
            }).catch(erorr => {
                this.isBusy = false;
                this.message = erorr;
            });
        }

        delValue(){
            this.localValue = '';
            this.selected = {id: '', name: '', content: '', image: '', sort_no: 1, updated_at: ''}
        }

        submit(){
            this.$bvModal.hide('modal-1');
            this.localValue = this.selected.id.toString();
        }

        onFiltered(filteredItems: Array<JobCategry>) {
            // フィルタリング時のページネーション更新
            this.totalRows = filteredItems.length
            this.currentPage = 1
        }

        tableInfo() {
            let page_st = (this.currentPage - 1) * this.perPage + 1;
            let page_ed = (this.currentPage * this.perPage) > this.items.length ? this.items.length : (this.currentPage * this.perPage)
            return window.format.sprintf('%1$s 件中 %2$s から %3$s まで表示', this.items.length, page_st, page_ed);
        }

        onRowSelected(items: Array<JobCategry>) {
            this.selected = items[0]
        }
    }
</script>
