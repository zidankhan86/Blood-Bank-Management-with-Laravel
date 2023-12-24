<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        switch ($user->user_type) {
            case 1: // Admin
                // return view('admin.admin_master');
                return view('admin.index');

            case 2: // donor
                return view('frontend.index');
            case 3: // patient
                return view('frontend.index');

            default:
                return view('Admin.admin_master');
        }
    }


    public function adminindex()
    {
        return view('admin_master');
    }
}
