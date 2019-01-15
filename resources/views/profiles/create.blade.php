@extends('master')
@section('title', '........')
@section('card-header')
    <ol class="breadcrumb bg-light col-sm-6 float-left">
        <li class="breadcrumb-item"><a href="/bases">Bases</a></li>
        <li class="breadcrumb-item"><a href="/bases/{{$from[2]}}">{{$base->title}}</a></li>
        <li class="breadcrumb-item active">Profiles</li>
    </ol>
    Page Title...
@endsection

@section('content')
    <pre>{{print_r($from)}}</pre>
    <pre>{{print($base)}}</pre>
@endsection

@section('styles')
<style>
    
</style>
@endsection

@section('scripts')
<!-- <script>

</script> -->
@endsection