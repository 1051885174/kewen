<template>
    <div>
        <el-container class="all">
            <el-header class="header">
                <el-row>
              <el-col span="4">
                <el-avatar id="useravater" src="../assets/logo.png"></el-avatar>
              </el-col>
              <el-col span="16">
                <el-menu class="navmenu" mode="horizontal"
                 active-text-color="#67C23A" default-active="2">
                    <el-menu-item class="navmenu-item" index="1">
                        部门资料
                    </el-menu-item >
                    <el-menu-item class="navmenu-item"  index="2">
                        生活印记
                    </el-menu-item>
                    <el-menu-item class="navmenu-item" index="3">
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
            <div class="userinfo">
                <p class="username">用户名：</p>
                <p class="userNbr">学号：</p>
                <p class="userClass">专业班级</p>
                <p class="usertel">电话:</p>
                <p class="userintro">个人简介：</p>
            </div>
                <button class="userModify">修改信息</button>
                <button class="userCancel">注销账号</button>
        </el-main>
        </el-container>
    </div>
</template>
<script>
export default {
    
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