<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends _Model
{
    public function _materials()
    {
        return $this->hasMany(Material::class);
    }

    public function _groups()
    {
        return $this->hasMany(Group::class);
    }
    
    public function _matGuides()
    {
        return $this->hasMany(MatGuide::class);
    }
}
