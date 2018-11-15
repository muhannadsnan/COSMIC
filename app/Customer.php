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

    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_customer', 'customer_id', 'invoice_id');
    }
}
