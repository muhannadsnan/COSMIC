<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Model extends Model
{
    protected $guarded = [];
    public $from = "";

    public function getFromUrl($url)
    {
        $this->from = explode("/", $url);
    }
}
