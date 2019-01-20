<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Cookie;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

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

    /******************************************/

    public static function create_oauth_client($user)
    {
        $oauth_client = new \App\oAuthClient();
        $oauth_client->user_id = $user->id;
        // $oauth_client->id=$user->email;
        $oauth_client->name = $user->name;
        $oauth_client->secret = base64_encode(hash_hmac('sha256', $user->password, 'secret', true));
        $oauth_client->password_client = 1;
        $oauth_client->personal_access_client = 1;
        $oauth_client->redirect = '';
        $oauth_client->revoked = 0;
        $oauth_client->save(); 
    }

    public static function createApiToken($user)
    {
        $user->api_token = $user->createToken(/*'Token Name'*/ 'name')->accessToken;
        $user->save();
        // dd($user->api_token);
    }
}
