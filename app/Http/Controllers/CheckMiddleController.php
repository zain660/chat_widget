<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMiddleController extends Controller
{
    //

    public function check_middle()
    {
        // dd(auth()->user()->role);
        if (Auth::check()) {
            if (auth()->user()->role == 'agent') {
                if (auth()->user()->account_is_active == 1) {
                    return redirect()->route('home');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Your Account was deactivated from our system.');
                }
            }


            // dd(auth()->user());
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (auth()->user()->role == 'client') {
                if (auth()->user()->account_is_active == 1) {
                    return redirect()->route('client.dashboard');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Your Account was deactivated from our system.');
                }
            }
        }
        else{
            return redirect()->route('login');
        }
    }
}
