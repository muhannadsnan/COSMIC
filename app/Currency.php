<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function _accounts() 
    {
        return $this->hasMany(Account::class);
    }
}
