require('./bootstrap');
window.Vue = require('vue');
window.Store = require('./store');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('Records', require('./components/Records.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            msg: "welcome kong!",
        }
    },
    methods: {

    },
    mounted() {
        console.log(this.msg);
    }
});
