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
Route::get('user/import','API\V1\UserController@importStaffs');
Route::get('question/import','API\V1\QuestionController@importQuestions');
Route::get('export','API\V1\QuestionController@export');
Route::get('del','API\V1\RedPacketController@delRedPackets');