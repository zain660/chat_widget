<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMiddleController extends Controller
{
    //

    public function check_middle(){
        
        if(auth()->user()->role == 0){
           if(auth()->user()->account_is_active == 1){
            return redirect()->route('home');
           }else{
            Auth::logout();
            return redirect()->back()->with('error','Your Account was deactivated from our system.');
           }    
        }
        
        // dd(auth()->user());
        if (auth()->user()->role == 1) {
            return redirect()->route('admin.dashboard');
        } 
        
        if(auth()->user()->role == 2){
            if(auth()->user()->account_is_active == 1){
                return redirect()->route('client.index');
            }else{
                Auth::logout();
                return redirect()->back()->with('error','Your Account was deactivated from our system.');
            }
        }
    }
}
