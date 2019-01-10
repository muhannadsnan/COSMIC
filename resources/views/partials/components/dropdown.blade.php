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
                @include('partials.components.submenu-dropdown', ['item' => $item])

            @else  
                <a class="dropdown-item" href="{{$item}}" onclick="{{openNewWindow($item)}}">{{$key}}</a>
            @endif
        @endforeach
    </div>
</div>