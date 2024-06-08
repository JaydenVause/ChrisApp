<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Invoice;
use App\Models\Service;
use Spatie\Browsershot\Browsershot;

class AdminController extends Controller
{
    /**
     * login method for admin
     */
    function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        Log::info('Attempting login with credentials:', $credentials);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

           
            return redirect()->route('admin-dashboard');
            
        }

        

        return back()->withErrors([
            "username" => "The provided account details do not match our records."
        ]);
    }

    /**
     * Index method for Admin
     */
    function index(){
        return view("admin-dashboard");
    }


    /**
     * Create invoices page
     */

     function create_invoice(){
        return view('admin-dashboard/create_invoice');
     }

     function save_invoice(Request $request){
        $validated = $request->validate([
            "customer_name" => "required",
            "customer_address" => "required",
            "customer_email_address" => "required",
            "customer_contact_number" => "required", 
            "invoice_date" => "required",
            "payment_terms" => "required",
            "due_date" => "required",
            "services" => "required",
            "notes" => "required",
            "tax" => "required",
            "terms" => "required",
            "paid" => "integer",
            "services.*" => [
                'description' => "required",
                'amount' => "required",
                'rate' => 'required',
                'quantity' => 'required',
                'non_taxable' => 'required'
            ]
        ]);

        $invoice = new Invoice;

        $invoice->net_price = 0;
        $invoice->tax = $validated['tax'];
        $invoice->customer_name = $validated['customer_name'];
        $invoice->customer_email_address = $validated['customer_email_address'];
        $invoice->customer_address = $validated['customer_address'];
        $invoice->customer_contact_number = $validated['customer_contact_number'];
        $invoice->invoice_date = $validated['invoice_date'];
        $invoice->due_date = $validated['due_date'];
        $invoice->notes = $validated['notes'];
        $invoice->terms = $validated['terms'];
        $invoice->total_price = 0;
        $invoice->paid = $validated['paid'];
        $invoice->save();
        $services = [];

        $total_tax = 0;
        foreach($validated['services'] as $service){
            $new_service_object = new Service;
            $new_service_object->description = $service['description'];
            $new_service_object->amount = $service['amount'];
            $new_service_object->rate = $service['rate'];
            $new_service_object->quantity = $service['quantity'];
            $new_service_object->invoice_id = $invoice->id;
            $new_service_object->total = $service['rate'] * $service['quantity'] * $service['amount'];
            if(isset($service['non_taxable'])){
                $new_service_object->non_taxable = $service['non_taxable'];
            }
            
            $new_service_object->save();
            $services[] = $new_service_object;
            
            
            $invoice->net_price += $new_service_object->total;

            
            if(!isset($service['non_taxable'])){
                $invoice->total_price += $new_service_object->total;
            }else{
                $total_tax += $new_service_object->total * ($invoice->tax / 100);
                $invoice->total_price += $new_service_object->total + $new_service_object->total * ($invoice->tax / 100);
            }

            
            
            $invoice->save();
            
        }

        $invoice->total_tax = $total_tax;
        

        $invoice->save();

         // Generate the PDF from the Blade view
        //  $pdf = Pdf::view('pdf.invoice', [
        //     'invoice' => $invoice,
        //     'services' => $services
        // ])->format('A4')->save('./pdf/01.pdf');

        // return view('pdf.invoice', [
        //     'invoice' => $invoice,
        //     'services' => $services
        // ]);

        $view =  view('pdf.invoice', [
            'invoice' => $invoice,
            'services' => $services
        ])->render();

       
        

        $pdfContent = Browsershot::html($view)->noSandbox()
            ->setNodeBinary("C:\\Program Files\\nodejs\\node.exe")
            ->setChromePath("C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe")
             // Increase timeout to 120 seconds
            ->format('A4')
            ->savePdf('./01.pdf');

        // Return the PDF as a response
        return $pdfContent;
           

     }
}
