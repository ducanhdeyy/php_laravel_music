<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\LoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    protected $login;

    public function __construct(LoginService $login)
    {
        $this->login = $login;
    }

    public function index()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $this->login->attempt($request);
            return redirect()->route('dashboard');
        } catch (AuthenticationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
