@extends('master')
@section('title', ' My Bases')
@section('card-header')
    My Bases 
    @modalbtn(['modalid'=>'createBaseModal', 'classes'=>'float-right']) Create Base @endmodalbtn
@endsection

@section('content')
    @modal(['title' => 'Create Base', 'showBtn' => false, 'footer' => ['ok'=>'Create', 'cancel'=>'Close'], 'btn' =>['text'=>'Create Base', 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createBaseModal'])
        <form action="/bases" method="post" class="px-5" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3">Title</label>
                <input type="text" name="title" class="form-control col-sm-9" placeholder="Enter a title..">
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Materials</label>
                <input type="number" name="materials" class="form-control col-sm-9" placeholder="Enter a title..">
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Groups</label>
                <input type="number" name="groups" class="form-control col-sm-9" placeholder="Enter a title..">
            </div>
        </form>
    @endmodal    

    <ul class="list-unstyled">
        @forelse(auth()->user()->_bases as $base)
            <li><a href="#">{{$base->title}} - {{$base->created_at}}</a></li>
        @empty
            @alert
                You don't have any bases. You can create one.
            @endalert
        @endforelse        
    </ul>
@endsection

@section('styles')
    .btn{}
@endsection