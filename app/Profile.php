<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends _Model
{
    public function _materials()
    {
        return $this->hasMany(Material::class);
    }

    public function _groups()
    {
        return $this->hasMany(Group::class);
    }
    
    public function _warehouses()
    {
        return $this->hasMany(Warehouse::class);
    } 

    public function _accounts()
    {
        return $this->hasMany(Account::class);
    } 

    public function _users()
    {
        return $this->hasMany(User::class);
    } 

    public function _customers()
    {
        return $this->hasMany(Customer::class);
    } 

    public function _invoices()
    {
        return $this->hasMany(Invoice::class);
    } 
}
