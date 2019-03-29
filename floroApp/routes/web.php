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

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/export', 'HomeController@export')->name('export');
Route::get('/search', 'HomeController@search');
Route::get('/home/create', 'HomeController@create');
Route::post('/home/create/store', 'HomeController@store');
Route::get('/home/{id}/edit', 'HomeController@edit');
 Route::patch('/home/{id}', 'HomeController@update');
Route::get('/home/{id}', 'HomeController@destroy');

Route::get('/2fa','PasswordSecurityController@show2faForm')->name('2fa');
Route::post('/generate2faSecret','PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
Route::post('/2fa','PasswordSecurityController@enable2fa')->name('enable2fa');
Route::post('/disable2fa','PasswordSecurityController@disable2fa')->name('disable2fa');
Route::post('/2faVerify', function () {
    return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');