<?php

namespace App\Repository;

use App\Interfaces\AuthUserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class AuthUserRepository implements AuthUserInterface
{
    public function register(Request $request)
    {
        $request['id'] = Uuid::uuid4();
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
        $response = ['data' => [
            'user' => $user, 'token' => $token,
        ]];

        return response($response, 200);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('User API Token')->accessToken;
                $response = ['data' => [
                    'user' => $user, 'token' => $token,
                ]];

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

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        if (! $token) {
            $response = ['message' => 'Token not valid'];

            return response($response, 422);
        }
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];

        return response($response, 200);
    }
}
