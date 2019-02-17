<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Invoice;
use App\InvoiceInfo;
use App\Currency;
use App\Payment;
use App\Base;
use App\Profile;
use App\Client;
use Cookie;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
        // $this->middleware('client', ['except' => []]);
        // $this->middleware('belongToMe', ['except' => []]);
    }
/***************** API ******************/
    public function findBySerial(Request $request, Profile $profile)
    { 
        if(!($inv=Invoice::searchBySerial($request, $profile->id)))
            return response()->json(['msg' => 'حدث خطأ أثناء البحث'], 500); 
        if(count($inv) == 0)
            return response()->json(['msg' => 'لا يوجد فاتورة تطابق هذا الرقم التسلسلي'], 204); // No Response 204 
        return response()->json(['data' => $inv, 'msg' => 'تم ايجاد الفاتورة'], 200);
    }

    public function apiStore(Request $request, Profile $profile)
    { 
        if(!$newInvoice = Invoice::insertFull($request))
            return response()->json(['msg' => 'خطأ أثناء إضافة الفاتورة'], 404);        
        return response()->json(['data' => $newInvoice, 'msg' => 'تم إضافة الفاتورة بنجاح'], 200);
    }

    public function apiUpdate(Request $request, Profile $profile)
    { 
        if(!$newInvoice = Invoice::editFull($request))
            return response()->json(['msg' => 'خطأ أثناء تعديل الفاتورة'], 404);        
        return response()->json(['data' => $newInvoice, 'msg' => 'تم تعديل الفاتورة بنجاح'], 200);
    }

    public function searchClientsByName(Request $request, Profile $profile) // use getClientsList instead
    {  
        if(!$res = Invoice::searchClientsByName($request))
            return response()->json(['msg' => 'حدث خطأ أثناء البحث عن العميل'], 404);        
        return response()->json(['data' => $res, 'msg' => 'تم إيجاد العميل بنجاح'], 200);
    }

    public function getClientsList(Request $request, Profile $profile)
    {
        if(!$res = Invoice::getClientsList($profile->id))
            return response()->json(['msg' => 'حدث خطأ أثناء البحث عن العميل'], 404);        
        return response()->json(['data' => $res, 'msg' => 'تم البحث عن العميل بنجاح'], 200);
    }
    
    public function getSerials(Request $request, Profile $profile, $NType=1)
    {
        return Invoice::getSerials($profile->id, $NType);
    }
/********************************************/
    public function index(Base $basis, Profile $profile)
    {
        return view('invoices.index', ['invoices' => Invoice::all()]);
    }
    
    public function create(Base $basis, Profile $profile)
    {
        return view('invoices.create', ['currencies' => Currency::all(), 'payment' => Payment::all()]); 
    }
    
    public function store(Request $request, Base $basis, Profile $profile )
    { 
        // $base = Base::find($request->base_id);
        // $profile = $base->_profiles->find($request->profile_id);
        $newInvoice = Invoice::insert($request->all());
        if(!$newInvoice)
            return ['ok' => false, 'msg' => 'خطأ أثناء إضافة الفاتورة'];
        $newRecords = InvoiceInfo::insertMany($request->records, $newInvoice->id);
        return ['ok' => true, 'msg' => 'تم إضافة الفاتورة بنجاح!', 'data' => $newInvoice];
    }
    
    public function show(Base $basis, Profile $profile, Invoice $invoice)
    { 
        return $invoice;
    }
    
    public function edit(Base $basis, Profile $profile, Invoice $invoice)
    {
        $invoice->title = 'T1';
        $invoice->save();
        return $invoice;
    }
    
    public function update(Request $request, Base $basis, Profile $profile, Invoice $invoice)
    {
        //
    }
    
    public function destroy(Base $basis, Profile $profile, Invoice $invoice)
    {
        //
    }
}
