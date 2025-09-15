<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($request)
    {
        $auth = auth()->attempt($request->only('email', 'password'));
        if (!$auth) {
            throw new \Exception('Email atau password salah');
        }
        return $auth;
    }

    public function register($request)
    {
        $data  = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        Auth::login($user);

        return $user;
    }

    public function logout()
    {
        return Auth::logout();
    }
}
