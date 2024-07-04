<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CustomerController;

Route::resource('devices', DeviceController::class);
Route::resource('customers', CustomerController::class);


use App\Http\Controllers\DeviceCustomerController;

Route::get('assign', [DeviceCustomerController::class, 'create'])->name('assign.create');
Route::post('assign', [DeviceCustomerController::class, 'store'])->name('assign.store');
Route::get('/assign/{customer}/edit', [DeviceCustomerController::class, 'edit'])->name('assign.edit');
Route::put('/assign/{customer}', [DeviceCustomerController::class, 'update'])->name('assign.update');
