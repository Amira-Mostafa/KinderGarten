<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        //storing auth with if condition

        if ($request->user()->is_admin == 1) {
            return redirect()->route('dashboard');
        } else {
            // return redirect()->intended(route('home'));
            return redirect()->intended(LaravelLocalization::localizeURL(route('home')));
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the localized home route
        return redirect(LaravelLocalization::localizeURL(route('home')));

        // return redirect('/'); //the old rediret
    }
}
