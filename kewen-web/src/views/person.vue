<template>
    <div>
        <el-container class="all">
            <!-- 头部 -->
            <el-header class="header">
                <el-row>
                    <!-- 个人头像和用户名 -->
                    <el-col span="4" id="userinfo" class="avaterAndName">
                        <el-avatar  src="../assets/logo.png"></el-avatar>
                        <p id="kw_name" @click.stop="getusername()">{{kw_name}}</p>
                    </el-col>
                    <!-- 导航栏 -->
                    <el-col span="16">
                        <el-menu class="navmenu" mode="horizontal" active-text-color="#67C23A"  :router="true">
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
                        <!-- 上传按钮 -->
                        <router-link :to="{name:'upload'}">
                            <el-button type="success" round class="upload-btn">上传</el-button>
                        </router-link>
                    </el-col>
                </el-row>
            </el-header>
            <!-- 主界面 -->
            <el-main id="userInfoDisplay">
                <div class="tab">
                    <el-tabs :tab-position="tabPosition" stretch=true>
                        <!-- 用户信息展示 -->
                        <el-tab-pane label="用户信息">
                            <div class="personUserinfo">
                                <div class="useravatar">
                                    <!-- 个人头像展示 -->
                                    <div id="useravatarShow" @click.stop="getAvatar()">

                                    </div>
                                    <!-- 个人头像上传 -->
                                    <el-upload class="upload"
                                    ref="upload"
                                    action="string"
                                    :file-list="avatarList"	
                                    :auto-upload="false"	
                                    :http-request="uploadAvatar"
                                    :on-change="handleChangeAvatar"	
                                    :on-preview="handlePreviewAvatar"	
                                    :on-remove="handleRemoveAvatar"
                                    multiple=flase>	
                                    <el-button slot="trigger"
                                    size="small"
                                    type="primary"
                                    @click="delAvatar">选取文件</el-button>
                                    <!-- 提交按钮 -->
                                    <el-button type="primary" size="small" @click="OnsubmitAvatar">上传</el-button>
                                </el-upload>
                            </div>
                            <!-- 个人信息展示 -->
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
                <el-tab-pane label="管理资料">
                    
                </el-tab-pane>
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
                    <el-table
                    :data="purviewData"
                    style="width: 100%">
                    <el-table-column
                      prop="code_id"
                      label="序号"
                      width="80">
                    </el-table-column>
                    <el-table-column
                      prop="invitation_code"
                      label="邀请码"
                      width="300">
                    </el-table-column>
                    <el-table-column
                      prop="identity"
                      label="身份"
                      width="80">
                    </el-table-column>
                  </el-table>
                </el-tab-pane>
                <el-tab-pane label="上传合照">
                    <h1>上传合照</h1>
                    <el-form >
                        <el-form-item label="合照年份">
                            <el-input type="text" v-model="togetherYear"></el-input>
                        </el-form-item>
                    </el-form>
                 <el-upload class="upload"
ref="upload"
action="string"
:file-list="fileList"	
:auto-upload="false"	
:http-request="uploadFile"
:on-change="handleChange"	
:on-preview="handlePreview"	
:on-remove="handleRemove"
multiple="multiple">	
<el-button slot="trigger"
  size="small"
  type="primary"
  @click="delFile">选取文件</el-button>
  <!-- 准备一个提交按钮 -->
<el-button type="primary" size="small" @click="FirstOnsubmit">上传</el-button>
</el-upload>

<!-- 合照覆盖
<h1>覆盖以往合照</h1>
<el-form >
    <el-form-item label="合照年份">
        <el-input type="text" v-model="RepeattogetherYear"></el-input>
    </el-form-item>
</el-form>
<el-upload class="upload"
ref="upload"
action="string"
:file-list="fileList"	
:auto-upload="false"	
:http-request="uploadFile"
:on-change="repeatandleChange"	
:on-preview="handlePreview"	
:on-remove="handleRemove"
multiple="multiple">	
<el-button slot="trigger"
size="small"
type="primary"
@click="delFile">选取文件</el-button>
<el-button type="primary" size="small" @click="MoreOnSubmit">上传</el-button>
</el-upload> -->
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
import { Avatar } from 'element-ui';


