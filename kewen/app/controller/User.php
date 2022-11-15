<?php

namespace app\controller;
use app\model\File;
use app\model\User as UserModel;
use think\facade\Request;
use think\facade\View;
use think\Model;
use think\Response;

class User extends Model
{
    public function index(){
        $user_id=202010450121;
        $user_data=UserModel::where('kw_stuid',$user_id)->find();
        $user_data2=File::where('file_stu_stuid',$user_id)->select();
        return View::fetch('User/user',[
            'data'=>$user_data,
            'aaa'=>$user_data2
        ]);
    }

    public function Upload(){
        $user_id=202010450121;
        $user_data=Request::param();
        $kw_user=UserModel::where('kw_stuid',$user_id)->find();
        $kw_user->kw_class=$user_data['kw_class'];
        $kw_user->kw_phone=$user_data['kw_phone'];
        $kw_user->kw_message=$user_data['kw_message'];
        $kw_user->save();
        return View::fetch('User/user',[
            'data'=>$kw_user
        ]);
    }
}