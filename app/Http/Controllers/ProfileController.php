<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', ['user' => Auth::user()]);
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $user = Auth::user();
    
    // Update name and email
    $user->name = $request->name;
    $user->email = $request->email;

    // Check if a profile picture is uploaded
    if ($request->hasFile('profile_picture')) {
        // Delete old profile picture if it exists
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }
        
        // Store new profile picture and get the path
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
    }

    $user->save();

    return redirect()->route('profile.show')->with('status', 'Profile updated successfully');
}
};
