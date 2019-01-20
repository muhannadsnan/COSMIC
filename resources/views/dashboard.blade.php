@extends('master')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    {{__('lbl.dashboard.0')}}
@endsection

@section('content')

    @switch(@$_GET['tab'])
        @case ('oauth')
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
            @break;
    @endswitch


@endsection

@section('styles')
    <style>
        
    </style>
@endsection

@section('scripts')
    <!-- <script>
        $(document).ready(function(){
            
        });
    </script> -->
@endsection