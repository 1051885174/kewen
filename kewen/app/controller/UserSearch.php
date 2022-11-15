<?php

namespace app\controller;

use app\BaseController;
use think\facade\View;

class UserSearch extends BaseController
{
    public function index(){
        return View::fetch('User/UserSearch');
    }

    public function search(){

    }
}