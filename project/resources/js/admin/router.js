import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// 汎用マスタ
import general_index from "./components/master/general/index.vue";
import general_edit from "./components/master/general/edit.vue";
import general_create from "./components/master/general/create.vue";

// not found
import page_not_found from "./components/utility/page_not_found.vue";

const router = new VueRouter({
    mode: "hash",
    routes: [
        // 汎用マスタ
        {
            path: "/general_index",
            name: "general_index",
            component: general_index,
            props: true
        },
        {
            path: "/general_edit",
            name: "general_edit",
            component: general_edit,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/general_index") {
                    next('/general_index')
                } else {
                    next()
                }
            }
        },
        {
            path: "/general_create",
            name: "general_create",
            component: general_create,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/general_index") {
                    next('/general_index')
                } else {
                    next()
                }
            }
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
