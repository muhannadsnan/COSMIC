<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends _Model
{
    public function _materials()
    {
        return $this->belongsToMany(Material::class, 'material_warehouse', 'warehouse_id', 'material_id');
    }

    public function _groups()
    {
        return $this->belongsToMany(Group::class, 'group_warehouse', 'warehouse_id', 'group_id');
    }

    public function _users()
    {
        return $this->belongsToMany(User::class, 'user_warehouse', 'warehouse_id', 'user_id');
    }

    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _entries()
    {
        return $this->belongsToMany(Entry::class, 'warehouse_entry', 'warehouse_id', 'entry_id');
    }
}
