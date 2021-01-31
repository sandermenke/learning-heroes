import App from "./components/App"
import Vue from "vue"
import VueRouter from "vue-router"
import EmailCreate from "./components/EmailCreate"
import EmailList from "./components/EmailList"

require('./bootstrap');

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: EmailList,
        },
        {
            path: '/mail/create',
            name: 'email-create',
            component: EmailCreate,
        }
    ],
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
})
