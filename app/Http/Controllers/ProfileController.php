<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\detailsuser;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }
    public function edit()
    {
        $user = Auth::user();
        $detailsuser = detailsuser::where('useremail', $user->email)->first(); // Retrieve details based on the user's email
        return view('editprofile', compact('user', 'detailsuser'));
    }
    

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'Age' => 'nullable|integer',
        'adresse' => 'nullable|string|max:255',
        'poids' => 'nullable|numeric',
    ]);

    // Update user profile
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    // Add other fields as needed
    $user->save();

    // Update or create user details
    $detailsuser = detailsuser::updateOrCreate(
        ['useremail' => $user->email],
        [
            'age' => $request->input('Age'),
            'adresse' => $request->input('adresse'),
            'poids'=> $request->input('poids')
            // Add other fields as needed
        ]
    );

    // Compact the updated detailsuser and user to pass to the view
    return redirect()->route('usersdetails.show',Auth::user()->id);
}


}