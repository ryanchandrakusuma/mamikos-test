<?php

namespace App\Repository;

use App\Http\Resources\KostCollection;
use App\Http\Resources\KostResource;
use App\Interfaces\KostInterface;
use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $kosts = Kost::all();

        return new KostCollection($kosts);
    }

    public function getById($id)
    {
        $kost = Kost::find($id);

        return new KostResource($kost);
    }

    public function update(Request $request)
    {
    }

    public function delete($id)
    {
    }
}
