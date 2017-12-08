<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Config;

class UploadController extends Controller
{
    //
    public function upload(Request $request)
    {
        if (!$request->hasFile('file')){
            return response()->json([
                'code'=>'500',
                'msg'=>'空文件'
            ]);
        }
        $file = $request->file('file');
        $type = $request->get('type',0);
        $name = $file->getClientOriginalName();
        $name = explode('.',$name);
        if (count($name)!=2){
            return response()->json([
                'code'=>'500',
                'msg'=>'非法文件名'
            ]);
        }
        $allow = \Config::get('fileAllow');
        if (!in_array(strtolower($name[1]),$allow)){
            return response()->json([
                'return_code'=>'FAIL',
                'return_msg'=>'不支持的文件格式'
            ]);
        }
        $md5 = md5_file($file);
        $name = $name[1];
        $name = $md5.'.'.$name;
        if ($file->isValid()){
            $destinationPath = 'uploads';
            $file->move($destinationPath,$name);
            return response()->json([
                'code'=>'200',
                'data'=>[
                    'file_name'=>$name
                ]
            ]);
        }
    }
}
