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
        User::where("email", "john@doe.fr")
            ->update([
                "name" => "John Doe",
                "email" => "john@doe.fr",
                "email_verified_at" => now(),
                "password" => bcrypt("qwerty")
            ]);

        return view("auth.login");
    }

    public function doLogin(LoginFormRequest $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials, $request->only("remember_me") == "1")) {
            $request->session()->regenerate();

            return redirect()
                ->intended(route("admin.property.index"))
                ->with("seccess", "Heureux de vous avoir retrouver.");
        }

        return back()->withErrors([
            "email" => "Les informations de connexion ne sont pas corrects."
        ])->onlyInput("email");
    }
}
