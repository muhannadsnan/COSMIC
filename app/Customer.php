<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function _users()
    {
        return $this->belongsToMany(User::class, 'user_customer', 'customer_id', 'user_id');
    }

    public function _account()
    {
        return $this->belongsTo(User::class, 'account_id');
    }
}
