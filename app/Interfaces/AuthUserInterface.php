<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AuthUserInterface
{
    public function register(Request $request);

    public function login(Request $request);

    public function logout(Request $request);
}
