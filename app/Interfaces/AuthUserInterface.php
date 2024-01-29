<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AuthUserInterface
{
    public function register(Request $request);
}
