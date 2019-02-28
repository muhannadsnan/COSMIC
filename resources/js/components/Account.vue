<template>
    <div class="Account d-flex flex-column-reverse">
        <div class="buttons d-flex justify-content-between mt-4">            
            <button v-if="!settings.editMode" @click="submitAccount()" class="nav-link col-4 col-md-3 btn btn-success" 
                    id="accountSave" :disabled="!changed || !settings.valid">حفظ</button>
            <button v-if="settings.editMode" @click="editAccount()" class="nav-link col-4 col-md-3 btn btn-info text-white" 
                    id="accountsettings.editMode" :disabled="!changed || !settings.valid">تعديل</button>
            <button @click="clearAccount()" class="nav-link col-4 col-md-3 btn btn-dark" 
                    id="accountClear" :disabled="!changed && selected.serial == null">جديد</button>
        </div>

        <div class="tab-content" id="v-pills-tabContent"> 
            <hr>
            <div id="General" class="tab-pane fade show active" role="tabpanel">
                <div class="d-sm-flex align-items-start">
                    <div class="col-sm-6 px-1">
                        <div class="d-sm-flex">
                            <label class="col-sm-3 d-sm-flex">الحساب الرئيسي</label> 
                            <div class="Select2 col-sm-9 px-0"> 
                                <select2 v-model="selected.client" :options="options.clients" track-by="id" label="name" :show-labels="false" placeholder="..."  
                                        :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        @search-change="onSearchClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <div class="d-sm-flex mt-1">
                            <label class="col-sm-3 d-sm-flex">الحساب الختامي</label> 
                            <div class="Select2 col-sm-9 px-0"> 
                                <select2 v-model="selected.client" :options="options.clients" track-by="id" label="name" :show-labels="false" placeholder="..."  
                                        :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                        @search-change="onSearchClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                            </div>
                        </div>
                        <fieldset class="mt-3 px-2">
                            <legend>الموازنة التقديرية</legend>
                            <div class="d-sm-flex justify-content-center mb-0">
                                <button class="btn btn-outline-secondary col-3 mx-1" :class="{'bg-secondary text-white': true}">مدينة</button>
                                <button class="btn btn-outline-secondary col-3 mx-1" :class="{'bg-secondary text-white': false}">دائنة</button>
                                <button class="btn btn-outline-secondary col-3 mx-1" :class="{'bg-secondary text-white': false}">بدون</button>
                            </div>
                            <div class="d-sm-flex mt-2">
                                <label class="col-sm-2 d-sm-flex">القيمة</label> 
                                <input type="number" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-2 d-sm-flex">العملة</label> 
                                <div class="Select2 col-sm-8 px-0">
                                    <select2 v-model="selected.currency" :options="options.clients" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                        :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                        :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                                </div>
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-2 d-sm-flex">التعادل</label> 
                                <input type="number" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                            </div>
                            <div class="d-sm-flex mt-1" :disabled="true">
                                <input type="checkbox" checked> <label >اعتبار الاوراق التجارية المستحقة جزءاً من الموازنة</label>
                            </div>
                        </fieldset>
                        <fieldset class="mt-3 px-2">
                            <legend>تبويبات القوائم المالية</legend>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-4 d-sm-flex">قائمة الدخل</label> 
                                <div class="Select2 col-sm-7 px-0" :disabled="true">
                                    <select2 v-model="selected.currency" :options="options.clients" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                        :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                        :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null" :disabled="true"></select2>
                                </div>
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-4 d-sm-flex">حقوق الملكية</label> 
                                <div class="Select2 col-sm-7 px-0" :disabled="true">
                                    <select2 v-model="selected.currency" :options="options.clients" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                        :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                        :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null" :disabled="true"></select2>
                                </div>
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-4 d-sm-flex">المركز المالي</label> 
                                <div class="Select2 col-sm-7 px-0" :disabled="true">
                                    <select2 v-model="selected.currency" :options="options.clients" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                        :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                        :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null" :disabled="true"></select2>
                                </div>
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-4 d-sm-flex">التدفق النقدي</label> 
                                <div class="Select2 col-sm-7 px-0" :disabled="true">
                                    <select2 v-model="selected.currency" :options="options.clients" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                        :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false" 
                                        :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null" :disabled="true"></select2>
                                </div>
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-4 d-sm-flex">تفصيلات التبويبات</label> 
                                <div class="Select2 col-sm-7 px-0" :disabled="true"> 
                                    <select2 v-model="selected.client" :options="options.clients" track-by="id" label="name" :show-labels="false" placeholder="..."  
                                            :allow-empty="false" :preselect-first="false" :limit="5" :preserveSearch="true" :internalSearch="true"
                                            @search-change="onSearchClient" :loading="loading.clients" :showNoResults="false" :multiple="false" :taggable="false" :max="null" :disabled="true"></select2>
                                </div>
                            </div>
                        </fieldset>
                    </div> 

                    <div class="col-sm-6 px-1">
                        <div class="d-sm-flex flex-column mb-0 pb-1">
                            <label class="col-sm-4 d-sm-flexX">طبيعة الحساب</label> 
                            <div class="col-sm-8 d-sm-flex align-items-start justify-content-around mb-0 px-1">
                                <button class="btn btn-outline-secondary mx-0" :class="{'bg-secondary text-white': true}">مدين</button>
                                <button class="btn btn-outline-secondary mx-1" :class="{'bg-secondary text-white': false}">دائن</button>
                                <button class="btn btn-outline-secondary mx-0" :class="{'bg-secondary text-white': false}">مدين ودائن</button>
                            </div>
                        </div>
                        <fieldset class="mt-2 px-2">
                            <legend>الرصيد الحالي</legend>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-2 d-sm-flex">مدين</label> 
                                <input type="number" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-2 d-sm-flex">دائن</label> 
                                <input type="number" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                            </div>
                            <div class="d-sm-flex mt-1">
                                <label class="col-sm-2 d-sm-flex">رصيد</label> 
                                <input type="number" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                            </div>
                        </fieldset> 
                        <div class="d-sm-flex mt-1">
                            <input type="checkbox" checked> <label>إخفاء في نافذة البحث</label>
                        </div>
                        <div class="d-sm-flex mt-1">
                            <input type="checkbox" checked> <label>فرض مركز الكلفة</label>
                        </div>
                        <div class="d-sm-flex mt-1">
                            <label class="col-sm-3 d-sm-flex">مركز الكلفة</label> 
                            <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                        </div> 
                        <fieldset class="mt-3 px-2">
                            <legend>اخر مطابقة</legend> 
                            لم يتم إجراء أي عمليات مطابقة على هذا الحساب, يمكن أن يتم تخزين المطابقات على هذا الحساب من خلال الأمر (مطابقة رصيد حساب) ضمن القائمة: حسابات - أدوات.
                        </fieldset> 
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

        <div class="d-sm-flex my-0">
            <div class="col-sm-6 px-0">
                <div class="d-sm-flex mb-1">
                    <label class="col-sm-2 d-sm-flex">رمز الحساب</label> 
                    <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-10" placeholder="">
                </div>
                <div class="d-sm-flex mb-1">
                    <label class="col-sm-2 d-sm-flex">اسم الحساب</label> 
                    <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-10" placeholder="">
                </div>
                <div class="d-sm-flex mb-1">
                    <label class="col-sm-2 d-sm-flex">ملاحظات</label> 
                    <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-10" placeholder="">
                </div>                        
            </div>
            <div class="col-sm-6 px-0">
                <div class="d-sm-flex mb-1">
                    <label class="col-sm-4 d-sm-flex">الرقم التسلسلي</label>
                    <div class="input-group col-sm-8 align-self-center">
                        <div class="input-group-prepend order-3">
                            <button class="btn btn-outline-primary" type="button" id="button-addon1" @click="changeSerial('down')" :disabled="!canDecreaseSerial">-</button>
                        </div>
                        <input type="number" v-model="account.serial" class="form-control order-2" :placeholder="loading.serial ? 'loading': '...'" @keyup.enter="readInvoice()" :disabled="false">
                        <div class="input-group-append order-1">
                            <button class="btn btn-outline-primary" type="button" id="button-addon1" @click="changeSerial('up')" :disabled="!canIncreaseSerial">+</button>
                        </div>
                    </div>
                </div>
                <div class="d-sm-flex mb-1">
                    <label class="col-sm-4 d-sm-flex">الاسم الانكليزي</label>
                    <input type="text" v-model="selected.currency.buy" id="" class="form-control col-sm-8" placeholder="">
                </div>
                <div class="d-sm-flex mb-1">
                    <label class="col-sm-4 d-sm-flex">نوع الحساب</label>
                    <div class="Select2 col-sm-8 px-0">
                        <select2 v-model="selected.payment" :options="options.pay" track-by="id" label="title" :show-labels="false" placeholder="..." 
                                :allow-empty="false" :preselect-first="true" :preserveSearch="false" :internalSearch="false" :searchable="false"
                                :loading="false" :showNoResults="false" :multiple="false" :taggable="false" :max="null"></select2>
                    </div>
                </div>
            </div>            
        </div> 

        <ul class="nav nav-pills pb-4 px-0 d-sm-flex justify-content-center" role="tablist">
            <li class="nav-item col-6 col-md-3 px-1 pb-1">
                <button @click="tabClicked" class="nav-link col-12 btn btn-outline-secondary active " id="General" data-toggle="pill" role="tab" href="#General">عام</button>
            </li>
            <li class="nav-item col-6 col-md-3 px-1 pb-1">
                <button @click="tabClicked" class="nav-link col-12 btn btn-outline-secondary " id="Taxes" data-toggle="pill" role="tab" href="#Taxes">الضرائب</button>
            </li>
            <li class="nav-item col-6 col-md-3 px-1 pb-1">
                <button @click="tabClicked" class="nav-link col-12 btn btn-outline-secondary " id="Customers" data-toggle="pill" role="tab" href="#Customers">الزبائن</button>
            </li>
            <li class="nav-item col-6 col-md-3 px-1 pb-1">
                <button @click="tabClicked" class="nav-link col-12 btn btn-outline-secondary " id="CustomizedFields" data-toggle="pill" role="tab" href="#CustomizedFields">حقول مخصصة</button>
            </li>
        </ul>

        <loading-page />
    </div>
