@extends('master')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['active' => '', 'text' => request('base')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    {{lbl.x}}
@endsection

@section('content')

@endsection

@section('styles')
    <style>
        
    </style>
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function(){
            
        });
    </script>-- }}
@endsection