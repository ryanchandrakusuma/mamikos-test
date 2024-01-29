<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AuthOwnerInterface {
    public function login(Request $request);
    public function register(Request $request);
    public function logout(Request $request);
}

?>