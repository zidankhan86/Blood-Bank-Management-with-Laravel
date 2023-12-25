<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\donor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\Inventory;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donorData = donor::all();
        return view('admin.inventory.inventory', compact('donorData'));
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

        // Validate the incoming request data
        $validatedData = $request->validate([
            'donor_slug' => 'required|exists:donors,slug',
            'blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'donate_date' => 'required|date|before_or_equal:today',
            'expire_date' => 'required|date',
            'donate_unit' => 'required|integer|min:1',
        ]);

        // Check if validation fails for donate_date and expire_date
        // if ($request->donate_date > date('Y-m-d') && $request->donate_date > $request->expire_date) {
        //     return back()->with('error', 'Invalid dates.')->withInput();
        // }
        // try {
            // Create a new inventory record
            $inventory = new Inventory();
            $inventory->slug = Str::slug(Str::random(10));
            $inventory->donor_slug = $validatedData['donor_slug'];
            $inventory->blood_group = $validatedData['blood_group'];
            $inventory->donate_date = $validatedData['donate_date'];
            $inventory->expire_date = $validatedData['expire_date'];
            $inventory->donate_unit = $validatedData['donate_unit'];
            $inventory->transferred_unit = 0;
            $inventory->remain_unit = $validatedData['donate_unit'];

            // Save the inventory record to the database
            $inventory->save();

            return back()->with('success', 'Inventory added successfully!');
        // } catch (\Illuminate\Database\QueryException $e) {
        //     // Log or display detailed error messages for debugging

        //     return back()->with('error', 'Failed to add inventory. Please try again.')->withInput();
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(String $blood_group)
    {
        $inventoryData = Inventory::where('blood_group', $blood_group)
            ->where('expire_date', '>', now()) // Exclude items that have already expired
            ->where('remain_unit', '>', 0)    // Exclude items where remain_unit is less than 0
            ->orderBy('expire_date')
            ->get();
        $DropeOutUnitData = Inventory::where('blood_group', $blood_group)
            ->where('expire_date', '<', now()) // include items that have already expired
            ->where('remain_unit', '>', 0)    // Exclude items where remain_unit is less than 0
            ->orderBy('expire_date', 'desc') // Order by expire_date in descending order
            ->get();
            $UsedUnitData = Inventory::where('blood_group', $blood_group)
            ->where('remain_unit', '=', 0)    // Exclude items where remain_unit is less than 0
            ->orderBy('expire_date', 'desc') // Order by expire_date in descending order
            ->get();
        return view('admin.inventory.inv_history', compact('inventoryData','UsedUnitData' ,'DropeOutUnitData', 'blood_group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
