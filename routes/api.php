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
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/role','RoleController@index')->middleware('scope:admin');
    Route::get('/role/{id}','RoleController@show')->middleware('scope:admin');
    Route::delete('/role/{id}','RoleController@destroy')->middleware('scope:admin');
    Route::post('/role','RoleController@store')->middleware('scope:admin');

    // route for category
    Route::get('/category','CategoryController@index')->middleware('scope:admin');
    Route::get('/category/{id}','CategoryController@show')->middleware('scope:admin');
    Route::delete('/category/{id}','CategoryController@destroy')->middleware('scope:admin');
    Route::post('/category','CategoryController@store')->middleware('scope:admin');

    // route for type
    Route::get('/type','TypeController@index')->middleware('scope:admin');
    Route::get('/type/{id}','TypeController@show')->middleware('scope:admin');
    Route::delete('/type/{id}','TypeController@destroy')->middleware('scope:admin');
    Route::post('/type','TypeController@store')->middleware('scope:admin');

    // route for status
    Route::get('/status','StatusController@index')->middleware('scope:admin');
    Route::get('/status/{id}','StatusController@show')->middleware('scope:admin');
    Route::delete('/status/{id}','StatusController@destroy')->middleware('scope:admin');
    Route::post('/status','StatusController@store')->middleware('scope:admin');

    // route for examination
    Route::get('/exam','ExamController@index')->middleware('scope:admin,teacher');
    Route::get('/exam/{id}','ExamController@show')->middleware('scope:admin,teacher');
    Route::get('/exam/student/{id}','ExamController@showForStudent')->middleware('scope:admin,teacher');
    Route::get('/exam/teacher/{id}','ExamController@showForTeacher')->middleware('scope:admin,teacher');
    Route::delete('/exam/{id}','ExamController@destroy')->middleware('scope:admin,teacher');
    Route::post('/exam','ExamController@store')->middleware('scope:admin,teacher');

    // route for course
    Route::get('/course','CourseController@index')->middleware('scope:admin,teacher');
    Route::get('/course/{id}','CourseController@show')->middleware('scope:admin,teacher');
    Route::delete('/course/{id}','CourseController@destroy')->middleware('scope:admin,teacher');
    Route::post('/course','CourseController@store')->middleware('scope:admin,teacher');

    // route for teacher
    Route::get('/teacher','TeacherController@index')->middleware('scope:admin,teacher');
    Route::get('/teacher/{id}','TeacherController@show')->middleware('scope:admin');
    Route::delete('/teacher/{id}','TeacherController@destroy')->middleware('scope:admin');
    Route::patch('/teacher/{id}/revert','TeacherController@revert')->middleware('scope:admin');
    Route::patch('/teacher/{id}','TeacherController@update')->middleware('scope:admin,teacher');

    // route for student
    Route::get('/student','StudentController@index')->middleware('scope:admin,teacher,student');
    Route::get('/student/{id}','StudentController@show')->middleware('scope:admin,teacher,student');
    Route::delete('/student/{id}','StudentController@destroy')->middleware('scope:admin,teacher');
    Route::patch('/student/{id}','StudentController@update')->middleware('scope:student');

    // route for post
    Route::get('/post','PostController@index')->middleware('scope:admin,teacher,student');
    Route::post('/post','PostController@store')->middleware('scope:student');
    Route::get('/post/{idTeacher}:{idExam}','PostController@show');
    Route::get('/post/{idPost}','PostController@showByID');
    Route::patch('/post/{id}','PostController@update');

     // route action
    Route::post('/register/teacher','_AuthController\RegisterController@registerTeacher')->middleware('scope:admin');

    // route for student list
    Route::get('/stuincourse','StuInCourseController@index')->middleware('scope:admin,teacher');
    Route::get('/stuincourse/{id}','StuInCourseController@show')->middleware('scope:admin,teacher');
    Route::post('/stuincourse','StuInCourseController@store')->middleware('scope:admin,teacher');
    Route::get('/stuincourse/list/{id}','StuInCourseController@listStudent')->middleware('scope:admin,teacher');
    Route::get('/stuincourse/student/{id}','StuInCourseController@listStudentNull')->middleware('scope:admin,teacher');

});

 // route action
 Route::post('/login','_AuthController\LoginController@login');
 Route::post('/register','_AuthController\RegisterController@register');