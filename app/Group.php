<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function _parent()
    {
        return $this->belongsToMany(Group::class);
    }

    public function _children()
    {
        return $this->hasMany(Group::class, 'parent_id');
    }

    public function _materials()
    {
        // return $this->hasMany('App/Material', 'group_id');
        return $this->hasMany(Material::class, 'group_id');
    }
}
