<div class="{{__('lbl.drop1')}}">


    @if(@$item[0] === 'same_window') 
        <a class="dropdown-item" href="{{$item[2]}}">{{$item[1]}}</a> 

<!-- if an item is array, include self -->
<!-- ATinclude('partials.components.submenu-dropdown', ['item' => $item]) -->
    @else  
        <div class="dropdown-item  sub-menu-btn " href="#">
            <div class="dropdown-toggle" >{{$item[0]}}</div> 
        </div> 
        <div class="dropdown-menu sub-menu">
            @foreach(array_splice($item, 1, count($item)-1) as $k => $subItem)
                @if(@$subItem == 'divider')
                    <div class="dropdown-divider" style="border-color: #ccc;"></div> 
                @else
                    <a class="dropdown-item" href="{{$subItem}}">{{$k}}</a> 
                @endif
            @endforeach
        </div>          
    @endif
</div>