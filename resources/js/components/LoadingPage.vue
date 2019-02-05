<template>
    <div class="loading-page" v-if="show">
        <h3>الرجاء الانتظار</h3>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                show: false
            }
        },
        methods: {
            onLoadingPage(param=false){
                this.show = param
            }
        },
        mounted() {
            this.$parent.$on('LoadingPage', this.onLoadingPage)
        }
    }
</script>

<style scoped lang="scss">
.loading-page{
    position: fixed; 
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: #000;
    opacity: .7;
    z-index: 999999999;
    text-align: center !important;
    h3{color: #fff; padding-top: 50px;}    
}
</style>