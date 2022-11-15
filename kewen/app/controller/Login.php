<?php

namespace app\controller;
use app\BaseController;
use app\middleware\Auth;
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
    //用于测试的临时前端登录页面
    public function index()
    {
        return view('User/login');
    }
    //检测登录用户模块
    public function check(Request $request)
    {
        //获取表单的数据
        $data=$request->param();
        //存储错误信息
        $error=[];
        //对于用户登录的验证器定义
        $validate=Validate::rule([
            'kw_stuid'=>'unique:user,kw_stuid^kw_password|token'
        ]);
        //验证验证码
        if(!captcha_check($data['kw_captcha'])){
            $error='验证码错误';
            return Response::create(['验证码错误','code'=>'2'],'json',400);
        }
        //验证登录
        $result=$validate->batch(true)->check([
            'kw_stuid'=>$data['kw_stuid'],
            'kw_password'=>$data['kw_password']
        ]);
        //判断登录返回的状态
        if(!$result){
            //登录成功即将用户信息赋予$userinfo

            $userInfo = User::where('kw_stuid', $data['kw_stuid'])->field(['kw_stuid', 'kw_name'])->find();
            //生成token
            $token=signToken($userInfo);
            View::assign('user_data',$userInfo);
            //将token返回。
            return Response::create(['登录成功','access_token'=>$token,'code'=>'1'],'json',200);

        }
        else{
            return Response::create(['密码或账号错误','code'=>2],'json',400);
        }

    }

}