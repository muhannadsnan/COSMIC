<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class Account extends _Model
{
    public static function searchBySerial($request, $profile_id){ // should bring only a record
        $res = Account::where('profile_id', $profile_id)->where('serial', $request->serial)->get(); 
        if($request->NType != null)
            $res = $res->where('NType', $request->NType)->get();
        if(!$res) return false;
        return $res;
    }

    public static function getSerials($profile_id=1, $NType=0){  
        $res = Account::where('profile_id', $profile_id)->orderBy('serial', 'desc')->pluck('serial');
        if($NType != 0)
            $res = $res->where('NType', $NType)->get;
        return $res;
    }

    /********************   RELATIIONSHIPS   *********************/

    public function _users()
    {
        return $this->belongsToMany(User::class, 'account_user', 'account_id'/* this */, 'user_id');
    }

    public function _closingAccount() // parent accounts
    {
        return $this->belongsToMany(Account::class, 'account_account', 'child_id'/* this */, 'parent_id');
    }
    
    public function _parents() // parent accounts
    {
        return $this->belongsToMany(Account::class, 'account_account', 'child_id'/* this */, 'parent_id');
    }
    
    public function _children() // child accounts
    {
        return $this->belongsToMany(Account::class, 'account_account', 'parent_id'/* this */, 'child_id');
    }

    public function _profile() 
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _clients() 
    {
        return $this->hasMany(Client::class);
    }

    public function _invoices() 
    {
        return $this->belongsToMany(Invoice::class, 'invoice_account', 'account_id', 'invoice_id');
    }

    public function _entries() 
    {
        return $this->belongsToMany(Entry::class, 'account_entry', 'account_id', 'entry_id');
    }
    
    public function _currency() 
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
