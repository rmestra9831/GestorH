<?php

Route::get('permissionsUser', ['as' => 'permissionsUser.view', 'uses' => 'UserController@permissionsUser'])->middleware('can:permissions');
