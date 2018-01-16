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
    Route::options('staff/login',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('cash','API\V1\UserController@cash');
    Route::options('cash',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('mistakes','API\V1\UserController@getMistakes');
    Route::options('mistakes',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('questions','API\V1\QuestionController@getQuestions');
    Route::options('questions',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('trains','API\V1\WarehouseController@getTrains');
    Route::options('trains',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::post('finish/train','API\V1\WarehouseController@finishTrain');
    Route::options('finish/train',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('staffs','API\V1\UserController@staffList');
    Route::options('staffs',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('exams','API\V1\ExamController@getNowExams');
    Route::options('exams',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('exam/{id}','API\V1\ExamController@getExam');
    Route::options('exam/{id}',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::get('staff/info','API\V1\UserController@getStaffInfo');
    Route::post('staff/info','API\V1\UserController@getStaffInfo');
    Route::options('staff/info',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
    Route::post('finish/exam/{id}','API\V1\ExamController@finishExam');
    Route::options('finish/exam/{id}',function (){
        return response()->json([
            'code'=>'200'
        ]);
    });
});
