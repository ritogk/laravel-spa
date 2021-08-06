<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="primary ">
            <b-navbar-brand href="/">求人検索</b-navbar-brand>
            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
                <b-navbar-nav>
                    <b-nav-item v-if="loginUser.status" @click="logout()">ログアウト</b-nav-item>
                    <b-nav-item v-if="loginUser.status"><span v-text="loginUser.user.name"></span></b-nav-item>
                    <b-nav-item v-if="!loginUser.status" @click="login()">ログイン</b-nav-item>
                    <b-nav-item v-if="!loginUser.status" @click="register()">会員登録</b-nav-item>
                    <b-nav-item href="/admin">管理画面</b-nav-item>
                </b-navbar-nav>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // モデル
    import IUser from "@root/models/IUser";
    // 状態管理
    import { state as stateUser} from "@root/front/main/state/user";

    @Component
    export default class Header extends Vue {
        get loginUser(): IUser{
            return stateUser.loginUser
        }

        // ログイン画面
        login() {
            this.$router.push({ name: 'login'})
        }

        // ログアウト
        logout() {
            window.axios.post('/api/auth/front/logout').then(response => {
                stateUser.init()
            }).catch(error => {});
        }

        // 会員登録画面
        register() {
            this.$router.push({ name: 'register'})
        }
    }
</script>
