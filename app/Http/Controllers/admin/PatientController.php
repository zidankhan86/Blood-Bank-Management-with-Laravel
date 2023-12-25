<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\Patient;
use App\Http\Controllers\Controller;
use App\Models\frontend\BloodRequest;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientData = Patient::all();

        return view('admin.patient.patient', compact('patientData'));    }

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
    $user->user_type = 3;
    $user->blood_group = $validatedData['blood_group'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt('password');
    $user->save();


    // Store the data in the database
    $patient = new Patient();
    $patient->user_id = $user->id;
    $patient->name = $validatedData['name'];
    $patient->birthday = $validatedData['birthday'];
    $patient->blood_group = $validatedData['blood_group'];
    $patient->gender = $validatedData['gender'];
    $patient->address = $validatedData['address'];
    $patient->phone = $validatedData['phone'];
    $patient->email = $validatedData['email'];
    $patient->slug = Str::slug(Str::random(10));

    if ($request->hasFile('photo')) {
        $patient->photo = $request->file('photo')->store('photos/patients', 'public');
    }

    $patient->save();

    // Return a redirect response
    return redirect()->back()->with('success', 'patient has been added successfully.');   
 }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $patientData = Patient::where('slug', $slug)->firstOrFail();
        $bloodRequests = BloodRequest::where('patient_slug', $slug)->get();
        return view("admin.patient.patient_details",compact('patientData','bloodRequests'));   
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $data['patientData'] = Patient::all();
        $data['editData'] = Patient::where('slug', $slug)->firstOrFail();
        return view('admin.patient.patient', $data);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $patient = Patient::where('slug', $slug)->firstOrFail();

        $patient->name = $request->input('name');
        $patient->birthday = $request->input('birthday');
        $patient->gender = $request->input('gender');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');

        if ($request->hasFile('photo')) {
            if ($patient->photo !== null) {
                Storage::disk('public')->delete($patient->photo);
            }
            $patient->photo = $request->file('photo')->store('photos/patients', 'public');
        }

        $patient->save();

        return redirect()->route('admin.manage-patient.index')
            ->with('success', 'patient has been updated successfully.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $patient = Patient::where('slug', $slug)->firstOrFail();

        if ($patient->photo) {
            Storage::disk('public')->delete($patient->photo);
        }

        $patient->delete();

        return redirect()->route('admin.manage-patient.index')
            ->with('success', 'patient has been deleted successfully.');
            }
}
