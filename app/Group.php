<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends _Model
{
    public function _parent()
    {
        return $this->belongsToMany(Group::class, 'parent_id')->withTimestamps(); // ->withPivot('table')
    }

    public function _children()
    {
        return $this->hasMany(Group::class, 'parent_id');
    }

    public function _materials()
    {
        return $this->hasMany(Material::class, 'group_id');
    }
}
