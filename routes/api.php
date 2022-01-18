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

// route for status
Route::get('/status','StatusController@index');
Route::get('/status/{id}','StatusController@show');
Route::delete('/status/{id}','StatusController@destroy');
Route::post('/status','StatusController@store');

// route for examination
Route::get('/exam','ExamController@index');
Route::get('/exam/{id}','ExamController@show');
Route::get('/exam/student/{id}','ExamController@showForStudent');
Route::delete('/exam/{id}','ExamController@destroy');
Route::post('/exam','ExamController@store');

// route for course
Route::get('/course','CourseController@index');
Route::get('/course/{id}','CourseController@show');
Route::delete('/course/{id}','CourseController@destroy');
Route::post('/course','CourseController@store');

// route for teacher
Route::get('/teacher','TeacherController@index');
Route::get('/teacher/{id}','TeacherController@show');
Route::delete('/teacher/{id}','TeacherController@destroy');
Route::patch('/teacher/{id}/revert','TeacherController@revert');
Route::patch('/teacher/{id}','TeacherController@update');

// route for student
Route::get('/student','StudentController@index');
Route::get('/student/{id}','StudentController@show');
Route::delete('/student/{id}','StudentController@destroy');
Route::patch('/student/{id}','StudentController@update');

// route for post
Route::post('/post','PostController@store');

// route action
Route::post('/login','_AuthController\LoginController@login');
Route::post('/register','_AuthController\RegisterController@register');
Route::post('/register/teacher','_AuthController\RegisterController@registerTeacher');

// route for student list
Route::get('/stuincourse','StuInCourseController@index');
Route::get('/stuincourse/{id}','StuInCourseController@show');
Route::post('/stuincourse','StuInCourseController@store');
