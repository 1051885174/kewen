<template>
    <div>
        <el-container class="all">
            <el-header class="header">
                <el-row>
              <el-col span="4" id="userinfo">
                <el-avatar  src="../assets/logo.png"></el-avatar>
                <p id="kw_name" @click.stop="getusername()">{{kw_name}}</p>
              </el-col>
              <el-col span="16">
                <el-menu class="navmenu" mode="horizontal"
                 active-text-color="#67C23A" default-active="2" :router="true">
                    <el-menu-item class="navmenu-item" index="doucment">
                        部门资料
                    </el-menu-item >
                    <el-menu-item class="navmenu-item"  index="home">
                        生活印记
                    </el-menu-item>
                    <el-menu-item class="navmenu-item" index="activity">
                        部门活动
                    </el-menu-item>
                </el-menu>
            </el-col>
            <el-col span="4">
                <el-button type="success" round class="upload-btn">上传</el-button>
            </el-col>
            </el-row>
        </el-header>
        <el-main id="userInfoDisplay">
            <div class="useravater">
            </div>
            <div class="userinfo" @click.stop="getusername()">
                <p class="username">用户名：{{kw_name}}</p>
                <p class="userNbr">学号：{{kw_stuid}}</p>
                <p class="userClass">专业班级:{{kw_class}}</p>
                <p class="usertel">电话:{{kw_phone}}</p>
                <p class="userintro">个人简介：{{kw_message}}</p>
            </div>
                <button class="userModify" @click="userUpdata()">修改信息</button>
                <button class="userCancel">注销账号</button>
        </el-main>
        </el-container>
    </div>
</template>
<script>

export default {
    name: 'person',
    created() {
        this.getusername()
    },
    data() {
        return {
            kw_name: 'fox',
            kw_stuid: '0000000',
            kw_class: '20计科3班',
            kw_phone: '110',
            kw_message:''
        }
    },
    methods: {
        getusername() {
            //console.log("test");
            this.$ajax({
                url: 'http://47.97.63.187/User/index',
                method: 'get'
            }).then(reponse => {
                const data = reponse.data;
                //console.log(data);
                let userinfo = data.data;
                //console.log(userinfo.user_data.kw_name);
                this.kw_name = userinfo.user_data.kw_name;
                this.kw_stuid = userinfo.user_data.kw_stuid;
                this.kw_class = userinfo.user_data.kw_class;
                this.kw_phone = userinfo.user_data.kw_phone;
                this.kw_message = userinfo.user_data.kw_message;
                //console.log(this.kw_class);
            })
        },
    //修改弹出框，同步信息到个人界面的信息显示
        userUpdata() {
            const h = this.$createElement;
            let updataMessage = '';
            let updataClass = '';
            let updataPhone = '';
            return new Promise(resolve=> {
                this.$msgbox({
          title: '修改个人信息',
          message: h('form', null, [
            h('p', {style:'text-align:left'}, '班级:'),
              h('input', {
                  domProps: {
                      type: 'text',
                      value:updataClass,
                      placeolder: '请输入班级'
                    
                  },
                  class: {
                      'classInput':true
                  },
                  on: {
                      change: function (e) {
                          updataClass = e.target.value;
                    }
                }
              }),
              h('p', {style:'text-align:left'}, '电话号码'),
              h('input', {
                  domProps: {
                      type: 'text',
                      value:updataPhone,
                      placeolder: '请输入电话号码'
                    
                  },
                  class: {
                    'phoneInput':true
                  },
                  on: {
                      change: function (e) {
                          updataPhone = e.target.value;
                    }
                }
              }),
              h('p', {style:'text-align:left'}, '个人简介'),
              h('input', {
                  domProps: {
                      type: 'text',
                      value: updataMessage,
                      placeolder: '请输入个人简介'
                  },
                  class: {
                    'messageInput':true
                  },
                on:{
                    change: function (e) {
                        updataMessage = e.target.value;
                  }  
                }
            })
          ]),
          showCancelButton: true,
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          beforeClose: (action, instance, done) => {
              if (action === 'confirm') {
                //   console.log(this.kw_message);
                //   console.log(updataMessage);
                //   this.kw_message = updataMessage;
                //   console.log(this.kw_message);
                //   this.kw_phone = updataPhone;
                  //   this.kw_class = updataClass;
                  resolve([updataClass, updataPhone,updataMessage]);
                  this.updata();
                  this.getusername();
                instance.confirmButtonLoading = true;
                instance.confirmButtonText = '修改中...';
                //updata();
              setTimeout(() => {
                  done();
                setTimeout(() => {
                  instance.confirmButtonLoading = false;
                }, 300);
              }, 300);
            } else {
                done();
            }
          }
        }).then(action => {
          this.$message({
            type: 'info',
            message: 'action: ' + action
          });
        });
            })
        },
        //将修改信息传入后端
       async updata() {
           let res = await this.userUpdata();
           console.log('updata:');
            console.log(res);
            this.$ajax({
                url: 'http://47.97.63.187/User_update',
                method: 'post',
                data: {
                    kw_class: res[0],
                    kw_phone: res[1],
                    kw_message: res[2],
                    kw_name:this.kw_name,
                    kw_stuid:this.kw_stuid,
                }
            }).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    this.$message.success(data.message);
                }
       })
        },
    }
}
</script>
<style>
#userInfoDisplay{
    display: grid;
    grid-template-rows: 4fr 1fr;
    grid-template-columns: repeat(2,1fr);
    row-gap: 20px;
    column-gap: 20px;
}
#userInfoDisplay .useravater{
    width: 200px;
    height: 200px;
    background-color:green;
    border-radius: 500px;
    align-self: center;
    justify-self: center;
}
#userInfoDisplay .userinfo p{
    text-align: start;
    padding: 5px;
}
#userInfoDisplay .userModify,.userCancel{
    display: block;
    background-color: green;
    border: 1px solid transparent;
    border-radius: 5px;
    color: aliceblue;
    width: 80px;
    height: 60px;
    align-self: center;
    justify-self: center;

}
</style>