<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoice;
use App\InvoiceInfo;

class Invoice extends _Model
{
    public function _clients()
    {
        return $this->belongsToMany(Client::class, 'invoice_client', 'invoice_id', 'client_id');
    }

    public function _materials()
    {
        return $this->belongsToMany(Material::class, 'invoice_material', 'invoice_id', 'material_id');
    }

    public function _users()
    {
        return $this->belongsToMany(User::class, 'invoice_user', 'invoice_id', 'user_id');
    }

    public function _accounts()
    {
        return $this->belongsToMany(Account::class, 'invoice_account', 'invoice_id', 'account_id');
    }

    public function _profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function _currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function _entry() // 1:1 or 1:0
    {
        return $this->belongsToMany(Entry::class, 'entry_invoice', 'invoice_id', 'entry_id');
    }
    
    public function _warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'warehouse_invoice', 'invoice_id', 'warehouse_id');
    }

    public function _payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function _records()
    {
        return $this->hasMany(Invoiceinfo::class, 'invoice_id');
    }
    /**************************************** */
    public static function insertFull($request)
    {
        if( !$newInvoice = Invoice::insert($request)) return false;
        if( !Invoice::insertRecords($request->records, $newInvoice->id)) return false;
        
        $newInvoice->_clients()->sync([ $request->client_id ]);
        $newInvoice->_warehouses()->sync([ $request->warehouse_id ]);
        return $newInvoice;
    }

    public static function insert($request)
    {
        return Invoice::create([
            'payment_id' => $request->payment_id,
            'currency_id' => $request->currency_id,
            'profile_id' => $request->profile_id,
            'serial' => $request->serial,
            'title' => $request->title == ''? 'TEST': $request->title,
            'desc' => $request->desc,
            'client_acc' => $request->client_acc,
            'NType' => $request->NType,
            'NDate' => $request->NDate,
            'ext_num' => $request->ext_num == ''? 'TEST': $request->ext_num,
            'int_num' => $request->int_num == ''? 'TEST': $request->int_num,
            'sum' => $request->sum,
            'remaining' => $request->remaining,
        ]);
    }

    public static function insertRecords($records, $invID)
    {
        if(!InvoiceInfo::insertMany($records, $invID)) return false;
        return true;
    }
    


}
