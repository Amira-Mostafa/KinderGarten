<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){
        $input = $request->all();
        $this->validate ($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))){
           $roleType = auth()->user()->is_admin;
                if($roleType == 1){
                return redirect('/adminDashboard');
                // }elseif($roleType == 2){
                //     return redirect()->route('teacher');
                }elseif($roleType == 3){
                    return redirect('/dashboard');
                }else{
                 return to_route('login')->with('input is invalid');
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
             
         