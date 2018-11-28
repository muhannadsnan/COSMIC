<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {        
        return Payment::all();
    }
    
    public function create()
    {
        $payment = new Payment([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $payment->save();
        return $payment;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Payment $payment)
    {
        return $payment;
    }
    
    public function edit(Payment $payment)
    {
        $payment->title = 'T1';
        $payment->save();
        return $payment;
    }
    
    public function update(Request $request, Payment $payment)
    {
        //
    }
    
    public function destroy(Payment $payment)
    {
        //
    }
}
