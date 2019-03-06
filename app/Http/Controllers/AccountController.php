<?php

namespace App\Http\Controllers;

use App\Account;
use App\Base;
use App\Profile;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

/***************** API ******************/
    public function findBySerial(Request $request, Profile $profile)
    { 
        if(!($acc = Account::searchBySerial($request, $profile->id)))
            return response()->json(['msg' => 'حدث خطأ أثناء البحث'], 500); 
        if(count($acc) == 0)
            return response()->json(['msg' => 'لا يوجد حساب تطابق هذا الرقم التسلسلي'], 204); // No Response 204 
        return response()->json(['data' => $acc, 'msg' => 'تم ايجاد الحساب'], 200);
    }

    public function getSerials(Request $request, Profile $profile, $NType=1)
    {
        return Account::getSerials($profile->id, $NType);
    }
    
    public function apiStore(Request $request, Profile $profile)
    { 
        if(!$newAccount = Account::insert($request, $profile->id))
            return response()->json(['msg' => 'خطأ أثناء إضافة الحساب'], 404);        
        return response()->json(['data' => $newAccount, 'msg' => 'تم إضافة الحساب بنجاح'], 200);
    }

    public function apiUpdate(Request $request, Profile $profile)
    { 
        if(!$newAccount = Account::editFull($request, $profile->id))
            return response()->json(['msg' => 'خطأ أثناء تعديل الحساب'], 404);        
        return response()->json(['data' => $newAccount, 'msg' => 'تم تعديل الحساب بنجاح'], 200);
    }

/********************************************/
    public function index(Base $basis, Profile $profile)
    {
        return view('accounts.index', ['accounts' => Account::where('profile_id', null) // the default accounts have no profile_id
                                                            ->orWhere('profile_id', $profile->id)->with("_parents")->get()/* ,   'noscript' => 1  */]); // noscript because I use script to make the treeview
    }
    
    public function create(Base $basis, Profile $profile)
    {
        return view('accounts.create');
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Base $basis, Profile $profile, Account $account)
    { 
        return view('accounts.show', []);
    }
    
    public function edit(Base $basis, Profile $profile, Account $account)
    {
        $account->title = 'T1';
        $account->save();
        return $account;
    }
    
    public function update(Request $request, Base $basis, Profile $profile, Account $account)
    {
        //
    }
    
    public function destroy(Base $basis, Profile $profile, Account $account)
    {
        //
    }
}
