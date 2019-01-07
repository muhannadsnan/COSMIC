@extends('master')
@section('title', ' My Bases')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['active' => '', 'text' => $base->title]
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    @modalbtn(['modalid'=>'createProfileModal', 'classes'=>__('lbl.float-2')]) {{__('lbl.profile.create')}} @endmodalbtn
    @modalbtn(['modalid'=>'updateBaseModal', 'classes'=>__('lbl.float-2'), 'type'=>'warning']) {{__('lbl.base.edit')}} @endmodalbtn
@endsection

@section('content')
    @modal(['title' => __('lbl.profile.create'), 'showBtn' => false, 'footer' => ['ok'=>__('lbl.save'), 'cancel'=>__('lbl.close')], 'btn' =>['text'=>__('lbl.profile.create'), 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createProfileModal'])
        <form action="/profiles" method="post" class="px-5X" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.profile.title')}}</label>
                <input type="text" name="title" placeholder="{{__('msg.enter_entity', ['entity'=>'اسم الملف'])}}" class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.profile.startPeriodDate')}}</label>
                <input type="text" name="startPeriodDate" placeholder="{{__('msg.enter_entity', ['entity'=>'تاريخ بداية المدة'])}}" class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.profile.endPeriodDate')}}</label>
                <input type="text" name="endPeriodDate" placeholder="{{__('msg.enter_entity', ['entity'=>'تاريخ نهاية المدة'])}}" class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.profile.currency')}}</label>
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
        @forelse($base->_profiles as $profile)
            <li><a href="{{$base->id}}/profiles/{{$profile->id}}">{{$profile->title}}</a></li>
        @empty
            @alert
                {{__('msg.no_entity', ['entity'=>'ملفات'])}}
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