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
                 active-text-color="#67C23A"  :router="true">
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
           <div class="tab">
            <el-tabs :tab-position="tabPosition" stretch=true>
                <el-tab-pane label="用户信息">
              <div class="personUserinfo">
                <div class="useravatar">
                </div>
                <div class="userinfo" @click.stop="getusername()">
                    <p class="username">用户名：{{kw_name}}</p>
                    <p class="userNbr">学号：{{kw_stuid}}</p>
                    <p class="userClass">专业班级:{{kw_class}}</p>
                    <p class="usertel">电话:{{kw_phone}}</p>
                    <p class="userPurview">职位:{{kw_purview}}</p>
                    <p class="userintro">个人简介：{{kw_message}}</p>
                </div>
              </div>
                </el-tab-pane>
                <el-tab-pane label="信息修改">
                    <div class="ifrModify">
                        <h1>修改个人信息</h1>
                        <el-form ref="modifyForm" v-model="modifyForm">
                            <el-form-item label="用户名" label-width="80px">
                                <el-input type="text" v-model="modifyForm.kw_name" placeholder="请输入用户名"></el-input>
                            </el-form-item>
                            <el-form-item label="专业班级" label-width="80px">
                                <el-input type="text" v-model="modifyForm.kw_class" placeholder="请输入专业班级"></el-input>
                            </el-form-item>
                            <el-form-item label="电话号码" label-width="80px">
                                <el-input type="text" v-model="modifyForm.kw_phone" placeholder="请输入电话号码"></el-input>
                            </el-form-item>
                            <el-form-item label="个人简介" label-width="80px">
                                <el-input type="text" v-model="modifyForm.kw_message" placeholder="请输入留言" ></el-input>
                            </el-form-item>
                            <el-form-item label="密码" label-width="80px">
                                <el-input type="password" v-model="modifyForm.kw_password" placeholder="请输入密码"></el-input>
                            </el-form-item>
                            <el-form-item label="确认密码" label-width="80px">
                                <el-input type="password" v-model="modifyForm.kw_passwordnot" placeholder="请再次输入密码"></el-input>
                            </el-form-item>
                            <el-from-item>
                                <el-button primary type="success" @click="userModify()">确定</el-button>
                                <el-button peimary type="danger" @click="cancelModify()">取消</el-button>
                            </el-from-item>
                        </el-form>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="管理资料">角色管理</el-tab-pane>
                <el-tab-pane label="生成邀请码">
                    <p>生成邀请码</p>
                    <el-form>
                        <el-form-item label="部长邀请码数量" v-model="purviewForm">
                            <el-input type="text" placeholder="请输入" v-model="purviewForm.leader">
                            </el-input>
                        </el-form-item>
                        <el-form-item label="干事邀请码数量">
                            <el-input type="number" placeholder="请输入" v-model="purviewForm.staff"></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button primary type="success" @click="purview()">生成</el-button>
                        </el-form-item>
                    </el-form>
                </el-tab-pane>
                <el-tab-pane label="上传合照">
                    <h1>上传合照</h1>
                    <el-upload
  class="upload-demo"
  ref="upload"
  action=none
  :on-preview="handlePreview"
  :on-remove="handleRemove"
  :auto-upload="false">
  <el-button slot="trigger" size="small" type="primary">选取文件</el-button>
  <el-button style="margin-left: 10px;" size="small" type="success" @click="UploadPhoto()">上传</el-button>
  <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
</el-upload>
<el-table
:data="tableData"
style="width: 100%">
<el-table-column
  prop="date"
  label="日期"
  width="180">
</el-table-column>
<el-table-column
  prop="name"
  label="合照"
  width="180">
