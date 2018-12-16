<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Model extends Model
{
    protected $guarded = [];
    
    public static function SiteTree($items) //[$base, $profile] //fill session for SiteTree if not set
    {
        // dd($items);
        if(isset($items[0])){
            session(['app.base' => $items[0]]);
        }
        else if(isset($items[1])){
            session(['app.profile' => $items[1]]);
        }
    }
}
