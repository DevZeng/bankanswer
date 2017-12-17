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
    public function delWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        if (empty($warehouse)){
            return response()->json([
                'code'=>'404',
                'msg'=>'Not Found'
            ]);
        }
        if ($warehouse->delete()){
            return response()->json([
                'code'=>'200'
            ]);
        }
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
        $answers = Input::get('answer');
        $warehouse_id = Input::get('warehouse_id');
        $count = count($answers);
        $right = 0;
        $wrong = '';
        foreach ($answers as $answer){
            $question = Question::find($answer->id);
            $result = $answer->answer;
            for ($i=0;$i<count($result);$i++);{
                strtolower($result[$i]);
            }
            sort($result);
            $result = implode(',',$result);
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
        ->where('mix','<',$accuracy)->where('max','>',$accuracy)->first();
        if ($redPacket){
            $order = new Order();
            $order->user_id = $uid;
            $order->number = self::makePaySn($uid);
            $order->cash = rand($redPacket->min_price,$redPacket->max_price);
            $order->save();
            return response()->json([
                'code'=>'200',
                'data'=>$order->cash
            ]);
        }
        return response()->json([
            'code'=>'200',
            'data'=>'0'
        ]);
    }
}
