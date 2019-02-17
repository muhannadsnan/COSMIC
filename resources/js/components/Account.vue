<template>
    <div class="Account d-flex flex-column-reverse">
        <div class="buttons d-flex justify-content-between">            
            <div class="" v-if="!settings.editMode">
                <button @click="submitAccount()" class="nav-link btn btn-success px-5" id="accountSave" :disabled="!changed || !settings.valid">حفظ</button>
            </div>
            <div class="" v-if="settings.editMode">
                <button @click="editAccount()" class="nav-link btn btn-info text-white px-5" id="accountsettings.editMode" :disabled="!changed || !settings.valid">تعديل</button>
            </div>
            <div class="">
                <button @click="clearAccount()" class="nav-link btn btn-dark px-5" id="accountClear" :disabled="!changed && selected.serial == null">جديد</button>
            </div>
        </div>

        <div class="tab-content" id="v-pills-tabContent"> 
            <div id="General" class="tab-pane fade show active" role="tabpanel">
                <div class="d-flex my-0">
                    <div class="col-sm-6 px-0">
                        <div class="d-flex mb-1" id="client">
                            <label class="col-sm-2 d-flex">رمز الحساب</label> 
                            <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-10" placeholder="أدخل قيمة...">
                        </div>
                        <div class="d-flex mb-1" id="client">
                            <label class="col-sm-2 d-flex">اسم الحساب</label> 
                            <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-10" placeholder="أدخل قيمة...">
                        </div>
                        <div class="d-flex mb-1" id="client">
                            <label class="col-sm-2 d-flex">ملاحظات</label> 
                            <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-10" placeholder="أدخل قيمة...">
                        </div>                        
                    </div>
                    <div class="col-sm-6 px-0">
                        <div class="d-flex mb-1">
                            <label class="col-sm-4 d-flex">الرقم التسلسلي</label>
                            <div class="input-group col-sm-8 align-self-center">
                                <div class="input-group-prepend order-3">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon1" @click="changeSerial('down')" :disabled="!canDecreaseSerial">-</button>
                                </div>
                                <input type="number" v-model="selected.currency.buy" class="form-control order-2" :placeholder="loading.serial ? 'loading': '...'" @keyup.enter="readInvoice()" :disabled="false">
                                <div class="input-group-append order-1">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon1" @click="changeSerial('up')" :disabled="!canIncreaseSerial">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-1">
                            <label class="col-sm-4 d-flex">الاسم اللاتيني</label>
                            <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                        <div class="d-flex mb-1">
                            <label class="col-sm-4 d-flex">نوع الحساب</label>
                            <div class="Select2 col-sm-8 px-0">
                                <select2 v-model="selected.payment" :options="options.pay" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                        :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false"
                                        :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div id="Taxes" class="tab-pane fade" role="tabpanel">
                <h1>الضرائب</h1>
            </div>
            <div id="Customers" class="tab-pane fade" role="tabpanel">
                <h1>الزبائن</h1>
            </div>
            <div id="CustomizedFields" class="tab-pane fade" role="tabpanel">
                <h1>حقول مخصصة</h1>
            </div>
        </div>
        
        <ul class="nav nav-pills pb-4 d-flex justify-content-center" role="tablist">
            <li class="nav-item px-1">
                <button @click="tabClicked" class="nav-link btn btn-outline-secondary active px-5" id="General" data-toggle="pill" role="tab" href="#General">عام</button>
            </li>
            <li class="nav-item px-1">
                <button @click="tabClicked" class="nav-link btn btn-outline-secondary px-5" id="Taxes" data-toggle="pill" role="tab" href="#Taxes">الضرائب</button>
            </li>
            <li class="nav-item px-1">
                <button @click="tabClicked" class="nav-link btn btn-outline-secondary px-5" id="Customers" data-toggle="pill" role="tab" href="#Customers">الزبائن</button>
            </li>
            <li class="nav-item px-1">
                <button @click="tabClicked" class="nav-link btn btn-outline-secondary px-5" id="CustomizedFields" data-toggle="pill" role="tab" href="#CustomizedFields">حقول مخصصة</button>
            </li>
        </ul>

        <loading-page />
    </div>
</template>

<script>
import Account from '../models/Account.class';

