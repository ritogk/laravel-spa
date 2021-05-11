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
        item: Item = {id: '', name: '', content: '', image: '', sort_no: 1, updated_at: ''}
        message: string = ''
        errors: BaseFormError = { name: '', content: '', image: '', sort_no: ''}

        // 初期化
        mounted(): void{
            this.item = JSON.parse(this.initialItem)
        }

        edit(image_file: any): void{
            const formData = new FormData()
            formData.append('file',image_file)
            formData.append('item', JSON.stringify(this.item))
            window.axios.post('/admin/job_category/update',formData).then(response =>{
                this.message = ""
                this.$router.push({ name: "job_category_index" })
            }).catch(error => {
                if (error.response.status == 400) {
                    // エラー初期化
                    this.errors = { name: '', content: '', image: '', sort_no: ''}
                    // エラーセット
                    const request_errors = error.response.data.errors
                    for (var key in request_errors) {
                        const error_key = key.replace("item.", "")
                        this.errors[error_key] = request_errors[key][0]
                    }
                    if(request_errors.image){
                        this.errors.image = request_errors.image;
                    }
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
