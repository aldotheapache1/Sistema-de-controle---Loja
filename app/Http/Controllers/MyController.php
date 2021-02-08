<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashRegister;
use App\Models\Sales;
use App\Models\Payments;
use App\Models\Clients;

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
        $currentCashRegister = CashRegister::where('open_close', 1)->first();
        if($currentCashRegister != null){
            $currentCashRegister->toArray();
            $sales = Sales::where('cash_registers_id', $currentCashRegister['id'])->get();
            $payments = Payments::where('cash_registers_id', $currentCashRegister['id'])->get();
            return view('index', ['currentCashRegister' => $currentCashRegister, 'sales' => $sales, 'payments' => $payments]);
        }
        else {
            $sales = Sales::where('cash_registers_id', $currentCashRegister['id'])->get();
            $payments = Payments::where('cash_registers_id', $currentCashRegister['id'])->get();
            return view('index', ['currentCashRegister' => $currentCashRegister, 'sales' => $sales, 'payments' => $payments]);
        }
        
    }

    public function closeCashRegister($id)
    {
        $CashRegister = CashRegister::find($id);
        $CashRegister->open_close = 0;

        $CashRegister->save();

        return redirect('/');

    }

    public function clientsAdd()
    {
        $currentCashRegister = CashRegister::where('open_close', 1)->first();
        if($currentCashRegister != null){
            $currentCashRegister->toArray();
            return view('pages.clients-create', ['currentCashRegister' => $currentCashRegister]);
        }
        else {
            return view('pages.clients-create', ['currentCashRegister' => $currentCashRegister]);
        }
    }

    public function clients()
    {
        $currentCashRegister = CashRegister::where('open_close', 1)->first();
        if($currentCashRegister != null){
            $currentCashRegister->toArray();
            $clients = Clients::all();
            return view('pages.clients', ['clients' => $clients, 'currentCashRegister' => $currentCashRegister]);
        }
        else {
            $clients = Clients::all();
            return view('pages.clients', ['clients' => $clients, 'currentCashRegister' => $currentCashRegister]);
        }
    }
    
    public function storeClients(Request $request)
    {
        $client = new Clients;
        $client->name = $request->name;
        $client->CPF = $request->CPF;
        $client->client_type = $request->client_type;
        $client->save();
        return redirect('/clients');
    }
}
