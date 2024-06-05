<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * search for invoices
 */
class InvoiceController extends Controller
{
    function find_invoice(Request $request){
        $invoice_id = $request->input('invoice_id');
        $security_key = $request->input('security_key');

        echo $invoice_id . "<br />";
        echo $security_key . "<br  />";
    }
}
