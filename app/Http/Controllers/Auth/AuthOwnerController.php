<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\AuthOwnerRepository;
use Illuminate\Http\Request;

class AuthOwnerController extends Controller
{
    protected $authOwnerRepository;

    public function __construct(AuthOwnerRepository $authOwnerRepository)
    {
        $this->authOwnerRepository = $authOwnerRepository;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        return $this->authOwnerRepository->login($request);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'string|max:100',
            'email' => 'required|string|email|max:255|unique:owners|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        return $this->authOwnerRepository->register($request);
    }

    public function logout(Request $request)
    {
        return $this->authOwnerRepository->logout($request);
    }
}
