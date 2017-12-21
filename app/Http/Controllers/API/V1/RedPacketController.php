<?php

namespace App\Http\Controllers\API\V1;

use App\Models\RedPacket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RedPacketController extends Controller
{
    //
    public function addRedPacket()
    {
        $id = Input::get('id');
        if ($id){
            $redpacket = RedPacket::find($id);
        }else{
            $redpacket = new RedPacket();
        }
        $redpacket->warehouse_id = Input::get('warehouse_id');
        $redpacket->min = Input::get('min');
        $redpacket->max = Input::get('max');
        $redpacket->min_price = Input::get('min_price');
        $redpacket->max_price = Input::get('max_price');
        if ($redpacket->save()){
            return response()->json([
                'code'=>'200'
            ]);
        }
    }
    public function delRedPackets()
    {
        $ids = Input::get('ids');
        if (empty($ids)||!is_array($ids)){
            return response()->json([
                'code'=>'400',
                'msg'=>'参数错误！'
            ]);
        }
        RedPacket::whereIn('id',$ids)->delete();
        return response()->json([
            'code'=>'200'
        ]);
    }
    public function getRetPackets()
    {
        $page = Input::get('page',1);
        $limit = Input::get('limit',10);
        $packets = RedPacket::limit($limit)->offset(($page-1)*$limit)->get();
        return response()->json([
            'code'=>'200',
            'data'=>$packets
        ]);
    }
    public function test()
    {

    }
}
