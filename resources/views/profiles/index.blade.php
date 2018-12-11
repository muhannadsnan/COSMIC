@extends('master')
@section('title', '........')
@section('card-header')
    <ol class="breadcrumb bg-light col-sm-6 float-left">
        <li class="breadcrumb-item"><a href="/bases">Bases</a></li>
        <li class="breadcrumb-item"><a href="/bases/{{$from[1]}}">{{$base->title}}</a></li>
        <li class="breadcrumb-item active">Profiles</li>
    </ol>
    @modalbtn(['modalid'=>'createProfileModal', 'classes'=>'float-right']) Create Profile @endmodalbtn
@endsection

@section('content')
    @modal(['title' => 'Create Profile', 'showBtn' => false, 'footer' => ['ok'=>'Create', 'cancel'=>'Close'], 'btn' =>['text'=>'Create Profile', 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createProfileModal'])
        <form action="/profile" method="post" class="px-5" id="form1">
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
        {{-- @forelse($base->_profiles as $profile)
            <li><a href="/profiles/{{$profile->id}}">{{$profile->title}} - {{$profile->created_at}}</a></li>
        @empty
            @alert
                You don't have any profiles. You can create one.
            @endalert
        @endforelse      --}}  
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