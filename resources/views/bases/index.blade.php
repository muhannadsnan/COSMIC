@extends('master')
@section('title', 'xxx')

@section('content')
    <ul>
        @forelse(auth()->user()->_bases as $base)
            <li><a href="#">{{$base->title}} - {{$base->created_at}}</a></li>
        @empty
            @alert
                You don't have any bases. You can create one.
            @endalert
        @endforelse
        
        @modal(['title' => 'Create Base','footer' => ['ok'=>'yes', 'cancel'=>'no'], 'btn' =>['text'=>'Create Base', 'type'=>'warning', 'classes'=>'btn-1 btn-2 btn-3']])
            hiiiiii
        @endmodal
    </ul>
@endsection

@section('styles')
    .btn{}
@endsection