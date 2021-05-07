<template>
  <b-container fluid class="py-4">
    <h2>汎用マスタ</h2>
    <msg-danger :message="message"></msg-danger>

    <!-- 抽出条件 -->
    <b-card
      header="抽出条件"
      header-tag="header">
      <b-row>
        <b-col lg="6" class="my-1">
          <b-form-group label="区分" label-for="cond_kbn">
            <b-input-group>
              <b-form-input v-model="conds.kbn" type="search" id="cond_kbn"></b-form-input>
              <btn-modal-general v-on:submit="setKbn"></btn-modal-general>
            </b-input-group>
          </b-form-group>
        </b-col>

        <b-col lg="6" class="my-1">
          <b-form-group label="値" label-for="cond_value">
            <b-input-group>
              <b-form-input v-model="conds.value" type="search" id="cond_value"></b-form-input>
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
          :filter-included-fields="filterOn"
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

          <template #cell(kbn)="row">
            {{ row.item.kbn }}
          </template>

          <template #cell(value)="row">
            {{ row.item.value }}
          </template>

          <template #cell(sort_no)="row">
            {{ row.item.sort_no }}
          </template>

          <template #cell(actions)="row">
            <b-button @click="edit(row.item, row.index, $event.target)" class="mr-1 btn-success">
              編集
            </b-button>
            <b-button @click="showDelConirm(row.item)" class="mr-1 btn-danger">
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

<script>
  import BtnDl from '@root/admin/components/utility/button_donwload'
  import BtnModalGeneral from '@root/admin/components/utility/modal_general'
  import MsgDanger from '@root/admin/components/utility/msg_danger';
  export default {
    components: {
        BtnDl,
        BtnModalGeneral,
        MsgDanger
    },
    props: {
      isInit: Boolean,
    },
    data() {
      return {
        items: [],
        conds: {kbn: null, value: null},
        fields: [
          { key: 'kbn', label: '区分', sortable: true, sortDirection: 'desc' },
          { key: 'value', label: '値', sortable: true, class: 'text-left' },
          { key: 'sort_no', label: '並び順', sortable: true, class: 'text-left' },
          { key: 'actions', label: 'Actions' }
        ],
        isBusy: false,
        totalRows: 1,
        currentPage: 1,
        perPage: 25,
        pageOptions: [15, 25, 50, { value: 100, text: "Show a lot" }],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        message: "",
        emptyItem: null,
        dlMasterUrl: '/admin/general/export_excel',
      }
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    mounted() {
       this.isBusy = true;
       axios.post("/admin/general/get_conds", {isInit: this.isInit})
        .then(response => {
          if(!this.isEmptyObject(response.data)){
            this.conds.kbn = response.data.kbn;
            this.conds.value = response.data.value;
          }
          this.getItem();
        })
       this.getEmptyData();
    },
    methods: {
      getItem() {
        // 条件をセッションに保存
        axios.post("/admin/general/set_conds", {
          kbn: this.conds.kbn,
          value: this.conds.value,
          isInit: this.isInit
        }).catch();

        // 一覧読込
        axios.post("/admin/general/list", {
          kbn: this.conds.kbn,
          value: this.conds.value,
          isInit: this.isInit
        })
        .then(response => {
          this.items = response.data;
          this.totalRows = this.items.length
          this.isBusy = false;
          this.message = "";
        })
        .catch(erorr => {
          this.isBusy = false;
          this.message = erorr;
        });
      },
      getEmptyData() {
        axios.post("/utility/empty_table_columns", {table_nm: 'generals', num: 1}).then(response => {
          this.emptyItem = response.data;
          this.emptyItem.changeable = 1;
        })
      },
      edit(item, index, button) {
        this.$router.push({ name: "general_edit" , params: {item : item, initialErrors : this.emptyItem}}).catch(() => {});
      },
      create() {
        let errors = $.extend(true, {}, this.emptyItem);
        this.$router.push({ name: "general_create" , params: {item : this.emptyItem, initialErrors : errors}}).catch(() => {});
      },
      delete(item) {
        axios.delete("/admin/general/" + item.id).then(response => {
          this.getItem();
          this.message = "";
        })
        .catch(error => {
          this.message = error;
        });
      },
      onFiltered(filteredItems) {
        // フィルタリング時のページネーション更新
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      tableInfo() {
        let page_st = (this.currentPage - 1) * this.perPage + 1;
        let page_ed = (this.currentPage * this.perPage) > this.items.length ? this.items.length : (this.currentPage * this.perPage)
        return format.sprintf('%1$s 件中 %2$s から %3$s まで表示', this.items.length, page_st, page_ed);
      },
      showDelConirm(item) {
        this.$bvModal.msgBoxConfirm(format.sprintf('%1$s を削除します。よろしいですか?', item.value))
          .then(result => {
            if(result) this.delete(item)
          })
          .catch(error => {
            this.message = error;
          })
      },
      setKbn(item){
        this.conds.kbn = item.kbn;
      },
    }
  }
</script>
