import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// コンポーネント
import main from './components/main/Board.vue';
import top from './components/Top.vue';

// not found
import page_not_found from "@root/admin/components/utility/page_not_found.vue";

const router = new VueRouter({
    mode: "hash",
    routes: [
        // トップ
        {
            path: "/top",
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
        // not found
        {
            path: '*',
            name: 'page_not_found',
            component: page_not_found
        }
    ]
});

// export default 【モジュール名】
export default router;
