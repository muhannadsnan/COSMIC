<template>
    <div class="InvoiceSelling d-flex flex-column-reverse">
        <div class="buttons d-sm-flex justify-content-between mt-4"> 
            <button v-if="!settings.editMode" @click="submitInvoice()" class="nav-link col-4 col-md-3 btn btn-success" 
                    id="invoiceSave" :disabled="!changed || !settings.valid">حفظ</button>
            <button v-if="settings.editMode" @click="editInvoice()" class="nav-link col-4 col-md-3 btn btn-info text-white" 
                    id="invoicesettings.editMode" :disabled="!changed || !settings.valid">تعديل</button>
            <button @click="clearInvoice()" class="nav-link col-4 col-md-3 btn btn-dark" 
                    id="invoiceClear" :disabled="!changed && selected.serial == null">جديد</button>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <div id="InvoiceSelling" class="tab-pane fade show active" role="tabpanel">
                <div class="d-sm-flex">
                    <div class="col-sm-6 px-0">
                        <div class="d-sm-flex mb-1" id="client">
                            <label class="col-sm-2 d-sm-flex">العميل</label> 
                            <div class="Select2 col-sm-10 px-0"> 
                                <select2 v-model="selected.client" :options="options.clients" track-by="id" label="name" :show-labels="false" placeholder="..."  
                                        :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        @search-change="onSearchClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <div class="d-sm-flex mb-1">
                            <div class="col-sm-6 px-0">
                                <div class="d-sm-flex mb-0">
                                    <label class="col-sm-4 d-sm-flex">العملة</label> 
                                    <div class="Select2 col-sm-8 px-0">
                                        <select2 v-model="selected.currency" :options="currencies" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                            :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                            :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="d-sm-flex mb-0">
                                    <label class="col-sm-4 d-sm-flex">التعادل</label>
                                    <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                        </div>
                        <div class="d-sm-flex mb-1">
                            <div class="col-sm-6 px-0">
                                <div class="d-sm-flex mb-0">
                                    <label class="col-sm-4 d-sm-flex">التاريخ</label>
                                    <input type="date" v-model="invoice.NDate" value="2018-09-29" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="d-sm-flex mb-0">
                                    <label class="col-sm-4 d-sm-flex">الدفع</label> 
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
                        <div class="d-sm-flex mb-1">
                            <label class="col-sm-4 d-sm-flex">الرقم التسلسلي</label>
                            <div class="input-group col-sm-8 align-self-center">
                                <div class="input-group-prepend order-3">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon1" @click="changeSerial('down')" :disabled="!canDecreaseSerial">-</button>
                                </div>
                                <input type="number" v-model="invoice.serial" class="form-control order-2" :placeholder="loading.serial ? 'loading': '...'" @keyup.enter="readInvoice()" :disabled="false">
                                <div class="input-group-append order-1">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon1" @click="changeSerial('up')" :disabled="!canIncreaseSerial">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="d-sm-flex mb-1">
                            <label class="col-sm-4 d-sm-flex">المستودع</label> 
                            <div class="Select2 col-sm-8 px-0"> 
                                <select2 v-model="selected.warehouse" :options="options.warehouses" track-by="id" label="title" :show-labels="false" placeholder="..."  
                                        :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        :loading="loading.warehouses" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <div class="d-sm-flex mb-1">
                            <label class="col-sm-4 d-sm-flex">حساب العميل</label>
                            <input type="text" v-model="invoice.client_acc" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                    </div>
                </div>

                <div class="d-sm-flex mb-3 mt-0">
                    <label class="col-sm-1 d-sm-flex">البيان</label>
                    <input type="text" v-model="invoice.desc" id="" class="form-control col-sm-11" placeholder="أدخل قيمة...">
                </div>
                <!--------------- RECORDS ---------------->
                <records @recordsChanged="onRecordsChanged" @RecordDeleted="onDeleteRec"/>
            </div>

            <div id="invoiceDetails" class="tab-pane fade" role="tabpanel">
                <h1>حقول الفاتورة</h1>
            </div>
        </div>

        <ul class="nav nav-pills pb-4 px-0 d-sm-flex justify-content-center" role="tablist">
            <li class="nav-item col-6 col-md-3 px-1 pb-1">
                <button @click="tabClicked" class="nav-link col-12 btn btn-outline-secondary active " id="InvoiceSelling" data-toggle="pill" role="tab" href="#InvoiceSelling">الفاتورة</button>
            </li>
            <li class="nav-item col-6 col-md-3 px-1 pb-1">
                <button @click="tabClicked" class="nav-link col-12 btn btn-outline-secondary " id="invoiceDetails" data-toggle="pill" role="tab" href="#invoiceDetails">المزيد</button>
            </li>
        </ul>

        <loading-page />
    </div>
