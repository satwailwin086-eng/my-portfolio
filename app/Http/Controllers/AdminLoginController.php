<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        if (session('is_admin')) {
            return redirect()->route('admin.messages');
        }

        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (
            ! is_string(config('admin.password')) ||
            ! hash_equals(
                (string) config('admin.password'),
                (string) $request->input('password')
            )
        ) {
            return back()
                ->withErrors([
                    'password' => 'Incorrect admin password.',
                ])
                ->onlyInput();
        }

        $request->session()->regenerate();

        $request->session()->put('is_admin', true);

        return redirect()->route('admin.messages');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}