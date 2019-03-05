@extends('window')
@section('title', '........')
@section('card-header')
    @breadcrumb(['items' => [
                        ['href' => '/bases', 'text' => __('lbl.base.0')],
                        ['href' => '/bases', 'text' => request('base')->title],
                        ['active' => '', 'text' =>  __('lbl.account.0')],
                    ], 'classes'=>''
                ]) 
    @endbreadcrumb
    <!-- @modalbtn(['modalid'=>'createAccountModal', 'classes'=>'float-left']) {{__('lbl.account.create')}} @endmodalbtn  -->

    <a id="createAccountBtn" href="#" class="btn btn-success float-left">{{__('lbl.account.create')}}</a>
@endsection

@section('content')
     
    @if(request('base')->accGuide && count($accounts))
        <button id="expandAll" class="btn btn-sm btn-outline-info"><i class="fas fa-plus"></i></button>
        <button id="collapseAll" class="btn btn-sm btn-outline-info"><i class="fas fa-minus"></i></button>
        <div id="tree" class="mt-3"></div> 
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
                        tree.push({id: item.id, text: item.title_ar/* +"--"+item.id */, parent: parent.id})                    
                    });
                }else{
                    tree.push({id: item.id, text: item.title_ar/* +"--"+item.id */, parent: 0}) 
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
                            arr[i].text += '<i class="fas fa-chevron-circle-down px-2"></i>'
                            // arr[i].selectable = false
                            output.push(arr[i])
                        }
                    }
                    return JSON.parse(JSON.stringify(output));
            }
            tree = getNestedChildren(tree, 0); console.log("newTree",tree);  
            var treeview = $('#tree').treeview({data: tree, onhoverColor: '#ededed', expandIcon: 'fas fa-plus', collapseIcon: 'fas fa-minus'});

            $( "#collapseAll" ).on( "click", function() {
                $('#tree').treeview('collapseAll', { silent: true });
            });
            $( "#expandAll" ).on( "click", function() {
                $('#tree').treeview('expandAll', { silent: true });
            }); 

            // bootstrap treeview link : https://github.com/jonmiles/bootstrap-treeview 
            var nodeid, node;
            var menu = new BootstrapMenu('#tree ul li.node-tree', { 
                            menuEvent: 'right-click',  
                            fetchElementData: function(row) {
                                nodeid = row[0].dataset.nodeid
                                node = $('#tree').treeview('getNode', nodeid)
                            },
                            actions: [
                                { name: 'بطاقة الحساب', iconClass: 'fas fa-star', onClick: function(row) { 
                                        window.open("accounts/"+node.id,'', ["width=800","height=600"]); 
                                    }
                                }, 
                                { name: 'خيارات', iconClass: 'fas fa-lock', onClick: function(row) {
                                        alert("not set yet")
                                    }
                                }
                            ]
                        });
            // Bootstrap Menu Link: https://github.com/dgoguerra/bootstrap-menu  

            $("#createAccountBtn").on("click", function(){
                window.open("accounts/create", "", ["width=800","height=600"])
            })
        });
    </script>
@endsection