<?php

namespace app\controller;

use app\BaseController;
use app\model\File;
use app\model\Filetype;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\View;
use think\facade\Request;
use think\Response;

class Search extends BaseController
{
    //用于临时设计上传功能的前端页面;
    public function index()
    {
        //默认状态下
        try {
            //查询file表的关于文件的数据，暂时以file_time来排序。
            $file_data = (new File)->select()->order('file_time', 'desc');
            //将file_data的查询结果数据上传给前端页面。
            view::assign(['data'=>$file_data]);
            //引入前端页面
            return View::fetch('User/search');
        } catch (DataNotFoundException $e) {//数据没有查询到报出的异常
            return json($e->getMessage());
        } catch (ModelNotFoundException $e) {//模型没有查询到报出的异常
            return json($e->getMessage());
        } catch (DbException $e) {//数据源的异常（未知）
            return json($e->getMessage());
        }

    }

    public function search(){
        //点击搜索
        //接收搜索模块发出的数据
        $file_data=Request::param();
        try {
            //将表单中类型字符串转化为对应的数值
            $file_type_id = Filetype::where('kw_filetype', '=', $file_data['file_type'])->find();
            //查询模块的集合（结合模型的File搜索器）
            $file_result= (new File)->withSearch(['file_name','file_type','file_stu_name','file_stu_stuid'],[
                'file_name'=>$file_data['file_name'],
                'file_type'=>$file_type_id['kw_fileid'],
                'file_stu_name'=>$file_data['kw_name'],
                'file_stu_stuid'=>$file_data['kw_stuid']
            ])->select()->order('file_time','desc');//搜索结果默认以上传时间最近来排序。
            //传入search页面，并且将数据传入前端。
//            return View::fetch('User/Data',[
//                'data'=>$file_result
//            ]);
            return Response::create(['data'=>$file_result,'code'=>1],'json',200);
        } catch (DataNotFoundException $e) {//数据没有查询到报出的异常
            return json($e->getMessage());
        } catch (ModelNotFoundException $e) {//模型没有查询到报出的异常
            return json($e->getMessage());
        } catch (DbException $e) {//数据源的异常（未知）
            return json($e->getMessage());
        }
        }

}