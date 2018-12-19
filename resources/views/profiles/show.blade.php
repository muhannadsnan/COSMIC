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
    @modalbtn(['modalid'=>'updateProfileModal', 'classes'=>'float-right', 'type'=>'warning']) Edit Profile @endmodalbtn
@endsection

@section('content')
    @modal(['title' => 'Create Account', 'showBtn' => false, 'footer' => ['ok'=>'Create', 'cancel'=>'Close'], 'btn' =>['text'=>'Create Account', 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createAccountModal'])
        <form action="/profiles" method="post" class="px-5X" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4">Account title</label>
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
            <input type="hidden" name="base_id" value="{{session('app.base')->id}}">
        </form>
    @endmodal   
    @lang('lbl.bases.0')
    <div class="TABS">
        <ul class="nav nav-tabs " id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="accounts-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="accounts" aria-selected="true">Accounts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="invoices-tab" data-toggle="tab" href="#invoices" role="tab" aria-controls="invoices" aria-selected="false">Invoices</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>
        <div class="tab-content border border-default border-top-0 p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                @modalbtn(['modalid'=>'createAccountModal', 'classes'=>'float-right']) Create Account @endmodalbtn
                @if(session('app.base')->accGuide)
                    @forelse($accounts as $key=>$account)
                        <p>{{$account->title}}</p>
                    @empty
                        @alert You don't have any accounts. You can create one. @endalert
                    @endforelse
                @else
                    @alert Accounts guide is empty. Create an account. @endalert
                @endif
            </div>
            <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">22222222222222222222</div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">3333333333333333333</div>
        </div>
    </div> 
@endsection

@section('styles')
<style>
    
</style>
@endsection

@section('scripts')
<script>
    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
@endsection