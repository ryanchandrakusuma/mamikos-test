<?php

namespace App\Repository;

use App\Http\Resources\OwnerResource;
use App\Interfaces\OwnerInterface;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OwnerRepository implements OwnerInterface
{
    public function getById($id)
    {
        $owner = QueryBuilder::for(Owner::class)
        ->allowedIncludes(['kosts'])
        ->where('id', '=', $id)
        ->first();

        return new OwnerResource($owner);
    }
}