</el-table-column>
</el-table>
                </el-tab-pane>
              </el-tabs>
           </div>
            
                <!-- <button class="userModify" @click="userUpdata()">修改信息</button>
                <button class="userCancel">注销账号</button> -->
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
            modifyForm: {
                kw_class: '1',
                kw_message: '1',
                kw_phone: '18111433593',
                kw_name: 'langshi',
                kw_password: '111111',
               kw_passwordnot:'111111' 
            },
            purviewForm: {
                leader: '',
                staff:''
            },
            tabPosition:'left',
            kw_name: 'fox',
            kw_stuid: '0000000',
            kw_class: '20计科3班',
            kw_phone: '110',
            kw_message: '',
            kw_purview:''
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
                this.kw_purview = userinfo.user_data.kw_purview;
                this.kw_message = userinfo.user_data.kw_message;
                //console.log(this.kw_class);
            })
        },
    //修改弹出框，同步信息到个人界面的信息显示
    //     userUpdata() {
    //         const h = this.$createElement;
    //         let updataMessage = '';
    //         let updataClass = '';
    //         let updataPhone = '';
    //         return new Promise(resolve=> {
    //             this.$msgbox({
    //       title: '修改个人信息',
    //       message: h('form', null, [
    //         h('p', {style:'text-align:left'}, '班级:'),
    //           h('input', {
    //               domProps: {
    //                   type: 'text',
    //                   value:updataClass,
    //                   placeolder: '请输入班级'
                    
    //               },
    //               class: {
    //                   'classInput':true
    //               },
    //               on: {
    //                   change: function (e) {
    //                       updataClass = e.target.value;
    //                 }
    //             }
    //           }),
    //           h('p', {style:'text-align:left'}, '电话号码'),
    //           h('input', {
    //               domProps: {
    //                   type: 'text',
    //                   value:updataPhone,
    //                   placeolder: '请输入电话号码'
                    
    //               },
    //               class: {
    //                 'phoneInput':true
    //               },
    //               on: {
    //                   change: function (e) {
    //                       updataPhone = e.target.value;
    //                 }
    //             }
    //           }),
    //           h('p', {style:'text-align:left'}, '个人简介'),
    //           h('input', {
    //               domProps: {
    //                   type: 'text',
    //                   value: updataMessage,
    //                   placeolder: '请输入个人简介'
    //               },
    //               class: {
    //                 'messageInput':true
    //               },
    //             on:{
    //                 change: function (e) {
    //                     updataMessage = e.target.value;
    //               }  
    //             }
    //         })
    //       ]),
    //       showCancelButton: true,
    //       confirmButtonText: '确定',
    //       cancelButtonText: '取消',
    //       beforeClose: (action, instance, done) => {
    //           if (action === 'confirm') {
    //             //   console.log(this.kw_message);
    //             //   console.log(updataMessage);
    //             //   this.kw_message = updataMessage;
    //             //   console.log(this.kw_message);
    //             //   this.kw_phone = updataPhone;
    //               //   this.kw_class = updataClass;
    //               resolve([updataClass, updataPhone,updataMessage]);
    //               this.updata();
    //               this.getusername();
    //             instance.confirmButtonLoading = true;
    //             instance.confirmButtonText = '修改中...';
    //             //updata();
    //           setTimeout(() => {
    //               done();
    //             setTimeout(() => {
    //               instance.confirmButtonLoading = false;
    //             }, 300);
    //           }, 300);
    //         } else {
    //             done();
    //         }
    //       }
    //     }).then(action => {
    //       this.$message({
    //         type: 'info',
    //         message: 'action: ' + action
    //       });
    //     });
    //         })
    //     },
    //     //将修改信息传入后端
    //    async updata() {
    //        let res = await this.userUpdata();
    //        console.log('updata:');
    //         console.log(res);
    //         this.$ajax({
    //             url: 'http://47.97.63.187/User_update',
    //             method: 'post',
    //             data: {
    //                 kw_class: res[0],
    //                 kw_phone: res[1],
    //                 kw_message: res[2],
    //                 kw_name:this.kw_name,
    //                 kw_stuid:this.kw_stuid,
    //             }
    //         }).then(response => {
    //             const data = response.data;
    //             if (data.code == 1) {
    //                 this.$message.success(data.message);
    //             }
    //    })
    //     },
    //修改用户信息
        async userModify() {
          const { data: res } = await this.$ajax.post('http://47.97.63.187/User/User_update', this.modifyForm);
          //console.log(res);
            if (res.code == 1) {
                this.$message.success(res.msg);
            }
            else if (res.code == 2)
            {
                this.$message.error(res.msg+'错误原因'+res.data.error);
          }
        },
        //修改信息部分的重置
        cancelModify() {
            this.modifyForm.kw_class = '';
            this.modifyForm.kw_name = '';
            this.modifyForm.kw_message = '';
            this.modifyForm.kw_password = '';
            this.modifyForm.kw_password = '';
            this.modifyForm.kw_passwordnot = '';
        },
        UploadPhoto() {
        this.$refs.upload.submit();
        },
        purview() {
           // console.log(typeof (this.purviewForm.leader));
            this.$ajax({
                url: 'http://47.97.63.187/UserSearch/minister',
                method: 'post',
                data: {
                    minister_id: this.purviewForm.leader
            }
            }).then(reponse => {
                const data = response.data;
                if (data.code == 1) {
                    console.log(data);
                }
         })
      }
    }
}
</script>
<style>
#userInfoDisplay{
    width: 800px;
    height: 600px;
}
#userInfoDisplay .tab .personUserinfo{
    display: flex;
    flex-direction: row;
    gap: 40px;
    align-items: center;
    justify-items: center;
}
#userInfoDisplay .tab .personUserinfo .useravatar{
    width: 200px;
    height: 200px;
    background-color:green;
    border-radius: 500px;
}
.tab .personUserinfo .userinfo p{
    text-align: start;
    padding: 5px;
}
.ifrModify{
    width: 300px;
}
/*#userInfoDisplay{
    display: grid;
    grid-template-rows: 4fr 1fr;
    grid-template-columns: 1fr,3fr,3fr;
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

}*/
</style>