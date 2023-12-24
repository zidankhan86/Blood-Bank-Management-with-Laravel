<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\admin\Inventory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\frontend\BloodRequest;
use App\Models\admin\InventoryHistory;
use PhpParser\Node\Expr\Cast\String_;

class BloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloodRequests = BloodRequest::where('status', 2)->get();
        $closedbloodRequests = BloodRequest::whereNotIn('status', [2])->get();
        return view('admin.patient.blood_request',compact('bloodRequests','closedbloodRequests'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $bloodRequestSlug = $slug;

        // Find the accepted blood request
        $bloodRequest = BloodRequest::where('slug', $bloodRequestSlug)->first();
        
        if ($bloodRequest) {
            $requestedUnits = $bloodRequest->requested_unit;
            $availableUnits = Inventory::where('blood_group', 'O-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit');
            
            // Find the closest expire_date and update remain_unit
            $inventoryRecords = Inventory::where('blood_group', $bloodRequest->blood_group)
                ->where('remain_unit', '>', 0) // Ensure there are remaining units
                ->where('expire_date', '>=', Carbon::today()) // Exclude records with expiration date before today
                ->orderBy('expire_date', 'asc') // Order by expire_date in ascending order
                ->get();
        
            foreach ($inventoryRecords as $inventoryRecord) {
                $deductedUnits = min($requestedUnits, $inventoryRecord->remain_unit);
        
                // Update remain_unit and transferred_unit
                $inventoryRecord->update([
                    'remain_unit' => max($inventoryRecord->remain_unit - $deductedUnits, 0),
                    'transferred_unit' => $inventoryRecord->transferred_unit + $deductedUnits,
                ]);
        
                // Find the existing record in inventory_history or create a new one
                $inventoryHistory = InventoryHistory::firstOrNew([
                    'blood_request_slug' => $bloodRequest->slug,
                    'inventory_slug' => $inventoryRecord->slug,
                ]);
        
                // Update donate_unit
                $inventoryHistory->donate_unit = $inventoryHistory->donate_unit + $deductedUnits;
                
                // Save the inventory history record
                $inventoryHistory->save();
        
                $requestedUnits -= $deductedUnits;
        
                if ($requestedUnits <= 0) {
                    break; // Requested units fulfilled
                }
            }
        
            // Update the blood request status to 1 (accepted)
            $bloodRequest->update(['status' => 1]);
        } 
        return back()->with('success', 'Unit transfared successfully.');
    }

    public function showUnits(string $slug){

dd($slug);

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
    public function update(Request $request, string $slug)
    {
    
    }

    public function requestupdate(string $slug){
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