</template>

<script>
import Invoice from '../models/Invoice.class';

export default {
    props: ["profile", "currencies", "pay"], // placeholders: array from PHP with labels and placeholders
    data() {
        return {
            originalObj: {},
            invoice: new Invoice(this.profile),
            selected: {currency: { buy: "" }, client: null, payment: null, warehouse: null, serial: null},
            settings: {canSave: false, canEdit: false, editMode: false, saved: false, invoiceReady: false, 
                        rtl: true, hasRecords: false, valid: false, currencyBuy: null},
            options: {clients: [] , warehouses: [], serials: []},    
            loading: {page: false, clients: false, serial: false}, 
        }
    },
    methods: {
        tabClicked(event) { /* JQuery tabs funcionality */  $(this.$el).tab("show") },       
        clearInvoice() {
            if (confirm("سوف يتم فقدان البيانات غير المحفوظة, هل تريد الاستمرار؟")) {
                this.$emit("ClearInvoice")
                this.init()
                // this.$toast.success({ title: "تم بنجاح!", message: "حذف الفاتورة" })
            }
        },
        submitInvoice() {
            this.loadingPage()
            axios.post(`/api/invoices/${this.profile.id}`, this.invoice)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitInvoice")
                    this.options.serials.unshift(this.invoice.serial)
                    this.init()
                    this.$toast.success({ title: "تم بنجاح!", message: "حفظ الفاتورة" })
                })
                .catch(error => {
                    this.$toast.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء حفظ الفاتورة" })
                    console.log("error", error)
                })
                .then(() => this.loadingPage(false))
        },
        init(data = null, callback = function(){}) { 
            this.invoiceReady(false)
            if (data == null) { // reset all
                this.settings.editMode = false 
                this.invoice = new Invoice(this.profile)
                this.invoice.NDate = Store.formatDate(Date.now())
                this.invoice.NType = +Store.urlParam('type')
                this.invoice.client_id = 1
                this.options.warehouses = this.profile._warehouses
                this.selected.client = null
                this.selected.warehouse = null
                this.selected.currency = this.currencies.length == 0 ? null : this.currencies[0]
                this.selected.payment = this.pay.length == 0 ? null : this.pay[0]
                this.selected.serial = null
                this.getSerials(() => this.invoiceReady() )                 
            } 
            else { // fill inv
                this.settings.editMode = true     
                var inv = new Invoice(this.profile)
                inv.fill(data); console.log("inv.fill", inv)
                this.invoice = inv ;  console.log("invoice", this.invoice)
                this.$emit('gotRecords', data._records)
                this.invoice.records = data._records//.forEach((rec)=> { return {mat: rec.mat, qty: rec.qty, single: rec.single, total:rec.total} }) || []
                this.selected.warehouse = typeof data._warehouses[0] != 'undefined'? data._warehouses[0] : null
                this.selected.currency = this.currencies.find(el => el.id == data._currency.id)              
                this.selected.payment = this.pay.find(el => el.id == data._payment.id)      
                this.selected.serial = this.options.serials.indexOf(data.serial) 
                this.settings.currencyBuy = data.currencyBuy
                if(this.options.clients.length == 0){
                    this.search('getClientsList', 'clients', '', () => { 
                        this.selected.client = typeof data._clients[0] != 'undefined'? data._clients[0] : null
                        this.invoiceReady()
                    })
                }else {
                    this.selected.client = typeof data._clients[0] != 'undefined'? data._clients[0] : null 
                    this.invoiceReady()
                }
            }
            callback();
        }, 
        readInvoice() { // after reading, settings.editMode mode will become active        
            if ( !this.settings.canSave || confirm("هل تريد قراءة الفاتورة؟ سوف تخسر البيانات غير المحفوظة") ) {
                this.loadingPage()
                axios.get(`/api/invoices/${this.profile.id}/findBySerial?serial=${this.invoice.serial}&NType=${Store.urlParam('type')}`) //?ser='+this.invoice.serial
                    .then(resp => { //console.log("readInvoice: resp", resp);            console.log("resp.data.data[0]", resp.data.data[0])
                        switch (resp.status) {
                            case 200:
                                var result = Array.isArray(resp.data.data) ? resp.data.data[0] : (resp.data.data != null ? resp.data.data : new Invoice(this.profile))
                                this.init(result) 
                                // this.$toast.success({title: "نجاح الطلب", message: resp.data.msg})
                                break
                            case 204:
                                this.$toast.info({title: "لا يوجد فاتورة", message: "لم يتم ايجاد فاتورة"})
                                break
                            default:
                                this.$toast.error({title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                                break
                        }
                    })
                    .catch(error => {
                        this.$toast.error({ title: "حدث خطأ!!!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                        console.log("error", error)
                    })
                    .then(() => {
                        this.loadingPage(false)
                        this.invoice.currencyBuy = this.settings.currencyBuy
                    })
            }
        },
        readInvoiceDebounce: _.debounce(function(){ this.readInvoice() }, 200),
        editInvoice() {
            this.loadingPage()
            axios.put(`/api/invoices/${this.profile.id}`, this.invoice)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitInvoice")
                    this.init()
                    this.$toast.success({ title: "تم بنجاح!", message: "تعديل الفاتورة" })
                })
                .catch(error => {
                    this.$toast.error({title: "حدث خطأ!", message: "حدث خطأ أثناء تعديل الفاتورة"})
                    console.log("error", error)
                })
                .then(() => this.loadingPage(false))
        },    
        search: _.debounce(function(filterMethod, entity, query='', callback){ 
            this.loading[entity] = true                 
            if(query != '')
                query = this.invoice.client_id.replace(' ', ',')
            axios.get(`/api/invoices/${this.profile.id}/${filterMethod}?search=${query}`) 
                .then(resp => {    //console.log("resp", resp);            //console.log("resp.data.data[0]", resp.data.data[0])
                    switch (resp.status) {
                        case 200: 
                            this.options[entity] = resp.data.data
                            // this.settings.canEdit = false
                            break
                        case 204:
                            this.$toast.info({title: "لا يوجد نتيجة", message: "لا يوجد نتائج مطابقة للبحث"})
                            break
                        default:
                            this.$toast.error({title: "حدث خطأ!", message: " خطأ أثناء البحث " })
                            break
                    }
                })
                .catch(error => {
                    this.$toast.error({ title: "حدث خطأ!", message: " خطأ أثناء البحث " })
                    console.log("error", error)
                })
                .then(() => { // always executed
                    this.loading[entity] = false
                })
                .then(callback)
                
            }, 300),
        
        onSearchClient(data){ // fetch data
            if(this.options.clients.length == 0 && data != ''){
                this.search('getClientsList', 'clients')
                this.settings.canEdit = false
            }
        },
        onRecordsChanged(data){
            this.invoice.records = data
            // this.settings.canEdit = true
        },
        getSerials(callback){ // and set the max serial
            this.loading.serial = true
            axios.get(`/api/invoices/${this.profile.id}/getSerials/${this.invoice.NType}`)
                .then(resp => { console.log("getSerials", resp); 
                    switch (resp.status) {
                        case 200:
                            var result = resp.data
                            this.options.serials = result; console.log('options.serials', result);                        
                            if(result.length == 0){
                                this.invoice.serial = 1
                            }else{
                                this.invoice.serial = +this.options.serials[0] + 1
                            } 
                            break 
                        default:
                            this.$toast.error({title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                            break
                    }
                })
                .catch(error => {
                    this.$toast.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                    console.log("error", error)
                })
                .then((/* finally */)=> {this.loading.serial = false})
                .then(callback)
        },
        changeSerial(change){  
            if(change == 'up' && this.canIncreaseSerial) // go up in value, down in index                
                    this.selected.serial--
            else if(change == 'down' && this.canDecreaseSerial)
                if(this.selected.serial == null)
                    this.selected.serial = 0
                else
                    this.selected.serial++
            console.log("this.selected.serial= " + this.selected.serial + " - option selected= "+this.options.serials[this.selected.serial])
            this.readInvoiceDebounce();
        },
        loadingPage(param=true){
            this.loading.page = param
        },
        onDeleteRec(recID){
            this.invoice.deletedRecords.push(recID) 
        },
        invoiceReady(val=true){
            this.settings.invoiceReady = val 
        },
        validate(inv){
            if(inv.client_id && inv.client_acc && inv.records.length != 0 && inv.warehouse_id && inv.serial){
                this.settings.valid = true
            }
            else {
                this.settings.valid = false
            }
        }
    },
    computed: {
        canIncreaseSerial(){
            return this.selected.serial != 0 && this.selected.serial != null
        },
        canDecreaseSerial(){ 
            if(this.selected.serial == null)
                return   this.options.serials.length != 0  
            else
                return this.selected.serial+1 != this.options.serials.length
        } ,
        changed(){
            // determain whether settings.originalObj and invoice are completely equal 
            // console.log("originalObj",this.originalObj); console.log("invoice",JSON.stringify(this.invoice));
            // return ! _.isEqual(this.originalObj, JSON.stringify(this.invoice))
            return true
        }, 
    },
    watch: {
        selected: {
            handler: function(newValue) { 
                var data = JSON.parse(JSON.stringify( newValue )) 
                // console.log("selected",data)

                if(data.currency != null){ 
                    var currency = this.currencies.find(function(el) { return el.id == data.currency.id })
                    this.invoice.currency_id = currency.id 
                    this.invoice.currencyBuy = +currency.buy
                    console.log("selected.currency",currency.id)
                }
                if(data.client != null){ 
                    this.invoice.client_id = +{...this.options.clients.find(function(el) { return el.id == data.client.id })}.id
                    console.log("selected.client",client.id)
                }
                if(data.payment != null){ 
                    this.invoice.payment_id = +{...this.pay.find(function(el) { return el.id == data.payment.id })}.id
                    console.log("selected.payment",this.selected.payment.id)
                }
                if(data.warehouse != null){ 
                    this.invoice.warehouse_id = +{...this.options.warehouses.find(function(el) { return el.id == data.warehouse.id })}.id
                    console.log("selected.warehouse",this.selected.warehouse.id)
                }
                if(data.serial != null){
                    this.invoice.serial = +this.options.serials[data.serial]
                    console.log("selected.serial= "+this.selected.serial+ " - this.invoice.serial= "+this.invoice.serial) 
                }           
            },
            deep: true
        },
        invoice: {
            handler: function(inv) {   
                this.validate(inv)
            },
            deep: true
        },
        settings: {
            handler: function(settings) {   
                if(settings.invoiceReady){
                    this.originalObj = JSON.stringify(this.invoice)
                    this.settings.invoiceReady = false
                }
            },
            deep: true
        },
        loading: {
            handler: function(loading) {  
                this.$emit('LoadingPage', loading.page)
            },
            deep: true
        },
    },
    mounted() {         
        console.log("Component <invoice-selling> mounted.")
        this.init()            
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped lang="scss">

</style>