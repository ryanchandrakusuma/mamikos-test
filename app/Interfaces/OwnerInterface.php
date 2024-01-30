<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OwnerInterface
{
    public function getById($id);
}
