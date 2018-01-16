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
Route::get('login','API\V1\UserController@loginPage')->name('login');
Route::post('login','API\V1\UserController@login');
Route::group(['middleware'=>'auth'],function (){
    Route::get('index','API\V1\UserController@index')->name('index');
    Route::get('admins','API\V1\UserController@listAdmin');
    Route::get('add/staff','API\V1\UserController@addStaffPage');
    Route::post('add/staff ','API\V1\UserController@addStaff');
    Route::get('list/staff','API\V1\UserController@listStaffPage');
    Route::get('orders','API\V1\UserController@listOrders');
    Route::get('list/warehouse','API\V1\WarehouseController@listWarehouses');
    Route::any('upload','API\V1\UploadController@upload');
    Route::post('user/import','API\V1\UserController@importStaffs');
    Route::get('warehouse','API\V1\WarehouseController@addWarehousePage');
    Route::get('show/warehouse/{id}','API\V1\WarehouseController@showWarehouse');
    Route::get('redpackets','API\V1\WarehouseController@listRedPackets');
    Route::post('del/packets','API\V1\WarehouseController@delRedPackets');
    Route::get('add/packet','API\V1\WarehouseController@addRedPacketPage');
    Route::post('add/packet','API\V1\WarehouseController@addRedPacket');
    Route::get('staffs','API\V1\UserController@getStaffs');
    Route::post('del/staffs','API\V1\UserController@delStaffs');
    Route::post('warehouse','API\V1\WarehouseController@addWarehouse');
    Route::get('warehouses','API\V1\WarehouseController@getWarehouses');
    Route::post('del/warehouses','API\V1\WarehouseController@delWarehouses');
    Route::post('exam','API\V1\ExamController@delExam');
    Route::get('add/exam','API\V1\ExamController@addExamPage');
    Route::get('exams','API\V1\ExamController@getExams');
    Route::post('del/exams','API\V1\ExamController@delExams');
    Route::get('results','API\V1\ExamController@listResult');
    Route::post('question/import','API\V1\QuestionController@importQuestions');
    Route::get('add/question','API\V1\QuestionController@addQuestionPage');
    Route::post('add/question','API\V1\QuestionController@addQuestion');
    Route::post('del/questions','API\V1\QuestionController@delQuestions');
    Route::get('trans','API\V1\QuestionController@trans');
    Route::get('export','API\V1\QuestionController@export');
    Route::get('del','API\V1\RedPacketController@delRedPackets');
});

Route::post('upload','API\V1\UploadController@upload');