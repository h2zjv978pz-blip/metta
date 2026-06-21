<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(Request $request)
    {
        if (auth()->check()) {
            return redirect()->route('backend.home');
        }

        return view('backend.auth.login');
    }

    public function postLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (auth()->attempt(['username' => $request->username, 'password' => $request->password], !empty($request->remember))) {
            $request->session()->regenerate();
            return redirect()->intended('manage');
        }

        return back()->withErrors([
            'login' => 'Login credentials were invalid. Try again!',
        ]);
    }

    public function getLogout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
