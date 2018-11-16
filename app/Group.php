<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends _Model
{
    public function _parents()
    { 
        return $this->belongsToMany(Group::class, 'group_group', 'child_id' /* this */, 'parent_id', 'id', 'id');
    }

    public function _children()
    {
        return $this->belongsToMany(Group::class, 'group_group', 'parent_id' /* this */, 'child_id', 'id', 'id');
    }

    public function _materials()
    {
        return $this->belongsToMany(Material::class, 'group_material', 'group_id' /* this */, 'material_id');
    }

    public function _warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'group_warehouse', 'group_id', 'warehouse_id');
    }

    public function _users()
    {
        return $this->belongsToMany(User::class, 'user_group', 'group_id', 'user_id');
    }
}
