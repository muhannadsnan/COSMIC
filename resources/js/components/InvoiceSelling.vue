<template>
    <div class="containerX">
        <div class="tab-content" id="v-pills-tabContent">
            <div id="invoiceRecords" class="tab-pane fade show active" role="tabpanel">
                <div class="row form-group">
                    <div class="col-sm-6 px-0">
                        <div class="row form-group my-0" id="client">
                            <label class="col-sm-2 d-flex">العميل</label>
                            <!-- <input type="text" v-model="invoice.client_id" id="" class="form-control col-sm-10" placeholder="أدخل قيمة..."> -->
                            <Select2 v-model="invoice.client_id" :options="options.clients" option-key="id" option-label="text" placeholder="..." :classes="{input: 'form-control', wrapper: 'select-wrapper', icons: 'glyphicon', required: 'required'}"></Select2>
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
            <li class="nav-item" v-if="!edit">
                <button class="nav-link btn btn-success px-5" id="invoiceSave" @click="submitInvoice()" :disabled="!canSave">حفظ</button>
            </li>
            <li class="nav-item" v-if="edit">
                <button class="nav-link btn btn-info px-5" id="invoiceEdit" @click="submitInvoice()">تعديل</button>
            </li>
            <li class="nav-item">
                <button class="nav-link btn btn-dark px-5" id="invoiceClear" @click="clearInvoice()" :disabled="!canSave">حذف</button>
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
            selectedCurrency: { buy: "" },
            loading: false,
            canSave: false,
            edit: false,
            // saved: false
            options: {
                clients: [{ id: "AU", text: "Australia" }]
            },            
        }
    },
    methods: {
        tabClicked() {
            // JQuery tab funcionality
            $(this.$el).tab("show")
        },
        selectCurr(curr) {
            this.selectedCurrency = curr
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
                    // this.saved = true
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
                this.invoice.client_id = +this.invoice.client_id
                this.canSave = false
                this.edit = false
            } else {
                var x = new Invoice(this.base, this.profile)
                x.fill(data)
                this.invoice = x ;  //console.log("x", this.invoice)
                this.canSave = true
                this.edit = true
                this.$emit('gotRecords', data._records)
                this.invoice.client_id = typeof data._clients[0] == 'undefined'? 0 : data._clients[0].id
                this.invoice.warehouse_id = typeof data._warehouses[0] == 'undefined'? 0 : data._warehouses[0].id
                
            }
        },
        OnCanSave(val) {
            console.log("can save invoice", val)
            this.canSave = val
        },
        readInvoice() { // after reading, edit mode will become active        
            if ( !this.canSave || confirm("هل تريد قراءة الفاتورة؟ سوف تخسر البيانات غير المحفوظة") ) {
                axios.get("/api/invoices?serial=" + this.invoice.serial+'&NType='+Store.urlParam('type')) //?ser='+this.invoice.serial
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
                    // this.saved = true
                    this.Msg.success({ title: "تم بنجاح!", message: "تعديل الفاتورة" })
                })
                .catch(error => {
                    this.Msg.error({title: "حدث خطأ!", message: "حدث خطأ أثناء تعديل الفاتورة"})
                    console.log("error", error)
                })
        },


        onSearch(search, loading) {
                loading(true);
                this.search(loading, search, this);
        },
        search: _.debounce((loading, search, vm) => {
            fetch( `https://api.github.com/search/repositories?q=${escape(search)}` )
                .then(res => {
                    res.json().then(json => (vm.options = json.items));
                    loading(false);
                });
        }, 200)
    },
    watch: {
        invoice: {
            handler: function(newValue) {
                this.selectedCurrency = this.currencies.find(function(el) {
                    return el.id == newValue.currency_id
                })
            },
            deep: true
        }
    },
    mounted() {
        console.log("Component <invoice-selling> mounted.")
        this.init()
    }
}
</script>

<style scopedX lang="scss">
.tab-content .tab-pane { min-height: 270px } 
.cursor-pointer.absolute.flex.items-center.icons{float: left !important;}
.list-reset{
    border: 1px solid #777; border-radius: 5px;  background: #fff; border-top: 0;
    li{text-align: center !important; text-align: center !important; padding: 3px 0px;
        &:hover{background: #777; color: #fff;}
    }
}

</style>