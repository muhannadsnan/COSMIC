<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatGuide extends Model
{
    public function _materials()
    {
        return $this->hasMany(Material::class);
    }

    public function _groups()
    {
        return $this->hasMany(Group::class);
    }
}
