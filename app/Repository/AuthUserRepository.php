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

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('User API Token')->accessToken;
                $response = ['token' => $token];

                return response($response, 200);
            } else {
                $response = ['message' => 'Password mismatch'];

                return response($response, 422);
            }
        } else {
            $response = ['message' =>'User does not exist'];

            return response($response, 422);
        }
    }
}
