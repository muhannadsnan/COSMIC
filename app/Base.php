<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends _model
{
    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function _profiles()
    {
        return $this->hasMany(Profile::class);
    } 
}
