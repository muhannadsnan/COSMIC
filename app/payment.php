<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends _model
{
    public function _invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
