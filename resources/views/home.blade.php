@extends('master')
@section('title', ' | Home')

@section('content')
<div class="col-md-8">
    <!-- @alert
        koko koko
    @endalert -->
    @auth
        <div class="card">
            <h4 class="card-header bg-primary text-lg">Dashboard</h4>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif     
                You are logged in!
            </div>
        </div>
    @endauth
    @guest
        <div class="card">
            <h4 class="card-header bg-warning text-lg">Dashboard</h4>
            <div class="card-body">
                This is the Welcome page for guests.            
            </div>
        </div>
    @endguest
</div>
@endsection