<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function _accounts() 
    {
        return $this->hasMany(Account::class);
    }

    public function _invoices() 
    {
        return $this->hasMany(Invoice::class);
    }
    
    public function _profiles() 
    {
        return $this->belongsToMany(Profile::class, 'profile_currency', 'currency_id', 'profile_id');
    }

    public function _users() 
    {
        return $this->belongsToMany(User::class, 'user_currency', 'currency_id', 'user_id');
    }

    public function _entries() 
    {
        return $this->belongsToMany(Entry::class, 'entry_currency', 'currency_id', 'entry_id');
    }

    public function _entryinfos() 
    {
        return $this->hasMany(Entryinfo::class);
    }
}
