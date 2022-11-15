<?php

namespace app\controller;


use app\BaseController;
use app\model\File;
use app\model\Filetype;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;
use think\facade\Filesystem;
use think\facade\Request;
use think\facade\View;

class Upload extends BaseController
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
            return View::fetch('User/Data');
        } catch (DataNotFoundException $e) {//数据没有查询到报出的异常
            return json($e->getMessage());
        } catch (ModelNotFoundException $e) {//模型没有查询到报出的异常
            return json($e->getMessage());
        } catch (DbException $e) {//数据源的异常（未知）
            return json($e->getMessage());
        }

    }

    //用于用户上传时的模块
    public function upload()
    {
        //测试使用
        //由用户携带token发送请求，获取到用户的数据进行识别
        //存储在$request中，学号为：$request->stu_id,姓名为：$request->stu_name;
        $stu_id=202010450121;
        $stu_name='嗷嗷aaaa';
        //接收前端表单发送过来的file_type数据名称。
        $file_type_name=Request::param('file_upload_type');
        //查询文件类型所代表的数值；
        $file_type_id=Filetype::where('kw_filetype',$file_type_name)->find();
        //接收文件
        $files =Request::file('kw_file');
        //设定文件的大小，单位:KB
        $filesize = 1024 * 1024 * 5;
        //存储错误信息
        $fileerror = [];
        //存储成功信息
        $filesuccess = [];
        //记录在循环条件下的文件数，,暂时废弃。
        $value=0;
        //循环上传文件，foreach（$files as file)，暂时废弃
        $filesave=[];
            //判断文件是否是通过POST传入。
            if (is_uploaded_file($files))
             {
                 //保存文件上传时的名字
                $filename = $_FILES['kw_file']['name'];
                try
                {
                    //文件的验证规则

                    validate(['kw_file' => 'fileSize:' . $filesize])->check(['kw_file' => $files]);
                    //验证通过，上传文件，并以$filename命名
                    $filesave[]= Filesystem::putFileAs('AAAAAAA', $files, $filename);//循环上传时，文件名字需要通过数组形式添加
                    //保存上传成功时的路径
                    $filesuccess[]=$filesave;
                    //将上传成功的文件保存起来
                    $file_data=['file_name'=>$filename,
                        'file_type'=>$file_type_id['kw_fileid'],
                        'file_stu_name'=>$stu_name,
                        'file_stu_stuid'=>$stu_id,
                        'file_time'=>date('Y-m-d H:i:s',time())];
                    //将数据data上传到表kw_file中。
                    $file_result=new File();
                    $file_result->save($file_data);


                }
                catch (ValidateException $e)
                {
                    //报错时，保存报错信息。
                    $fileerror = [
                        'name' => $files->getOriginalName(),
                        'msg' => $e->getError()
                    ];
                }
            }

        //测试路径，以及文件名.
        $data = [
            'success' => $filesuccess,
            'error' => $fileerror
        ];
        $file_data = (new File)->select()->order('file_time', 'desc');
            return View::fetch('User/Data',[
                'data'=>$file_data
            ]);


    }


}