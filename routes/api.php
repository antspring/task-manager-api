<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \Illuminate\Http\Request;

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
Route::post('/token/create', [AuthController::class, 'createToken'])->name('create_token');

Route::post('/token/regenerate', [AuthController::class, 'regenerateToken'])->name('regenerate_token');

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/update-user-info', [UserController::class, 'updateInfo'])->name('update_user_info');

    Route::get('/user-info', function (Request $request){ return $request->user(); })->name('user_info');

    Route::get('/user-groups', function (Request $request){ return $request->user()->groups; })->name('user_groups');
});
