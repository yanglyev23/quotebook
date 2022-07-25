import vueRouter from 'vue-router';
import Vue from 'vue';
import Quotes from "./views/Quotes";

Vue.use(vueRouter);

const routes = [
    {
        path: "/",
        component: Quotes
    }
];

export default new vueRouter({
    mode: "history",
    routes
});
