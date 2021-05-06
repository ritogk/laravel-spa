<template>
    <div>
        <msg-danger :message="message"></msg-danger>
        <base-form
            title="仕事カテゴリマスタ(編集)"
            :errors="errors"
            :item="item"
            :isCreate="false"
            v-on:submit="edit"
            v-on:back="back"
        ></base-form>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Model, Prop } from 'vue-property-decorator'
    // コンポーネント
    import BaseForm from './base_from.vue'
    import MsgDanger from '@admin/components/utility/msg_danger.vue'

    @Component({
        components: {
            'base-form': BaseForm,
            'msg-danger': MsgDanger,
        }
    })
    export default class Edit extends Vue{
        @Prop({ type: Object, required: true })
        initialItem: any

        // data
        item: any = {}
        message: string = ''
        errors: any = { name: '', sort_no: ''}

        // 初期化
        mounted(): void{
            this.item = this.initialItem;
        }

        edit(): void{
            window.axios.put(window.format.sprintf('/admin/job_category/%1$s', this.item.id), this.item)
            .then(response => {
                this.message = ""
                this.$router.push({ name: "job_category_index" })
            })
            .catch(error => {
                if (error.response.status == 400) {
                    let request_errors = error.response.data.errors
                    this.errors = (this as any).apply_request_errors(this.errors, request_errors)
                    this.message = (this as any).msg_exclusive(request_errors)
                }else{
                    this.message = error
                }
            })
        }

        back(): void{
            this.$router.push({ name: "job_category_index" , params: {isInit : (false as any)}})
        }
    }
</script>
