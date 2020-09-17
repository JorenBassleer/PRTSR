<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// USERS & GUESTS \\
Route::resource('products', 'ProductController')->only([
    'index', 'show'
]);
Route::resource('products', 'ProductController')->only([
    'store', 'update', 'destroy'
]);
Route::resource('materials', 'MaterialController');
Route::resource('types', 'TypeController');

// ADMIN ONLY \\
Route::group(['middleware' => ['auth:api']], function () {
    // Route::resource('products', 'ProductController')->only([
    //     'store', 'update', 'destroy'
    // ]);
    Route::resource('producttypes', 'ProductTypeController')->except([
        'store', 'update', 'destroy'
    ]);
});
