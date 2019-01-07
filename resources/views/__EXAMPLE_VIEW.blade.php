@extends('master')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['active' => '', 'text' => session('app.base')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    Page Title...
@endsection

@section('content')

@endsection

@section('styles')
    <style>
        
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            
        });
    </script>
@endsection