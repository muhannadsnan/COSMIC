<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends _Model
{
    public function _groups()
    {
        return $this->belongsToMany(Group::class, 'group_material', 'material_id', 'group_id');
    }
}
