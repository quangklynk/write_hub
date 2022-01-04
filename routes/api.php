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

// route for category
Route::get('/category','CategoryController@index');
Route::get('/category/{id}','CategoryController@show');
Route::delete('/category/{id}','CategoryController@destroy');
Route::post('/category','CategoryController@store');

// route for type
Route::get('/type','TypeController@index');
Route::get('/type/{id}','TypeController@show');
Route::delete('/type/{id}','TypeController@destroy');
Route::post('/type','TypeController@store');

