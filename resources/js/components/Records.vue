<template>
    <div class="xxx">
        <div class="row form-group d-flex justify-content-around">
            <div class="col-sm-6 col-md-4 px-0">
                <div class="row form-group mb-0">
                    <label class="col-sm-3 d-flex">المادة</label>
                    <input type="text" v-model="newREC.mat" class="form-control col-sm-9" placeholder="أدخل قيمة..."  @keyup.enter="addRec()">
                </div>
            </div>
            <div class="col-sm-6 col-md-2 px-0">
                <div class="row form-group mb-0">
                    <label class="col-sm-3 d-flex">الكمية</label>
                    <input type="number" v-model="newREC.qty" class="form-control col-sm-9" placeholder="أدخل قيمة..." @keyup.enter="addRec()">
                </div>
            </div>
            <div class="col-sm-6 col-md-2 px-0">
                <div class="row form-group mb-0">
                    <label class="col-sm-3 d-flex">الافرادي</label>
                    <input type="number" v-model="newREC.single" class="form-control col-sm-9" placeholder="أدخل قيمة..." @keyup.enter="addRec()">
                </div>
            </div>
            <div class="col-sm-6 col-md-2 px-0">
                <div class="row form-group mb-0 mr-auto">
                    <label class="col-sm-3 d-flex">الاجمالي</label>
                    <input type="number" v-model="newTotal" class="form-control col-sm-9" placeholder="أدخل قيمة..." disabled="disabled" @keyup.enter="addRec()">
                </div>
            </div>
        </div>
        <div class="form-group d-flex">
            <button class="btn btn-primary align-self-start" @click="addRec()" :disabled="newREC.mat=='' || newREC.qty==0 || newREC.single==0">اضافة</button>
            <div class="flex-grow-1 px-3 pt-5" v-if="records.length > 0">
                <h4 class="align-self-start">المواد ({{records.length}})</h4>
                <ul>
                    <li v-for="item,i in records">
                        {{item.mat}} : {{item.qty}} × {{item.single}} = {{item.qty*item.single}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                newREC: {mat: '', qty: 0, single: 0, total: 0},
                records: []
            }
        },
        methods: {
            addRec(){
                if(!(this.newREC.mat=='' || this.newREC.qty==0 || this.newREC.single==0)){
                    this.records.unshift(this.newREC);
                    this.newREC = {mat: '', qty: 0, single: 0, total: 0};
                }
            },
            clear(){
                alert('clear');
            }
        },
        computed: {
            newTotal(){
                return this.newREC.single*this.newREC.qty;
            }
        },
        watch: {
            // if the values are negative
        },
        created() {
            this.$parent.$on('ClearInvoice', this.clear)
        }
    }
</script>