<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Packages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout_post(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // $request->session()->flush();
        return redirect('/login');
    }

    public function login_post(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);



        // Admin=0, Agent=1, Client=2
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // dd(auth()->user());
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
                // dd(auth()->user()->role);
            } elseif (auth()->user()->role == 'agent' && auth()->user()->account_is_active == 1) {
                // dd('sss');
                return redirect()->route('home');
            } elseif (auth()->user()->role == 'client' && auth()->user()->account_is_active == 1) {
                // dd('sss');
                return redirect()->route('client.index');
            } else {
                return redirect()->back()->with('error', 'Your Account was deactivated from our system');
            }
        } else {
            // dd(auth()->user());
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    public function pricing()
    {
        $pricing = Packages::where('is_active', 1)->get();
        return view('pricing', get_defined_vars());
    }
}
