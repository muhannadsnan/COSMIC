<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends _Model
{
    public function _clients()
    {
        return $this->belongsToMany(Client::class, 'invoice_client', 'invoice_id', 'client_id');
    }

    public function _materials()
    {
        return $this->belongsToMany(Material::class, 'invoice_material', 'invoice_id', 'material_id');
    }

    public function _users()
    {
        return $this->belongsToMany(User::class, 'invoice_user', 'invoice_id', 'user_id');
    }

    public function _accounts()
    {
        return $this->belongsToMany(Account::class, 'invoice_account', 'invoice_id', 'account_id');
    }

    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
