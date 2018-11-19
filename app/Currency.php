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
}
