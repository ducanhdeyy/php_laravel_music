<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\LoginRequest;
use App\Http\Requests\Client\RegisterRequest;
use App\Mail\SendMail;
use App\Services\Client\LoginService;
use App\Services\Client\UserService;
use App\Services\SendMail\MailService;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    private $userService;
    protected $loginService;
    protected $mailService;

    public function __construct(UserService $userService, LoginService $loginService, MailService $mailService)
    {
        $this->userService = $userService;
        $this->loginService = $loginService;
        $this->mailService = $mailService;
    }

    public function index()
    {
        return view('client.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $this->loginService->attempt($request);
            return redirect()->route('home');
        } catch (AuthenticationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home');
    }

    public function signup()
    {
        return view('client.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->userService->register($request);
            return redirect()->route('login.user')->with('success', __('messages.create_success'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
