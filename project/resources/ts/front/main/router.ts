import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// コンポーネント
import job from './components/job/Board.vue';
import category from './components/category/Board.vue';
import login from './components/login/Board.vue';

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
