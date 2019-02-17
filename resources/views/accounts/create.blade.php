@extends('window')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['href' => '/bases', 'text' => request('base')->title],
                        ['active' => '', 'text' =>  __('lbl.account.0')],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
@endsection

@section('content')
    <h1>accounts.create</h1>
@endsection

@section('styles')

@endsection

@section('scripts')
    
@endsection