<?php

namespace app\model;

use think\Model;

class File extends Model
{
    //对于表kw_file的模型
    protected $name='file';
    public function index()
    {
    }

    public function searchFileNameAttr($query,$value,$data){
        $query->where('file_name','like','%'.$value.'%');
        
    }

    public function searchFileTypeAttr($query,$value,$data){
        if($value!==9){
            $query->where('file_type','=',$value);
        }

    }

    public function searchFileStuNameAttr($query,$value,$data){
        $query->where('file_stu_name','like','%'.$value.'%');
    }

    public function searchFileStuStuidAttr($query,$value,$data){
        $query->where('file_stu_stuid','like','%'.$value.'%');
    }
}