<template>
    <div class="xxx">
        <table class="table table-striped table-dark table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">المادة</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الافرادي</th>
                    <th scope="col">الاجمالي</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item,i in records" :key="i">
                    <th scope="row">{{i+1}} <button class="btn btn-sm btn-danger deleteRec" @click="deleteRec(item.id, item.mat)">X</button></th>
                    <td><input type="text" v-model="records[i].mat" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                    <td><input type="number" v-model.number="records[i].qty" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                    <td><input type="number" v-model.number="records[i].single" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                    <td><input type="number" v-model.number="records[i].total" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                </tr>
                <tr>
                    <th scope="row">{{records.length+1}}</th>
                    <td><input type="text" v-model="newREC.mat" class="form-control col-sm-9" @keyup.enter="addRec(0)" ref="firstInput"></td>
                    <td><input type="number" v-model.number="newREC.qty" class="form-control col-sm-9" @keyup.enter="addRec(0)"></td>
                    <td><input type="number" v-model.number="newREC.single" class="form-control col-sm-9" @keyup.enter="addRec(0)"></td>
                    <td><input type="number" v-model.number="compTotal" class="form-control col-sm-9" @keyup.enter="addRec(0)"></td>
                </tr> 
            </tbody>
        </table>
    </div>
</template>

<script>
import REC from '../models/Record.class';
export default {
        // props: ['value'],
        data(){
            return {
                newREC: new REC(),
                records: []
            }
        },
        methods: {
            addRec(i){ 
                if(!(this.newREC.mat=='' || +this.newREC.qty==0 || +this.newREC.single==0)){
                    this.newREC.total = this.compTotal
                    this.records.push(this.newREC)
                    this.newREC = new REC()
                    this.$refs.firstInput.focus()
                    this.$emit('recordsChanged', this.records)
                } 
            },
            clear(){
                this.records = []; console.log("recoreds cleared !"); 
                this.$emit('recordsChanged', this.records)
            }, 
            deleteRec(recID, recMAT){
                if(confirm('هل أنت متأكد أنك تريد حذف المادة؟')){ 
                    if(recID){
                            this.records = this.records.filter(el => el.id != recID)
                            this.$emit('recordsChanged', this.records)
                            this.$emit('RecordDeleted', recID)
                    }else{
                        this.records = this.records.filter(el => el.mat != recMAT)
                        this.$emit('recordsChanged', this.records)
                    }
                }
            }
        },
        computed: {
            compTotal: {
                get: function() { return this.newREC.single * this.newREC.qty },
                set: function(value) { this.newREC.total = value },
            },
        },
        watch: {
            // if the values are negative
            newREC: {
                handler: function(newValue) {
                    if(newValue.qty < 0){ 
                        this.newREC.qty = 0
                    }
                    if(newValue.single < 0){ 
                        this.newREC.single = 0
                    }
                    if(newValue.total < 0){ 
                        this.newREC.total = 0
                    }
                }, deep: true
            }
        },
        created() {
            this.$parent.$on('ClearInvoice', this.clear)
            this.$parent.$on('SubmitInvoice', this.clear)
            this.$parent.$on("gotRecords", (data) => { this.records = data; });
        }
    }
</script>

<style lang="scss" scoped>
table {
    tr {
        &:hover{
            .deleteRec{opacity: 1;}
        }
        .deleteRec{ float: left; padding: 1 6px; opacity: 0;  }
        td {
        padding: 0;
        height: 20px !important;
        input.form-control {
            background: transparent;
            border: 0;
            border-radius: 0;
            max-width: unset;
            width: 100%;
            color: #fff;
            padding: 0px 5px;
            line-height: 20px;
            height: 31px;
        }
        }
    }
}
</style>