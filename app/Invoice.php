<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoice;
use App\InvoiceInfo;
use App\Client;
use DB;

class Invoice extends _Model
{
    public static function insertFull($request){
        if( !$newInvoice = Invoice::insert($request)) return false;
        if( !Invoice::insertRecords($request->records, $newInvoice->id)) return false;
        
        $newInvoice->_clients()->sync([ $request->client_id ]);
        $newInvoice->_warehouses()->sync([ $request->warehouse_id ]);
        return $newInvoice;
    }

    public static function insert($request){
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

    public static function insertRecords($records, $invID){
        if(!InvoiceInfo::insertMany($records, $invID)) return false;
        return true;
    }

    public static function editFull($request){
        if( !$updInvoice = Invoice::edit($request)) return false;
        if( !Invoice::editRecords($request->records, $request->deletedRecords, $updInvoice->id)) return false;
        
        $updInvoice->_clients()->sync([ $request->client_id ]);
        $updInvoice->_warehouses()->sync([ $request->warehouse_id ]);
        return $updInvoice;
    }

    public static function edit($request){
        $inv = Invoice::findOrFail($request->id);
        $inv->payment_id = $request->payment_id;
        $inv->currency_id = $request->currency_id;
        $inv->profile_id = $request->profile_id;
        $inv->serial = $request->serial;
        $inv->title = $request->title == ''? 'TEST': $request->title;
        $inv->desc = $request->desc;
        $inv->client_acc = $request->client_acc;
        $inv->NType = $request->NType;
        $inv->NDate = $request->NDate;
        $inv->ext_num = $request->ext_num == ''? 'TEST': $request->ext_num;
        $inv->int_num = $request->int_num == ''? 'TEST': $request->int_num;
        $inv->sum = $request->sum;
        $inv->remaining = $request->remaining;
        if(!$inv->save())
            return false;
        return $inv;
    }

    public static function editRecords($records, $deletedRecords, $invID=1){
        if(!InvoiceInfo::editMany($records, $deletedRecords, $invID)) return false;
        return true;
    }
    
    public static function searchClientsByName($request){ 
        /********* IMPORTANT SEARCH PROCESS *******/
        $res = Client::where(function($query) use ($request){
                foreach(explode(',',$request->search) as $keyword){
                    $query->where(DB::raw('LOWER(name)'), 'LIKE', '%'.strtolower($keyword).'%');
                }
            })->whereProfileId($request->profile)->select("id", "name")->get();
        $res = Client::whereProfileId($request->profile)->select("id", "name")->get();
        if(!$res) return false;
        return $res;
    }

    public static function getClientsList($profile_id){
        $res = Client::whereProfileId($profile_id)->select("id", "name")->get(); 
        if(!$res) return false;
        return $res;
    }

    public static function searchBySerial($request, $profile_id){ // should bring only a record
        $res = Invoice::where('serial', $request->serial)->where('NType', $request->NType)->where('profile_id', $profile_id)
                        ->with('_payment', '_currency', '_records', '_clients', '_warehouses')->get(); 
        if(!$res) return false;
        return $res;
    }

    public static function getSerials($profile_id=1, $NType=1){
        return Invoice::where('NType', $NType)->where('profile_id', $profile_id)->orderBy('serial', 'desc')->pluck('serial');
    }

    /********************   RELATIIONSHIPS   *********************/

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
}