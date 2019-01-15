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
    <invoice-selling :currencies="{{json_encode($currencies)}}" :pay="{{json_encode($pay)}}"></invoice-selling>
</div>
@endsection

@section('styles')
    <style>
        .form-group{margin: 3px 0}
        ul.TABS-bottom a{text-align: center !important;}
    </style>
@endsection

@section('scripts')
    {{--<script>
        $(document).ready(function(){
            
        });
    </script> --}}
@endsection