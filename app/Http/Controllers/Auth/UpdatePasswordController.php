<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function updatePassword(Request $request, $id)
    {

    
        // Retrieve the user
        $user = User::findOrFail($id);

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error' , 'The current password is incorrect.');
        }
    
        // Check if the new password and password confirmation match
        if ($request->new_password !== $request->password_confirmation) {
            return back()->with('error' , 'The new password and password confirmation do not match.');
        }
    
        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        // Flash a success message
        return back()->with('success', 'Your password has been successfully updated.');
    }
    
    }
