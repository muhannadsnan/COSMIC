@extends('master')
@section('title', ' My Bases')
@section('card-header')
    <ol class="breadcrumb bg-light col-sm-6 float-left">
        <li class="breadcrumb-item"><a href="/bases">Base</a></li>
        <li class="breadcrumb-item active">{{$base->title}}</li>
    </ol>
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