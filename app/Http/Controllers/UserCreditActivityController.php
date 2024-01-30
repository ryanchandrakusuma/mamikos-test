<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserCreditActivityRepository;

class UserCreditActivityController extends Controller
{
    protected $userCreditActivityRepository;

    public function __construct(UserCreditActivityRepository $userCreditActivityRepository)
    {
        $this->userCreditActivityRepository = $userCreditActivityRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userCreditActivityRepository->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
