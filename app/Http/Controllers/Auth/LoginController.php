<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authForm(): View
    {
        return view("auth.login");
    }

    public function doLogin(LoginFormRequest $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials, $request->only("remember_me") == "1")) {
            $request->session()->regenerate();

            return redirect()
                ->intended(route("admin.property.index"))
                ->with("success", "Heureux de vous avoir retrouvé.");
        }

        return back()->withErrors([
            "email" => "Les informations de connexion ne sont pas corrects."
        ])->onlyInput("email");
    }
}
