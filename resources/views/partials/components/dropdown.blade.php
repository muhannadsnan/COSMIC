<?php       //dd($items);
    if(!isset($title))
        $title = "";
    if(!isset($items))
        $items = [];
        // dd($items);
?>

<div class="dropdown">
    <a class="nav-link dropdown-toggle btn btn-outline-successx ml-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{$slot}}</a>
    <div class="dropdown-menu"> 
        @foreach($items as $key => $item) 
            @if($item == 'divider')
                <div class="dropdown-divider" style="border-color: #ccc;"></div>         

            @elseif(is_array($item)) 
                <div class="{{__('lbl.drop1')}}">
                    @if(@$item[0] === 'same_window') 
                        <a class="dropdown-item" href="{{$item[2]}}">{{$item[1]}}</a> 
                    @else
                        <div class="dropdown-item  sub-menu-btn " href="#">
                            <div class="dropdown-toggle" >{{$item[0]}}</div> 
                        </div> 
                        <div class="dropdown-menu sub-menu">
                            @foreach(array_splice($item, 1, count($item)-1) as $k => $subItem)
                                <a class="dropdown-item" href="{{$subItem}}">{{$k}}</a> 
                            @endforeach
                        </div>  
                    @endif
                </div>

            @else  
                <a class="dropdown-item" href="{{$item}}" onclick="{{openNewWindow($item)}}">{{$key}}</a>
            @endif
        @endforeach
    </div>
</div>