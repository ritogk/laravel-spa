<template>
    <div class="my-3 col-10 mx-auto">
        <b-card-group deck>
            <b-card
                border-variant="info"
                header-bg-variant="primary"
                header-text-variant="white"
                header="会員登録"
                header-tag="header"
                class="mb-3"
                no-body
            >
                <div class="m-3">
                    <div v-text="message" style="color:red"></div>

                    <div class="py-2">
                        <b-form-group
                        label="氏名"
                        :invalid-feedback="errors.name"
                        :state="input_state(errors.name)">
                            <b-form-input
                            id="name"
                            v-model="name"
                            placeholder="フルーネームでお願いします。"
                            :state="input_state(errors.name)"></b-form-input>
                        </b-form-group>
                    </div>

                    <div class="py-2">
                        <b-form-group
                        label="自己PR"
                        :invalid-feedback="errors.self_pr"
                        :state="input_state(errors.self_pr)">
                            <b-form-textarea
                            id="self_pr"
                            v-model="self_pr"
                            rows="3"
                            max-rows="4"
                            placeholder="可能な限り詳しく書いて下さい。">
                            :state="input_state(errors.self_pr)"
                            </b-form-textarea>
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
                            v-model="tel"
                            :state="input_state(errors.email)">
                            </b-form-input>
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
                                v-model="email"
                                :state="input_state(errors.email)">
                            </b-form-input>
                        </b-form-group>
                    </div>

                    <div class="py-2">
                        <b-form-group
                        label="パスワード"
                        :invalid-feedback="errors.password"
                        :state="input_state(errors.password)">
                            <b-form-input
                            id="password"
                            type="password"
                            v-model="password"
                            placeholder="test"
                            :state="input_state(errors.password)"></b-form-input>
                        </b-form-group>
                    </div>

                    <div class="py-2">
                        <b-form-group
                        label="パスワード(確認)"
                        :invalid-feedback="errors.password_confirmation"
                        :state="input_state(errors.password_confirmation)">
                            <b-form-input
                            id="password_confirmation"
                            type="password"
                            v-model="password_confirmation"
                            placeholder="test"
                            :state="input_state(errors.password_confirmation)"></b-form-input>
                        </b-form-group>
                    </div>

                    <div>
                        <b-button block size="lg" variant="primary" @click="login()">会員登録</b-button>
                    </div>
                </div>
            </b-card>
        </b-card-group>
    </div>
</template>

<script lang="ts">
    export interface IErrors{
        name: string
        self_pr: string
        tel: string
        email: string
        password: string
        password_confirmation: string
    }

    import { Vue, Component, Watch } from 'vue-property-decorator';
    // コンポーネント
    import VueLoading from 'vue-loading-template';
    Vue.use(VueLoading, /** options **/)

    @Component
    export default class Register extends Vue {
        name: string = ''
        self_pr: string = ''
        tel: string = ''
        email: string = 'normal@normal.co.jp'
        password: string = 'normal'
        password_confirmation: string = 'normal'

        message: string = ''

        errors: IErrors = {name:'', self_pr:'', tel:'', email:'', password:'', password_confirmation:''};

        // ログイン
        login(): void{
            window.axios.post('/api/auth/front/register',
                {
                    'name': this.name,
                    'self_pr': this.self_pr,
                    'tel': this.tel,
                    'email': this.email,
                    'password': this.password,
                    'password_confirmation': this.password_confirmation,
                }
            ).then(response => {
                //window.location.href = '/'
                debugger
            }).catch(response => {
                debugger
                //this.message = 'メールアドレス又はパスワードが間違っています。'
            })
        }
    }
</script>
