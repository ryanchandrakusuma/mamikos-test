<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserCreditActivityInterface
{
    public function create(int $amount, string $action);
    public function get();
}
