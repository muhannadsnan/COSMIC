<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entryinfo extends _model
{
    public function _entry()
    {
        return $this->belongsTo(Entry::class, 'entry_id');
    }

    public function _currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
