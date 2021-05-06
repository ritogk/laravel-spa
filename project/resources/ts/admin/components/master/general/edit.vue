<template>
  <div>
    <msg-danger :message="message"></msg-danger>
    <base-form
      title="汎用マスタ(編集)"
      :errors="errors"
      :initialItem="item"
      :isCreate="false"
      v-on:submit="edit"
      v-on:back="back"
    ></base-form>
  </div>
</template>

<script>
    import BaseForm from './base_from';
    import MsgDanger from '@admin/components/utility/msg_danger';
    export default {
        components: {
          BaseForm,
          MsgDanger
        },
        props: {
            item: Object,
            initialErrors: Object
        },
        data() {
          return {
            message: "",
            errors: this.initialErrors
          }
        },
        methods: {
          edit(input_item){
            axios.put(format.sprintf('/admin/general/%1$s', input_item.id), input_item)
            .then(response => {
              this.message = "";
              this.$router.push({ name: "general_index" });
            })
            .catch(error => {
              if (error.response.status == 400) {
                let request_errors = error.response.data.errors;
                this.errors = this.apply_request_errors(this.errors, request_errors);
                this.message = this.msg_exclusive(request_errors);
              }else{
                this.message = erorr;
              }
            });
          },
          back(){
            this.$router.push({ name: "general_index" , params: {isInit : false}}).catch(() => {});
          },
        },
    }
</script>
