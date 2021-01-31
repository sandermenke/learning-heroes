import App from "./components/App"
import Vue from 'vue'

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: { App }
});
