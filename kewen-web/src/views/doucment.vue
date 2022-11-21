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
                <el-menu-item class="navmenu-item" index="1" @click="doucmentRouter">
                    部门资料
                </el-menu-item >
                <el-menu-item class="navmenu-item"  index="2" @click="HomeRouter">
                    生活印记
                </el-menu-item>
                <el-menu-item class="navmenu-item" index="3" @click="ActivityRouter">
                    部门活动
                </el-menu-item>
            </el-menu>
        </el-col>
        <el-col span="4">
            <el-button type="success" round class="upload-btn">上传</el-button>
        </el-col>
        </el-row>
    </el-header>
    <el-main>
        <div class="searchInput">
            <div class="doucmentName">
            资料名称：
            <el-input
  placeholder="请输入内容"
  v-model="doucmentNameInput"
  clearable>
</el-input>
</div>
<div class="doucmentType">
    资料类型：
    <el-input
placeholder="请输入内容"
v-model="doucmentTypeInput"
clearable>
</el-input>
</div>
<div class="contributorName">
    上传人名字：
    <el-input
placeholder="请输入内容"
v-model="contributorNameInput"
clearable>
</el-input>
</div>
<div class="contributorNbr">
    上传者学号：
    <el-input
placeholder="请输入内容"
v-model="contributorNbrInput"
clearable>
</el-input>

</div>
<div class="search-btn btn">
    <button>搜索</button>
</div>
<div class="reser-btn btn">
    <button>重置</button>
</div>

        </div>
    </el-main>
    <el-footer class="webInfo">
        <el-row class="webInfo-header">
        <h1>C O N T A C T</h1>
        <h1>hello@kewen.com</h1>
        </el-row>
        <el-row class="webInfo-main" gutter="50">
            <el-col span="7">
                <p>ADDRESS</p>
                <p>四川省成都市龙泉驿区成都大学计算机学院分团委学生会科文部</p>
            </el-col>
            <el-col span="7">
                <p>EMAIL</p>
                <p>cdukewenbu@163.com</p>
                <p>cdukewen@163.com</p>
            </el-col>
            <el-col span="7">
                <p>JOIN</p>
                <p>weibo@成都大学计算机学院-科文部</p>
            </el-col>
        </el-row>
        </el-footer>
    </el-container>
  </div>
</template>
<style>
div{
    font-family: "Helvetica Neue",Helvetica,"PingFang SC",
    "Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,
    sans-serif;
}
.all{
    margin: 40px auto;
    width: 1000px;
}
.header .el-row{
    height: 60px;
}
.header .el-row .el-col{
    height:100%;
}
.header #useravater{
    height: 40px;
    width: 40px;
   position: relative;
   left: 50%;
   top: 50%;
   transform: translateX(-50%) translateY(-50%);
}
.header .navmenu{
    background-color:#F2F6FC;
    display: flex;
    gap: 60px;
}
.header .navmenu .navmenu-item{
    font-size: 18px;
    color:#67C23A ;
}
.header .upload-btn{
    position: relative;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}
.searchInput{
    width: 100%;
    display: grid;
    grid-template-rows: repeat(3,1fr);
    grid-template-columns: repeat(2,1fr);
    row-gap: 20px;
    column-gap: 50px;
}
.searchInput .btn{
    align-self: center;
    justify-self: center;
}
.searchInput .btn button{
    width: 80px;
    height: 50px;
    background-color: #67C23A;
    color: #F2F6FC;
    font-size: 32px;
    border: 1px solid transparent;
    border-radius: 15px;
    padding: auto;
}
.webInfo{
    margin: 0 auto;
    margin-top: 20px;
    padding: 10px;
    height: 400px;
    text-align: center;
    background-color:#67C23A;
    border-radius: 30px;
    color: #fff;
}
.webInfo .webInfo-main{
    margin-top: 20px;
}
.webInfo .webInfo-main .el-col p{
    width: 200px;
    margin-top: 10px;
    color: #67C23A;
}
</style>
<script>
export default {
    name: 'document',
    data() {
        return {
            doucmentNameInput: '',
            doucmentTypeInput: '',
            contributorNameInput:'',
            contributorNbrInput:'',
            
        }
    },
    methods: {
        doucmentRouter() {
            this.$router.replace('/doucment');
        },
        HomeRouter() {
            this.$router.replace('/home');
        },
        ActivityRouter() {
            this.$router.replace('/Activity');
        }
    }
}
</script>