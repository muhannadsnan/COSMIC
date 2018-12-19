@extends('master')
@section('title', ' My Bases')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['active' => '', 'text' => $base->title]
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    @modalbtn(['modalid'=>'updateBaseModal', 'classes'=>__('lbl.float-2'), 'type'=>'warning']) {{__('lbl.base.edit')}} @endmodalbtn
@endsection

@section('content')
    <ul class="list-unstyled">
        <li><a href="/bases/{{$base->id}}/profiles">{{__('lbl.profile.0')}}</a></li>
        <li><a href="/bases/{{$base->id}}/profiles">{{__('lbl.group.0')}}</a></li>
        <li><a href="/bases/{{$base->id}}/profiles">{{__('lbl.material.0')}}</a></li>
    </ul>
@endsection

@section('styles')
<style>
    
</style>
@endsection

@section('scripts')
<script>

</script>
@endsection