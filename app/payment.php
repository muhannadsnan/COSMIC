<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public function _invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
