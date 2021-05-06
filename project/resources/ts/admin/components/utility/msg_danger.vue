<template>
  <div>
    <b-alert
      dismissible
      variant="danger"
      :show="shoMsg">
      {{ message }}</b-alert>
  </div>
</template>
 
<script>
    export default {
        props: {
            message: String
        },
        computed:{
          shoMsg: function () {
            return this.message != '';
          }
        }
    }
</script>