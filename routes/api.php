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

Route::get('discs', 'DiscController@search');
Route::get('discs/{id}', 'DiscController@show');
Route::post('discs', 'DiscController@store');
Route::patch('discs/{id}', 'DiscController@update');
Route::delete('discs/{id}', 'DiscController@delete');
