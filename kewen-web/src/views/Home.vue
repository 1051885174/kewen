<template>
    <div>
        <el-container class="all">
            <el-header class="header">
        <el-row>
      <el-col span="4">
        <el-avatar id="useravater" src="../assets/logo.png"></el-avatar>
      </el-col>
      <el-col span="16">
        <el-menu class="navmenu" mode="horizontal">
            <el-menu-item>
                部门资料
            </el-menu-item>
            <el-menu-item>
                部门活动
            </el-menu-item>
            <el-menu-item>
                生活印记
            </el-menu-item>
        </el-menu>
    </el-col>
    <el-col span="4">
        <el-button type="success" round>上传</el-button>
    </el-col>
    </el-row>
</el-header>
<el-main>
<el-row class="depInfo">
<el-col span="12" class="depInfoTxt">
    <h1>科文部</h1>
     <p> 科文部是成都大学计算机学院学生会的一个部门,
                IT来袭&UP风暴大赛是计算机学院与电子信息与电
                气工程学院共同举办的比赛，其中包括PPT制作大赛
                ，短视频制作大赛，LOGO设计大赛和装机大赛，一共四个子比赛
                kewen.com建立的目的是为了部门人员便于查阅往年资料。</p>
</el-col>
<el-col span="12">
    <div class="depInfoImg"></div>
</el-col>
</el-row>
<el-row class="depMbrInfo">
<el-row class="depMbrInfo-header">
<h1>部员简介</h1>
<el-date-picker
      v-model="depMbrYear"
      type="year"
      placeholder="选择年">
    </el-date-picker>
</el-row>
<el-row class="depMbrInfo-main" gutter="20">
    <el-col span="10" class="depMbrInfo-main-img">
        <el-card>
            <div class="depMbrChange">
                <el-carousel trigger="click" autoplay="flase">
                    <el-carousel-item v-for="item in depMbr" :key="item">
                        <img src="../assets/loginbg.png" alt="" class="depMbrImg">
                        {{item}}
                        <!-- {{item.name}}
                        {{item.job}} -->
                    </el-carousel-item>
                </el-carousel>
            </div>
        </el-card>
    </el-col>
    <el-col  span="10" class="depMbrInfo-intro" >
        <el-card>
            <p class="depMbrName">姓名：<span>{{depMbr.name}}</span></p>
            <p class="depMbrClass">专业班级:<span>{{depMbr.class}}</span></p>
            <p class="depMbrTel">电话:  <span>{{depMbr.tel}}</span></p>
            <p class="depMbrIntro">简介：<span>{{depMbr.intro}}</span></p>
        </el-card>
    </el-col>
</el-row>
</el-row>
<el-row class="depLifeImg">
<el-row class="depLifeImg-header">
    <h1>生活照片</h1>
    <el-button>更多</el-button>
</el-row>
<el-row class="depLifeImg-main">
<el-row>
    <el-col></el-col>
    <el-col></el-col>
    <el-col></el-col>
</el-row>
<el-row>
    <el-col></el-col>
    <el-col></el-col>
    <el-col></el-col>
</el-row>
</el-row>
</el-row>
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
<script>
export default {
    name: "Home",
    data() {
        return {
            depMbrYear: '2020',
            depMbr:['zcl','zhoulang','zxy'],
        }
    }
}
</script>
<style>
*{
    margin: 0;
    padding: 0;
}
.all{
    margin: 80px auto;
    width: 1000px;
}
.depMbrImg{
    width: 200px;
    height: 200px;
}
.depMbrChange{
    width: 200px;
    height: 50px;
}
</style>