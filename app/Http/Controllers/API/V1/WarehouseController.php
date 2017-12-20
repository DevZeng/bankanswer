<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Mistake;
use App\Model\Order;
use App\Model\Question;
use App\Model\Staff;
use App\Model\Warehouse;
use App\Models\RedPacket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use function Symfony\Component\VarDumper\Dumper\esc;

class WarehouseController extends Controller
{
    //
    public function addWarehouse()
    {
        $id = Input::get('id');
        if ($id){
            $warehouse = Warehouse::find($id);
        }else{
            $warehouse = new Warehouse();
        }
        $warehouse->name = Input::get('name');
        $warehouse->type = Input::get('type',1);
        if ($warehouse->save()){
            return response()->json([
                'code'=>'200',
                'data'=>$warehouse
            ]);
        }
    }
    public function addWarehousePage()
    {
        $id = Input::get('id');
        if ($id){
            $warehouse = Warehouse::find($id);
        }else{
            $warehouse = new Warehouse();
        }
        return view('question.add',['warehouse'=>$warehouse]);
    }
    public function listWarehouses()
    {
        $warehouses = Warehouse::paginate(10);
        return view('question.list',['warehouses'=>$warehouses]);
    }
    public function delWarehouses()
    {
        $id = Input::get('ids');
        if (!$id||!is_array($id)){
            return response()->json([
                'code'=>'400',
                'msg'=>"参数错误！"
            ]);
        }
        Warehouse::whereIn('id',$id)->delete();
        Question::whereIn('warehouse_id',$id)->delete();
        return response()->json([
            'code'=>'200'
        ]);
    }
    public function delRedPackets()
    {
        $id = Input::get('ids');
        if (!$id||!is_array($id)){
            return response()->json([
                'code'=>'400',
                'msg'=>"参数错误！"
            ]);
        }
        RedPacket::whereIn('id',$id)->delete();
        return response()->json([
            'code'=>'200'
        ]);
    }
    public function getTrains()
    {
        $page = Input::get('page',1);
        $limit = Input::get('limit',10);
        $trains = Warehouse::where('type','=','2')->limit($limit)->offset(($page-1)*$limit)->get();
        return response()->json([
            'code'=>'200',
            'data'=>$trains
        ]);
    }
    public function finishTrain()
    {
        $uid = getUserToken(Input::get('token'));
        $answers = Input::get('answers');
        $warehouse_id = Input::get('warehouse_id');
        $count = count($answers);
        $right = 0;
        $wrong = '';
        foreach ($answers as $answer){
            $question = Question::find($answer['id']);
            $results = $answer['answer'];
            foreach ($results as $result){
                strtolower($result);
            }
            sort($results);
            $result = implode(',',$results);
            if ($question->answer==$result){
                $right+=1;
            }else{
                $wrong.=$question->id.',';
            }
        }
        $mistake = Mistake::where('user_id','=',$uid)->first();
        if (empty($mistake)){
            $mistake = new Mistake();
            $mistake->user_id = $uid;
        }
        $mistake->time = time();
        $mistake->record = $wrong;
        $mistake->save();
        $accuracy = $right/$count;
        $redPacket = RedPacket::where('warehouse_id','=',$warehouse_id)
        ->where('min','<',$accuracy)->where('max','>',$accuracy)->first();
        if ($redPacket){
            $order = new Order();
            $order->user_id = $uid;
            $order->number = self::makePaySn($uid);
            $order->cash = rand($redPacket->min_price,$redPacket->max_price);
            $order->save();
            return response()->json([
                'code'=>'200',
                'data'=>[
                    'price'=>$order->cash,
                    'score'=>$right,
                    'accuracy'=>$accuracy,
                    'number'=>$order->number
                ]
            ]);
        }
        return response()->json([
            'code'=>'200',
            'data'=>[
                'price'=>0,
                'score'=>$right,
                'accuracy'=>$accuracy
            ]
        ]);
    }
    public function listRedPackets()
    {
        $redpackets = RedPacket::paginate(10);
        return view('money.list',['packets'=>$redpackets]);
    }
    public function addRedPacketPage()
    {
        $id = Input::get('id');
        if ($id){
            $packet = RedPacket::find($id);
        }else{
            $packet = new RedPacket();
        }
        $warehouses = Warehouse::where('type','=','2')->get();
        return view('money.add',[
            'packet'=>$packet,
            'warehouses'=>$warehouses
        ]);
    }
    public function showWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        $questions = Question::where('warehouse_id','=',$id)->paginate(10);
        return view('question.check',[
            'warehouse'=>$warehouse,
            'questions'=>$questions
        ]);
    }
}
