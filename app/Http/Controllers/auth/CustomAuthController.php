<?php
// this is custom controller for sending industries of candidates when a new users register
namespace App\Http\Controllers\Auth;

use App\Models\Industry;
use App\Http\Controllers\Controller;
class CustomAuthController extends Controller
{
    public function showRegistrationForm()
    {
        // Fetch industries from the database
        $industries = Industry::all();

        // Pass industries data to the registration view
        return view('auth.register', compact('industries'));
    }
}

