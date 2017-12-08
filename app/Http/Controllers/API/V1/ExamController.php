<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ExamController extends Controller
{
    //
    public function addExam()
    {
        $id = Input::get('id');
        if ($id){
            $exam = Exam::find($id);
        }else{
            $exam = new Exam();
        }
        $exam->name = Input::get('name');
        $time = Input::get('time')*60;
        $exam->time = $time;
        $exam->start_time = Input::get('start_time');
        $exam->end_time = Input::get('end_time');
        $exam->warehouse_id = Input::get('warehouse_id');
        if ($exam->save()){
            return response()->json([
                'code'=>'200'
            ]);
        }
    }

    public function getExams()
    {
        $page = Input::get('page',1);
        $limit = Input::get('limit',10);
        $exams = Exam::limit($limit)->offset(($page-1)*$limit)->get();
        if (!empty($exams)){
            for ($i=0;$i<count($exams);$i++){
                $exams[$i]->warehouse = $exams[$i]->warehouse()->pluck('name')->first();
            }
        }
        return response()->json([
            'code'=>'200',
            'data'=>$exams
        ]);
    }
    public function delExam($id)
    {
        $exam = Exam::find($id);
        if (empty($exam)){
            return response()->json([
                'code'=>'404',
                'msg'=>'Not Found'
            ]);
        }
        if ($exam->delete()){
            return response()->json([
                'code'=>'200'
            ]);
        }
    }
}
