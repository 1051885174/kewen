<?php
// 应用公共文件
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;

//对输入进来的数据进行加密，并生成token
function signToken($userInfo):string
{
    $key='!@#$%*&';//秘钥：可自定义
    $token=array(
        "iss"=>$key,//签发人：（非必须）
        "aud"=>'',//受众：（非必须）
        "iat"=>time(),//签发时间
        "nbf"=>time(),//生效时间
        "exp"=>time()+604800,//过期时间，单位：秒
        "data"=>[
            'kw_stuid'=>$userInfo['kw_stuid'],
            'kw_name'=>$userInfo['kw_name']
        ]//需要加密的数据（可自定义）
    );
    return JWT::encode($token,$key,"HS256");//返回加密生成的token
}

//
function checkToken($token):array{
    $key='!@#$%*&';//秘钥，与加密相同
    $status=array("code"=>2);//业务码，错误时
    try{
        JWT::$leeway=60;//当前的时间减去60
        $decoded=JWT::decode($token,new Key($key,'HS256'));//解密，以HS256的方式。与加密函数对应。
        $arr=(array)$decoded;//返回的数据以数组存在
        $res['code']=1;//添加正确时的业务玛
        $res['data']=$arr['data'];//解密出来的数据
        return $res;
    }
    //各种错误的处理方式。
    catch(SignatureInvalidException $e){
        $status['msg']="签名不正确";
        return $status;
    }
    catch(BeforeValidException $e) { // 签名在某个时间点之后才能用
        $status['msg'] = "token失效";
        return $status;
    }catch(ExpiredException $e) { // token过期
        $status['msg'] = "token过期";
        return $status;
    }catch(Exception $e) { //其他错误
        $status['msg'] = $e;
        return $status;
    }
}
