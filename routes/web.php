<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('fee', 'App\Http\Controllers\FeeController');
Route::resource('student', 'App\Http\Controllers\StudentController');
Route::get('student/status/{student}/{status}', 'App\Http\Controllers\StudentController@updateStatus');
Route::get('student/fee/{student}', 'App\Http\Controllers\StudentController@fee');
Route::get('/', function () {
    return redirect('/fee');
})->name('home');
