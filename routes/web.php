<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\MyController;

//Route::get('/', function () {
//    [EventController::class, 'checkCashRegisterOpen'])
//})->middleware('auth');

Route::get('/',  [MyController::class, 'checkCashRegisterOpen'])->middleware('auth');
Route::get('/close/{id}', [MyController::class, 'closeCashRegister'])->middleware('auth');
Route::get('/clients',  [MyController::class, 'clients'])->middleware('auth');
Route::get('/clients/create',  [MyController::class, 'clientsAdd'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/index', function () {
    return view('index');
})->name('index');

Route::post('/', [MyController::class, 'storeCashRegister'])->middleware('auth');
Route::post('/clients', [MyController::class, 'storeClients'])->middleware('auth');



