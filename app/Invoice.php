<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends _Model
{
    public function _customers()
    {
        return $this->belongsToMany(Customer::class, 'invoice_customer', 'invoice_id', 'customer_id');
    }
}
