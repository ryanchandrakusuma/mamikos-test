<?php

namespace App\Repository;

use App\Interfaces\UserKostRequestInterface;
use App\Models\UserKostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserKostRequestRepository implements UserKostRequestInterface
{
    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user->credits < 5){
            $response = ['message' => 'Credits tidak cukup'];

            return response($response, 400);
        }
        $user->credits -= 5;
        $user->save();

        $userKostRequest = new UserKostRequest;
        $userKostRequest->kost_id = $request->id;
        $userKostRequest->user_id = $user->id;
        $userKostRequest->question = $request->question;
        $userKostRequest->is_resolved = false;

        if ($userKostRequest->save()) {
            $response = ['data' => $userKostRequest, 'message' => 'Ask Kost Availability berhasil'];

            return response($response, 200);
        }

        return response(['message' => 'Bad request'], 400);
    }
}

?>