@extends('master')
@section('title', ' My Profiles')
@section('card-header')
    @breadcrumb(['items' => [
                        ['href' => '/bases', 'text' => 'Bases'],
                        ['href' => "/bases/".session('app.base')->id, 'text' => session('app.base')->title],
                        ['href' => "/bases/".session('app.base')->id."/profiles", 'text' => 'Profiles'],
                        ['active' => '', 'text' => session('app.profile')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
@endsection

@section('content')
    <h3 class="text-center">Accounts</h3>
    <!-- <ul class="list-unstyled">
        <li><a href="/profiles?from=">Profiles</a></li>
        <li><a href="/profiles?from=">Groups</a></li>
        <li><a href="/profiles?from=">Materials</a></li>
    </ul> -->
    @foreach($accounts as $key=>$account)
        <p>Account: {{$account->title}} - Code: {{$account->code}}</p>
    @endforeach
@endsection

@section('styles')
<style>
    
</style>
@endsection

@section('scripts')
<script>

</script>
@endsection