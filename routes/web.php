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


Route::get('/admin_panel', [AdminController::class, "index"])->name('admin-dashboard')->middleware('web');

route::post('/admin_panel/login', [AdminController::class, "login"])->name('admin.login')->middleware('web');

Route::get('/admin_panel/create_invoice', [AdminController::class, "create_invoice"])->name('admin-dashboard.create_invoice')->middleware('web');

Route::post('/admin_panel/save_invoice', [AdminController::class, "save_invoice"])->name("admin-dashboard.save_invoice")->middleware('web');

Route::get('/pdf', function(){
    return view('pdf.invoice');
});