<?php

namespace app\controller;
use app\BaseController;
use app\middleware\Auth;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;
use think\facade\Filesystem;
use think\facade\Validate;
use think\facade\View;
use think\Request;
use app\model\User;
use think\Response;

class Login extends BaseController
{
//    protected $middleware=[Auth::class=>['only'=>['check']]];
    //检测登录用户模块
    public function check(Request $request): Response
    {
        //获取表单的数据
        $data=$request->param();

        //对于用户登录的验证器定义
        $validate=Validate::rule([
            'kw_stuid|账号'=>'unique:user,kw_stuid^kw_password',
            'kw_captcha'=>'require|captcha'
        ]);
        $validate->message([
            'kw_stuid'=>'账号或密码错误',
            'kw_captcha'=>'验证码错误'
        ]);

        //验证登录
        $data['kw_password']=sha1($data['kw_password']);
        $result=$validate->check($data);

        //判断登录返回的状态
        if($result){
            //登录成功即将用户信息赋予$userinfo
            try {
                $userInfo = User::where('kw_stuid', $data['kw_stuid'])->field(['kw_stuid', 'kw_name'])->find();
                //生成token
                $token=signToken($userInfo);
                //将token传给前端
                return Response::create(["code"=>1,"msg"=>"登录成功","data"=>["token"=>$token]],'json');

            } catch (DataNotFoundException|ModelNotFoundException|DbException $e) {
                return Response::create(["code"=>2,"msg"=>"登录失败","data"=>["error"=>$e->getMessage()]],'json');
            }
        }

        else{
           return Response::create(["code"=>2,"msg"=>"登录失败","data"=>["error"=>$validate->getError()]],'json');
        }

    }

}