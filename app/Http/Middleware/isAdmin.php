<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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

            if (Auth::user()->is_admin != 1){
                to_route('home')->with('error', "you are not athorized");
            }else{
                return $next($request);
            }
            



        
        // if(!auth()->check()){

        //    return redirect()->route('login');
        // }
        // $userRole = Auth::user()->is_admin;

        // if($userRole == 1){
        //     return $next($request);
        // }

        // if($userRole == 1){
        //     return $next($request);
        // }elseif($userRole == 2){
        //     return redirect()->route('/teacher');
        // }elseif($userRole == 3_){

        // }        //     return redirect()->route('dashboard');
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

    





    }








}
