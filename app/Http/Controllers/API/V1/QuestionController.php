<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    //
    public function delQuestion($id)
    {
        $question = Question::find($id);
        if (empty($question)){
            return response()->json([
                'code'=>'404',
                'msg'=>'Not Found'
            ]);
        }
        if ($question->delete()){
            return response()->json([
                'code'=>'200'
            ]);
        }
    }
    public function delQuestions()
    {
        $ids = Input::get('ids');
        if (empty($ids)||!is_array($ids)){
            return response()->json([
                'code'=>'400',
                'msg'=>"参数错误！"
            ]);
        }
        Question::whereIn('id',$ids)->delete();
        return response()->json([
            'code'=>'200'
        ]);
    }
    public function addQuestion()
    {
        $id = Input::get('id');
        if ($id){
            $question = Question::find($id);
        }else{
            $question = new Question();
        }
//        $question->
    }
    public function importQuestions()
    {
        $file = 'uploads/'.Input::get('file');
        $warehouse_id = Input::get('warehouse_id');
        Excel::selectSheetsByIndex(0)->load($file,function ($sheet) use ($warehouse_id){
            $sheet->ignoreEmpty()->each(function ($data) use ($warehouse_id){
                $origin = $data->toArray();
                $question = new Question();
                $question->topic = $origin[0];
                $question->option_a = $origin[1];
                $question->option_b = $origin[2];
                $question->option_c = $origin[3];
                $question->option_d = $origin[4];
                $question->answer = $origin[5];
                $question->type = 1;
                $question->warehouse_id = $warehouse_id;
                $question->save();
            });
        });
        Excel::selectSheetsByIndex(1)->load($file,function ($sheet) use ($warehouse_id){
            $sheet->ignoreEmpty()->each(function ($data) use ($warehouse_id){
                $origin = $data->toArray();
                $answer = $origin[5];
                $answer = explode(',',$answer);
                for ($i=0;$i<count($answer);$i++){
                    $answer[$i] = strtolower($answer[$i]);
                }
                sort($answer);
                $answer = implode(',',$answer);
                $question = new Question();
                $question->topic = $origin[0];
                $question->option_a = $origin[1];
                $question->option_b = $origin[2];
                $question->option_c = $origin[3];
                $question->option_d = $origin[4];
                $question->answer = $answer;
                $question->type = 2;
                $question->save();
            });
        });
        return response()->json([
            'code'=>'200'
        ]);
    }
}
