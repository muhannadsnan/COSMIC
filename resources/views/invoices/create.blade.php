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
    @if(!isset($_GET['type'])) 
        @alert(['type'=>'danger']) Invoice without type!! @endalert() 
    @else
        @switch($_GET['type'])
            @case (1)
                <h1>case: 1</h1>
                @break
            @case (2)
                <invoice-selling :currencies="{{json_encode($currencies)}}" :pay="{{json_encode($payment)}}"></invoice-selling>
                @break
            @default
                <h1>default</h1>
        @endswitch
    @endif
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