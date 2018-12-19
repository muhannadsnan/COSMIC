<?php       
    if(!isset($items))
        $items = [];
    if(!isset($classes))
        $classes = "";
?>

<ol class="breadcrumb bg-light col-sm-6 {{__('lbl.float-1')}} {{$classes}}">
    @foreach($items as $item)
        @if(isset($item['active']))
            <li class="breadcrumb-item active">{{$item['text']}}</li>
        @else
            <li class="breadcrumb-item"><a href="{{$item['href']}}">{{$item['text']}}</a></li>
        @endif
    @endforeach
</ol> 