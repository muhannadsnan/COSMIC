<template>
    <div class="containerX">
        <div class="tab-content" id="v-pills-tabContent">
            <div id="InvoiceSelling" class="tab-pane fade show active" role="tabpanel">
                <div class="row form-group my-0">
                    <div class="col-sm-6 px-0">
                        <div class="row form-group my-0" id="client">
                            <label class="col-sm-2 d-flex">العميل</label> 
                            <div class="Select2 col-sm-10 px-0" ref="searchClients"> 
                                <select2 v-model="selected.client" :options="options.clients" track-by="id" label="name" :show-labels="false" placeholder="..."  
                                        :allow-empty="true" :preselect-first="false" :optionsLimit="10" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        @search-change="onChangeClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <div class="row form-group my-0">
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">العملة</label>
                                    <select v-model="selected.currency" class="form-control col-md-8" @change="selectCurr()">
                                        <option v-for="curr,i in currencies" :value="curr.id" :key="i">{{curr.title}}</option>
                                    </select>
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

                <div class="row form-group mb-3 mt-0">
                    <label class="col-sm-1 d-flex">البيان</label>
                    <input type="text" v-model="invoice.desc" id="" class="form-control col-sm-11" placeholder="أدخل قيمة...">
                </div>
                <!--------------- RECORDS ---------------->
                <records @hasRecords="OnCanSave"></records>
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
                <button class="nav-link btn btn-info px-5" id="invoicesettings.edit" @click="submitInvoice()">تعديل</button>
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
    props: ["currencies", "pay", "base", "profile"],
    data() {
        return {
            invoice: new Invoice(this.base, this.profile),
            selected: {currency: { buy: "" }, client: null},
            settings: {canSave: false, edit: false, saved: false},
            options: {clients: [] },    
            loading: {page: false, clients: false},   
        }
    },
    methods: {
        tabClicked() { /*  JQuery tab funcionality */ $(this.$el).tab("show") },
        selectCurr(curr) {
            this.selected.currency = curr
        },        
        clearInvoice() {
            if (confirm("هل أنت متأكد من أنك تريد حذف الفاتورة؟")) {
                this.$emit("ClearInvoice")
                this.init()
                this.Msg.success({ title: "تم بنجاح!", message: "حذف الفاتورة" })
            }
        },
        submitInvoice() {
            this.invoice.records = this.$children[0]._data.records
            axios.post("/api/invoices", this.invoice)
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
                this.invoice = new Invoice(this.base, this.profile)
                this.invoice.currency_id = this.currencies.find(function(el) {return true}).id
                this.invoice.payment_id = this.pay.find(function(el) {return true}).id
                this.invoice.NDate = Store.formatDate(Date.now())
                this.invoice.NType = +Store.urlParam('type')
                this.invoice.client_id = 0
                this.settings.canSave = false
                this.settings.edit = false
            } else {
                var x = new Invoice(this.base, this.profile)
                x.fill(data)
                this.invoice = x ;  //console.log("x", this.invoice)
                this.settings.canSave = true
                this.settings.edit = true
                this.$emit('gotRecords', data._records)
                this.invoice.client_id = typeof data._clients[0] == 'undefined'? 0 : data._clients[0].id
                this.invoice.warehouse_id = typeof data._warehouses[0] == 'undefined'? 0 : data._warehouses[0].id
                
            }
        },
        OnCanSave(val) {
            console.log("can save invoice", val)
            this.settings.canSave = val
        },
        readInvoice() { // after reading, settings.edit mode will become active        
            if ( !this.settings.canSave || confirm("هل تريد قراءة الفاتورة؟ سوف تخسر البيانات غير المحفوظة") ) {
                axios.get("/api/invoices/findBySerial?serial=" + this.invoice.serial+'&NType='+Store.urlParam('type')) //?ser='+this.invoice.serial
                    .then(resp => { //console.log("resp", resp)            console.log("resp.data.data[0]", resp.data.data[0])
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
            this.invoice.records = this.$children[0]._data.records
            axios.put("/api/invoices", this.invoice)
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
        search: _.debounce(function(filterMethod, entity, query=''){ 
            this.loading[entity] = true                 
            // query = this.invoice.client_id.replace(' ', ',')
            axios.get(`/api/invoices/${filterMethod}?profile=${this.profile}&search=${query}`) 
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
                
            }, 300),
        
        onChangeClient(value){  
            if(this.options.clients.length == 0){
                this.search('searchClientsByName', 'clients')
            }
        }
    },
    watch: {
        selected: {
            handler: function(newValue) { 
                var data = JSON.parse(JSON.stringify( newValue ))
                console.log("data",data)

                if(data.currecny){ 
                    var currency = this.currencies.find(function(el) { return el.id == data.currency.id })
                    console.log("currency",currency)
                    this.invoice.currency_id = currency.id 
                }
                if(data.client){ 
                    this.invoice.client_id = +{...this.options.clients.find(function(el) { return el.id == data.client.id })}.id
                }
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
    .tab-content .tab-pane { min-height: 270px } 
.tab-content .tab-pane { min-height: 270px } 
    .tab-content .tab-pane { min-height: 270px } 
</style>