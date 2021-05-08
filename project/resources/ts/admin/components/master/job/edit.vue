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
        id!: string

        // data
        item: Item = {id: '', title: '', content: '', attention: false, job_category_id: '', price: null, image: '', sort_no: 1, updated_at: ''}
        message: string = ''
        errors: BaseFormError = {title: '', content: '', attention: '', job_category_id: '', price: '', image: '', sort_no: ''}

        // 初期化
        mounted(): void{
            window.axios.post('/admin/job/find', {id: this.id}).then(response => {
                this.item = response.data
            })
        }

        edit(image_file: any): void{
            const formData = new FormData()
            formData.append('file',image_file)
            formData.append('item', JSON.stringify(this.item))
            window.axios.post('/admin/job/update',formData).then(response =>{
                this.message = ""
                this.$router.push({ name: "job_index" })
            }).catch(error => {
                if (error.response.status == 400) {
                    // エラー初期化
                    this.errors = Object.entries(this.errors).reduce((obj, item: any) => ({...obj, [item[0]]: ''}), {})
                    // ラーセット
                    const request_errors = error.response.data.errors
                    // anyを消したい・・・
                    let item_errors = Object.entries(request_errors).reduce((obj, item: any) => ({...obj, [item[0].replace("item.", "")]: item[1][0]}), {})
                    this.errors =  { ...this.errors, ...item_errors}
                    if(request_errors.image){
                        this.errors.image = request_errors.image;
                    }
                }else{
                    this.message = error
                }
            })
        }

        back(): void{
            this.$router.push({ name: "job_index" , params: {isInit : (false as any)}})
        }
    }
</script>
