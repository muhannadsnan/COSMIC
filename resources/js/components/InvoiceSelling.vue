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
                                        @search-change="onSearchClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
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
                <records @hasRecords="OnCanSave" @recordsChange="onRecordsChange" />
            </div>

            <div id="invoiceDetails" class="tab-pane fade" role="tabpanel">
                <h1>حقول الفاتورة</h1>
            </div>
        </div>

        <ul class="nav nav-pills nav-fill TABS-bottom" role="tablist">
            <li class="nav-item">
                <button @click="tabClicked" class="nav-link btn btn-outline-secondary active px-5" id="invoiceRecords" data-toggle="pill" role="tab" href="#invoiceRecords">الفاتورة</button>
            </li>
            <li class="nav-item">
                <button @click="tabClicked" class="nav-link btn btn-outline-secondary px-5" id="invoiceDetails" data-toggle="pill" role="tab" href="#invoiceDetails">المزيد</button>
            </li>
            <li class="nav-item" v-if="!settings.edit">
                <button @click="submitInvoice()" class="nav-link btn btn-success px-5" id="invoiceSave" :disabled="!settings.canSave">حفظ</button>
            </li>
            <li class="nav-item" v-if="settings.edit">
                <button @click="editInvoice()" class="nav-link btn btn-info text-white px-5" id="invoicesettings.edit" :disabled="!settings.canEdit">تعديل</button>
            </li>
            <li class="nav-item">
                <button @click="clearInvoice()" class="nav-link btn btn-dark px-5" id="invoiceClear" :disabled="!settings.canSave && selected.serial == null">جديد</button>
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
            selected: {currency: { buy: "" }, client: null, payment: null, warehouse: null, serial: null},
            settings: {canSave: false, canEdit: false, edit: false, saved: false, rtl: true },
            options: {clients: [] , warehouses: [], serials: []},    
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
                    this.options.serials.unshift(this.invoice.serial)
                    this.init()
                    this.Msg.success({ title: "تم بنجاح!", message: "حفظ الفاتورة" })
                })
                .catch(error => {
                    this.Msg.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء حفظ الفاتورة" })
                    console.log("error", error)
                })
        },
        init(data = null) { 
            if (data == null) { // reset all
                this.invoice = new Invoice(this.profile) 
                this.invoice.NDate = Store.formatDate(Date.now())
                this.invoice.NType = +Store.urlParam('type')
                this.invoice.client_id = 0
                this.options.warehouses = this.profile._warehouses
                this.selected.client = null
                this.selected.warehouse = null
                this.selected.currency = this.currencies.length == 0 ? null : this.currencies[0]
                this.selected.payment = this.pay.length == 0 ? null : this.pay[0]
                this.selected.serial = null
                this.settings.edit = false
                this.settings.canSave = false 
                this.getSerials()
            } 
            else { // fill inv
                var inv = new Invoice(this.profile)
                inv.fill(data); console.log("inv", inv)
                this.invoice = inv ;  console.log("invoice", this.invoice)
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
                this.selected.serial = this.options.serials.indexOf(data.serial)
                console.log('filter', this.selected.serial);
                this.settings.edit = true          
                this.settings.canEdit = false
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
                                var result = Array.isArray(resp.data.data) ? resp.data.data[0] : (resp.data.data != null ? resp.data.data : new Invoice(this.profile))
                                this.init(result)
                                this.Msg.success({title: "نجاح الطلب", message: resp.data.msg})
                                break
                            case 204:
                                this.Msg.info({title: "لا يوجد فاتورة", message: "لم يتم ايجاد فاتورة"})
                                break
                            default:
                                this.Msg.error({title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة--" })
                                break
                        }
                    })
                    .catch(error => {
                        this.Msg.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الفاتورة" })
                        console.log("error", error)
                    })
            }
        },
        readInvoiceDebounce: _.debounce(function(){ this.readInvoice() }, 200),
        editInvoice() {
            axios.put(`/api/invoices/${this.profile.id}`, this.invoice)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitInvoice")
                    this.init()
                    this.Msg.success({ title: "تم بنجاح!", message: "تعديل الفاتورة" })
                })
                .catch(error => {
                    this.Msg.error({title: "حدث خطأ!", message: "حدث خطأ أثناء تعديل الفاتورة"})
                    console.log("error", error)
                })
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
                .then(callback)
                
            }, 300),
        
        onSearchClient(data){ // fetch data
            if(this.options.clients.length == 0 && data != ''){
                this.search('getClientsList', 'clients')
                this.settings.canEdit = false
            }
        },
        onRecordsChange(data){
            this.invoice.records = data
        },
        getSerials(){ // and set the max serial
            this.loading.serial = true
            axios.get(`/api/invoices/${this.profile.id}/getSerials/${this.invoice.NType}`)
                .then(resp => { console.log("getSerials", resp); 
                    switch (resp.status) {
                        case 200:
                            var result = resp.data
                            this.options.serials = result    ; console.log('options.serials', result);                        
                            if(result.length == 0){
                                this.invoice.serial = 1
                            }else{
                                this.invoice.serial = +this.options.serials[0] + 1
                            }
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
                .then((/* finally */)=> {this.loading.serial = false})
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
        } 
    },
    watch: {
        selected: {
            handler: function(newValue) { 
                var data = JSON.parse(JSON.stringify( newValue )) 
                console.log("selected",data)

                if(data.currency != null){ 
                    var currency = this.currencies.find(function(el) { return el.id == data.currency.id })
                    this.invoice.currency_id = currency.id 
                    console.log("selected.currency",currency)
                }
                if(data.client != null){ 
                    this.invoice.client_id = +{...this.options.clients.find(function(el) { return el.id == data.client.id })}.id
                    console.log("selected.client",client)
                }
                if(data.payment != null){ 
                    this.invoice.payment_id = +{...this.pay.find(function(el) { return el.id == data.payment.id })}.id
                    console.log("selected.payment",this.selected.payment)
                }
                if(data.warehouse != null){ 
                    this.invoice.warehouse_id = +{...this.options.warehouses.find(function(el) { return el.id == data.warehouse.id })}.id
                    console.log("selected.warehouse",this.selected.warehouse)
                }
                if(data.serial != null){ //console.log('data.serial', data.serial);
                    this.invoice.serial = +this.options.serials[data.serial]
                    console.log("selected.serial= "+this.selected.serial+ " - this.invoice.serial= ",this.invoice.serial) 
                }                
                this.settings.canEdit = true
            },
            deep: true
        },
        invoice: {
            handler: function(newValue) {  
                this.settings.canEdit = true
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