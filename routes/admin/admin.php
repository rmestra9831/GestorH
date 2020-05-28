<?php

Route::get('permissionsUser', ['as' => 'permissionsUser.view', 'uses' => 'UserController@permissionsUser'])->middleware('can:permissions');
Route::get('getUsers', ['as' => 'users.get', 'uses' => 'UserController@getUsers']);
Route::delete('{slug}/delete', ['as' => 'users.get', 'uses' => 'UserController@delete']);
Route::get('getRole', ['as' => 'roles.get', 'uses' => 'AjaxController@getRole']);
