<?php

namespace App\Repository;

use App\Interfaces\AuthUserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthUserRepository implements AuthUserInterface
{
    public function register(Request $request)
    {
        $request['password'] = Hash::make($request['password']);

        $role = 'regular-user';
        $credits = 20;
        if ($request['type'] === 'premium-user') {
            $role = 'premium-user';
            $credits = 40;
        }
        $request['credits'] = $credits;

        $user = User::create($request->toArray());
        $user->assignRole($role);

        $token = $user->createToken('User API Token')->accessToken;
        $response = ['token' => $token];

        return response($response, 200);
    }
}
