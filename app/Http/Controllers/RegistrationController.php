<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin\donor;
use App\Models\admin\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function registrationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'user_type' => 'required',
            'password' => 'required',
            'blood_group' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = User::create($request->only(['name', 'user_type', 'email', 'password']));
    
        if(in_array($request->user_type, [2, 3])){
            $type = $request->user_type == 2 ? new Donor() : new Patient();
            $type->fill($request->only(['name', 'blood_group', 'address', 'phone', 'email']));
            $type->user_id = $user->id;
            $type->slug = Str::slug(Str::random(10));
    
            if ($request->hasFile('photo')) {
                $type->photo = $request->file('photo')->store('photos/' . strtolower(class_basename($type)), 'public');
            }
    
            $type->save();
        }
    
        return redirect()->back()->with('success', 'Registration successful!');
    }
    
    
}
