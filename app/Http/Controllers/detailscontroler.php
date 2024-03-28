<?php

namespace App\Http\Controllers;

use App\Models\detailsuser;
use Illuminate\Http\Request;

class detailscontroler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(detailsuser $detailsuser)
{
    $user = auth()->user(); // Assuming you're using Laravel's built-in authentication

    // Retrieve additional details based on the user's email
    $detailsuser = detailsuser::where('useremail', $user->email)->first();

    return view('profile', compact('user', 'detailsuser'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailsuser $detailsuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detailsuser $detailsuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detailsuser $detailsuser)
    {
        //
    }
}
