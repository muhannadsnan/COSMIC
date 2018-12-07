@extends('master')
@section('title', 'xxx')

@section('content')
    <ul>
        @forelse(auth()->user()->_bases as $base)
            <li><a href="#">{{$base->title}} - {{$base->created_at}}</a></li>
        @empty
            <div class="alert alert-info">
                You don't have any bases. You can create one.
            </div>
        @endforelse
    </ul>
@endsection