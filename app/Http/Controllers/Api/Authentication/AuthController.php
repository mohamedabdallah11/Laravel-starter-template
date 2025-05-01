<?php

namespace App\Http\Controllers\Api\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Concrete\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(  AuthService $authService) 
    {
        $this->authService = $authService;

    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->validated());
    }

    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request->validated());
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request->user());
    }
}
