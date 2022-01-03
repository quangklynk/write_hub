<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ok', function () {
    return response()->json(['status' => 'successful']);
});

// Route::resource('role', 'RoleController');

Route::get('/role','RoleController@index');
Route::get('/role/{id}','RoleController@show');
Route::delete('/role/{id}','RoleController@destroy');
Route::post('/role','RoleController@store');