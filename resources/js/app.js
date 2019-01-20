require('./bootstrap');

Vue.component('records', require('./components/Records.vue'));
Vue.component('invoice-selling', require('./components/InvoiceSelling.vue'));

Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            msg: "Welcome kong!",
        }
    },
    methods: {
        xxx() {

        }
    },
    mounted() {
        // console.log("Store.state", Store.state);
        // Msg.success({"title": "aaa", "message": "bbbb"})
    }
});
