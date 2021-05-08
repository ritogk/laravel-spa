<template>
    <div>
        <msg-danger :message="message"></msg-danger>
        <base-form
            title="仕事カテゴリマスタ(登録)"
            :errors="errors"
            :item="item"
            :isCreate="true"
            v-on:submit="create"
            v-on:back="back"
        ></base-form>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Prop } from 'vue-property-decorator';
    // コンポーネント
    import BaseForm from './base_from.vue';
    import MsgDanger from '@root/admin/components/utility/msg_danger.vue';
    // モデル
    import Item from './models/Item';
    import BaseFormError from './models/BaseFormError';

    @Component({
        components: {
            'base-form': BaseForm,
            'msg-danger': MsgDanger,
        }
    })
    export default class Create extends Vue{
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

        create(): void{
            window.axios.post("/admin/job_category/create", this.item).then(response => {
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
