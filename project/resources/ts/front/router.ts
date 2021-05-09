import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// コンポーネント
import main from './components/main/Board.vue';
import top from './components/top/Board.vue';

const router = new VueRouter({
    mode: "hash",
    routes: [
        // トップ
        {
            path: "*",
            name: "top",
            component: top,
            props: true
        },
        // メイン
        {
            path: "/main",
            name: "main",
            component: main,
            props: true,
        },
    ]
});

// export default 【モジュール名】
export default router;
