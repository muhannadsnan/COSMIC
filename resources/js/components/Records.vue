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
                <tr v-for="item,i in records">
                    <th scope="row">{{i+1}}</th>
                    <td><input type="text" v-model="records[i].mat" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                    <td><input type="number" v-model.number="records[i].qty" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                    <td><input type="number" v-model.number="records[i].single" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                    <td><input type="number" v-model.number="records[i].total" class="form-control col-sm-9" @keyup.enter="addRec(i)"></td>
                </tr>
                <tr>
                    <th scope="row">{{records.length+1}}</th>
                    <td><input type="text" v-model="newRECS[0].mat" class="form-control col-sm-9" @keyup.enter="addRec(0)" ref="firstInput"></td>
                    <td><input type="number" v-model.number="newRECS[0].qty" class="form-control col-sm-9" @keyup.enter="addRec(0)"></td>
                    <td><input type="number" v-model.number="newRECS[0].single" class="form-control col-sm-9" @keyup.enter="addRec(0)"></td>
                    <td><input type="number" v-model.number="newRECS[0].total" class="form-control col-sm-9" @keyup.enter="addRec(0)"></td>
                </tr>
                <!-- <tr>
                    <th scope="row">{{records.length+2}}</th>
                    <td><input type="text" v-model="newRECS[1].mat" class="form-control col-sm-9" @keyup.enter="addRec(1)"></td>
                    <td><input type="number" v-model="newRECS[1].qty" class="form-control col-sm-9" @keyup.enter="addRec(1)"></td>
                    <td><input type="number" v-model="newRECS[1].single" class="form-control col-sm-9" @keyup.enter="addRec(1)"></td>
                    <td><input type="number" v-model="newRECS[1].total" class="form-control col-sm-9" @keyup.enter="addRec(1)"></td>
                </tr>
                <tr>
                    <th scope="row">{{records.length+3}}</th>
                    <td><input type="text" v-model="newRECS[2].mat" class="form-control col-sm-9" @keyup.enter="addRec(2)"></td>
                    <td><input type="number" v-model="newRECS[2].qty" class="form-control col-sm-9" @keyup.enter="addRec(2)"></td>
                    <td><input type="number" v-model="newRECS[2].single" class="form-control col-sm-9" @keyup.enter="addRec(2)"></td>
                    <td><input type="number" v-model="newRECS[2].total" class="form-control col-sm-9" @keyup.enter="addRec(2)"></td>
                </tr>
                <tr>
                    <th scope="row">{{records.length+4}}</th>
                    <td><input type="text" v-model="newRECS[3].mat" class="form-control col-sm-9" @keyup.enter="addRec(3)"></td>
                    <td><input type="number" v-model="newRECS[3].qty" class="form-control col-sm-9" @keyup.enter="addRec(3)"></td>
                    <td><input type="number" v-model="newRECS[3].single" class="form-control col-sm-9" @keyup.enter="addRec(3)"></td>
                    <td><input type="number" v-model="newRECS[3].total" class="form-control col-sm-9" @keyup.enter="addRec(3)"></td>
                </tr>
                <tr>
                    <th scope="row">{{records.length+5}}</th>
                    <td><input type="text" v-model="newRECS[4].mat" class="form-control col-sm-9" @keyup.enter="addRec(4)"></td>
                    <td><input type="number" v-model="newRECS[4].qty" class="form-control col-sm-9" @keyup.enter="addRec(4)"></td>
                    <td><input type="number" v-model="newRECS[4].single" class="form-control col-sm-9" @keyup.enter="addRec(4)"></td>
                    <td><input type="number" v-model="newRECS[4].total" class="form-control col-sm-9" @keyup.enter="addRec(4)"></td>
                </tr> -->
            </tbody>
        </table>
    </div>
</template>

<script>
    class REC {
        constructor(mat='', qty=0, single=0, total=0) {
            this.mat = mat;
            this.qty = qty;
            this.single = single;
            this.total = total;
        }
    }
    export default {
        props: ['value'],
        data(){
            return {
                newRECS: [
                    new REC(), new REC(), new REC(), new REC(), new REC(), 
                ],
                records: []
            }
        },
        methods: {
            addRec(i){ 
                if(!(this.newRECS[0].mat=='' || +this.newRECS[0].qty==0 || +this.newRECS[0].single==0)){
                    this.records.push(this.newRECS[0]);
                    this.newRECS[0] = new REC();
                    this.$refs.firstInput.focus();
                }
                this.checkCanSaveInvoice()
            },
            clear(){
                this.records = []; console.log("recoreds cleared !");
                this.checkCanSaveInvoice()
            },
            checkCanSaveInvoice(){
                if(this.records.length > 0){
                    this.$emit('canSaveInvoice', true)
                }else{
                    this.$emit('canSaveInvoice', false)
                }
            }
        },
        computed: {
            newTotal(){
                return this.newREC1.single*this.newREC1.qty;
            }
        },
        watch: {
            // if the values are negative
            newRECS: {
                handler: function(newValue) {
                    if(newValue[0].qty < 0){ 
                        this.newRECS[0].qty = 0
                    }
                    if(newValue[0].single < 0){ 
                        this.newRECS[0].single = 0
                    }
                    if(newValue[0].total < 0){ 
                        this.newRECS[0].total = 0
                    }
                }, deep: true
            }
        },
        created() {
            this.$parent.$on('ClearInvoice', this.clear)
            this.$parent.$on('SubmitInvoice', this.clear)
        }
    }
</script>

<style lang="scss" scoped>
table{
    tr{
        td{
            padding: 0; height: 20px !important;
            input.form-control{
                background: transparent; border: 0; border-radius: 0; max-width: unset; width: 100%; color: #fff; padding: 0px 5px; line-height: 20px; height: 31px;
            } 
        }
    }
    
}  
</style>