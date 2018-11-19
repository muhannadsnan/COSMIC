<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function _users()
    {
        return $this->belongsToMany(User::class, 'user_entry', 'entry_id', 'user_id');
    }
}
