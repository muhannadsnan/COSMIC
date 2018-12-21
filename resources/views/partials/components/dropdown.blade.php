<?php       //dd($items);
    if(!isset($title))
        $title = "";
    if(!isset($items))
        $items = [];
?>

<div class="dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{$slot}}</a>
    <div class="dropdown-menu"> 
        @foreach($items as $key => $item)
            @if($key == 'divider')
                <div class="dropdown-divider"></div>         

            @elseif($key == 'submenu')  0
                <div class="{{__('lbl.drop1')}}">
                    <div class="dropdown-item  sub-menu-btn " href="#">
                        <div class="dropdown-toggle">{{$item[0]}}</div>                
                    </div>
                    <div class="dropdown-menu sub-menu">
                        @foreach(array_splice($item, 1, count($item)-1) as $k => $subItem)
                            <a class="dropdown-item" href="{{$subItem}}">{{$k}}</a> 
                        @endforeach
                    </div>
                </div>

            @else        
                <a class="dropdown-item" href="{{$item}}">{{$key}}</a>
            @endif
        @endforeach
    </div>
</div>