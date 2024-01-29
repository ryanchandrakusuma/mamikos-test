<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface KostInterface
{
    public function create(Request $request);

    public function get();

    public function getById($id);

    public function update(Request $request);

    public function delete($id);
}
