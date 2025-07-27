<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function handleRegister(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        // Simpan data ke session
        session([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        return redirect('/welcome');
    }

    public function showWelcome()
    {
        $first_name = session('first_name');
        $last_name = session('last_name');

        return view('welcome', compact('first_name', 'last_name'));
    }


}
