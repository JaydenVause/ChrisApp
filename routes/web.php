<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/invoices', function(){
    return view("invoices");
})->name('invoices.index');



route::post('/invoices', [InvoiceController::class, "find_invoice"])->name('invoices.invoice');


// admin routes
route::post('/generate_invoices', [AdminController::class, "login"])->name('generate-invoices.index');

Route::get('/admin_panel', function(){

})->name('admin-dashboard');