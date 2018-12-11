@extends('master')
@section('title', ' My Bases')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => 'Bases'],
                        ['active' => '', 'text' => $base->title]
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
@endsection

@section('content')
    <ul class="list-unstyled">
        <li><a href="/profiles?from=bases.{{$base->id}}">Profiles</a></li>
        <li><a href="/profiles?from=bases.{{$base->id}}">Groups</a></li>
        <li><a href="/profiles?from=bases.{{$base->id}}">Materials</a></li>
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