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
    public function create(): RedirectResponse|View
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'Admin') {
                return redirect()->route('home_admin');
            } elseif ($usertype === 'Petugas') {
                return redirect()->route('home_petugas');
            }
        }
        return view('auth.login');
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Validasi kredensial
        $request->session()->regenerate(); // Regenerasi sesi

        // Cek role user dari database
        $usertype = Auth::user()->usertype;

        if ($usertype=== 'Admin') {
            return redirect()->route('home_admin'); // Redirect ke dashboard admin
        } elseif ($usertype === 'Petugas') {
            return redirect()->route('home_petugas'); // Redirect ke dashboard petugas
        }

        // Default jika role tidak dikenali
        return redirect()->route('welcome');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/welcome');
    }
}
