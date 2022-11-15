<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class UserRegister extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'kw_stuid'=>'require|number|length:12|unique:user',
        'kw_password'=>'require|min:6',
        'kw_passwordnot'=>'require|confirm:kw_password',
        'kw_phone'=>'require|mobile',
        'kw_name|姓名'=>'require|max:100|chsAlpha',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'kw_stuid.require'=>'学号不得为空',
        'kw_stuid.number'=>'学号必须为数字',
        'kw_stuid.length'=>'学号必须满足12位',
        'kw_stuid.unique'=>'学号已存在',
        'kw_password.require'=>'密码不得为空',
        'kw_password.min'=>'密码不得小于6位',
        'kw_passwordnot.require'=>'密码确认不得为空',
        'kw_passwordnot.confirm'=>'密码确认和密码不一致',
        'kw_phone'=>'电话格式不正确',

    ];
}
