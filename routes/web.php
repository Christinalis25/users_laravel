<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/','UsersController@index');

Route::post('users/add','UsersController@add')->name('add_user');
Route::post('users/edit/{id}','UsersController@edit');
Route::post('users/delete/{id}','UsersController@delete');
Route::post('users/photos/{id}','UsersController@photos');
Route::post('users/photos/add/{id}','UsersController@addPhoto');
Route::post('users/photos/delete/{id}','UsersController@deletePhoto');
