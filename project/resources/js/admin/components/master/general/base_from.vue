<template>
  <b-container fluid class="py-4">
    <h2>{{ title }}</h2>

    <!-- 登録内容 -->
    <b-card
      header="登録内容"
      header-tag="header">
      <b-row>
        <b-col lg="12" class="my-1">
          <b-form-group
            label="区分"
            label-for="kbn"
            :invalid-feedback="errors.kbn"
            :state="input_state(errors.kbn)">
              <b-form-input
                v-model="item.kbn"
                :disabled="!isCreate"
                type="search"
                id="kbn"
                :state="input_state(errors.kbn)"></b-form-input>
          </b-form-group>
        </b-col>

        <b-col lg="12" class="my-1">
          <b-form-group
            label="値"
            label-for="value"
            :invalid-feedback="errors.value"
            :state="input_state(errors.value)">
            <b-form-input
              v-model="item.value"
              type="search"
              id="value"
              :state="input_state(errors.value)"></b-form-input>
          </b-form-group>
        </b-col>

        <b-col lg="12" class="my-1">
          <b-form-group
            label="並び順"
            label-for="value"
            :invalid-feedback="errors.sort_no"
            :state="input_state(errors.sort_no)">
            <b-input-group>
              <b-form-input
                v-model="item.sort_no"
                type="search"
                id="sort_no"
                :state="input_state(errors.sort_no)"></b-form-input>
            </b-input-group>
          </b-form-group>
        </b-col>
      </b-row>
      <template #footer>
        <b-button variant="success" @click="$emit('submit', item)">登録</b-button>
        <b-button variant="secondary" @click="$emit('back')">戻る</b-button>
      </template>
    </b-card>
  </b-container>
</template>
 
<script>
  export default {
      props: {
          initialItem: Object,
          errors: Object,
          title: String,
          isCreate: Boolean,
      },
      data() {
        return {
          item: this.initialItem,
        }
      },
  }
</script>