<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCreditActivityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($activity) {
                return [
                    'id' => $activity->id,
                    'created_at' => $activity->created_at,
                    'amount' => $activity->amount,
                    'action' => $activity->action,
                ];
            }),
        ];
    }
}
