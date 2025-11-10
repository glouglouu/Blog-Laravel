<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

        // Vérifier s'il y a une redirection spécifique après connexion (ex: article premium)
        if ($request->session()->has('redirect_after_login')) {
            $redirectTo = $request->session()->get('redirect_after_login');
            $request->session()->forget('redirect_after_login');
            return redirect($redirectTo);
        }

        // Redirect to dashboard for admins, otherwise to home
        $user = Auth::user();
        if ($user && $user->hasRole('admin')) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        return redirect()->intended('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
