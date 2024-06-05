<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * login method for admin
     */
    function login(Request $request){

        $credentials = $request->validate([
            'account_id' => ['required'],
            'security_key' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('admin-dashboard');
        }

        return back()->withErrors([
            "account_id" => "The provided account details do not match our records."
        ]);
    }
}
