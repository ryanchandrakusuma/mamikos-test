<?php

namespace App\Http\Controllers;

use App\Repository\UserKostRequestRepository;
use App\Repository\UserCreditActivityRepository;
use Illuminate\Http\Request;

class UserKostRequestController extends Controller
{
    protected $userKostRequestRepository;
    protected $userCreditActivityRepository;

    public function __construct(UserKostRequestRepository $userKostRequestRepository, UserCreditActivityRepository $userCreditActivityRepository)
    {
        $this->userKostRequestRepository = $userKostRequestRepository;
        $this->userCreditActivityRepository = $userCreditActivityRepository;
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
            'question' => 'required|string',
        ]);

        $response = $this->userKostRequestRepository->create($request);
        if ($response->status() == 200){
            $this->userCreditActivityRepository->create(-5, 'Ask Kost Availability');
        }

        return $response;
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
