@extends('master')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => 'Bases'],
                        ['href' => "/bases/".session('app.base')->id, 'text' => session('app.base')->title],
                        ['active' => '', 'text' => 'Profiles']
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    @modalbtn(['modalid'=>'createProfileModal', 'classes'=>'float-right']) Create Profile @endmodalbtn
@endsection

@section('content')
    @modal(['title' => 'Create Profile', 'showBtn' => false, 'footer' => ['ok'=>'Create', 'cancel'=>'Close'], 'btn' =>['text'=>'Create Profile', 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createProfileModal'])
        <form action="/profiles" method="post" class="px-5X" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4">Profile title</label>
                <input type="text" name="title" placeholder="Enter a profile title.." class="form-control col-sm-8">
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
            <input type="hidden" name="base_id" value="{{session('app.base')->id}}">
        </form>
    @endmodal    

    <ul class="list-unstyled">
        @forelse($profiles as $profile)
            <li><a href="profiles/{{$profile->id}}">{{$profile->title}} - {{$profile->created_at}}</a></li>
        @empty
            @alert
                You don't have any profiles. You can create one.
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