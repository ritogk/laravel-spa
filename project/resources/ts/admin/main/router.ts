import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// 選考一覧
import entry_index from "./components/entry/index.vue";
// 仕事マスタ
import job_index from "./components/master/job/index.vue";
import job_edit from "./components/master/job/edit.vue";
import job_create from "./components/master/job/create.vue";
// 職種マスタ
import job_category_index from "./components/master/job_category/index.vue";
import job_category_edit from "./components/master/job_category/edit.vue";
import job_category_create from "./components/master/job_category/create.vue";
// メルマガ配信
import news_letter_index from "./components/news_letter/index.vue";
import news_letter_create from "./components/news_letter/create.vue";
import news_letter_edit from "./components/news_letter/edit.vue";
// not found
import page_not_found from "./components/utility/page_not_found.vue";

const router = new VueRouter({
    mode: "hash",
    routes: [
        // 求人一覧
        {
            path: "/spa/entry_index",
            name: "entry_index",
            component: entry_index,
            props: true
        },
        // 仕事マスタ
        {
            path: "/spa/job_index",
            name: "job_index",
            component: job_index,
            props: true
        },
        {
            path: "/spa/job_edit",
            name: "job_edit",
            component: job_edit,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/spa/job_index") {
                    next('/spa/job_index')
                } else {
                    next()
                }
            }
        },
        {
            path: "/spa/job_create",
            name: "job_create",
            component: job_create,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/spa/job_index") {
                    next('/spa/job_index')
                } else {
                    next()
                }
            }
        },
        // 職種マスタ
        {
            path: "/spa/job_category_index",
            name: "job_category_index",
            component: job_category_index,
            props: true
        },
        {
            path: "/spa/job_category_edit",
            name: "job_category_edit",
            component: job_category_edit,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/spa/job_category_index") {
                    next('/spa/job_category_index')
                } else {
                    next()
                }
            }
        },
        {
            path: "/spa/job_category_create",
            name: "job_category_create",
            component: job_category_create,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/spa/job_category_index") {
                    next('/spa/job_category_index')
                } else {
                    next()
                }
            }
        },
        // メルマガ配信
        {
            path: "/spa/news_letter_index",
            name: "news_letter_index",
            component: news_letter_index,
            props: true
        },
        {
            path: "/spa/news_letter_edit",
            name: "news_letter_edit",
            component: news_letter_edit,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/spa/news_letter_index") {
                    next('/spa/news_letter_index')
                } else {
                    next()
                }
            }
        },
        {
            path: "/spa/news_letter_create",
            name: "news_letter_create",
            component: news_letter_create,
            props: true,
            beforeEnter: function (to, from, next) {
                if (from.path !== "/spa/news_letter_index") {
                    next('/spa/news_letter_index')
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
