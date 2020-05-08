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

// Route::middleware(['api'])->group(function () {
//   Route::post('login', 'AuthController@login');
//   Route::post('logout', 'AuthController@logout');
//   Route::post('refresh', 'AuthController@refresh');
//   Route::post('me', 'AuthController@me');
// });

// Route::middleware(['guest'])->group(function () {
//   Route::post('/register', 'Auth\RegisterController@register');
// });

// Route::middleware(['guest'])->group(function () {
//   Route::post('/register', 'Auth\RegisterController@register');
// });

Route::get('/test', function () {
  return 'Axios Test';
});

// Route::get('/axios-post', function () {
//   return  'Axios Test';
// });

Route::post('/axios-post2', 'AxiosPost@store');

// Route::match(["post", "options"], '/axios-post2', 'AxiosPost@store');