</template>

<script>
import Account from '../models/Account.class';

export default {
    props: ["profile"], // placeholders: array from PHP with labels and placeholders
    data() {
        return {
            originalObj: {},
            account: new Account(/* this.profile */),
            selected: {currency: { buy: "" }, client: null, payment: null, warehouse: null, serial: null},
            settings: {canSave: false, canEdit: false, editMode: false, saved: false, accountReady: false, 
                        rtl: true, hasRecords: false, valid: false},
            options: {clients: [] , warehouses: [], serials: [], pay: []},    
            loading: {page: false, serial: false},   
        }
    },
    methods: {
        tabClicked(event) { /* JQuery tabs funcionality */  $(this.$el).tab("show") },       
        clearAccount() {
            if (confirm("سوف يتم فقدان البيانات غير المحفوظة, هل تريد الاستمرار؟")) {
                this.$emit("ClearAccount")
                this.init()
                // this.$toast.success({ title: "تم بنجاح!", message: "حذف الحساب" })
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
                    this.$toast.success({ title: "تم بنجاح!", message: "حفظ الحساب" })
                })
                .catch(error => {
                    this.$toast.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء حفظ الحساب" })
                    console.log("error", error)
                })
                .then(() => this.loadingPage(false))
        },
        init(data = null, callback = function(){}) { 
            this.accountReady(false)
            if (data == null) { // reset all
                this.settings.editMode = false 
                this.account = new Account(/* this.profile */) 
                this.account.NType = 'N'; 
                this.selected.serial = null
                //this.options.warehouses = this.profile._warehouses
                this.selected.client = null
                this.getSerials(() => this.accountReady() )                 
            } 
            else { // fill acc
                this.settings.editMode = true     
                var acc = new Account(/* this.profile */)
                acc.fill(data); console.log("acc.fill", acc)
                this.account = acc ;  console.log("account", this.account)  
                this.selected.serial = this.options.serials.indexOf(data.serial) 
            }
            callback();
        }, 
        readAccount() { // after reading, settings.editMode mode will become active        
            if ( !this.settings.canSave || confirm("هل تريد قراءة الحساب؟ سوف تخسر البيانات غير المحفوظة") ) {
                this.loadingPage()
                axios.get(`/api/accounts/${this.profile.id}/findBySerial?serial=${this.account.serial}&NType=${this.account.NType}`) //?ser='+this.account.serial
                    .then(resp => { //console.log("readAccount: resp", resp);            console.log("resp.data.data[0]", resp.data.data[0])
                        switch (resp.status) {
                            case 200:
                                var result = Array.isArray(resp.data.data) ? resp.data.data[0] : (resp.data.data != null ? resp.data.data : new Account(/* this.profile */))
                                this.init(result) 
                                // this.$toast.success({title: "نجاح الطلب", message: resp.data.msg})
                                break
                            case 204:
                                this.$toast.info({title: "لا يوجد حساب", message: "لم يتم ايجاد حساب"})
                                break
                            default:
                                this.$toast.error({title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الحساب" })
                                break
                        }
                    })
                    .catch(error => {
                        this.$toast.error({ title: "حدث خطأ!!!", message: "حدث خطأ أثناء البحث عن الحساب" })
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
                    this.$toast.success({ title: "تم بنجاح!", message: "تعديل الحساب" })
                })
                .catch(error => {
                    this.$toast.error({title: "حدث خطأ!", message: "حدث خطأ أثناء تعديل الحساب"})
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
                            // this.selected.serial = this.account.serial
                            break 
                        default:
                            this.$toast.error({title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الحساب" })
                            break
                    }
                })
                .catch(error => {
                    this.$toast.error({ title: "حدث خطأ!", message: "حدث خطأ أثناء البحث عن الحساب" })
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
                return this.options.serials.length != 0  
            else
                return this.selected.serial+1 != this.options.serials.length
        },
        changed(){
            // DONT CHANGE : determain whether settings.originalObj and account are completely equal 
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

                if(data.serial != null){
                    this.account.serial = +this.options.serials[data.serial]
                    console.log("selected.serial= "+this.selected.serial+ " - this.account.serial= "+this.account.serial) 
                }       
            },
            deep: true
        },
        account: {
            handler: function(account) {   
            //     if(this.account.client_id && this.account.client_acc && this.account.records.length != 0 && this.account.warehouse_id){
            //         this.settings.valid = true
            //     }
            //     else {
            //         this.settings.valid = false
            //     }
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