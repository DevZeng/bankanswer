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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('upload','API\V1\UploadController@upload');
Route::get('staff/login','API\V1\UserController@staffLogin');
Route::get('mistake','API\V1\UserController@getMistakes');
Route::get('question','API\V1\QuestionController');
