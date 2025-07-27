<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{


     public function home() {
    $user = Auth::user();

    $first_name = $user->name; // Ubah sesuai struktur kamu
    $last_name = ''; // Kalau misahin first/last name

        $age = $user->profile->age ?? null;

    return view('home', compact('first_name', 'last_name', 'age'));

}
}
