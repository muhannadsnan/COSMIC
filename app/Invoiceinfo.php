<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoiceinfo;

class Invoiceinfo extends _model
{
    

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

    public static function insertMany($records, $invID){
        foreach($records as $rec){
            InvoiceInfo::insert($rec, $invID);
        }
    }
}
