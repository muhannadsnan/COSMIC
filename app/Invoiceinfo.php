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

    public static function edit($request, $invID=0){
        $info = Invoiceinfo::findOrFail($request['id']); 
        $info->mat = $request['mat'];
        $info->qty = $request['qty'];
        $info->single = $request['single'];
        $info->total = $request['total'];
        $info->invoice_id =  @$request['invoice_id'];
        return $info->save();
    }

    public static function editMany($records, $invID){ //dd($records);
        foreach($records as $rec){
            InvoiceInfo::edit($rec, $invID); 
        }
        // Invoiceinfo::whereIn('id', $ids_to_delete)->delete(); 
        return true;
    }
}