export default {
    name: 'person',
    created() {
        this.getusername()
        this.getAvatar()
    },
    data() {
        return {
            //修改个人信息
            modifyForm: {
                kw_class: '1',
                kw_message: '1',
                kw_phone: '18111433593',
                kw_name: 'langshi',
                kw_password: '111111',
                kw_passwordnot: '111111' 
            },
            purviewForm: {
                leader: '',
                staff:''
            },
            tabPosition: 'left',
            //个人信息展示
            kw_name: 'fox',
            kw_stuid: '0000000',
            kw_class: '20计科3班',
            kw_phone: '110',
            kw_message: '',
            kw_purview: '',
            purviewData: [],
            fileList: [],
            repeatFileList: [],
            avatarList:[],//头像上传
            // 不支持多选
            multiple: false,
            formData: "",
            togetherYear: "",//合照年份
            RepeattogetherYear:'',//覆盖以往合照的年份
        }
    },
    methods: {
        //上传合照第一次
    //点击上传文件触发的额外事件,清空fileList
    delFile () {
            this.fileList = [];
            console.log(this.togetherYear)
    },
    handleChange (file, fileList) {
      this.fileList = fileList;
      console.log(this.fileList);
        },
        repeatandleChange (file, fileList) {
      this.repeatFileList = fileList;
      console.log(this.fileList);
    },
    //自定义上传文件
    uploadFile (file) {
      this.formData.append("together_picture_file", file.file);
      // console.log(file.file, "sb2");
    },
    //删除文件
    handleRemove (file, fileList) {
      console.log(file, fileList);
    },
    // 点击文件
    handlePreview (file) {
      console.log(file);
        },
    //保存按钮 上传合照第一次
    FirstOnsubmit() {
            let formData = new FormData();
            formData.append("together_picture_file", this.fileList[0].raw);//拿到存在fileList的文件存放到formData中
            console.log(formData);
            //使用键值对方式存储)
            formData.append("together_picture_year", this.togetherYear);
            //console.log();
            this.$ajax.post('http://43.136.177.127/User/together_picture_upload', formData
            ).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    this.$message.success(data.msg);
                    console.log(data.msg);
                }
            })
        },
        //上传头像
        delAvatar () {
            this.avatarList = [];
        },
        handleChangeAvatar(file, avatarList) {
            this.avatarList = avatarList;
            console.log(this.avatarList);
        },
    //     repeatandleChange (file, fileList) {
    //   this.repeatFileList = fileList;
    //   console.log(this.fileList);
    // },
    //自定义上传文件
    uploadAvatar (file) {
      this.formData.append("together_picture_file", file.file);
      // console.log(file.file, "sb2");
    },
    //删除文件
    handleRemoveAvatar (file, fileList) {
      console.log(file, fileList);
    },
    // 点击文件
    handlePreviewAvatar (file) {
      console.log(file);
        },
    //保存按钮 上传头像 
    OnsubmitAvatar() {
            let formData = new FormData();
            formData.append("kw_file", this.avatarList[0].raw);//拿到存在fileList的文件存放到formData中
            console.log(formData);
            //使用键值对方式存储)
           // formData.append("together_picture_year", this.togetherYear);
            //console.log();
            this.$ajax.post('http://43.136.177.127/User/User_picture', formData
            ).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    this.$message.success(data.msg);
                    console.log(data.msg);
                }
            })
        },
        //获取头像地址
        getAvatar() {
            this.$ajax.get('http://43.136.177.127/User/User_Picture_Src').then(response =>
            {
                const data = response.data;
                const AvatarSrc = data.data.src;
                console.log(data.data.src);
                var avatar = document.getElementById('useravatarShow');
                avatar.style.background = 'url('+AvatarSrc+')';
                //avatar.style.background = 'red';
            })
        },
        //个人信息展示
        getusername() {
            //console.log("test");
            this.$ajax({
                url: 'http://43.136.177.127/User/index',
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
    //修改用户信息
        async userModify() {
          const { data: res } = await this.$ajax.post('http://43.136.177.127/User/User_update', this.modifyForm);
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
        // UploadPhoto() {
        // this.$refs.upload.submit();
        // },
        //生成邀请码
        purview() {
           // console.log(typeof (this.purviewForm.leader));
            this.$ajax({
                url: 'http://43.136.177.127/User/invitation_code',
                method: 'post',
                data: {
                    minister_id: this.purviewForm.leader,
                    officer_id:this.purviewForm.staff
            }
            }).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    console.log(data.data.invitation_code);
                    this.purviewData = data.data.invitation_code;
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
#userInfoDisplay .tab .personUserinfo #useravatarShow{
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