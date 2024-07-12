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
    }


    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            $roleType = auth()->user()->is_admin;
            if ($roleType == 1) {
                // return redirect()->route('dashboard');
                return redirect()->route('dashboard');
                // } elseif ($roleType == 2) {
                //     return redirect()->route('teacher');
            } elseif ($roleType == 3) {
                // return redirect()->intended(LaravelLocalization::localizeURL(route('home')));
                $urlIntended = $request->input('url_intended', route('home'));
                return redirect()->intended($urlIntended);
                // return redirect()->intended(route('home'));
                // return $next($request);
                // return redirect()->route('home');
            } else {
                // return redirect()->intended(route('/login'));
                return to_route('guest')->with('input is invalid');
            }
        }
    }
}
    
// if(!auth()->check()){
        //     return redirect()->route('login');
        //  }
        //  $userRole = Auth::user()->is_admin;
        //  if($userRole == 1){
        //      return $next($request);
        //  }elseif($userRole == 2){
        //      return redirect()->route('teacher');
        //  }elseif($userRole == 3){
        //     return redirect()->route('dashboard');
        //  }
