<?php

namespace App\Http\Controllers\API\V1;

use App\Model\Mistake;
use App\Model\Question;
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
            $username = Input::get('username');
            $count = Staff::where('username','=',$username)->where('id','!=',$id)->count();
            if ($count!=0){
                return response()->json([
                    'code'=>'400',
                    'msg'=>'该工号以被使用！'
                ]);
            }
        }else{
            $staff = new Staff();
            $username = Input::get('username');
            $count = Staff::where('username','=',$username)->count();
            if ($count!=0){
                return response()->json([
                    'code'=>'400',
                    'msg'=>'该工号以被使用！'
                ]);
            }
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
        return view('staff.list',['staffs'=>$staffs]);
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
    public function addStaffPage()
    {
        $id = Input::get('id');
        if ($id){
            $staff = Staff::find($id);
        }else{
            $staff = new Staff();
        }
        return view('staff.add',['staff'=>$staff]);
    }
    public function listStaffPage()
    {
        $staffs = Staff::paginate(10);
        return view('staff.list',['staffs'=>$staffs]);
    }
    public function staffLogin()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        $staff = Staff::where('username','=',$username)->first();
        if (!empty($staff)&&$staff->password = md5($password)){
            $token = createNoncestr();
            setUserToken($token,$staff->id);
            return response()->json([
                'code'=>'200',
                'data'=>$token
            ]);
        }
        return response()->json([
            'code'=>'400',
            'msg'=>'用户名或密码错误！'
        ]);
    }
    public function getMistakes()
    {
        $uid = getUserToken(Input::get('token'));
        $mistakes = Mistake::where('user_id','=',$uid)->pluck('record')->first();
        $question = Question::whereIn('id',explode(',',$mistakes))->get();
        return response()->json([
            'code'=>'200',
            'data'=>$question
        ]);
    }
}
