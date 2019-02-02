<template>
    <div class="containerX">
        <div class="tab-content" id="v-pills-tabContent">
            <div id="InvoiceSelling" class="tab-pane fade show active" role="tabpanel">
                <div class="row form-group my-0">
                    <div class="col-sm-6 px-0">
                        <div class="row form-group my-0" id="client">
                            <label class="col-sm-2 d-flex">العميل</label> 
                            <div class="Select2 col-sm-10 px-0"> 
                                <select2 v-model="selected.client" :options="options.clients" track-by="id" label="name" :show-labels="false" placeholder="..."  
                                        :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        @search-change="onChangeClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <div class="row form-group my-0">
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">العملة</label> 
                                    <div class="Select2 col-sm-8 px-0">
                                        <select2 v-model="selected.currency" :options="currencies" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                            :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                            :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">التعادل</label>
                                    <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
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
                                    <div class="Select2 col-sm-8 px-0">
                                        <select2 v-model="selected.payment" :options="pay" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                            :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false"
                                            :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 px-0">
                        <div class="row form-group my-0">
                            <label class="col-sm-4 d-flex">الرقم التسلسلي</label>
                            <!-- <input type="text" v-model="invoice.serial" id="" class="form-control col-sm-8" placeholder="أدخل قيمة..." @keyup.enter="readInvoice()"> -->
                            <div class="input-group col-sm-8 align-self-center">
                                <div class="input-group-prepend order-3">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon1">></button>
                                </div>
                                <input type="text" v-model="invoice.serial" class="form-control order-2" placeholder="..." @keyup.enter="readInvoice()">
                                <div class="input-group-append order-1">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon1"><</button>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group my-00">
                            <label class="col-sm-4 d-flex">المستودع</label>
                            <!-- <input type="text" v-model="invoice.warehouse_id" id="" class="form-control col-sm-8" placeholder="أدخل قيمة..."> -->
                            <div class="Select2 col-sm-8 px-0"> 
                                <select2 v-model="selected.warehouse" :options="options.warehouses" track-by="id" label="title" :show-labels="false" placeholder="..."  
                                        :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        :loading="loading.warehouses" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <div class="row form-group my-00">
                            <label class="col-sm-4 d-flex">حساب العميل</label>
                            <input type="text" v-model="invoice.client_acc" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                    </div>
                </div>

                <div class="row form-group mb-3 mt-0">
                    <label class="col-sm-1 d-flex">البيان</label>
                    <input type="text" v-model="invoice.desc" id="" class="form-control col-sm-11" placeholder="أدخل قيمة...">
                </div>
                <!--------------- RECORDS ---------------->
                <records @hasRecords="OnCanSave" @recordsChange="onRecordsChange"></records>
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
            <li class="nav-item" v-if="!settings.edit">
                <button class="nav-link btn btn-success px-5" id="invoiceSave" @click="submitInvoice()" :disabled="!settings.canSave">حفظ</button>
            </li>
            <li class="nav-item" v-if="settings.edit">
                <button class="nav-link btn btn-info px-5" id="invoicesettings.edit" @click="editInvoice()">تعديل</button>
            </li>
            <li class="nav-item">
                <button class="nav-link btn btn-dark px-5" id="invoiceClear" @click="clearInvoice()" :disabled="!settings.canSave">حذف</button>
            </li>
        </ul>
    </div>
</template>

