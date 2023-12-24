<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\frontend\BloodRequest;

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
        BloodRequest::create([
            "patient_slug" =>"eta kisher theke ashbe? ta ektu boshaya diyen . bujtesi na ",
            "slug" => Str::slug($request->blood_group), 
            "requested_unit" => $request->requested_unit,
            "note" => $request->note,
            "needed_date" => $request->needed_date,
            "blood_group" => $request->blood_group,
        ]);
        
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
