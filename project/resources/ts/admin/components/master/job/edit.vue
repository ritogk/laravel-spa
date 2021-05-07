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
    import { Vue, Component, Prop } from 'vue-property-decorator'
    // コンポーネント
    import BaseForm from './base_from.vue'
    import MsgDanger from '@root/admin/components/utility/msg_danger.vue'
    // モデル
    import Item from './models/Item';
    import BaseFormError from './models/BaseFormError';

    @Component({
        components: {
            'base-form': BaseForm,
            'msg-danger': MsgDanger,
        }
    })
    export default class Edit extends Vue{
        @Prop({required: true })
        initialItem!: string

        // data
        item: Item = {id: '', name: '', sort_no: 1, updated_at: ''}
        message: string = ''
        errors: BaseFormError = { name: '', sort_no: ''}

        // 初期化
        mounted(): void{
            this.item = JSON.parse(this.initialItem)
        }

        edit(): void{
            window.axios.put(window.format.sprintf('/admin/job_category/%1$s', this.item.id), this.item).then(response => {
                this.message = ""
                this.$router.push({ name: "job_category_index" })
            }).catch(error => {
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
