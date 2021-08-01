<template>
    <div class="my-3 col-8 mx-auto">
        <b-card-group deck>
            <b-card
                border-variant="info"
                header-bg-variant="primary"
                header-text-variant="white"
                header="検索"
                header-tag="header"
                class="mb-3"
                no-body
            >
                <div class="m-3">
                    <div v-text="message" style="color:red"></div>
                    <div class="py-2">
                        <label for="exampleInputEmail1">メールアドレス</label>
                        <b-form-input id="email" placeholder="test@test.co.jp" v-model="email"></b-form-input>
                    </div>

                    <div class="py-2">
                        <label for="exampleInputEmail1">パスワード</label>
                        <b-form-input type="password" id="password" placeholder="test" v-model="password"></b-form-input>
                    </div>

                    <div class="py-2" hidden>
                        <b-form-checkbox
                        v-model="remeber"
                        id="checkbox-1"
                        name="checkbox-1">
                        ログイン状態を保存
                        </b-form-checkbox>
                    </div>

                    <div class="py-2">
                        <b-button variant="primary" @click="login()">ログイン</b-button>
                    </div>
                </div>
            </b-card>
        </b-card-group>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // コンポーネント
    import VueLoading from 'vue-loading-template';
    Vue.use(VueLoading, /** options **/)

    @Component
    export default class Login extends Vue {
        email: string = ''
        password: string = ''
        remeber: boolean = false

        message: string = ''

        // ログイン
        login(): void{
            window.axios.post('/api/auth/front/login',
                {
                    'email':this.email,
                    'password':this.password,
                    'remember': this.remeber
                }
            ).then(response => {
                window.location.href = '/admin'
            }).catch(response => {
                this.message = 'メールアドレス又はパスワードが間違っています。'
            })
        }
    }
</script>
