<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoiceinfo;

class Invoiceinfo extends _Model
{
    public function _invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    /***************************************** */
    public static function insert($request, $invID=0){
        return Invoiceinfo::create([
            'mat' => (int)$request['mat'],
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

    public static function edit($request, $invID=1){ //dd($request['invoice_id']);
        $info = Invoiceinfo::updateOrCreate(['id' => @$request['id']], [
            'mat' => (int)$request['mat'],
            'qty' => (float)$request['qty'],
            'single' => (float)$request['single'],
            'total' => (float)$request['total'],
            'invoice_id' => $invID,
            
        ]); 
        return $info->save(); 
    }

    public static function editMany($records, $deletedRecords, $invID=1){ //dd($records);
        Invoiceinfo::whereIn('id', $deletedRecords)->delete();
        foreach($records as $rec){
            InvoiceInfo::edit($rec, $invID); 
        }
        return true;
    }
}
