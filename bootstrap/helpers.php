
<?php

function linkTo($url)
{
    return '/bases/'.request('base')->id.'/profiles/'.request('profile')->id.$url;
}

function makeLinkTo($baseID, $profileID, $url="")
{
    if($baseID == "") $baseID =request('base')->id;
    if($profileID == "") $profileID =request('profile')->id;
    return '/bases/'.$baseID.'/profiles/'.$profileID.$url;
}