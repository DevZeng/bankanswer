<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function (){
   $data = ['A'];
   for ($i=0;$i<count($data);$i++){
       $data[$i] = strtolower($data[$i]);
   }
   sort($data);
    $data = implode(',',$data);
   dd($data);
});
Route::get('login','API\V1\UserController@loginPage');
Route::get('index','API\V1\UserController@index');
Route::get('add/staff','API\V1\UserController@addStaffPage');
Route::get('list/staff','API\V1\UserController@listStaffPage');
Route::get('list/warehouse','API\V1\WarehouseController@listWarehouses');
Route::any('upload','API\V1\UploadController@upload');
Route::post('user/import','API\V1\UserController@importStaffs');
Route::post('staff','API\V1\UserController@addStaff');
Route::get('staffs','API\V1\UserController@getStaffs');
Route::get('del/staffs','API\V1\UserController@delStaffs');
Route::post('login','API\V1\UserController@login');
Route::post('warehouse','API\V1\WarehouseController@addWarehouse');
Route::get('warehouses','API\V1\WarehouseController@getWarehouses');
Route::get('del/warehouse/{id}','API\V1\WarehouseController@delWarehouse');
Route::post('exam','API\V1\ExamController@delExam');
Route::get('exams','API\V1\ExamController@getExams');
Route::get('del/exam/{id}','API\V1\ExamController@delExam');
Route::post('question/import','API\V1\QuestionController@importQuestions');
Route::get('export','API\V1\QuestionController@export');
Route::get('del','API\V1\RedPacketController@delRedPackets');