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

    public static function insert($request, $profile_id){  
        return Account::create([ 
            'profile_id' => $profile_id,
            'serial' => $request->serial,
            'code' => $request->code,
            'title_ar' => $request->title['ar'],
            'desc' => $request->desc,
            'NType' => $request->NType,
            'closeAcc' => $request->closeAcc,
            'KType' => $request->KType,
            'EType' => $request->EType,
            'EVal' => $request->EVal,
            'ECurrency' => $request->ECurrency,
            'EBuy' => $request->EBuy,
            'EisPart' => $request->EisPart,
            'hideInSearch' => $request->hideInSearch,
            'CCisReq' => $request->CCisReq,
            'CCTitle' => $request->CCTitle,
            'TOFL_income' => $request->TOFL_income,
            'TOFL_ownership' => $request->TOFL_ownership,
            'TOFL_finCenter' => $request->TOFL_finCenter,
            'TOFL_cashFlow' => $request->TOFL_cashFlow,
            'TOFL_clasDet' => $request->TOFL_clasDet,  
        ]);
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

    public function _Accounts() 
    {
        return $this->belongsToMany(Account::class, 'Account_account', 'account_id', 'Account_id');
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
