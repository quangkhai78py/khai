<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['namespace'=>'Api'],function (){
    Route::post('user','UserController@createNewUser');
    Route::get('user','UserController@getUser');
    Route::get('user/{id}','UserController@getUserById');
    Route::put('user/{id}','UserController@updateUser');
    Route::delete('user/{id}','UserController@deleteUser');
});
