<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ClickSend;
use ClickSend\Api\SMSApi;
use ClickSend\Model\SmsMessage;
use ClickSend\Model\SmsMessageCollection;
use GuzzleHttp\Client; 
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $data = $request->only('name', 'phone', 'email', 'message');

        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('chris@coffslawnsandpropertymaintenance.net')
                    ->subject('Contact Form Submission');
        });

        $username = env('CLICKSEND_USERNAME');
        $password = env('CLICKSEND_PASSWORD');

        $config = ClickSend\Configuration::getDefaultConfiguration()
              ->setUsername($username)
              ->setPassword($password);

        $apiInstance = new ClickSend\Api\SMSApi(new Client(),$config);
        $msg = new \ClickSend\Model\SmsMessage();
        $msg->setBody("You have recieved an customer query to your email chris@coffslawnsandpropertymaintenance.net"); 
        $msg->setTo('0412779731');
        $msg->setSource("sdk");

        // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
        $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
        $sms_messages->setMessages([$msg]);

        try {
            $result = $apiInstance->smsSendPost($sms_messages);
            return redirect()->back()->with('success', 'Successfully generated invoice');
        } catch (Exception $e) {
            
            return redirect()->back()->with('errors', 'Exception when calling SMSApi->smsSendPost: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
