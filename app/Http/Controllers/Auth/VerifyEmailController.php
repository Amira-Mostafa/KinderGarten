<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use App\Providers\RouteServiceProvider;
use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {

        $user = User::find($request->route('id'));

        if (!$user) {
            return redirect()->route('verification.error')
                ->with('status', 'Invalid user ID in the verification link.');
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('verification.error')
                ->with('status', 'Invalid or expired verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        Auth::login($user);

        return $this->verified($request)
            ?: redirect($this->redirectPath())->with('verified', true);
    }
    public function verificationError()
    {
        return view('auth.verification-error');
    }
}
