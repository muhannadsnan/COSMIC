@extends('master')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['href' => '/bases', 'text' => session('app.base')->title],
                        ['active' => '', 'text' =>  __('lbl.account.0')],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
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

    @modalbtn(['modalid'=>'createAccountModal', 'classes'=>'float-left']) {{__('lbl.account.create')}} @endmodalbtn

    @if(session('app.base')->accGuide && count($accounts))
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

            /***  COLLECT DATA & GENERATE TREE VIEW FROM THE ENTRIES  ***/
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
            // https://www.cssscript.com/tag/tree-view/
        });
    </script>
@endsection