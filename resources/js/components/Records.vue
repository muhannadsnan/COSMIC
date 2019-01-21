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
class REC {
  constructor(mat = "", qty = 0, single = 0, total = 0) {
    this.mat = mat;
    this.qty = qty;
    this.single = single;
    this.total = total;
  }
}
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
                }
                this.enableSaveInvoice()
            },
            clear(){
                this.records = []; console.log("recoreds cleared !");
                this.enableSaveInvoice()
            },
            enableSaveInvoice(){
                if(this.records.length > 0){
                    this.$emit('hasRecords', true)
                }
            }
        },
        computed: {
            compTotal(){ return this.newREC.single*this.newREC.qty },
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