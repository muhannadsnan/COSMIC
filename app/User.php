<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Cookie;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function _accounts()
    {
        return $this->belongsToMany(Account::class, 'account_user', 'user_id'/* this */, 'account_id');
    }
    
    public function _warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'user_warehouse', 'user_id', 'warehouse_id');
    }
    
    public function _groups()
    {
        return $this->belongsToMany(Group::class, 'user_group', 'user_id', 'group_id');
    }
    
    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _clients()
    {
        return $this->belongsToMany(Client::class, 'user_client', 'user_id', 'client_id');
    }

    public function _invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_user', 'user_id', 'invoice_id');
    }

    public function _entries()
    {
        return $this->belongsToMany(User::class, 'user_entry', 'user_id', 'entry_id');
    }

    public function _currencies()
    {
        return $this->belongsToMany(Currency::class, 'user_currency', 'user_id', 'currency_id');
    }

    public function _bases()
    {
        return $this->hasMany(Base::class);
    }
    
    /**
    * Roll API Key
    */
    public function rollApiKey(){
        do{
            $this->api_token = str_random(60); // Cookie::get("cosmic_session")
        } while($this->where('api_token', $this->api_token)->exists());
        $this->save();
    }
}
