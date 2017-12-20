<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Exam;
use App\Model\ExamList;
use App\Model\Question;
use App\Model\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Excel;

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
    public function addExamPage()
    {
        $id = Input::get('id');
        if ($id){
            $exam = Exam::find($id);
        }else{
            $exam = new Exam();
        }
        return view('exam.add',['exam'=>$exam]);
    }

    public function getExams()
    {
        $exams = Exam::paginate(10);
        return view('exam.config',['exams'=>$exams]);
    }
    public function delExams()
    {
        $id = Input::get('ids');
        if (!$id||!is_array($id)){
            return response()->json([
                'code'=>'400',
                'msg'=>"参数错误！"
            ]);
        }
        Exam::whereIn('id',$id)->delete();
        ExamList::whereIn('exam_id',$id)->delete();
        return response()->json([
            'code'=>'200'
        ]);
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
            'data'=>[
                'exam'=>$exam,
                'question'=>$questions
            ]
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
            $result = [];
            foreach ($swap as $value){
                array_push($result,strtolower($value));
            }
            sort($result);
            $swap = implode(',',$result);
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
    public function listResult()
    {
        $results = ExamList::paginate(10);
        return view('exam.result',['results'=>$results]);
    }
}
