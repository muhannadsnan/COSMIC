@extends('window')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')], 
                        ['active' => '', 'text' =>  request('base')->title], 
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    {{__('lbl.account.create')}}
@endsection

@section('content')
    <account :profile="{{request('profile')}}" :currencies="{{\App\Currency::all()}}"/>
@endsection

@section('styles')

@endsection

@section('scripts')
    
@endsection