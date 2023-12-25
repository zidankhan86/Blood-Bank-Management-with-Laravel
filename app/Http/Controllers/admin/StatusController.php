<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\donor;
use App\Models\admin\Patient;
use DB;


class StatusController extends Controller
{




    public function donorStatus(Request $request, $slug)
    {
        $donor = donor::where('slug', $slug)->firstOrFail();
        $donor->status = $request->status;
        $donor->save();

        $alldata = donor::all();

        return redirect()->back()->with(compact('alldata'))->with('info', 'Status Changed Successfully');
    }

    public function patientStatus(Request $request, $slug)
    {
        $patient = Patient::where('slug', $slug)->firstOrFail();
        $patient->status = $request->status;
        $patient->save();

        $alldata = Patient::all();

        return redirect()->back()->with(compact('alldata'))->with('info', 'Status Changed Successfully');
    }


}
