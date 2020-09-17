<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/products/create', 'PageController@productCreate')->name('products.create');

Route::get('/products/{product}', 'PageController@productShow')->name('products.show');
Route::get('/', 'AppController@index')->name('home');
