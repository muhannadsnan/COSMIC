<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function _group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
