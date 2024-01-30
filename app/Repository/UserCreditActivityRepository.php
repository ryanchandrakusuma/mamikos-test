<?php

namespace App\Repository;

use App\Interfaces\UserCreditActivityInterface;
use App\Http\Resources\UserCreditActivityCollection;
use App\Models\UserCreditActivity;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;

class UserCreditActivityRepository implements UserCreditActivityInterface
{
    public function create(int $amount, string $action){
        $userCreditActivity = new UserCreditActivity;
        $userCreditActivity->user_id = Auth::user()->id;
        $userCreditActivity->credits = $amount;
        $userCreditActivity->actions = $action;

        if ($userCreditActivity->save()){
            return true;
        }

        return false;
    }

    public function get(){
        $user_id = Auth::user()->id;

        $userCreditActivities = QueryBuilder::for(UserCreditActivity::class)
        ->where('user_id', '=', $user_id)
        ->get();

        return new UserCreditActivityCollection($userCreditActivities);
    }
}