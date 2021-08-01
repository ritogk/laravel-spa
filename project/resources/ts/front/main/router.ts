import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// コンポーネント
import job from './components/job/Board.vue';
import category from './components/category/Board.vue';
import login from './components/login/Board.vue';
import register from './components/register/Board.vue';

const router = new VueRouter({
    mode: "hash",
    routes: [
        // ログイン
        {
            path: "/spa/login",
            name: "login",
            component: login,
            props: true
        },
        // 新規登録
        {
            path: "/spa/register",
            name: "register",
            component: register,
            props: true
        },
        // トップ
        {
            path: "*",
            name: "category",
            component: category,
            props: true
        },
        // メイン
        {
            path: "/spa/job",
            name: "job",
            component: job,
            props: true,
        },
    ]
});

// export default 【モジュール名】
export default router;
