<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\Patient;
use Illuminate\Support\Facades\Auth;
use App\Models\frontend\BloodRequest;
use Illuminate\Support\Facades\Validator;

class BloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.BloodRequest.bloodRequestFrom');
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
        $validator = Validator::make($request->all(), [
            'requested_unit' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255',
            'needed_date' => 'required|date|after_or_equal:today',
            'blood_group' => 'required',

        ]);
        
       toastr()->error("Failed, You are not registered");
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $bloodRequest = new BloodRequest;
        $bloodRequest->patient_slug = Patient::where('user_id',Auth::user()->id)->value('slug');
        $bloodRequest->slug = Str::slug($request->blood_group);
        $bloodRequest->requested_unit = $request->requested_unit;
        $bloodRequest->note = $request->note;
        $bloodRequest->needed_date = $request->needed_date;
        $bloodRequest->slug = Str::slug(Str::random(10));
        $bloodRequest->blood_group = Patient::where('user_id',Auth::user()->id)->value('blood_group');
        $bloodRequest->save();
        
        
        return back()->with('success', 'Your request has been successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(BloodRequest $bloodRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodRequest $bloodRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodRequest $bloodRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodRequest $bloodRequest)
    {
        //
    }
}
