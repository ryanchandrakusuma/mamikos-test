<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserKostRequestInterface
{
    public function create(Request $request);
}

?>