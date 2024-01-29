<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\AuthUserRepository;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    protected $authUserRepository;

    public function __construct(AuthUserRepository $authUserRepository)
    {
        $this->authUserRepository = $authUserRepository;
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'string|max:100',
            'email' => 'required|string|email|max:255|unique:owners|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string',
        ]);

        return $this->authUserRepository->register($request);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        return $this->authUserRepository->login($request);
    }
}
