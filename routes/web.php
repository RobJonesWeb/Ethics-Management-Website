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

use Illuminate\Foundation\Auth\RegistersUsers;

Auth::routes();
Route::get('/register/{role}', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@create');
route::get('logout', function() {
    Auth::logout();
    return view('home');
});

Route::resource('/', 'HomeController');
Route::resource('/home', 'HomeController');
Route::resource('/upload', 'UploadController');
Route::post('upload', ['uses' => 'UploadController@store', 'as' => 'upload.store']);
Route::resource('proposals', 'ProposalsController');
Route::get('/proposals/{id}', 'ProposalsController@show');


