<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    public function login(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $roleType = Auth::user()->is_admin;
            if ($roleType == 1) {
                return redirect()->route('dashboard');
            } elseif ($roleType == 3) {
                $urlIntended = $request->input('url_intended', route('home'));
                return redirect()->intended($urlIntended);
            } else {
                Auth::logout();
                return redirect()->route('login')->with('status', 'danger')->with('message', 'Unauthorized access.');
            }
        } else {
            return redirect()->route('login')->with('status', 'danger')->with('message', 'Invalid email or password.');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
