<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAccountController extends Controller
{
    /**
     * Show the form to create a new admin.
     */
    public function showCreateForm()
    {
        return view('admin.create');
    }

    /**
     * Show the form to login admin.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle the creation of a new admin.
     */
    public function create(Request $request)
{
    // Validate the request
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'permissions' => ['nullable', 'string'], // Expecting a comma-separated string
    ]);

    if ($validator->fails()) {
        return redirect()->route('admin.create')
            ->withErrors($validator)
            ->withInput();
    }

    // Create the admin user
    $admin = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'user_type' => 'admin',
    ]);

    // Get and process permissions
    $permissionsInput = $request->input('permissions', ''); // Get the comma-separated input
    $permissionsArray = array_map('trim', explode(',', $permissionsInput)); // Convert to array and trim spaces
    $permissionsJson = json_encode($permissionsArray); // Encode array as JSON

    // Save the admin record
    Admin::create([
        'user_id' => $admin->id,
        'role' => 'admin', // Provide a value for the 'role' column
        'permissions' => $permissionsJson,
    ]);

    // Log the admin user in
    Auth::login($admin);

    return redirect()->route('admin.dashboard');
}





    /**
     * Handle admin login.
     */
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.login.form')->withErrors($validator)->withInput();
        }

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the authenticated user is an admin
            if ($user->user_type === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            }

            // Log out the user if they are not an admin
            Auth::logout();
            return redirect()->route('admin.login.form')->withErrors(['email' => 'Unauthorized user type']);
        }

        // Authentication failed
        return redirect()->route('admin.login.form')->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
