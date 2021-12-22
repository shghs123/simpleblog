<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index')->name('splash');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/post', 'PostController')->scoped([
    'post' => 'slug',
]);;
Route::resource('/tag', 'TagController');
