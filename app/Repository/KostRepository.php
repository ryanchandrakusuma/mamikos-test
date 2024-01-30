<?php

namespace App\Repository;

use App\Http\Resources\KostCollection;
use App\Http\Resources\KostResource;
use App\Interfaces\KostInterface;
use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class KostRepository implements KostInterface
{
    public function create(Request $request)
    {
        $owner_id = Auth::user()->id;

        $kost = new Kost;
        $kost->owner_id = $owner_id;
        $kost->name = $request->name;
        $kost->address = $request->address;
        $kost->description = $request->description;
        $kost->city = $request->city;
        $kost->price = $request->price;

        if ($kost->save()) {
            $response = ['data' => $kost, 'message' => 'Kost berhasil disimpan!'];

            return response($response, 200);
        }

        return response(['message' => 'Bad request'], 400);
    }

    public function get()
    {
        $kosts = QueryBuilder::for(Kost::class)
        ->allowedFilters([
            AllowedFilter::scope('price_starts_between'),
            'name',
            'address',
            'city',
        ])
        ->allowedSorts('price')
        ->get();

        return new KostCollection($kosts);
    }

    public function getById($id)
    {
        $kost = Kost::find($id);

        return new KostResource($kost);
    }

    public function update(Request $request, $id)
    {
        $kost = Kost::find($id);

        if (! $kost) {
            $response = ['message' => 'Kost Id not found'];

            return response($response, 422);
        }

        $kost->name = $request->name;
        $kost->address = $request->address;
        $kost->description = $request->description;
        $kost->city = $request->city;
        $kost->price = $request->price;

        if ($kost->save()) {
            $response = ['data' => $kost, 'message' => 'Kost berhasil disimpan!'];

            return response($response, 200);
        }

        return response(['message' => 'Bad request'], 400);
    }

    public function delete($id)
    {
        $kost = Kost::find($id);

        if (! $kost) {
            $response = ['message' => 'Kost Id not found'];

            return response($response, 422);
        }

        if ($kost->delete()) {
            $response = ['data' => $kost, 'message' => 'Kost berhasil dihapus!'];

            return response($response, 200);
        }

        return response(['message' => 'Bad request'], 400);
    }
}
