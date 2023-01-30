<template>
    <div>
        <el-form ref="loginForm" :rules="rules" :model="loginForm" class="loginContainer" >
            <el-avatar src="../assets/logo.png" fit="contain" id="loginLogo"></el-avatar>
            <h3 class="loginTitle" >用户登录</h3>
            <el-form-item label="学号" prop="kw_stuid" label-width="80px">
                <el-input type="text" placeholder="请输入学号" v-model="loginForm.kw_stuid" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="kw_password" label-width="80px">
                <el-input type="password" placeholder="请输入密码" v-model="loginForm.kw_password" auto-complete="false"></el-input>
            </el-form-item>
            <el-form-item  prop="kw_captcha">
                <el-input type="text" placeholder="请输入验证码" size="normal" v-model="loginForm.kw_captcha" auto-complete="false" id="kw_captchaipt"></el-input>
                <img :src="captchasrc" alt="无法查看" @click.stop="getCaptchaSrc()" class="captchaimg">
            </el-form-item>
            <a href="" id="registerLink" @click="registerLink">立即注册</a>
            <el-form-item>            
                <el-button type="primary" class="login-btn" @click="submitLogin">登录</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
export default {
    name: "Login",
    created() {
    //this.submitLogin()  
    this.getCaptchaSrc()
    },
    data() {
        return {
            captchasrc:'',
            loginForm: {
                kw_stuid: '202010411301',
                kw_password: '111111',
                kw_captcha: ''
            },
            rules: {
                kw_stuid: [{ required: true, messgae: '请输入学号', trigger: 'bulr' }],
                kw_password: [{ required: true, message: '请输入密码', trigger: 'blur' }],
                kw_captcha: [{ required: true, message: '请输入验证码', trigger: 'blur' }]
            }
        }
    },
    methods: {
        getCaptchaSrc() {
            const self = this;
            this.$ajax({
                url: 'http://43.136.177.127/captcha',
                method: 'get',
            }).then(response => {
                const data = response.data;
                if (data.code==1) {
                    let info = data.data;
                    self.captchasrc = info.src;
                    //console.log(self.captchasrc);
    }
  }); 
        },
       async submitLogin() {
            //const user = this;

            /*this.$ajax({
                url: 'http://47.97.63.187/Login/check',
                method: 'post',
                data:this.loginForm
            }).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    let userinfo = data.data;
                    this.$msg.success(data.msg);
                    window.sessionStorage.setItem('token', userinfo.token);
                } else{
                    console.log('test');
                    this.$msg.error(data.msg);
                }
            })*/
            const{data:res} =await this.$ajax.post('http://43.136.177.127/login', this.loginForm);
            //console.log(res);
            if (res.code == 1)
            {
                this.$msg.success(res.msg);
                console.log(res.data.token);
                window.sessionStorage.setItem('token', res.data.token);
                this.$router.replace('/home')
            }else if(res.code==2){
                //console.log(res.data);
                console.log(res.msg);
               this.$msg.error(res.msg);
            }
               
            //var res = this.$ajax.get('http://47.97.63.187/Captcha/captcha')
            //console.log(res)
            //this.$router.replace('/doucment');*/
        },
        registerLink() {
            console.log('register');
          this.$router.push({path:'/register'});//可以跳转会上一页
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
.captchaimg{
    width: 80px;
    height: 50px;
}
.login-btn{
    width: 100%;
    height: 50px;
    margin-top: 10px;
}
#kw_captchaipt{
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