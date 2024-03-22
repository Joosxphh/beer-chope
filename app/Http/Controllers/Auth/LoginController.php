<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function authenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('admin/dashboard');
            }
            $request->session()->flash('error', 'Vous devez être administrateur pour accéder à cette page');
            Auth::logout();
            return redirect()->route('login');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
