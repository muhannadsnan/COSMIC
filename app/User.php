<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function _accounts()
    {
        return $this->belongsToMany(Account::class, 'account_user', 'user_id'/* this */, 'account_id');
    }
    
    public function _matGuide()
    {
        return $this->belongsTo(Account::class, 'mat_guide_id');
    }
    
    public function _groups()
    {
        return $this->belongsToMany(Group::class, 'user_group', 'user_id', 'group_id');
    }
    
    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _customers()
    {
        return $this->belongsToMany(Customer::class, 'user_customer', 'user_id', 'customer_id');
    }

    public function _invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_user', 'user_id', 'invoice_id');
    }
}
