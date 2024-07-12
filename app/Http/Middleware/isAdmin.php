<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check() || (Auth::user()->is_admin != 1)) {
            return redirect()->route('notFound')->with('error', "you are not athorized");
        } else {
            return $next($request);
        }

        // if (Auth::check() && (Auth::user()->is_admin = 1)) {
        //     return $next($request);
        // } else {
        //     //if not authenticated or authorized 
        //     return redirect()->route('notFound');
        // }

        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'You need to log in to access this page.');
        // }



        // if(!auth()->check()){
        //    return redirect()->route('login');
        // }
        // $userRole = Auth::user()->is_admin;

        // if($userRole == 1){
        //     return $next($request);
        // }

        // if(auth()->check()){
        //     if(auth()->user()->is_Admin == 1){
        //         return redirect('home');
        //         // return $next($request);

        //     }else{
        //         return redirect('userDashboard')->with('error',"You don't have admin access.");

        //     }
        // }else{
        //     return redirect()->route('login');
        // }



        // public function handle(Request $request, Closure $next): Response
        // {
        //     if(!auth()->check()){
        //         return redirect()->route('login');
        //      }
        //      $userRole = Auth::user()->is_Admin;
        //      if($userRole == 3){
        //          return $next($request);
        //      }
        //      if($userRole == 2){
        //          return redirect()->route('teacher');
        //      }
        //      if($userRole == 1){
        //         return redirect()->route('admin');
        // }
    }
}
