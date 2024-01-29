<?php

namespace App\Http\Controllers;

use App\Repository\KostRepository;
use Illuminate\Http\Request;

class KostController extends Controller
{
    protected $kostRepository;

    public function __construct(KostRepository $kostRepository)
    {
        $this->kostRepository = $kostRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->kostRepository->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        return $this->kostRepository->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
