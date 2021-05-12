<template>
    <div>
        <b-modal
        v-model="isShow"
        @close="close_modal()"
        size="lg"
        :title="selectJob.title"
        :header-bg-variant="headerBgVariant"
        :header-text-variant="headerTextVariant"
        >
            <b-card-group deck>
                <b-card
                :img-src="selectJob.image"
                img-alt="Card image"
                img-top>
                    <b-card-text>
                        <div>
                            <h1 v-text='selectJob.title'></h1>
                        </div>
                        <div class="py-3">
                            <h3>仕事内容</h3>
                            <span v-text='selectJob.content'></span>
                        </div>
                        <div class="py-3">
                            <h3>金額</h3>
                            <span v-text='price'></span>
                        </div>

                        <b-card header="応募フォーム">
                            <b-card-text>
                                <div class="py-2">
                                    <b-form-group
                                    label="氏名"
                                    :invalid-feedback="errors.full_name"
                                    :state="input_state(errors.full_name)">
                                        <b-form-input
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
                                        placeholder="携帯電話, 固定電話"
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
    import { Vue, Component, Prop } from 'vue-property-decorator';

    // 状態管理
    import { state } from "@root/front/state";
    // モデル
    import IJob from "@root/front/models/IJob";

    export interface IEntry{
        full_name: string
        self_pr: string
        tel: string
        emai: string
    }

    @Component
    export default class Detail extends Vue {
        // ヘッダスタイル
        headerBgVariant: string = 'primary '
        headerTextVariant: string = 'light'

        entry: IEntry = {full_name: '', self_pr: '', tel: '', emai: ''};
        errors: any = {full_name: '', self_pr: '', tel: '', email: ''};
        private get isShow(): boolean{
            return state.getIsShowDetail
        }
        private set isShow(value: boolean) {
            state.setIsShowDetail(value)
        }

        get selectJob(): IJob{
            return state.getJobDetail
        }

        // 金額表示
        get price(): string{
            if(this.selectJob.price == null) return ''
            return (this.selectJob.price).toLocaleString() + '円 ～'
        }

        // 閉じる際に実行する
        close_modal(): void{
            state.closeDetail()
            this.entry = {full_name: '', self_pr: '', tel: '', emai: ''};
        }

        // 仕事登録
        job_entry(){
            window.axios.post('/front/save/entry', this.entry).then(response => {
                this.close_modal()
            }).catch(error => {
                let request_errors = error.response.data.errors;
                this.errors = (this as any).apply_request_errors(this.errors, request_errors);
            });
        }
    }
</script>
