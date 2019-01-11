<template>
    <div class="containerX">
        <div class="tab-content" id="v-pills-tabContent">
            <div id="invoiceRecords" class="tab-pane fade show active" role="tabpanel">
                <div class="row form-group">
                    <div class="col-sm-6 px-0">
                        <div class="row form-group">
                            <label class="col-sm-2 d-flex">العميل</label>
                            <input type="text" name="" id="" class="form-control col-sm-10" placeholder="أدخل قيمة...">
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">العملة</label>
                                    <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">التعادل</label>
                                    <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">التاريخ</label>
                                    <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="row form-group mb-0">
                                    <label class="col-sm-4 d-flex">الدفع</label>
                                    <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 px-0">
                        <div class="row form-group">
                            <label class="col-sm-4 d-flex">درجة السرية</label>
                            <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-4 d-flex">المستودع</label>
                            <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-4 d-flex">حساب العميل</label>
                            <input type="text" name="" id="" class="form-control col-sm-8" placeholder="أدخل قيمة...">
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-1 d-flex">البيان</label>
                    <input type="text" name="" id="" class="form-control col-sm-11" placeholder="أدخل قيمة...">
                </div>

                <hr>
                <records></records>
                <hr>
            </div>

            <div id="invoiceDetails" class="tab-pane fade" role="tabpanel">
                <h1>حقول الفاتورة</h1>
            </div>
        </div>

        <ul class="nav nav-pills nav-fill TABS-bottom" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="invoiceRecords" data-toggle="pill" role="tab" href="#invoiceRecords" @click="tabClicked">حفظ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="invoiceDetails" data-toggle="pill" role="tab" href="#invoiceDetails" @click="tabClicked">المزيد</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="invoiceClear" href="#" @click="$emit('ClearInvoice')">إلغاء الفاتورة</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                invoice: {},
                loading: false
            }
        },
        methods: {
            tabClicked(){
                $(this.$el).tab('show')
            }
        },
        mounted() {
            console.log('Component <invoice-selling> mounted.')
        }
    }
</script>