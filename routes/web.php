<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Resources\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

 
 //auth
Route::get('/registration',[RegisterController::class,'registration'])->name('register.page');
Route::post('/registration/Store',[RegistrationController::class,'registrationStore'])->name('register.store');

//Blood Group and Home
Route::get('/', function () {
    $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
    $inventoryData = [];

    foreach ($bloodGroups as $bloodGroup) {
        $inventoryData[$bloodGroup] = \App\Models\admin\Inventory::where('blood_group', $bloodGroup)
            ->where('expire_date', '>', now())
            ->where('remain_unit', '>=', 0)
            ->get()
            ->toArray();
        // Calculate total remaining units
        $totalRemainUnit = array_sum(array_column($inventoryData[$bloodGroup], 'remain_unit'));

        foreach ($inventoryData[$bloodGroup] as &$item) {
            $item['total_remain_unit'] = $totalRemainUnit;
        }
    }
        return view('frontend.index',compact('bloodGroups', 'inventoryData'));
    
});

Route::group(['middleware' => 'prevent-back-history'], function () {

    Route::get('forbidden', function () {
        return view('error.forbidden');
    })->name('forbidden');

    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::post('/change-password/{id}', [App\Http\Controllers\Auth\UpdatePasswordController::class, 'updatePassword'])->name('change-password');
        // Route::group(['middleware' => ['auth', 'check_user:1'], 'prefix' => 'admin', 'as' => 'admin.'], function ()
        Route::group(['middleware' => ['auth', 'check_user:1'], 'as' => 'admin.'], function () {
        Route::resource('manage-donor', \App\Http\Controllers\admin\DonorController::class);
        Route::post('donorstatus/update/{slug}', [StatusController::class, 'donorStatus'])->name('donorStatus.update');
        Route::resource('manage-inv', \App\Http\Controllers\admin\InventoryController::class);
        });


        Route::group(['middleware' => ['auth', 'check_user:2'], 'prefix' => 'donor', 'as' => 'donor.'], function () {

        });

        Route::group(['middleware' => ['auth', 'check_user:3'], 'prefix' => 'patient', 'as' => 'patient.'], function () {


        });


    });

});
