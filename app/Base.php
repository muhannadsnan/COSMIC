<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
