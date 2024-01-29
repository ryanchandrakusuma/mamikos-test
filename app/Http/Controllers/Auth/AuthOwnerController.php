<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\AuthOwnerRepository;

class AuthOwnerController extends Controller
{
    protected $authOwnerRepository;

    public function __construct(AuthOwnerRepository $authOwnerRepository){
        $this->authOwnerRepository = $authOwnerRepository;
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        return $this->authOwnerRepository->login($request);
    }

    public function register(Request $request){
        $request->validate([
            'firstName' => 'required|string|max:100',
            'lastName' => 'string|max:100',
            'email' => 'required|string|email|max:255|unique:owners|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        return $this->authOwnerRepository->register($request);
    }

    public function logout(Request $request){
        return $this->authOwnerRepository->logout($request);
    }
}
