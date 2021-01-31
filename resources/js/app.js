import App from "./components/App"
import Vue from "vue"
import VueRouter from "vue-router"
import MailsList from "./components/MailsList"
import SendMail from "./components/SendMail"

require('./bootstrap');

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: MailsList,
        },
        {
            path: '/mail/send',
            name: 'send-mail',
            component: SendMail,
        }
    ],
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
})
