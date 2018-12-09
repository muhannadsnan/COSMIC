<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends _model
{
    public function _users()
    {
        return $this->belongsToMany(User::class, 'user_entry', 'entry_id', 'user_id');
    }

    public function _warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'warehouse_entry', 'entry_id', 'warehouse_id');
    }

    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
    
    public function _accounts()
    {
        return $this->belongsToMany(Account::class, 'account_entry', 'entry_id', 'account_id');
    }

    public function _currencies()
    {
        return $this->belongsToMany(Currency::class, 'entry_currency', 'entry_id', 'currency_id');
    }

    public function _invoices() // 1:1 or 1:0
    {
        return $this->belongsToMany(Currency::class, 'entry_invoice', 'entry_id', 'invoice_id');
    }

    public function _entryinfos()
    {
        return $this->hasMany(Entryinfo::class);
    }
}
