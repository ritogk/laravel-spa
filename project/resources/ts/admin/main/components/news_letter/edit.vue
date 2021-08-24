<template>
    <div>
        <msg-danger :message="message"></msg-danger>
        <base-form
            title="メルマガ(編集)"
            :errors="errors"
            :item="item"
            :isCreate="false"
            v-on:submit="update"
            v-on:back="back"
        ></base-form>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Prop } from 'vue-property-decorator'
    // コンポーネント
    import BaseForm from './base_from.vue'
    import MsgDanger from '@admin/main/components/utility/msg_danger.vue'
    // モデル
    import Item from './models/IItem';
    import BaseFormError from './models/IBaseFormError';

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
        item: Item = {id: '', subject: '', message: '', send: false, updated_at: ''}
        message: string = ''
        errors: BaseFormError = {id: '', subject: '', message: '', send: '', updated_at: ''}

        // 初期化
        mounted(): void{
            window.axios.get('/api/news_letters/' + this.id).then(response => {
                this.item = response.data
            })
        }

        update(): void{
            window.axios.post('/api/news_letters/' + this.id, this.item, {
                headers: {
                    'X-HTTP-Method-Override': 'PUT'
                }
            }).then(response =>{
                this.message = ""
                this.$router.push({ name: "news_letter_index" })
            }).catch(error => {
                if (error.response.status == 422) {
                    // エラー初期化
                    this.errors = {id: '', subject: '', message: '', send: '', updated_at: ''}
                    // エラーセット
                    this.errors = error.response.data.errors
                }else{
                    this.message = error
                }
            })
        }

        back(): void{
            this.$router.push({ name: "news_letter_index" , params: {isInit : (false as any)}})
        }
    }
</script>
