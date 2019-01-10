@extends('window')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['active' => '', 'text' => request('base')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    {{__('lbl.invoice.3')}}
@endsection

@section('content')
<div id="app" class="d-flexX justify-content-centerX">
    <div class="row form-group">
        <div class="col-sm-6 px-0">
            <div class="row form-group">
                <label class="col-sm-4 d-flex">العميل</label>
                <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
            </div>
            <div class="row form-group">
                <div class="col-sm-6 px-0">
                    <div class="row form-group mb-0">
                        <label class="col-sm-4 d-flex">العملة</label>
                        <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
                    </div>
                </div>
                <div class="col-sm-6 px-0">
                    <div class="row form-group mb-0">
                        <label class="col-sm-4 d-flex">التعادل</label>
                        <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6 px-0">
                    <div class="row form-group mb-0">
                        <label class="col-sm-4 d-flex">التاريخ</label>
                        <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
                    </div>
                </div>
                <div class="col-sm-6 px-0">
                    <div class="row form-group mb-0">
                        <label class="col-sm-4 d-flex">الدفع</label>
                        <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 px-0">
            <div class="row form-group">
                <label class="col-sm-4 d-flex">CCCCCC</label>
                <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
            </div>
            <div class="row form-group">
                <label class="col-sm-4 d-flex">المستودع</label>
                <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
            </div>
            <div class="row form-group">
                <label class="col-sm-4 d-flex">حساب العميل</label>
                <input type="text" name="" id="" class="form-control col-sm-8" placeholder="enter value...">
            </div>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-sm-2 d-flex">FFFFFFF</label>
        <input type="text" name="" id="" class="form-control col-sm-10" placeholder="enter value...">
    </div>

    <hr>
    <Records></Records>
</div>
@endsection

@section('styles')
    <style>
        .form-group{margin: 3px 0}
        label{direction: <?=__('lbl.direct2')?> !important; }
    </style>
@endsection

@section('scripts')
    <!-- <script>
        $(document).ready(function(){
            
        });
    </script> -->
@endsection