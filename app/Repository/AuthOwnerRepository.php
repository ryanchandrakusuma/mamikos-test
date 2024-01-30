<?php

namespace App\Repository;

use App\Interfaces\AuthOwnerInterface;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class AuthOwnerRepository implements AuthOwnerInterface
{
    public function login(Request $request)
    {
        $owner = Owner::where('email', $request->email)->first();
        if ($owner) {
            if (Hash::check($request->password, $owner->password)) {
                $token = $owner->createToken('Owner API Token')->accessToken;
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

    public function register(Request $request)
    {
        $request['id'] = Uuid::uuid4();
        $request['password'] = Hash::make($request['password']);

        $owner = Owner::create($request->toArray());
        $owner->assignRole('owner');

        $token = $owner->createToken('Owner API Token')->accessToken;
        $response = ['token' => $token];

        return response($response, 200);
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
