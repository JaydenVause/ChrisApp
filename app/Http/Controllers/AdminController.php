<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Invoice;
use App\Models\Service;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use ClickSend;
use ClickSend\Api\SMSApi;
use ClickSend\Model\SmsMessage;
use ClickSend\Model\SmsMessageCollection;
use GuzzleHttp\Client; 
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
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

    function getChromePath() {
        // Execute the command to find the Chrome executable path
        $process = new Process(['which', 'google-chrome']);
        $process->run();
    
        // Get the output of the command
        $chromePath = trim($process->getOutput());
    
        return $chromePath;
    }
    
    function getNodePath() {
        // Execute the command to find the Node.js executable path
        $process = new Process(['which', 'node']);
        $process->run();
    
        // Get the output of the command
        $nodePath = trim($process->getOutput());
    
        return $nodePath;
    }

    /**
     * Index method for Admin
     */
    function index(){
        $invoices = Invoice::all();
        return view("admin-dashboard", [
            'invoices' => $invoices
        ]);
    }

    function formatAustralianPhoneNumber($phoneNumber) {
        // Remove any non-numeric characters from the phone number
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
    
        // Check if the phone number starts with '0' and has 10 digits
        if (preg_match('/^0[0-9]{9}$/', $phoneNumber)) {
            // Replace the leading '0' with '+61'
            $formattedNumber = '+61' . substr($phoneNumber, 1);
            return $formattedNumber;
        } else {
            // Return the original number if it does not match the expected pattern
            return $phoneNumber;
        }
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

            "due_date" => "required",
            "services" => "required",
            // "notes" => "required",
            "tax" => "required",
            // "terms" => "required",
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
        $invoice->customer_contact_number = $this->formatAustralianPhoneNumber($validated['customer_contact_number']);
        $invoice->invoice_date = $validated['invoice_date'];
        $invoice->due_date = $validated['due_date'];
        // $invoice->notes = $validated['notes'];
        // $invoice->terms = $validated['terms'];
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

            // dd($service);

            if(isset($service['non_taxable'])){
                $invoice->total_price += $new_service_object->total;
            }else{               
                $total_tax += $new_service_object->total * ($invoice->tax / 100);
                $invoice->total_price += $new_service_object->total + $new_service_object->total * ($invoice->tax / 100);
            }

            
            
            $invoice->save();
            
        }

        $invoice->total_tax = $total_tax;
        

        $invoice->save();

        $view =  view('pdf.invoice', [
            'invoice' => $invoice,
            'services' => $services
        ])->render();

       
        $action = action([AdminController::class, 'save_invoice'], ['invoice_id' => $invoice->id]);
        $routeName ="admin-dashboard.download_invoice";

        $url = route($routeName, ['invoice_id' => $invoice->id]);

        $pdfContent = Browsershot::html($view)->noSandbox()
            ->setNodeBinary($this->getNodePath())
            ->setChromePath($this->getChromePath())
            ->format('A4')
            ->savePdf('../pdf/'.$invoice->id.'.pdf');

        Mail::send('emails.invoice', ['invoice' => $invoice, 'url' => $url], function($message) use ($invoice) {
            $message->to($invoice->customer_email_address, $invoice->customer_name)
                    ->subject('Your Invoice');
            $message->attach('../pdf/'.$invoice->id.'.pdf', [
                'as' => 'invoice.pdf',
                'mime' => 'application/pdf',
            ]);
        });

        

        $message = "Hi $invoice->customer_name,
        
        Thank you for choosing Coffs Lawns and Property Maintenance! We've sent your invoice to $invoice->customer_email_address. The total cost is $$invoice->total_price.

        Alternatively you can download your invoice by visiting: $url
        
        For payment, please use:
        - Account Name: Chris Webb
        - BSB: 533000
        - Account Number: 151548
        - Bank: BCU

        We appreciate your business!

        Best regards,
        Chris";

        $username = env('CLICKSEND_USERNAME');
        $password = env('CLICKSEND_PASSWORD');

        $config = ClickSend\Configuration::getDefaultConfiguration()
              ->setUsername($username)
              ->setPassword($password);

        $apiInstance = new ClickSend\Api\SMSApi(new Client(),$config);
        $msg = new \ClickSend\Model\SmsMessage();
        $msg->setBody($message); 
        $msg->setTo($invoice->customer_contact_number);
        $msg->setSource("sdk");

        // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
        $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
        $sms_messages->setMessages([$msg]);

        try {
            $result = $apiInstance->smsSendPost($sms_messages);
            return redirect()->route('admin-dashboard')->with('success', 'Successfully generated invoice');
        } catch (Exception $e) {
            
            return redirect()->back()->with('errors', 'Exception when calling SMSApi->smsSendPost: ' . $e->getMessage());
        }
     }


     function edit_invoice(Request $request, $invoice_id){
        $invoice = Invoice::where('id', $invoice_id)->first();
        $services = Service::where('invoice_id', $invoice_id)->get();
        return view('admin-dashboard/edit_invoice',
            ['invoice' => $invoice, 'services' => $services]
        );
     }

     function delete_invoice(Request $request, $invoice_id){
        Service::where('invoice_id', $invoice_id)->delete();
        Invoice::where('id', $invoice_id)->delete();

        return redirect()->route('admin-dashboard')->with('success', 'Successfully deleted invoice');
     }

     function download_invoice(Request $request, $invoice_id) {
        try {
            $file_path = base_path('pdf/' . $invoice_id . '.pdf'); // Correct path to the file
    
            // Debug: Log the file path to check if it's correct
            Log::info("Checking file path: " . $file_path);
    
            if (File::exists($file_path)) {
                // Debug: Log if the file exists
                Log::info("File found: " . $file_path);
    
                return response()->file($file_path, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="' . $invoice_id . '.pdf"'
                ]);
            } else {
                // Debug: Log if the file does not exist
                Log::error("File not found: " . $file_path);
                return response("Error: file not found", 404);
            }
        } catch (Exception $e) {
            // Debug: Log the exception message
            Log::error("Exception occurred: " . $e->getMessage());
            return response("Error: file not found", 404);
        }
    }

    function patch_invoice(Request $request, $id) {
        $invoice = Invoice::findOrFail($id);
    
        $validated = $request->validate([
            "customer_name" => "required",
            "customer_address" => "required",
            "customer_email_address" => "required",
            "customer_contact_number" => "required", 
            "invoice_date" => "required",
            
            "due_date" => "required",
            "services" => "required",
            "tax" => "required",
            "paid" => "integer",
            "services.*" => [
                'description' => "required",
                'amount' => "required",
                'rate' => 'required',
                'quantity' => 'required',
                'non_taxable' => 'required'
            ]
        ]);
    
        // Clear existing services associated with the invoice
        Service::where('invoice_id', $id)->delete();
    
        $total_tax = 0;
        $invoice->total_tax = 0;
        $invoice->net_price = 0;
        $invoice->total_price = 0;
        $invoice->save();
        $services = [];
    
        foreach($validated['services'] as $service) {
            $new_service_object = new Service;
            $new_service_object->description = $service['description'];
            $new_service_object->amount = $service['amount'];
            $new_service_object->rate = $service['rate'];
            $new_service_object->quantity = $service['quantity'];
            $new_service_object->invoice_id = $invoice->id;
            $new_service_object->total = $service['rate'] * $service['quantity'] * $service['amount'];
            if(isset($service['non_taxable'])) {
                $new_service_object->non_taxable = $service['non_taxable'];
            }
            $new_service_object->save();
            $services[] = $new_service_object;
    
            $invoice->net_price += $new_service_object->total;
    
            if(isset($service['non_taxable'])) {
                $invoice->total_price += $new_service_object->total;
            } else {
                $total_tax += $new_service_object->total * ($invoice->tax / 100);
                $invoice->total_price += $new_service_object->total + $new_service_object->total * ($invoice->tax / 100);
            }
        }
    
        $invoice->total_tax = $total_tax;
    
        $invoice->update($validated);
    
        // Generate the PDF from the Blade view
        $view = view('pdf.invoice', [
            'invoice' => $invoice,
            'services' => $services
        ])->render();

        $action = action([AdminController::class, 'patch_invoice'], ['invoice_id' => $invoice->id]);

        $routeName = "admin-dashboard.download_invoice";
        

        $url = route($routeName, ['invoice_id' => $invoice->id]);
    
        $pdfContent = Browsershot::html($view)->noSandbox()
            ->setNodeBinary("C:\\Program Files\\nodejs\\node.exe")
            ->setChromePath("C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe")
            ->format('A4')
            ->savePdf('../pdf/'.$invoice->id.'.pdf');

        Mail::send('emails.invoice', ['invoice' => $invoice, 'url' => $url], function($message) use ($invoice) {
            $message->to($invoice->customer_email_address, $invoice->customer_name)
                    ->subject('Your Invoice');
            $message->attach('../pdf/'.$invoice->id.'.pdf', [
                'as' => 'invoice.pdf',
                'mime' => 'application/pdf',
            ]);
        });
        

        $message = "Hi $invoice->customer_name,
        
        Thank you for choosing Coffs Lawns and Property Maintenance! We've sent your invoice to $invoice->customer_email_address. The total cost is $$invoice->total_price.

        Alternatively you can download your invoice by visiting: $url
        
        For payment, please use:
        - Account Name: Chris Webb
        - BSB: 533000
        - Account Number: 151548
        - Bank: BCU

        We appreciate your business!

        Best regards,
        Chris";

        $username = env('CLICKSEND_USERNAME');
        $password = env('CLICKSEND_PASSWORD');

        $config = ClickSend\Configuration::getDefaultConfiguration()
              ->setUsername($username)
              ->setPassword($password);

        $apiInstance = new ClickSend\Api\SMSApi(new Client(),$config);
        $msg = new \ClickSend\Model\SmsMessage();
        $msg->setBody($message); 
        $msg->setTo($invoice->customer_contact_number);
        $msg->setSource("sdk");

        // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
        $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
        $sms_messages->setMessages([$msg]);

        try {
            $result = $apiInstance->smsSendPost($sms_messages);
            return redirect()->route('admin-dashboard')->with('success', 'Successfully generated invoice');
        } catch (Exception $e) {
            
            return redirect()->back()->with('errors', 'Exception when calling SMSApi->smsSendPost: ' . $e->getMessage());
        }
    }
    
}
