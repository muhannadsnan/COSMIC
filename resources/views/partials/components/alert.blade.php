<?php
    if(! isset($type))
        $type = 'secondary';
?>

<div class="alert alert-{{$type}}">
    @if(isset($title))
        <div class="alert-title"><strong>{{ $title }}</strong></div>
    @endif
    {{ $slot }}
</div>