<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Profile Routes
Route::get('/profile','ProfileController@index')->name('profile-index');
Route::get('/profile/{user}','ProfileController@show')->name('profile-show');
Route::get('/profile/create/{user}','ProfileController@add')->name('profile-add');
Route::post('/profile/create/{user}','ProfileController@store')->name('profile-store');
Route::put('/profile/{profile}','ProfileController@update')->name('profile-update');

// Salary Routes
Route::get('/salary','SalaryController@index')->name('salary-index');
Route::get('/salary/{salary}','SalaryController@show')->name('salary-show');
Route::put('/salary/{salary}','SalaryController@update')->name('salary-update');

// Salary Records Routes
Route::get('/salaryRecord','SalaryRecordController@index')->name('salary-record-index');
Route::post('/salaryRecord/create','SalaryRecordController@store')->name('salary-record-store');

// Attendance Routes
Route::get('/attendance','AttendanceController@index')->name('attendance-index');
Route::post('/attendance/create','AttendanceController@store')->name('attendance-store');

// User Routes
Route::get('/staffs','StaffController@index')->name('staff-index');
Route::post('/staffs/create','StaffController@store')->name('staff-store');