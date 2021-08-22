<template>
    <div>
        <msg-danger :message="message"></msg-danger>
        <base-form
            title="職種マスタ(登録)"
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
    import MsgDanger from '@admin/main/components/utility/msg_danger.vue';
    // モデル
    import Item from './models/Item';
    import BaseFormError from './models/IBaseFormError';

    @Component({
        components: {
            'base-form': BaseForm,
            'msg-danger': MsgDanger,
        }
    })
    export default class Create extends Vue{
        // data
        item: Item = {id: '', name: '', content: '', image: '', image_url: '', sort_no: 1, updated_at: ''}
        message: string = ''
        errors: BaseFormError = { name: '', content: '', image: '', sort_no: ''}
        create(image_file: any): void{
            window.axios.post('/api/job_categories', this.item).then(response =>{
                this.message = ""
                this.$router.push({ name: "job_category_index" })
            }).catch(error => {
                if (error.response.status == 422) {
                    // エラー初期化
                    this.errors = { name: '', content: '', image: '', sort_no: ''}
                    // エラーセット
                    this.errors = error.response.data.errors
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
