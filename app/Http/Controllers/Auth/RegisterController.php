<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{

    public function registerForm(): View
    {
        return view("auth.register");
    }

    public function doRegister(RegisterFormRequest $request)
    {
    }
}
