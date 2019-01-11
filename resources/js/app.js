require('./bootstrap');


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
        console.log(Store.state);
        this.Msg.success({
            title:'my head',
            message:'my body...'
        })
    }
});
