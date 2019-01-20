<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceInfo;
use App\Currency;
use App\Payment;
use App\Base;
use App\Profile;
use Cookie;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
        // $this->middleware('client', ['except' => []]);
        $this->middleware('belongstome', ['except' => []]);
    }

    public function index(Base $basis, Profile $profile)
    {        
        return view('invoices.index', ['invoices' => Invoice::all()]);
    }
    
    public function create(Base $basis, Profile $profile)
    {
        return view('invoices.create', ['currencies' => Currency::all(), 'payment' => Payment::all()]); 

        
        $user = auth()->user(); 
        $oauth_client = new \App\oAuthClient();
        $oauth_client->user_id = $user->id;
        // $oauth_client->id=$user->email;
        $oauth_client->name = $user->name;
        $oauth_client->secret = base64_encode(hash_hmac('sha256', $user->password, 'secret', true));
        $oauth_client->password_client = 1;
        $oauth_client->personal_access_client = 0;
        $oauth_client->redirect = '';
        $oauth_client->revoked = 0;
        $oauth_client->save(); 
        
        $user->createToken($user->name)->accessToken->save();
        dd($user->createToken($user->name)->accessToken);


    }
    
    public function store(Request $request)
    {  //return $request->base;
        $base = Base::find($request->base_id);
        $profile = $base->_profiles->find($request->profile_id);
        $newInvoice = Invoice::insert($request->all());
        if(!$newInvoice)
            return ['ok' => false, 'msg' => 'خطأ أثناء إضافة الفاتورة'];
        $newRecords = InvoiceInfo::insertMany($request->records, $newInvoice->id);
        return ['ok' => true, 'msg' => 'تم إضافة الفاتورة بنجاح!', 'data' => $newInvoice];
    }
    
    public function show(Invoice $invoice)
    { 
        return $invoice;
    }
    
    public function edit(Invoice $invoice)
    {
        $invoice->title = 'T1';
        $invoice->save();
        return $invoice;
    }
    
    public function update(Request $request, Invoice $invoice)
    {
        //
    }
    
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function apiIndex(Request $request)
    {
        return response()->json(['data' => 'hahaaaaaaaaaaaa'], 200);
    }
}