export default {
    props: ["profile"], //placeholders: an array from php with translated placeholders foreach input
    data() {
        return {
            originalObj: {},
            account: new Account(this.profile),
            selected: {currency: { buy: "" }, client: null, payment: null, warehouse: null, serial: null},
            settings: {canSave: false, canEdit: false, editMode: false, saved: false, accountReady: false, 
                        rtl: true, hasRecords: false, valid: false},
            options: {clients: [] , warehouses: [], serials: [], pay: []},    
            loading: {page: false, clients: false, serial: false},   
        }
    },
    methods: {
        tabClicked(event) { /* JQuery tab funcionality */  $(this.$el).tab("show") },       
        clearAccount() {
            if (confirm("سوف يتم فقدان البيانات غير المحفوظة, هل تريد الاستمرار؟")) {
                this.$emit("ClearAccount")
                this.init()
                // this.$toast.success({ title: "تم بنجاح!", message: "حذف الفاتورة" })
            }
        },
        submitAccount() {
            this.loadingPage()
            axios.post(`/api/accounts/${this.profile.id}`, this.account)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitAccount")
                    this.options.serials.unshift(this.account.serial)
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
            /*this.accountReady(false)
            if (data == null) { // reset all
                this.settings.editMode = false 
                this.account = new Account(this.profile)
                this.account.NDate = Store.formatDate(Date.now())
                this.account.NType = +Store.urlParam('type')
                this.account.client_id = 1
                this.options.warehouses = this.profile._warehouses
                this.selected.client = null
                this.selected.warehouse = null
                this.selected.currency = this.currencies.length == 0 ? null : this.currencies[0]
                this.selected.payment = this.pay.length == 0 ? null : this.pay[0]
                this.selected.serial = null
                this.getSerials(()=>  this.accountReady() )                 
            } 
            else { // fill inv
                this.settings.editMode = true     
                var inv = new Account(this.profile)
                inv.fill(data); console.log("inv.fill", inv)
                this.account = inv ;  console.log("account", this.account)
                this.$emit('gotRecords', data._records)
                this.account.records = data._records//.forEach((rec)=> { return {mat: rec.mat, qty: rec.qty, single: rec.single, total:rec.total} }) || []
                this.selected.warehouse = typeof data._warehouses[0] != 'undefined'? data._warehouses[0] : null
                this.selected.currency = this.currencies.find(el => el.id == data._currency.id)              
                this.selected.payment = this.pay.find(el => el.id == data._payment.id)      
                this.selected.serial = this.options.serials.indexOf(data.serial) 
                if(this.options.clients.length == 0){
                    this.search('getClientsList', 'clients', '', () => { 
                        this.selected.client = typeof data._clients[0] != 'undefined'? data._clients[0] : null
                        this.accountReady()
                    })
                }else {
                    this.selected.client = typeof data._clients[0] != 'undefined'? data._clients[0] : null 
                    this.accountReady()
                }
            }*/
            callback();
        }, 
        readAccount() { // after reading, settings.editMode mode will become active        
            if ( !this.settings.canSave || confirm("هل تريد قراءة الفاتورة؟ سوف تخسر البيانات غير المحفوظة") ) {
                this.loadingPage()
                axios.get(`/api/accounts/${this.profile.id}/findBySerial?serial=${this.account.serial}&NType=${Store.urlParam('type')}`) //?ser='+this.account.serial
                    .then(resp => { //console.log("readAccount: resp", resp);            console.log("resp.data.data[0]", resp.data.data[0])
                        switch (resp.status) {
                            case 200:
                                var result = Array.isArray(resp.data.data) ? resp.data.data[0] : (resp.data.data != null ? resp.data.data : new Account(this.profile))
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
                    .then(() => this.loadingPage(false))
            }
        },
        readAccountDebounce: _.debounce(function(){ this.readAccount() }, 200),
        editAccount() {
            this.loadingPage()
            axios.put(`/api/accounts/${this.profile.id}`, this.account)
                .then(resp => {
                    console.log(resp)
                    this.$emit("SubmitAccount")
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
                query = this.account.client_id.replace(' ', ',')
            axios.get(`/api/accounts/${this.profile.id}/${filterMethod}?search=${query}`) 
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
        getSerials(callback){ // and set the max serial
            this.loading.serial = true
            axios.get(`/api/accounts/${this.profile.id}/getSerials/${this.account.NType}`)
                .then(resp => { console.log("getSerials", resp); 
                    switch (resp.status) {
                        case 200:
                            var result = resp.data
                            this.options.serials = result; console.log('options.serials', result);                        
                            if(result.length == 0){
                                this.account.serial = 1
                            }else{
                                this.account.serial = +this.options.serials[0] + 1
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
            this.readAccountDebounce();
        },
        loadingPage(param=true){
            this.loading.page = param
        }, 
        accountReady(val=true){
            this.settings.accountReady = val 
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
        },
        changed(){
            // determain whether settings.originalObj and account are completely equal 
            // console.log("originalObj",this.originalObj); console.log("account",JSON.stringify(this.account));
            // return ! _.isEqual(this.originalObj, JSON.stringify(this.account))
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
                    this.account.currency_id = currency.id 
                    console.log("selected.currency",currency.id)
                }
                if(data.client != null){ 
                    this.account.client_id = +{...this.options.clients.find(function(el) { return el.id == data.client.id })}.id
                    console.log("selected.client",client.id)
                }
                if(data.payment != null){ 
                    this.account.payment_id = +{...this.pay.find(function(el) { return el.id == data.payment.id })}.id
                    console.log("selected.payment",this.selected.payment.id)
                }
                if(data.warehouse != null){ 
                    this.account.warehouse_id = +{...this.options.warehouses.find(function(el) { return el.id == data.warehouse.id })}.id
                    console.log("selected.warehouse",this.selected.warehouse.id)
                }
                if(data.serial != null){
                    this.account.serial = +this.options.serials[data.serial]
                    console.log("selected.serial= "+this.selected.serial+ " - this.account.serial= "+this.account.serial) 
                }           
            },
            deep: true
        },
        account: {
            handler: function(account) {   
                if(this.account.client_id && this.account.client_acc && this.account.records.length != 0 && this.account.warehouse_id){
                    this.settings.valid = true
                }
                else {
                    this.settings.valid = false
                }
            },
            deep: true
        },
        settings: {
            handler: function(settings) {   
                if(settings.accountReady){
                    this.originalObj = JSON.stringify(this.account)
                    this.settings.accountReady = false
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
        console.log("Component <account> mounted.")
        this.init()            
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped lang="scss">

</style>