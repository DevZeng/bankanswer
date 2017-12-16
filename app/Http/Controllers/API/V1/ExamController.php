<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Exam;
use App\Model\ExamList;
use App\Model\Question;
use App\Model\Staff;
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
    public function getNowExams()
    {
        $time = time();
        $exams = Exam::where('start_time','<',$time)->where('end_time','>',$time)->get();
        return response()->json([
            'code'=>'200',
            'data'=>$exams
        ]);
    }
    public function getExam($id)
    {
        $exam = Exam::find($id);
        if (!$exam){
            return response()->json([
                'code'=>'404',
                'msg'=>'Not Found'
            ]);
        }
        $questions = Question::where('warehouse_id','=',$exam->warehouse_id)->get();
        return response()->json([
            'code'=>'200',
            'data'=>$questions
        ]);
    }
    public function finishExam($id)
    {
        $exam = Exam::find($id);
        if (!$exam){
            return response()->json([
                'code'=>'404',
                'msg'=>'Not Found'
            ]);
        }
        $uid = getUserToken(Input::get('token'));
        $count = ExamList::where([
            'user_id'=>$uid,
            'exam_id'=>$id
        ])->count();
        if ($count!=0){
            return response()->json([
                'code'=>'400',
                'msg'=>'已参加该考试！'
            ]);
        }
        $answer = Input::get('answer');
        $questions = Question::where('warehouse_id','=',$exam->warehouse_id)->get();
        $right = 0;
        for ($i=0;$i<count($questions);$i++){
            $swap = $answer[$questions[$i]->id];
            for ($i=0;$i<count($swap);$i++);{
                strtolower($swap[$i]);
            }
            sort($swap);
            $swap = implode(',',$swap);
            if ($questions[$i]->answer==$swap){
                $right+=1;
            }
        }
        $staff = Staff::find($uid);
        $staff->score +=$right;
        $staff->save();
        $record = new ExamList();
        $record->user_id = $uid;
        $record->exam_id = $id;
        $record->score = $right;
        $record->save();
        return response()->json([
            'code'=>'200'
        ]);
    }
}
