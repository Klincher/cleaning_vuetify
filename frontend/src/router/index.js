import Vue from "vue";
import VueRouter from "vue-router";
import axios from "axios";
import VueAxios from "vue-axios";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
const routes = [
    {
        path: "/",
        name: "Home",
        component: () => import("../pages/Home.vue"),
    },

    {
        path: "/client",
        name: "Client",
        component: () => import("../pages/Client.vue"),
    },
    {
        path: "/admin",
        name: "Admin",
        component: () => import("../pages/Admin.vue"),
    },
];
const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});
export default router;
