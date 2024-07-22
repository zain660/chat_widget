<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientApp;
use App\Models\Lead;

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

    public function index()
    {
        $client_list = ClientApp::where('user_id', auth()->user()->id)->get();

        $activeLeadsCount = [];
        $inActiveLeadsCount = [];
        $leadsCount = [];
        foreach ($client_list as $item) {
            $leads = Lead::where('web_url', $item->website_url)->get();
            $activeLeads = count($leads->where('status', 1));
            $inActiveLeads = count($leads->where('status', 0));
            $leads = count($leads);

            array_push($activeLeadsCount, $activeLeads);
            array_push($inActiveLeadsCount, $inActiveLeads);
            array_push($leadsCount, $leads);
        }
        // dd($activeLeadsCount,$inActiveLeadsCount,$leadsCount);
        // return view('admin.home');
        return view('client.home', get_defined_vars());
    }

    public function integration()
    {
        $apps = ClientApp::where('user_id', auth()->user()->id)->get();
        return view('client.integration', get_defined_vars());
    }

    public function apps()
    {
        $apps = ClientApp::where('user_id', auth()->user()->id)->get();
        return view('client.client_apps', get_defined_vars());
    }

    public function create_app()
    {
        return view('client.app_create');
    }

    public function store_app(Request $request)
    {
        $app = new ClientApp;
        $app->user_id = auth()->user()->id;
        $app->app_name = $request->app_name;
        $app->app_key = \Str::random();
        $app->website_url = $request->website_url;
        $app->save();
        return redirect()->route('client.apps')->with('success', 'App Created successfuly');
    }

    public function leads()
    {
        $client_list = ClientApp::where('user_id', auth()->user()->id)->get();

        $allLeads = [];
        foreach ($client_list as $item) {
            $leads = Lead::where('web_url', $item->website_url)->paginate(10);
            array_push($allLeads, $leads);
        }
        return view('client.leads', get_defined_vars());
    }
}
