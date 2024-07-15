<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientApp;
class ClientController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('client.home');
    }

    public function integration(){
        $apps = ClientApp::where('user_id',auth()->user()->id)->get();
        return view('client.integration',get_defined_vars());
    }

    public function apps(){
        $apps = ClientApp::where('user_id',auth()->user()->id)->get();
        return view('client.client_apps',get_defined_vars());
    }

    public function create_app(){
        return view('client.app_create');
    }

    public function store_app(Request $request){
        $app = new ClientApp;
        $app->user_id = auth()->user()->id;
        $app->app_name = $request->app_name;
        $app->app_key = \Str::random();
        $app->website_url = $request->website_url;
        $app->save();
        return redirect()->route('client.apps')->with('success','App Created successfuly');
    }

  
}
