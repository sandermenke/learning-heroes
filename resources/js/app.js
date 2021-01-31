import Vue from 'vue'
import MailsList from "./components/MailsList"

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: { MailsList }
});
