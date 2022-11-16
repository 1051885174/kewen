<template>
    <div>
        <el-form ref="registerForm" :rules="rules" :model="registerForm" class="registerContainer"  >
            <el-avatar src="../assets/logo.png" fit="contain" id="registerLogo"></el-avatar>
            <h3 class="registerTitle" >用户注册</h3>
            <el-form-item label="用户名" prop="username" label-width="80px">
                <el-input type="text" placeholder="请输入用户名" v-model="registerForm.username"></el-input>
            </el-form-item>
            <el-form-item label="学号" prop="userno" label-width="80px">
                <el-input type="text" placeholder="请输入学号" v-model="registerForm.userno" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="password" label-width="80px"> 
                <el-input type="password" placeholder="请输入密码" v-model="registerForm.password" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="确认密码" prop="password" label-width="80px">
                <el-input type="password" placeholder="请再次确认密码" v-model="registerForm.password" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item  prop="code">
                <el-input type="text" placeholder="请输入验证码" size="normal" v-model="registerForm.code" auto-complete="false" id="codeipt"></el-input>
                <img src="" alt="">
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
    data() {
        return {
            registerForm: {
                username:'fox',
                userno: 'root',
                password: '123456',
                code: ''
            },
            rules: {
                username: [{ required: true, messgae:'请输入用户名',trigger:'bulr'}],
                userno: [{ required: true, messgae: '请输入学号', trigger: 'bulr' }],
                password: [{ required: true, message: '请输入密码', trigger: 'blur' }],
                code: [{ required: true, message: '请输入验证码', trigger: 'blur' }]
            }
        }
    },
    methods: {
        submitRigister() {
           
        // 登录
            this.$refs.registerForm.validate((valid) => {
                
                if (valid) {
            alert("注册成功，请登录");
            this.$router.replace('/login');
           //将数据传给后端之后，后端返回TRUE，再提示成功，并自动跳转到登录页面
           
            this.loading = true;//准备调登录接口时，出现正在加载
            //第一个参数请求后端的地址，第二个参数，传给后端的数据
            this.postRequest('/login', this.loginForm).then(resp => {
              this.loading = false;//登录成功后关闭
 
            })
          } else {
            this.$message.error('请输入所有字段！');
            return false;
          }
        })
        },
        loginLink() {
            this.$router.push('/login');
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
    width: 250px;
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