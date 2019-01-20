<template>
    <div class="containerX">
        <div class="tab-content" id="v-pills-tabContent">
            <div id="invoiceRecords" class="tab-pane fade show active" role="tabpanel">
                <div class="row form-group">
                    <div class="col-sm-6 px-0">
                        <div class="row form-group my-0">
                            <label class="col-sm-2 d-flex">العميل</label>
                            <input type="text" v-model="invoice.client_id" id="" class="form-control col-sm-10" placeholder="أدخل قيمة...">
                        </div>
                        <div class="row form-group my-0">
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">العملة</label>
                                    <select v-model="invoice.currency_id" class="form-control col-md-8" @change="selectCurr()">
                                        <option v-for="curr,i in currencies" :value="curr.id" :key="i">{{curr.title}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">التعادل</label>
                                    <input type="text" v-model="selectedCurrency.buy" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group my-0">
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">التاريخ</label>
                                    <input type="date" v-model="invoice.NDate" value="2018-09-29" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">الدفع</label>
                                    <select v-model="invoice.payment_id" id="" class="form-control col-md-8">
                                        <option v-for="val,i in pay" :value="val.id" :key="i">{{val.title}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 px-0">
                        <div class="row form-group my-0">
                            <label class="col-sm-4 d-flex">الرقم التسلسلي</label>
                            <input type="text" v-model="invoice.serial" id="" class="form-control col-sm-8" placeholder="أدخل قيمة..." @keyup.enter="readInvoice()">
                        </div>
                        <div class="row form-group my-00">
                            <label class="col-sm-4 d-flex">المستودع</label>
                            <input type="text" v-model="invoice.warehouse_id" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                        <div class="row form-group my-00">
                            <label class="col-sm-4 d-flex">حساب العميل</label>
                            <input type="text" v-model="invoice.client_acc" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                    </div>
                </div>

                <div class="row form-group mb-4">
                    <label class="col-sm-1 d-flex">البيان</label>
                    <input type="text" v-model="invoice.desc" id="" class="form-control col-sm-11" placeholder="أدخل قيمة...">
                </div>
                <!--------------- RECORDS ---------------->
                <records @canSaveInvoice="OnCanSave"></records>
            </div>

            <div id="invoiceDetails" class="tab-pane fade" role="tabpanel">
                <h1>حقول الفاتورة</h1>
            </div>
        </div>

        <ul class="nav nav-pills nav-fill TABS-bottom" role="tablist">
            <li class="nav-item">
                <button class="nav-link btn btn-light active px-5" id="invoiceRecords" data-toggle="pill" role="tab" href="#invoiceRecords" @click="tabClicked">الفاتورة</button>
            </li>
            <li class="nav-item">
                <button class="nav-link btn btn-light px-5" id="invoiceDetails" data-toggle="pill" role="tab" href="#invoiceDetails" @click="tabClicked">المزيد</button>
            </li>
            <li class="nav-item">
                <button class="nav-link btn btn-success px-5" id="invoiceSave" @click="submitInvoice()" :disabled="!canSave">حفظ</button>
            </li>
            <li class="nav-item">
                <button class="nav-link btn btn-dark px-5" id="invoiceClear" @click="clearInvoice()" :disabled="!canSave">حذف</button>
            </li>
        </ul>
    </div>
</template>

<script>
    class Invoice {
        constructor(base_id=0, profile_id=0, id=0, serial='', payment_id=0, currency_id=0, title='', desc='',  client_acc=0, NType=1, NDate='', ext_num='', int_num='', sum=0, remaining=0, client_id=0, warehouse_id=0, records=[]) {
            this.id = id;
            this.serial = serial;
            this.payment_id = payment_id;
            this.currency_id = currency_id;
            this.title = title;
            this.desc = desc;
            this.client_acc = client_acc;
            this.NType = NType;
            this.NDate = NDate;
            this.ext_num = ext_num;
            this.int_num = int_num;
            this.sum = sum;
            this.remaining = remaining;
            this.client_id = client_id;
            this.warehouse_id = warehouse_id;
            this.base_id = base_id;
            this.profile_id = profile_id;
            this.records = records;
        }
    }
    export default {
        props: ['currencies', 'pay', 'base', 'profile'],
        data(){
            return {
                invoice: new Invoice(this.base, this.profile),
                selectedCurrency: {buy: ''},
                loading: false,
                canSave: false,
                // saved: false
            }
        },
        methods: {
            tabClicked(){ // JQuery tab funcionality 
                $(this.$el).tab('show')
            },
            selectCurr(curr){
                this.selectedCurrency = curr;
            },
            formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');
            },
            clearInvoice(){
                if(confirm('هل أنت متأكد من أنك تريد حذف الفاتورة؟')){
                    this.$emit('ClearInvoice')
                    this.init()
                    this.Msg.success({"title": "تم بنجاح!", "message": "حذف الفاتورة"})
                }
            },
            submitInvoice(){
                // if(!this.saved || true){
                    this.invoice.records = this.$children[0]._data.records
                    Store.save('/invoices', this.invoice)
                        .then(resp => {
                            console.log(resp)
                            this.$emit('SubmitInvoice')
                            this.init()
                            // this.saved = true
                            this.Msg.success({"title": "تم بنجاح!", "message": "حفظ الفاتورة"})
                        })
                        .catch(error => {
                            this.Msg.error({"title": "error!", "message": error.message}) 
                            console.log("error", error)
                        })
                // }else{
                    // do something else
                // }
            },
            init(){
                this.invoice = new Invoice(this.base, this.profile); console.log("invoice cleared!");
                this.invoice.currency_id = this.currencies.find(function(el){ return true; }).id;
                this.invoice.payment_id = this.pay.find(function(el){ return true; }).id;
                this.invoice.NDate = this.formatDate(Date.now())
                Store.getToken()
            },
            OnCanSave(val){ console.log("can save invoice", val);
                this.canSave = val
            },
            readInvoice(){
                if(!this.canSave || confirm('هل تريد قراءة الفاتورة؟ سوف تخسر البيانات غير المحفوظة')){
                    Store.get('/invoices') //?ser='+this.invoice.serial
                        .then(resp => {
                            console.log(resp)
                        })
                        .catch(error => {
                            this.Msg.error({"title": "حدث خطأ!", "message": error.message}) 
                            console.log("error", error)
                        })
                }
            }
        },        
        watch: {
            invoice: { 
                handler: function(newValue) { 
                    this.selectedCurrency = this.currencies.find(function(el){ 
                        return el.id == newValue.currency_id;
                    });
                }, deep: true
            }
        },
        mounted() {
            console.log('Component <invoice-selling> mounted.')
            this.init()
            console.log("axios.defaults.headers.common", axios.defaults.headers.common)
                    axios.get('/api/user') //?ser='+this.invoice.serial
                        .then(resp => {
                            console.log(resp)
                        })
                        .catch(error => {
                            this.Msg.error({"title": "حدث خطأ!", "message": error.message}) 
                            console.log("error", error)
                        })
        }
    }
</script>

<style scoped>
.tab-content .tab-pane{min-height: 270px;}
</style>