<?php
declare (strict_types = 1);

namespace app\middleware;


use think\Response;

class Auth
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle(\think\Request $request, \Closure $next):Response
    {
        //第一步先取token
        if(!($request->header('token'))){
            print(1111);
        }
        $token = $request->header('token');
        //jwt进行校验token
        $res=checkToken($token);
        if ($res['code'] != 1 ){
            return Response::create([$res],'json',400);
        }
        $request->kw_stuid=$res['data']->kw_stuid;
        $request->kw_name=$res['data']->kw_name;
        return $next($request);

    }
}
