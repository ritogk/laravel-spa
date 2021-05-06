<template>
  <b-input-group-append>

      <b-button variant="outline-info" v-b-modal.modal-1>選択</b-button>

      <b-modal id="modal-1" size="lg" @ok="submit" title="汎用マスタ選択">
        <b-card>
          <!-- User Interface controls -->
          <b-row>
            <b-col lg="6" class="my-1">
              <b-form-group
                label="Filter"
                label-cols-sm="3"
                label-for="filterInput"
              >
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
            :filter-included-fields="filterOn"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            :sort-direction="sortDirection"
            @filtered="onFiltered"
            @row-selected="onRowSelected"
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
</template>

<script>
  export default {
    props: {
      isInit: Boolean,
    },
    data() {
      return {
        items: [],
        fields: [
          { key: 'kbn', label: '区分', sortable: true, sortDirection: 'desc' },
          { key: 'value', label: '値', sortable: true, class: 'text-left' },
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
        message: null,
        selectMode: 'single',
        selected: []
      }
    },
    computed: {
      sortOptions() {
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    mounted() {
       this.getItem();
    },
    methods: {
      getItem() {
        this.isBusy = true;
        axios.post("/admin/general/list", {
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
      onRowSelected(items) {
        this.selected = items[0]
      },
      submit(){
        this.$bvModal.hide('modal-1');
        this.$emit('submit', this.selected);
      }
    }
  }
</script>
