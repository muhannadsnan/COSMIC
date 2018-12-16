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
        <form action="/profiles" method="post" class="px-5" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3">Title</label>
                <input type="text" name="title" class="form-control col-sm-9" placeholder="Enter a title..">
            </div>
            <div class="form-group row">
                <label class="col-sm-3">endPeriodDate</label>
                <input type="number" name="endPeriodDate" class="form-control col-sm-9" placeholder="Enter a endPeriodDate..">
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Code</label>
                <input type="number" name="code" class="form-control col-sm-9" placeholder="Enter a code..">
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