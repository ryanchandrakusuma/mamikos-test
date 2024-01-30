<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserKostRequestRepository;

class UserKostRequestController extends Controller
{
    protected $userKostRequestRepository;

    public function __construct(UserKostRequestRepository $userKostRequestRepository)
    {
        $this->userKostRequestRepository = $userKostRequestRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string'
        ]);

        return $this->userKostRequestRepository->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
