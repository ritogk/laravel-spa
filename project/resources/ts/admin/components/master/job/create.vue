<template>
    <div>
    <msg-danger :message="message"></msg-danger>
        <base-form
            title="仕事マスタ(登録)"
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
        // data
        item: Item = {id: '', title: '', content: '', attention: false, job_category_id: '', price: null, image: '', sort_no: 1, updated_at: ''}
        message: string = ''
        errors: BaseFormError = {title: '', content: '', attention: '', job_category_id: '', price: '', image: '', sort_no: ''}

        create(image_file: any): void{
            const formData = new FormData()
            formData.append('file',image_file)
            formData.append('item', JSON.stringify(this.item))
            window.axios.post("/admin/job/create", formData).then(response => {
                this.message = ""
                this.$router.push({ name: "job_index" })
            }).catch(error => {
                if (error.response.status == 400) {
                    // エラー初期化
                    this.errors = {title: '', content: '', attention: '', job_category_id: '', price: '', image: '', sort_no: ''}
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
            this.$router.push({ name: "job_index" , params: {isInit : (false as any)}})
        }
    }
</script>
