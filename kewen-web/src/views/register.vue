<template>
    <!-- 注册界面 -->
    <div>
        <el-form ref="registerForm" :rules="rules" :model="registerForm" class="registerContainer"  >
            <el-avatar src="../assets/logo.png" fit="contain" id="registerLogo"></el-avatar>
            <h3 class="registerTitle" >用户注册</h3>
            <el-form-item label="用户名" prop="kw_name" label-width="80px">
                <el-input type="text" placeholder="请输入用户名" v-model="registerForm.kw_name"></el-input>
            </el-form-item>
            <el-form-item label="学号" prop="kw_stuid" label-width="80px">
                <el-input type="text" placeholder="请输入学号" v-model="registerForm.kw_stuid" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="电话号码" prop="kw_phone" label-width="80px">
                <el-input type="text" placeholder="请输入电话号码" v-model="registerForm.kw_phone" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="kw_password" label-width="80px"> 
                <el-input type="password" placeholder="请输入密码" v-model="registerForm.kw_password" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="确认密码" prop="kw_passwordnot" label-width="80px">
                <el-input type="password" placeholder="请再次确认密码" v-model="registerForm.kw_passwordnot" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item  prop="kw_puriview" label="邀请码"  label-width="80px">
                <el-input type="text" placeholder="请输入验证码" size="normal" v-model="registerForm.kw_purview" auto-complete="false"></el-input>
                <!-- <img :src="registerCaptchasrc" alt="无法查看" @click.stop="getRegisterCaptchaSrc()" class="captchaimg"> -->
            </el-form-item>
            <a href="" id="loginLink" @click="loginLink">立即登录</a>
            <el-form-item>
               
                <el-button type="primary" class="register-btn" @click="submitRigister">注册</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
export default {
    name: "register",
    created() {
    },
    data() {
        return {
            registerCaptchasrc:'',//验证码图片地址
            registerForm: {
                kw_stuid: '202010411303',
                kw_name:'zcl',
                kw_password: '111111',
                kw_passwordnot: '111111',
                kw_phone: '18111435593',
                kw_purview:''
            },
            rules: {
                kw_name: [{ required: true, messgae:'请输入用户名',trigger:'bulr'}],
                kw_stuid: [{ required: true, messgae: '请输入学号', trigger: 'bulr' }],
                kw_password: [{ required: true, message: '请输入密码', trigger: 'blur' }],
                kw_passwordnot: [{ required: true, message: '请再次输入密码', trigger: 'blur' }],
                kw_phone: [{ required: true, message: '请输入电话号码', trigger: 'blur' }],
                kw_purview:[{required:true,message:'请输入邀请码',trigger:'blur'}]
            }
        }
    },
    methods: {
    //注册按钮
      async  submitRigister() {
            console.log('register');
            const { data:res } = await this.$ajax.post('https://www.cdukewen.top/register', this.registerForm);
            console.log(res);
            if (res.code == 1) {
                this.$message.success(res.msg);
            }
            if (res.code == 2) {
                this.$message.error(res.msg);
                this.$message.error(res.data.error);
            }
        },
        //跳转到登录界面
        loginLink() {
            this.$router.push('/');
      }
    }
  }
</script>

<style>
div{
    font-family: "Helvetica Neue",Helvetica,"PingFang SC",
    "Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,
    sans-serif;
}
.registerContainer {
    border-radius: 15px;
    background-clip: padding-box;
    margin: 50px auto;
    width: 350px;
    padding: 15px 35px 15px 35px;
    background: #fff;
    border: 1px solid #eaeaea;
    box-shadow: 0 0 25px #cac6c6;
}
#registerLogo{
    position: relative;
    left: 50%;
    transform:translateX(-50%);
    background:url(../assets/logo.png) no-repeat;
    background-size: 40px;
}
.registerTitle{
    margin: 0px auto 40px auto;
    text-align: center;
    color: #505458;
}
.el-form-item__content{
    display: flex;
    align-items: center;
}
.register-btn{
    width: 100%;
    height: 50px;
    margin-top: 10px;
}
#codeipt{
    width: 180px;
    margin-right: 5px;
}
#loginLink{
    display: block;
    font-weight: 700;
    width: 100%;
    color: #409EFF;
    position: relative;
    left: 80%;
    margin-bottom:10px;
}
.el-avatar {
    background: blue;
}
</style>