<script>
import Invoice from '../Invoice.class';
// import Select2 from 'v-select2-component';
export default {
    props: ["profile", "currencies", "pay"],
    data() {
        return {
            invoice: new Invoice(this.profile),
            selected: {currency: { buy: "" }, client: null, payment: null, warehouse: null},
            settings: {canSave: false, edit: false, saved: false, rtl: true},
            options: {clients: [] , warehouses: []},    
            loading: {page: false, clients: false},   
        }
    },
    methods: {
        tabClicked() { /*  JQuery tab funcionality */ $(this.$el).tab("show") },       
        clearInvoice() {
            if (confirm("هل أنت متأكد من أنك تريد حذف الفاتورة؟")) {
                this.$emit("ClearInvoice")
                this.init()
                this.Msg.success({ title: "تم بنجاح!", message: "حذف الفاتورة" })
            }
        },
        submitInvoice() {
            axios.post(`/api/invoices/${this.profile.id}`, this.invoice)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitInvoice")
                    this.init()
                    // this.settings.saved = true
                    this.Msg.success({ title: "تم بنجاح!", message: "حفظ الفاتورة" })
                })
                .catch(error => {
                    this.Msg.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء حفظ الفاتورة" })
                    console.log("error", error)
                })
        },
        init(data = null) { 
            if (data == null) {
                this.invoice = new Invoice(this.profile) 
                this.invoice.NDate = Store.formatDate(Date.now())
                this.invoice.NType = +Store.urlParam('type')
                this.invoice.client_id = 0
                this.options.warehouses = this.profile._warehouses
                this.selected.client = null
                this.selected.warehouse = null
                this.selected.currency = this.currencies.length == 0 ? null : this.currencies[0]
                this.selected.payment = this.pay.length == 0 ? null : this.pay[0]
                this.settings.canSave = false
                this.settings.edit = false
            } else {
                var inv = new Invoice(this.profile)
                inv.fill(data)
                this.invoice = inv ;  //console.log("inv", this.invoice)
                this.settings.canSave = true
                this.settings.edit = true
                this.$emit('gotRecords', data._records)
                this.invoice.records = data._records
                if(this.options.clients.length == 0){
                    this.search('getClientsList', 'clients', '', () => { 
                        this.selected.client = typeof data._clients[0] != 'undefined'? data._clients[0] : null
                    })
                }else{
                    this.selected.client = typeof data._clients[0] != 'undefined'? data._clients[0] : null
                }
                this.selected.warehouse = typeof data._warehouses[0] != 'undefined'? data._warehouses[0] : null
                this.selected.currency = this.currencies.find(el => el.id == data._currency.id)              
                this.selected.payment = this.pay.find(el => el.id == data._payment.id)               
            }
        },
        OnCanSave(val) {
            console.log("can save invoice", val)
            this.settings.canSave = val
        },
        readInvoice() { // after reading, settings.edit mode will become active        
            if ( !this.settings.canSave || confirm("هل تريد قراءة الفاتورة؟ سوف تخسر البيانات غير المحفوظة") ) {
                axios.get(`/api/invoices/${this.profile.id}/findBySerial?serial=${this.invoice.serial}&NType=${Store.urlParam('type')}`) //?ser='+this.invoice.serial
                    .then(resp => { console.log("resp", resp);            console.log("resp.data.data[0]", resp.data.data[0])
                        switch (resp.status) {
                            case 200:
                                if (Array.isArray(resp.data.data))
                                    this.init(resp.data.data[0])
                                else if (resp.data.data != null) 
                                    this.init(resp.data.data)
                                    this.Msg.success({title: "نجاح الطلب", message: resp.data.msg})
                                break
                            case 204:
                                this.Msg.info({title: "لا يوجد فاتورة", message: "لم يتم ايجاد فاتورة"})
                                break
                            default:
                                this.Msg.error({title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                                break
                        }
                    })
                    .catch(error => {
                        this.Msg.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                        console.log("error", error)
                    })
            }
        },
        editInvoice() {
            axios.put(`/api/invoices/${this.profile.id}`, this.invoice)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitInvoice")
                    this.init()
                    // this.settings.saved = true
                    this.Msg.success({ title: "تم بنجاح!", message: "تعديل الفاتورة" })
                })
                .catch(error => {
                    this.Msg.error({title: "حدث خطأ!", message: "حدث خطأ أثناء تعديل الفاتورة"})
                    console.log("error", error)
                })
        },    
        search: _.debounce(function(filterMethod, entity, query='', xxx){ 
            this.loading[entity] = true                 
            // query = this.invoice.client_id.replace(' ', ',')
            axios.get(`/api/invoices/${this.profile.id}/${filterMethod}?search=${query}`) 
                .then(resp => { //console.log("resp", resp);            //console.log("resp.data.data[0]", resp.data.data[0])
                    switch (resp.status) {
                        case 200: 
                            this.options[entity] = resp.data.data
                            break
                        case 204:
                            this.Msg.info({title: "لا يوجد نتيجة", message: "لا يوجد نتائج مطابقة للبحث"})
                            break
                        default:
                            this.Msg.error({title: "حدث خطأ!", message: " خطأ أثناء البحث " })
                            break
                    }
                })
                .catch(error => {
                    this.Msg.error({ title: "حدث خطأ!", message: " خطأ أثناء البحث " })
                    console.log("error", error)
                })
                .then(() => { // always executed
                    this.loading[entity] = false
                })
                .then(xxx)
                
            }, 300),
        
        onChangeClient(data){ // fetch data
            if(this.options.clients.length == 0 && data != ''){
                this.search('getClientsList', 'clients')
            }
        },
        onRecordsChange(data){
            this.invoice.records = data
        } 
    },
    watch: {
        selected: {
            handler: function(newValue) { 
                var data = JSON.parse(JSON.stringify( newValue )) 
                console.log("data",data)

                if(data.currency){ 
                    var currency = this.currencies.find(function(el) { return el.id == data.currency.id })
                    this.invoice.currency_id = currency.id 
                    console.log("selected.currency",currency)
                }
                if(data.client){ 
                    this.invoice.client_id = +{...this.options.clients.find(function(el) { return el.id == data.client.id })}.id
                    console.log("selected.client",client)
                }
                if(data.payment){ 
                    this.invoice.payment_id = +{...this.pay.find(function(el) { return el.id == data.payment.id })}.id
                    console.log("selected.payment",this.selected.payment)
                }
                if(data.warehouse){ 
                    this.invoice.warehouse_id = +{...this.options.warehouses.find(function(el) { return el.id == data.warehouse.id })}.id
                    console.log("selected.warehouse",this.selected.warehouse)
                }
            },
            deep: true
        }
    },
    mounted() {        
        console.log("Component <invoice-selling> mounted.")
        this.init()        
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped lang="scss">
/******************** INPUT GROUP ********************/
// .input-group{ 
//     .input-group-prepend .input-group-text{
//         border-radius: 0 0.25rem 0.25rem 0 !important; //border-color: red !important;
//     }
//     input{
//         border-radius: 0.25rem 0 0 0.25rem !important;
//     }
// }
</style>