<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Requests\LoginFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }
    public function authenticate(LoginFormRequest $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => "Vos identifiants sont incorrectes",
        ])->onlyInput('email');
    }

}
