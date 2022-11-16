<template>
    <div>
        <el-form ref="loginForm" :rules="rules" :model="loginForm" class="loginContainer" >
            <el-avatar src="../assets/logo.png" fit="contain" id="loginLogo"></el-avatar>
            <h3 class="loginTitle" >用户登录</h3>
            <el-form-item label="学号" prop="userno">
                <el-input type="text" placeholder="请输入学号" v-model="loginForm.userno" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="password">
                <el-input type="password" placeholder="请输入密码" v-model="loginForm.password" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item  prop="code">
                <el-input type="text" placeholder="请输入验证码" size="normal" v-model="loginForm.code" auto-complete="false" id="codeipt"></el-input>
                <img src="" alt="">
            </el-form-item>
            <a href="./register.vue" id="registerLink">立即注册</a>
            <el-form-item>
               
                <el-button type="primary" class="login-btn" @click="submitLogin">登录</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            loginForm: {
                userno: 'root',
                password: '123456',
                code: ''
            },
            rules: {
                userno: [{ required: true, messgae: '请输入学号', trigger: 'bulr' }],
                password: [{ required: true, message: '请输入密码', trigger: 'blur' }],
                code: [{ required: true, message: '请输入验证码', trigger: 'blur' }]
            }
        }
    },
    methods: {
        submitLogin() {
            this.$router.replace('/home');
        // 登录
            this.$refs.loginForm.validate((valid) => {
                
          if (valid) {
            this.loading = true;//准备调登录接口时，出现正在加载
            //第一个参数请求后端的地址，第二个参数，传给后端的数据
            this.postRequest('/login', this.loginForm).then(resp => {
              this.loading = false;//登录成功后关闭
              if (resp) {
                // 存储用户 token 到 sessionStorage
                const tokenStr = resp.obj.tokenHead + resp.obj.token;
                window.sessionStorage.setItem('tokenStr', tokenStr);
                // 跳转到首页
                // this.$router.push('/home') // 路由跳转，可以回退到上一页
                this.$router.replace('/home') // 路径替换，无法回退到上一页
 
                // 页面跳转
                // 拿到用户要跳转的路径
                let path = this.$route.query.redirect;
                // 用户可能输入首页地址或错误地址，让他跳到首页，否则跳转到他输入的地址
                this.$router.replace((path === '/' || path === undefined) ? '/home' : path)
              }
 
            })
          } else {
            this.$message.error('请输入所有字段！');
            return false;
          }
        })
      }
    }
  }
</script>

<style>
.loginContainer {
    border-radius: 15px;
    background-clip: padding-box;
    margin: 50px auto;
    width: 350px;
    padding: 15px 35px 15px 35px;
    background: #fff;
    border: 1px solid #eaeaea;
    box-shadow: 0 0 25px #cac6c6;
}
#loginLogo{
    position: relative;
    left: 50%;
    transform:translateX(-50%);
    background:url(../assets/logo.png) no-repeat;
    background-size: 40px;
}
.loginTitle{
    margin: 0px auto 40px auto;
    text-align: center;
    color: #505458;
}
.el-form-item__content{
    display: flex;
    align-items: center;
}
.login-btn{
    width: 100%;
    height: 50px;
    margin-top: 10px;
}
#codeipt{
    width: 250px;
    margin-right: 5px;
}
#registerLink{
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