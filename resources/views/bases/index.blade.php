@extends('master')
@section('title', " - ".__('lbl.base.0'))
@section('card-header')
    {{__('lbl.base.0')}} 
    @modalbtn(['modalid'=>'createBaseModal', 'classes'=>__('lbl.float-2')]) {{__('lbl.base.create')}} @endmodalbtn
@endsection

@section('content')
    @modal(['title' => __('lbl.base.create'), 'showBtn' => false, 'footer' => ['ok'=>__('lbl.save'), 'cancel'=>__('lbl.close')], 'btn' =>['text'=>'Create Base', 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createBaseModal'])
        <form action="/bases" method="post" class="px-5X" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.base.title')}}</label>
                <input type="text" name="title" placeholder="{{__('msg.enter_entity', ['entity'=>'اسم القاعدة'])}}" class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.base.accGuide')}}</label>
                <ul class="list-unstyled">
                    <li><input type="radio" name="accGuide" value="0" checked>{{__('lbl.empty')}}</li>
                    <li><input type="radio" name="accGuide" value="1">{{__('lbl.base.accGuide')}}</li>
                </ul>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.profile.title')}}</label>
                <input type="text" name="profileTitle" placeholder="{{__('msg.enter_entity', ['entity'=>'اسم المف'])}}" class="form-control col-sm-8">
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
            <ul class="list-unstyled my-0">
                <li><input type="checkbox" name="reqPass" class="mx-2">{{__('lbl.base.reqPass')}}</li>
            </ul>
        </form>
    @endmodal    

    <ul class="list-unstyled">
        @forelse(auth()->user()->_bases as $base)
            <li><a href="/bases/{{$base->id}}">{{$base->title}}</a></li>
        @empty
            @alert
                {{__('msg.no_entities', ['entity'=>'قواعد'])}}
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