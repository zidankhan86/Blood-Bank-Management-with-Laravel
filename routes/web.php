<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StatusController;


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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
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




            

        });













     
        


        Route::group(['middleware' => ['auth', 'check_user:2'], 'as' => 'teacher.'], function () {

        });

        Route::group(['middleware' => ['auth', 'check_user:3'], 'prefix' => 'student', 'as' => 'student.'], function () {
            // routes that only student can access
        });

        Route::group(['middleware' => ['auth', 'check.userType:4'], 'prefix' => 'parent', 'as' => 'parent.'], function () {
            // routes that only parent can access
        });

        Route::group(['middleware' => ['auth', 'check.userType:5'], 'prefix' => 'accountant', 'as' => 'accountant.'], function () {
            // routes that only accountant can access
        });

        Route::group(['middleware' => ['auth', 'check.userType:6'], 'prefix' => 'library', 'as' => 'library.'], function () {
            // routes that only library can access
        });

    });

});
