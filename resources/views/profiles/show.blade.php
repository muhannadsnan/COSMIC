@extends('master')
@section('title', ' My Profiles')
@section('card-header')
    @breadcrumb(['items' =>[
                            ['href' => '/bases', 'text' => 'Bases'],
                            ['href' => "/bases/".session('app.base')->id, 'text' => session('app.base')->title],
                            ['href' => "/bases/".session('app.base')->id."/profiles", 'text' => 'Profiles'],
                            ['active' => '', 'text' => session('app.profile')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
@endsection

@section('content')
{{print_r(session('app.profile')->toArray())}}
    <ul class="list-unstyled">
        <li><a href="/profiles?from=">Profiles</a></li>
        <li><a href="/profiles?from=">Groups</a></li>
        <li><a href="/profiles?from=">Materials</a></li>
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