<?php

namespace app\controller;

use app\BaseController;
use app\model\User as UserModel;
use think\exception\ValidateException;
use think\facade\Request;
use think\facade\Validate;
use think\facade\View;

class Sign extends BaseController
{
    public function index(){
        return View::fetch('User/sign');
    }

    public function sign(){
        try {
            validate('UserRegister')->batch(true)->check(Request::param());
        }catch (ValidateException $exception){
            dd($exception->getError());
        }
        $data=Request::param();


        $id=UserModel::create($data)->getData();
    }
}