<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends _Model
{
    public function _users()
    {
        return $this->belongsToMany(User::class, 'account_user', 'account_id'/* this */, 'user_id');
    }
    
    public function _closingAccount() // parent accounts
    {
        return $this->belongsToMany(Account::class, 'account_account', 'child_id'/* this */, 'parent_id');
    }
    
    public function _childAccount() // child accounts
    {
        return $this->belongsToMany(Account::class, 'account_account', 'parent_id'/* this */, 'child_id');
    }
}
