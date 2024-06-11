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



// route::post('/invoices', [InvoiceController::class, "find_invoice"])->name('invoices.invoice');

// admin routes
Route::get('/download_invoice/{invoice_id}', [AdminController::class, 'download_invoice'])->name('admin-dashboard.download_invoice');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin_panel', [AdminController::class, 'index'])->name('admin-dashboard');

    Route::get('/admin_panel/create_invoice', [AdminController::class, 'create_invoice'])->name('admin-dashboard.create_invoice');

    Route::post('/admin_panel/save_invoice', [AdminController::class, 'save_invoice'])->name('admin-dashboard.save_invoice');

    Route::get('/admin_panel/edit_invoice/{invoice_id}', [AdminController::class, 'edit_invoice'])->name('admin-dashboard.edit_invoice');
    Route::patch('/admin_panel/edit_invoice/{invoice_id}', [AdminController::class, 'patch_invoice'])->name('admin-dashboard.patch_invoice');

    
    Route::delete('/admin_panel/delete_invoice/{invoice_id}', [AdminController::class, 'delete_invoice'])->name('admin-dashboard.delete_invoice');
});

Route::post('/admin_panel/login', [AdminController::class, 'login'])->name('admin.login')->middleware('web');
