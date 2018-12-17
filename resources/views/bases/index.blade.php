@extends('master')
@section('title', ' My Bases')
@section('card-header')
    My Bases 
    @modalbtn(['modalid'=>'createBaseModal', 'classes'=>'float-right']) Create Base @endmodalbtn
@endsection

@section('content')
    @modal(['title' => 'Create Base', 'showBtn' => false, 'footer' => ['ok'=>'Create', 'cancel'=>'Close'], 'btn' =>['text'=>'Create Base', 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createBaseModal'])
        <form action="/bases" method="post" class="px-5X" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4">Basetitle</label>
                <input type="text" name="title" placeholder="Enter a title.." class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">accounts guide</label>
                <ul class="list-unstyled">
                    <li><input type="radio" name="accGuide" value="0" checked>empty</li>
                    <li><input type="radio" name="accGuide" value="1">account guide</li>
                </ul>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">Profile title</label>
                <input type="text" name="profileTitle" placeholder="Enter a profile title.." class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">Start period date</label>
                <input type="text" name="startPeriodDate" placeholder="Enter a start period date.." class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">End period date</label>
                <input type="text" name="endPeriodDate" placeholder="Enter an end period date.." class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">default currency</label>
                <select name="currency" class="form-control col-sm-8">
                    @foreach($currencies as $key=>$currency)
                        <option value="{{$key}}">{{$currency}}</option>
                    @endforeach
                </select>
            </div>
            <ul class="list-unstyled my-0">
                <li><input type="checkbox" name="reqPass" class="mx-2">require password</li>
            </ul>
        </form>
    @endmodal    

    <ul class="list-unstyled">
        @forelse(auth()->user()->_bases as $base)
            <li><a href="/bases/{{$base->id}}">{{$base->title}} - {{$base->created_at}}</a></li>
        @empty
            @alert
                You don't have any bases. You can create one.
            @endalert
        @endforelse        
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