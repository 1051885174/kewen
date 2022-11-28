<?php

namespace app\controller;

use app\BaseController;
use app\model\User as UserModel;
use think\exception\ValidateException;
use think\Request;
use think\facade\Validate;
use think\facade\View;
use think\Response;

class Sign extends BaseController
{
    public function sign(Request $request)
    {
        //获取表单中的数据
        $data=$request->param();

        //验证器定义封装在验证器文件UserRegister.php中。
        try {
            $result=validate('UserRegister')->batch()->check($data);
            $data['kw_password']=sha1($data['kw_password']);
            $id=UserModel::create($data)->getData();
            return Response::create(["code"=>1,"msg"=>"注册成功","data"=>[]],'json');

        }catch (ValidateException $exception){
            return Response::create(["code"=>2,"msg"=>"注册失败","data"=>["error"=>$exception->getError()]],'json');
        }
    }
}