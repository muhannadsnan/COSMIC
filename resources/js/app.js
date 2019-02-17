require('./bootstrap')

Vue.component('records', require('./components/Records.vue'))
Vue.component('invoice-selling', require('./components/InvoiceSelling.vue'))
Vue.component('account', require('./components/Account.vue'))
Vue.component('loading-page', require('./components/LoadingPage.vue'))

Vue.component('passport-clients', require('./components/passport/Clients.vue'))
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'))
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'))

import Select2 from "vue-multiselect"; Vue.component('Select2', Select2); // dont change - https://vue-multiselect.js.org/

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
        // console.log("Store.state", Store.state)
        // this.$toast.success({"title": "aaa", "message": "bbbb"})
    }
})
