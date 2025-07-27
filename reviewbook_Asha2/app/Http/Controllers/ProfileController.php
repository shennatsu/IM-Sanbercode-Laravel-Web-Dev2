<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
              'age' => 'required|integer',
              'address' => 'required|string',
        ]);

        $profile = new Profile();
        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->user_id = Auth::id();
        $profile->save();


        return redirect()->route('profile.edit')->with('success', 'Profile created successfully.');
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bio' => 'nullable|string',
        ]);

        $profile = Auth::user()->profile;
        $profile->update([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function show()
{
    $profile = Auth::user()->profile;

    if (!$profile) {
        return redirect()->route('profile.create')->with('info', 'Silakan lengkapi profilmu terlebih dahulu.');
    }

    return view('profile.show', compact('profile'));
}



}
