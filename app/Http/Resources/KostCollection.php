<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($kost) {
                return [
                    'id' => $kost->id,
                    'name' => $kost->name,
                    'address' => $kost->address,
                    'price' => $kost->price,
                ];
            }),
        ];
    }
}
