require('./bootstrap');
window.Vue = require('vue');
window.Store = require('./store');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('records', require('./components/Records.vue'));
Vue.component('invoice-selling', require('./components/InvoiceSelling.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            msg: "Welcome kong!",
        }
    },
    methods: {
        xxx(){

        }
    },
    mounted() {
        console.log(this.msg);
    }
});
