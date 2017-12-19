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
Route::group(['middleware'=>'cross'],function (){
    Route::post('staff/login','API\V1\UserController@staffLogin');
    Route::get('cash','API\V1\UserController@cash');
    Route::get('mistakes','API\V1\UserController@getMistakes');
    Route::get('questions','API\V1\QuestionController@getQuestions');
    Route::get('trains','API\V1\WarehouseController@getTrains');
    Route::post('finish/train','API\V1\WarehouseController@finishTrain');
    Route::get('staffs','API\V1\UserController@staffList');
    Route::get('exams','API\V1\ExamController@getNowExams');
    Route::get('exam/{id}','API\V1\ExamController@getExam');
    Route::post('finish/exam/{id}','API\V1\ExamController@finishExam');
});
