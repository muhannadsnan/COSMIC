<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends _Model
{
    public function _parents()
    { 
        return $this->belongsToMany(Group::class, 'group_group', 'child_id', 'parent_id', 'id', 'id');
    }

    public function _children()
    {
        return $this->belongsToMany(Group::class, 'group_group', 'parent_id', 'child_id', 'id', 'id');
    }

    public function _materials()
    {
        return $this->belongsToMany(Material::class, 'group_material', 'group_id', 'material_id');
    }
}
