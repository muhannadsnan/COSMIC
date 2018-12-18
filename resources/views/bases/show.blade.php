@extends('master')
@section('title', ' My Bases')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => 'Bases'],
                        ['active' => '', 'text' => $base->title]
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    @modalbtn(['modalid'=>'updateBaseModal', 'classes'=>'float-right', 'type'=>'warning']) Edit @endmodalbtn
@endsection

@section('content')
    <ul class="list-unstyled">
        <li><a href="/bases/{{$base->id}}/profiles">Profiles</a></li>
        <li><a href="/bases/{{$base->id}}/profiles">Groups</a></li>
        <li><a href="/bases/{{$base->id}}/profiles">Materials</a></li>
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