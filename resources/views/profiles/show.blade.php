@extends('master')
@section('title', ' My Profiles')
@section('card-header')
    @breadcrumb(['items' => [
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['href' => "/bases/".request('base')->id, 'text' => request('base')->title],
                        /**** 'href' => "/bases/".request('base')->id."/profiles", 'text' => __('lbl.profile.0')], ****/
                        ['active' => '', 'text' => request('profile')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    @modalbtn(['modalid'=>'updateProfileModal', 'classes'=>__('lbl.float-2'), 'type'=>'warning']) {{__('lbl.profile.edit')}} @endmodalbtn
@endsection

@section('content')
    <h1>
        SHOW DESKTOP !
    </h1>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('treeview.min.css') }}" />
    <style>
        
    </style>
@endsection

@section('scripts')
    
@endsection