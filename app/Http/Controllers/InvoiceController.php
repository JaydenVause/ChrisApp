<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InvoiceAuthenticator;

/**
 * search for invoices
 */
class InvoiceController extends Controller
{
    function find_invoice(Request $request){
        $credentials = $request->validate([
            'invoice_id' => ['required'],
            'security_key' => ['required']
        ]);

        if(InvoiceAuthenticator::authenticate($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('admin-dashboard');
        }

        return back()->withErrors([
            "invoice_id" => "The provided account details do not match our records."
        ]);
    }
}
