@extends('master')
@section('title', ' My Profiles')
@section('card-header')
    @breadcrumb(['items' => [
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['href' => "/bases/".session('app.base')->id, 'text' => session('app.base')->title],
                        ['href' => "/bases/".session('app.base')->id."/profiles", 'text' => __('lbl.profile.0')],
                        ['active' => '', 'text' => session('app.profile')->title],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    @modalbtn(['modalid'=>'updateProfileModal', 'classes'=>__('lbl.float-2'), 'type'=>'warning']) {{__('lbl.profile.edit')}} @endmodalbtn
@endsection

@section('content')
    @modal(['title' => __('lbl.account.create'), 'showBtn' => false, 'footer' => ['ok'=>__('lbl.save'), 'cancel'=>__('lbl.close')], 'btn' =>['text'=>__('lbl.account.create'), 'type'=>'warning', 'classes'=>'mb-2'], 'id'=>'createAccountModal'])
        <form action="/profiles" method="post" class="px-5X" id="form1">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4">{{__('lbl.account.title')}}</label>
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
    <div class="TABS">
        <ul class="nav nav-tabs " id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="accounts-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="accounts" aria-selected="true">{{__('lbl.account.0')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="invoices-tab" data-toggle="tab" href="#invoices" role="tab" aria-controls="invoices" aria-selected="false">{{__('lbl.invoice.0')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">{{__('lbl.settings.0')}}</a>
            </li>
        </ul>  
        <div class="tab-content border border-default border-top-0 p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                @modalbtn(['modalid'=>'createAccountModal', 'classes'=>'float-left']) {{__('lbl.account.create')}} @endmodalbtn
                @if(session('app.base')->accGuide)
                    <button id="expandAll">+</button>
                    <button id="collapseAll">-</button>
                    <div id="tree"></div>
                    {{-- @forelse($accounts->where('closing_acc_id', '=', null) as $key=>$account)
                        <p>{{$key+1}}.{{$account->title}} -- {{$account->_children->first()['title']}}</p>
                    @empty
                        @alert You don't have any accounts. You can create one. @endalert
                    @endforelse --}}
                @else
                    @alert {{__('msg.entity_is_empty', ['entity'=>'دليل الحسابات'])}} @endalert
                @endif
            </div>
            <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">22222222222222222222</div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">3333333333333333333</div>
        </div>
    </div>  
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('treeview.min.css') }}" />
    <style>
        
    </style>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('treeview.min.js') }}"></script>
    <script>
        $(document).ready(function(){                
            $('#myTab a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            });

            //var acc = <?php echo json_encode($accounts->where('closing_acc_id', '=', null)); ?>; console.log(acc);
            var acc = <?php echo $accounts; ?>; console.log(acc);
            acc = Object.values(acc);
            
            var tree = [];

            acc.forEach(function(item){
                if(item._parents.length > 0){
                    item._parents.forEach(function(parent){
                        tree.push({id: item.id, name: item.title+"--"+item.id, parent: parent.id})                    
                    });
                }else{
                    tree.push({id: item.id, name: item.title+"--"+item.id, parent: 0}) 
                }
            });     console.log("tree",tree);
            /*tree=[
                {id: 1, name: "a", parent: 0},
                {id: 2, name: "b", parent: 0},
                {id: 3, name: "c", parent: 0},
                {id: 4, name: "d", parent: 1},
                {id: 5, name: "e", parent: 2},
                {id: 6, name: "f", parent: 1},
                {id: 7, name: "g", parent: 8},
                {id: 8, name: "h", parent: 4},
            ];*/
            var allowedLevels = 200;
            function getNestedChildren(arr, parent) {   //console.log("allowedLevels", allowedLevels);
                    var out = [];  var counter = 0; 
                    for(var i=0; i< arr.length;i++) { //console.log(i);
                        if(arr[i].parent == parent) {
                            if(allowedLevels != 0){
                                allowedLevels--;
                                var children = getNestedChildren(arr, arr[i].id); //console.log("continue", allowedLevels);
                            }else{
                                var children = [];
                            }
                            if(children.length) {
                                arr[i].children = children
                            }
                            out.push(arr[i])
                        }
                    }
                    return JSON.parse(JSON.stringify(out));
                    //return out
            }
            tree = getNestedChildren(tree, 0); console.log("newTree",tree);

            var t = new TreeView(tree, 'tree'); //console.log(t);
            t.expandAll();

            var expandAll = document.getElementById('expandAll');
            var collapseAll = document.getElementById('collapseAll');

            expandAll.onclick = function () { t.expandAll(); };
            collapseAll.onclick = function () { t.collapseAll(); };
        });
    </script>
@endsection