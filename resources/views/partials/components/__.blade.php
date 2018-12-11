<?php       
    if(!isset($classes))
        $classes = "";
?>

<button type="button" class="btn btn-{{$type}} {{$classes}}" data-toggle="modal" data-target="#{{$modalid}}">
    {{$slot}}
</button>