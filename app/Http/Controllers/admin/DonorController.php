<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\donor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $donorData = donor::all();

        return view('admin.donor.donor', compact('donorData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email', // add email validation rule
            'birthday' => 'required|date',
            'blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'gender' => 'required|string|in:Male,Female,Other',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'photo' => 'image|max:2048',
        ]);



        $user = new User();
        $user->name = $validatedData['name'];
        $user->user_type = 2;
        $user->email = $validatedData['email'];
        $user->password = bcrypt('donor');
        $user->save();


        // Store the data in the database
        $donor = new donor();
        $donor->user_id = $user->id;
        $donor->name = $validatedData['name'];
        $donor->birthday = $validatedData['birthday'];
        $donor->blood_group = $validatedData['blood_group'];
        $donor->gender = $validatedData['gender'];
        $donor->address = $validatedData['address'];
        $donor->phone = $validatedData['phone'];
        $donor->email = $validatedData['email'];
        $donor->slug = Str::slug(Str::random(10));

        if ($request->hasFile('photo')) {
            $donor->photo = $request->file('photo')->store('photos/donors', 'public');
        }

        $donor->save();

        // Return a redirect response
        return redirect()->back()->with('success', 'donor has been added successfully.');
    }

    public function show(string $slug)
    {

        $donorData = donor::where('slug', $slug)->firstOrFail();
        return view("admin.donor.donor_details",compact('donorData'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {

        $data['donorData'] = donor::all();
        $data['editData'] = donor::where('slug', $slug)->firstOrFail();
        return view('admin.donor.donor', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $donor = donor::where('slug', $slug)->firstOrFail();

        $donor->name = $request->input('name');
        $donor->birthday = $request->input('birthday');
        $donor->gender = $request->input('gender');
        $donor->address = $request->input('address');
        $donor->phone = $request->input('phone');
        $donor->email = $request->input('email');

        if ($request->hasFile('photo')) {
            if ($donor->photo !== null) {
                Storage::disk('public')->delete($donor->photo);
            }
            $donor->photo = $request->file('photo')->store('photos/donors', 'public');
        }

        $donor->save();

        return redirect()->route('admin.manage-donor.index')
            ->with('success', 'donor has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $donor = donor::where('slug', $slug)->firstOrFail();

        if ($donor->photo) {
            Storage::disk('public')->delete($donor->photo);
        }

        $donor->delete();

        return redirect()->route('admin.manage-donor.index')
            ->with('success', 'donor has been deleted successfully.');
    }
}
