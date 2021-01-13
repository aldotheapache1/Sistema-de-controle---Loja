<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashRegister;


class MyController extends Controller
{
    
    public function storeCashRegister(Request $request)
    {
        $cashRegister = new CashRegister;
        if($request->initial_value == 0)
        {
            $cashRegister->initial_value = 100.00;
        }
        else
        {
            $cashRegister->initial_value = $request->initial_value;
        }
        $cashRegister->open_close = true;
        $cashRegister->sales_amount = 0;
        $date = date('d-m-Y');
        $cashRegister->date	 = $date;

        $user = auth()->user();
        $cashRegister->opening_user_id = $user->id;
        $cashRegister->closing_user_id = $user->id;

        $cashRegister->save();
        return redirect('/');
    }

    public function checkCashRegisterOpen()
    {
        $currentCashRegister = CashRegister::where('open_close', 1)->first()->toArray();

        return view('index', ['currentCashRegister' => $currentCashRegister]);
    }
    
}
