
<?php

function linkTo($url)
{
    return '/bases/'.@request('base')->id.'/profiles/'.@request('profile')->id.$url;
}

function makeLinkTo($baseID, $profileID, $url="")
{
    if($baseID == "") $baseID =@request('base')->id;
    if($profileID == "") $profileID =@request('profile')->id;
    return '/bases/'.$baseID.'/profiles/'.$profileID.$url;
}

function openNewWindow($url, $title="title", $width=600, $height=600){
    // dd($url);
    return "MyWindow=window.open('".$url."','$title',[\"width=$width\",\"height=$height\"]); return false;";
}