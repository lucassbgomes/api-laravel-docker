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

Route::group(['prefix' => 'v1'], function () {

  Route::post('login','Auth\v1\AuthenticateController@login')->name('api.login');
  
  Route::post('password/reset','Auth\v1\ForgotPasswordController')->name('api.password.reset');
  Route::post('password/update','Auth\v1\ResetPasswordController@reset')->name('api.password.update');
  
  Route::middleware('auth:api')->group(function () {
    Route::get('/getuser', function (Request $request) { return $request->user(); })->name('api.user');

    Route::group(['prefix' => 'user', 'namespace' => 'Api\v1'], function () {
      Route::get('list','UserController@list');
    });
  });
});