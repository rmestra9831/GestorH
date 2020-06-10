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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();

Route::get('/', function () {
	if (Auth::check()) {
			return redirect('home');
	}else{
			return view('auth.login');
	}
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('profile/{slug}', ['as' => 'profileUser.edit', 'uses' => 'ProfileController@editUser']);
Route::put('profile/{slug}/update', ['as' => 'profileUser.update', 'uses' => 'ProfileController@updateUser']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::prefix('schedule')->group(function () {
	Route::get('new', ['as' => 'schedule.new', 'uses' => 'ScheduleController@create']);
	Route::get('newMateria', ['as' => 'schedule.newMateria', 'uses' => 'ScheduleController@createMateria']);
	Route::get('getMateria', ['as' => 'schedule.getMateria', 'uses' => 'ScheduleController@getMateria']);
	Route::delete('materia/{id}/delete', ['as' => 'schedule.deleteMateria', 'uses' => 'ScheduleController@deleteMateria']);
	Route::post('MateriaStore', ['as' => 'schedule.MateriaStore', 'uses' => 'ScheduleController@storeMateria']);
});