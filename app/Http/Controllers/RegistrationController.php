<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
   public function registrationStore(Request $request)
{
    //  dd($request->all());
    // Validate user input
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'user_type' => 'required',
        'password' => 'required',
        'blood_group' => 'required',
    ]);

    // Check for validation errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    // Create a new user
    User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'user_type' => $request->input('user_type'),
        'password' => Hash::make($request->input('password')),
        'blood_group' => $request->input('blood_group'),
    ]);

    return redirect()->back()->with('success', 'Registration successful!');
}
}
