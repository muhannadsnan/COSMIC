<?php       
    if(!isset($title))
        $title = "";
    if(!isset($items))
        $items = [];
?>

<div class="dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{$slot}}</a>
    <div class="dropdown-menu">
        @foreach($items as $key => $item)
            @if($item == 'divider')
                <div class="dropdown-divider"></div>    
            @else        
                <a class="dropdown-item" href="{{$item}}">{{$key}}</a>     
            @endif   
        @endforeach
        <div class="{{__('lbl.drop1')}}">
            <!-- <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropright
            </button> -->
            <div class="dropdown-item  sub-menu-btn " href="{{$item}}">
                <div class="dropdown-toggle">title</div>                
            </div>
            <div class="dropdown-menu sub-menu">
                <a class="dropdown-item" href="{{$item}}">xxxx</a>
                <a class="dropdown-item" href="{{$item}}">xxxx</a>
                <a class="dropdown-item" href="{{$item}}">xxxx</a>
            </div>
        </div>
    </div>

</div>