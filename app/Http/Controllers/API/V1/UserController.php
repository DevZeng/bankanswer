<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Excel;

class UserController extends Controller
{
    //
    public function addStaff()
    {
        $id = Input::get('id');
        if ($id){
            $staff = Staff::find($id);
        }else{
            $staff = new Staff();
        }
        $staff->username = Input::get('username');
        $staff->password = bcrypt(Input::get('password'));
        $staff->name = Input::get('name');
        $staff->sex = Input::get('sex');
        $staff->mobile = Input::get('mobile');
        if ($staff->save()){
            return response()->json([
                'code'=>'200'
            ]);
        }
    }
    public function getStaffs()
    {
        $page = Input::get('page',1);
        $limit = Input::get('limit',10);
        $staffs = Staff::limit($limit)->offset(($page-1)*$limit)->get();
        return response()->json([
            'code'=>'200',
            'data'=>$staffs
        ]);
    }
    public function importStaffs()
    {
        $file = 'uploads/'.Input::get('file');
        \Maatwebsite\Excel\Facades\Excel::load($file,function ($reader){
            $reader->ignoreEmpty()->each(function ($data){
                $origin = $data->toArray();
                $staff = new Staff();
                $staff->username = $origin[0];
                $staff->name = $origin[1];
                $staff->sex = ($origin[2]=='男')?1:2;
                $staff->mobile = $origin[3];
                $staff->password = bcrypt('123456');
                $staff->save();
            });
        });
        return response()->json([
            'code'=>'200'
        ]);
    }
    public function delStaffs()
    {
        $ids = Input::get('ids');
        if (empty($ids)||!is_array($ids)){
            return response()->json([
                'code'=>'400',
                'msg'=>'参数错误！'
            ]);
        }
        Staff::whereIn('id',$ids)->delete();
        return response()->json([
            'code'=>'200'
        ]);
    }
    public function login()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(['username' => $username, 'password' => $password], true)) {
            return redirect('index');
        }
        return redirect()->back()->with('status','用户名或密码错误！');
    }
    public function loginPage()
    {
        return view('user.login');
    }
    public function index()
    {
        return view('index');
    }

}
