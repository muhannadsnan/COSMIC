@extends('window')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' =>[
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['href' => '/bases', 'text' => request('base')->title],
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
            <input type="hidden" name="base_id" value="{{request('base')->id}}">
        </form>
    @endmodal   

    @modalbtn(['modalid'=>'createAccountModal', 'classes'=>'float-left']) {{__('lbl.account.create')}} @endmodalbtn

    @if(request('base')->accGuide && count($accounts))
        <button id="expandAll" class="btn btn-sm btn-outline-info"><i class="fas fa-plus"></i></button>
        <button id="collapseAll" class="btn btn-sm btn-outline-info"><i class="fas fa-minus"></i></button>
        <div id="tree" class="mt-3"></div>
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
    <!-- <link rel="stylesheet" href="{{ URL::asset('treeview.min.css') }}" /> -->
    <link rel="stylesheet" href="{{ URL::asset('bootstrap-treeview/bootstrap-treeview.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>

    </style>
@endsection

@section('scripts')
    <!-- <script type="text/javascript" src="{{ URL::asset('treeview.min.js') }}"></script> -->
    <script type="text/javascript" src="{{ URL::asset('bootstrap-treeview/bootstrap-treeview.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('BootstrapMenu.min.js') }}"></script>
    <script>
        $(document).ready(function(){ /***  COLLECT DATA & GENERATE TREE VIEW FROM THE ENTRIES  ***/
            var accounts = <?php echo $accounts; ?>; console.log("accounts",accounts);
            accounts = Object.values(accounts);            
            var tree = []; 

            accounts.forEach(function(item){
                if(item._parents.length > 0){
                    item._parents.forEach(function(parent){
                        tree.push({id: item.id, text: item.title/* +"--"+item.id */, parent: parent.id})                    
                    });
                }else{
                    tree.push({id: item.id, text: item.title/* +"--"+item.id */, parent: 0}) 
                }
            });     console.log("tree",tree);  

            var allowedLevels = 200;
            function getNestedChildren(arr, parent) {   //console.log("allowedLevels", allowedLevels);
                    var output = [], item = {text: ''};
                    for(var i=0; i< arr.length;i++) { // console.log("item", item);                        
                        if(arr[i].parent == parent) {
                            if(allowedLevels != 0){
                                allowedLevels--;
                                var children = getNestedChildren(arr, arr[i].id); //console.log("continue", allowedLevels);
                                
                            }else{
                                var children = [];
                            }
                            if(children.length) {
                                arr[i].nodes = children 
                            }  
                            arr[i].text += '<i class="fas fa-chevron-circle-down"></i>'
                            // arr[i].selectable = false
                            output.push(arr[i])
                        }
                    }
                    return JSON.parse(JSON.stringify(output));
            }
            tree = getNestedChildren(tree, 0); console.log("newTree",tree);  
            $('#tree').treeview({data: tree, onhoverColor: '#ededed', expandIcon: 'fas fa-plus', collapseIcon: 'fas fa-minus'});

            $( "#collapseAll" ).on( "click", function() {
                $('#tree').treeview('collapseAll', { silent: true });
            });
            $( "#expandAll" ).on( "click", function() {
                $('#tree').treeview('expandAll', { silent: true });
            }); 
            // bootstrap treeview link : https://github.com/jonmiles/bootstrap-treeview

            var menu = new BootstrapMenu('#tree ul li.node-tree', { menuEvent: 'right-click', menuSource: 'element', menuPosition: 'belowRight',
                                                                actions: [{
                                                                    name: 'بطاقة الحساب',
                                                                    iconClass: 'fas fa-star',
                                                                    onClick: function(row) {
                                                                        alert("hello");
                                                                    }
                                                                }, {
                                                                    name: 'خيارات',
                                                                    iconClass: 'fas fa-lock',
                                                                    onClick: function(row) {
                                                                        alert("hello");
                                                                    }
                                                                }]
                                                            });
            // Bootstrap Menu Link: https://github.com/dgoguerra/bootstrap-menu
            
        });
    </script>
@endsection