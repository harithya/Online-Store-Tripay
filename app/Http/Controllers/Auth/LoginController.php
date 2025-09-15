<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(LoginRequest $request)
    {
        try {
            $this->authService->login($request);
            if (auth()->user()->is_admin) {
                return to_route('admin.dashboard.index')->with('success', 'Selamat Datang ' . auth()->user()->name);
            }
            return to_route('home.index')->with('success', 'Selamat Datang ' . auth()->user()->name);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return to_route('home.index')->with('success', 'Berhasil Logout');
    }
}
