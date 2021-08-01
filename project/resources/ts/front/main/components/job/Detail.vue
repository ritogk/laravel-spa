<style scoped>
    /* 改行 */
    .multiple{
        white-space: pre-wrap;
    }
</style>

<template>
    <div>
        <b-modal
        id="bv-modal"
        @show="open_modal()"
        @close="close_modal()"
        size="lg"
        :title="convert_job.title"
        :header-bg-variant="headerBgVariant"
        :header-text-variant="headerTextVariant"
        >
            <b-card-group deck>
                <b-card
                :img-src="convert_job.image"
                img-alt="Card image"
                img-top>
                    <b-card-text>
                        <div>
                            <h1 v-text='convert_job.title'></h1>
                        </div>
                        <div class="py-3">
                            <h3>仕事内容</h3>
                            <span class="multiple" v-text='convert_job.content'></span>
                        </div>
                        <div class="py-3">
                            <h3>金額</h3>
                            <span v-text='price'></span>
                        </div>
                        <div class="py-3">
                            <h3>福利厚生</h3>
                            <span class="multiple" v-text='convert_job.welfare'></span>
                        </div>
                        <div class="py-3">
                            <h3>休日</h3>
                            <span class="multiple" v-text='convert_job.holiday'></span>
                        </div>

                        <b-card header="応募フォーム">
                            <b-card-text>
                                <div class="py-2">
                                    <b-form-group
                                    label="氏名"
                                    :invalid-feedback="errors.full_name"
                                    :state="input_state(errors.full_name)">
                                        <b-form-input
                                        id="full_name"
                                        v-model="entry.full_name"
                                        placeholder="フルーネムでお願いします。"
                                        :state="input_state(errors.full_name)"></b-form-input>
                                    </b-form-group>
                                </div>

                                <div class="py-2">
                                    <b-form-group
                                    label="自己PR"
                                    :invalid-feedback="errors.self_pr"
                                    :state="input_state(errors.self_pr)">
                                        <b-form-textarea
                                        id="self_pr"
                                        v-model="entry.self_pr"
                                        rows="3"
                                        max-rows="4"
                                        placeholder="可能な限り詳しく書いて下さい。">
                                        :state="input_state(errors.self_pr)"
                                        </b-form-textarea>
                                    </b-form-group>
                                </div>

                                <div class="py-2">
                                    <b-form-group
                                    label="メールアドレス"
                                    :invalid-feedback="errors.email"
                                    :state="input_state(errors.email)">
                                        <b-form-input
                                            id="email"
                                            placeholder="test@yahoo.co.jp"
                                            v-model="entry.email"
                                            :state="input_state(errors.email)">
                                        </b-form-input>
                                    </b-form-group>
                                </div>

                                <div class="py-2">
                                    <b-form-group
                                    label="電話番号"
                                    :invalid-feedback="errors.tel"
                                    :state="input_state(errors.tel)">
                                        <b-form-input
                                        id="tel"
                                        placeholder="ハイフンを含めて書いて下さい。"
                                        v-model="entry.tel"
                                        :state="input_state(errors.email)">
                                        </b-form-input>
                                    </b-form-group>
                                </div>

                                <div class="py-2">
                                    <b-button variant="primary" class="float-left" @click="job_entry()">
                                        申し込む
                                    </b-button>
                                </div>
                            </b-card-text>
                        </b-card>
                    </b-card-text>
                </b-card>
            </b-card-group>
            <template #modal-footer>
                <b-button
                    variant="secondary"
                    size="sm"
                    class="float-left"
                    @click="close_modal()"
                >
                    閉じる
                </b-button>
            </template>
        </b-modal>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Prop, Watch } from 'vue-property-decorator';

    // モデル
    import IJob from "@front/main/models/IJob";

    export interface IEntry{
        job_id: string
        full_name: string
        self_pr: string
        tel: string
        emai: string
    }

    @Component
    export default class Detail extends Vue {
        @Prop()
        job!: IJob|null

        @Watch('job')
        onChangeJob() {
            if(this.job == null) return
            // jobが変更されたタイミングでモーダル表示
            this.$nextTick(() => {
                this.$bvModal.show('bv-modal')
            })
        }

        // ヘッダスタイル
        headerBgVariant: string = 'primary'
        headerTextVariant: string = 'light'

        entry: IEntry = {job_id: '', full_name: '', self_pr: '', tel: '', emai: ''};
        errors: {[key: string]: string}  = {full_name: '', self_pr: '', tel: '', email: ''};

        // 画面表示用のjob
        get convert_job(): IJob{
            if(this.job != null){
                return this.job
            }else{
                return {id: '', title: '', content: '', attention: false, job_category_id: '', image: '', welfare: '', holiday: '', price: 0, sort_no: ''}
            }
        }
        // 金額表示
        get price(): string{
            if(this.convert_job.price == null) return ''
            return (this.convert_job.price).toLocaleString() + '円 ～'
        }

        // 開く際に実行する
        open_modal(): void{
            this.entry = {job_id: '', full_name: '', self_pr: '', tel: '', emai: ''};
        }

        // 閉じる際に実行する
        close_modal(): void{
            this.$bvModal.hide('bv-modal')
            this.$emit('close');
        }

        // 仕事登録
        job_entry(): void{
            this.entry.job_id = this.convert_job.id
            window.axios.post('/api/entries', this.entry).then(response => {
                this.close_modal()
            }).catch(error => {
                let request_errors = error.response.data.errors;
                this.errors = (this as any).apply_request_errors(this.errors, request_errors);
            });
        }
    }
</script>
