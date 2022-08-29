<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'apilog'], function ($router) {
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::get('hello', [HelloController::class,'hello'])->name('hello');

    Route::group(['middleware' => 'auth'], function ($router) {
        Route::post('auth/logout', [AuthController::class,'logout'])->name('logout');
        Route::post('auth/refresh', [AuthController::class,'refresh'])->name('refresh');
        Route::post('auth/me', [AuthController::class,'me'])->name('me');
        //------------------------------------------------PERSON------------------------------------------------
        // Route::get('auth/getperson',[PersonController::class,'getperson'])->name('getperson');
        // Route::post('auth/addperson',[PersonController::class,'addperson'])->name('addperson');
        // Route::post('auth/updateperson/{$id}',[PersonController::class,'updateperson'])->name('updateperson');
        // Route::post('auth/deleteperson/{$id}',[PersonController::class,'deleteperson'])->name('deleteperson');

        // Route::get('auth/getrole',[RoleController::class,'index'])->name('index');
        Route::get('auth/getuser',[AuthController::class,'index'])->name('auth.get.user');
    });

    Route::post('addperson',[PersonController::class,'addperson'])->name('addperson');
    Route::get('getperson',[PersonController::class,'getperson'])->name('getperson');
    Route::delete('deleteperson', [PersonController::class, 'destroy'])->name('destroy.person');
    Route::post('editperson',[PersonController::class,'editperson'])->name('editperson');

    //--------------------------------------------ROLE--------------------------------------------
    Route::get('getrole',[RoleController::class,'index'])->name('index');
    Route::post('addrole',[RoleController::class,'addrole'])->name('addrole');
    Route::delete('deleterole', [RoleController::class, 'destroy'])->name('destroy.role');
    Route::post('editrole',[RoleController::class,'editrole'])->name('editrole');


    // Route::group(['prefix' => 'role', 'as' => 'role.'], function(){
    //     Route::resource('', RoleController::class);
    // });

});