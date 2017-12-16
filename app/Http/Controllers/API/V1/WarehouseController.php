<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Warehouse;
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
                'code'=>'200'
            ]);
        }
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
}
