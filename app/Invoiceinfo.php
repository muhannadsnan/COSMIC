<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoiceinfo;

class Invoiceinfo extends _model
{
    public function _invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    /***************************************** */
    public static function insert($request, $invID=0){
        return Invoiceinfo::create([
            'mat' => $request['mat'],
            'qty' => $request['qty'],
            'single' => $request['single'],
            'total' => $request['total'],
            'invoice_id' => $invID == 0 ? @$request['invoice_id'] : $invID,
        ]);
    }

    public static function insertMany($records, $invID){ //dd($records);
        foreach($records as $rec){
            InvoiceInfo::insert($rec, $invID); 
        }
        return true;
    }
}
