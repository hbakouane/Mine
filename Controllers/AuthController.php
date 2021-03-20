<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Validation;

class AuthController extends Controller
{
    public function login()
    {
        $this->render('auth.login.index');
    }

    public function handleLogin()
    {
        return "Handling logging";
    }

    public function register()
    {
        $this->render('auth.register.index');
    }

    public function handleRegister(Request $request)
    {
        $data = $request->getBody(['name', 'email', 'password', 'password_confirm']);
        $rules = [
            'name' => 'required',
            'email' => 'email',
            'password' => ['required', 'min:8', 'max:50'],
            'password_confirm' => ['required', 'min:8', 'max:50', 'like_password']
        ];
        $validatedData = Validation::validate($data, $rules);
    }

}