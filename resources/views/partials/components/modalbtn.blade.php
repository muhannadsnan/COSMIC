<?php
    if(!isset($modalid)) // modalid for the modal
        $modalid = "exampleModalCenter";        
    if(!isset($classes))
        $classes = "";
    if(!isset($type))
        $type = "success";
?>

<button type="button" class="btn btn-{{$type}} {{$classes}} modal-btn" data-toggle="modal" data-target="#{{$modalid}}">
    {{$slot}}
</button>