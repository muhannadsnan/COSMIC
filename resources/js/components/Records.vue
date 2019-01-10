<template>
    <div class="row form-group">
        <div class="col-sm-6 px-0">
            <div class="row form-group mb-0">
                <label class="col-sm-4 d-flex">المادة</label>
                <input type="text" v-model="newREC.mat" class="form-control col-sm-8" placeholder="enter value...">
            </div>
        </div>
        <div class="col-sm-6 px-0">
            <div class="row form-group mb-0">
                <label class="col-sm-4 d-flex">الكمية</label>
                <input type="number" v-model="newREC.qty" class="form-control col-sm-8" placeholder="enter value...">
            </div>
        </div>
        <div class="col-sm-6 px-0">
            <div class="row form-group mb-0">
                <label class="col-sm-4 d-flex">الافرادي</label>
                <input type="number" v-model="newREC.single" class="form-control col-sm-8" placeholder="enter value...">
            </div>
        </div>
        <div class="col-sm-6 px-0">
            <div class="row form-group mb-0">
                <label class="col-sm-4 d-flex">الاجمالي</label>
                <input type="number" v-model="newREC.total" class="form-control col-sm-8" placeholder="enter value...">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" @click="addRec()" :disabled="newREC.mat=='' || newREC.qty==0 || newREC.single==0 || newREC.total==0">اضافة</button>
            <div v-if="records.length > 0">
                <h4>المواد</h4>
                <ul>
                    <li v-for="item in records">
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
                this.records.unshift(this.newREC);
                this.newREC = {mat: '', qty: 0, single: 0, total: 0};
            }
        },
        mounted() {
            
        }
    }
</script>