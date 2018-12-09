<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends _model
{
    public function _users()
    {
        return $this->belongsToMany(User::class, 'user_client', 'client_id', 'user_id');
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
        return $this->belongsToMany(Invoice::class, 'invoice_client', 'client_id', 'invoice_id');
    }
}
