<?php

namespace app\controller;

use app\BaseController;
use app\model\Filetype;
use think\facade\Filesystem;
use think\facade\Request;
use app\model\Picture as Pic;

class Picture extends BaseController
{
    public function index(){
        return view('User/Picture');
    }

    public  function upload(){
        $picture_name=Request::param('file_type');
        $picture_name_id=Filetype::where('kw_filetype',$picture_name)->find();
        $picture=Request::file('kw_file');
        if(is_uploaded_file($picture)){
            $name=$_FILES['kw_file']['name'];
            $picture_upload=Filesystem::putFileAs('BBB',$picture,$name);
            $picture_data=[
                'pic_name'=>$name,
                'pic_type'=>$picture_name_id['kw_fileid'],
                'pic_route'=>$picture_upload,
                'pic_year'=>date('Y',time())
            ];
            $picture_result=new Pic();
            $picture_result->save($picture_data);

        }
    }
}