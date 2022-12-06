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
<el-main>
<el-row class="depInfo" gutter="50">
<el-col span="12" class="depInfoTxt">
    <h1>科文部</h1>
     <p> 科文部是成都大学计算机学院学生会的一个部门,
                IT来袭&UP风暴大赛是计算机学院与电子信息与电
                气工程学院共同举办的比赛，其中包括PPT制作大赛
                ，短视频制作大赛，LOGO设计大赛和装机大赛，一共四个子比赛
                kewen.com建立的目的是为了部门人员便于查阅往年资料。</p>
</el-col>
<el-col span="12">
    <!-- 此处可以放每一届的合照 -->
    <div class="depInfoImg" >
        <img :src="togetherPhoto" alt="图片显示失败" @click.stop="getTogetherPhoto()" class="togetherPhoto">
        <!-- <img src="http://47.97.63.187/User/together_picture_show/2022" alt="图片显示失败" @click.stop="getTogetherPhoto()" class="togetherPhoto">  -->
    </div>
</el-col>
</el-row>
<el-row class="depMbrInfo">
<el-row class="depMbrInfo-header">
<h1>部员简介</h1>
<el-date-picker
      v-model="depMbrYear"
      type="year"
      placeholder="选择年"
      align="center">
    </el-date-picker>
</el-row>
<el-row class="depMbrInfo-main" gutter="20">
    <el-col span="10" class="depMbrInfo-main-img">
        <el-card>
            <div class="depMbrChange">
                <el-carousel trigger="click" autoplay="flase">
                    <el-carousel-item v-for="item in depMbrImg" :key="item">
                        <img src='../assets/loginbg.png'   alt="" class="depMbrImg">
                        <!-- {{item.name}}
                        {{item.job}} -->
                    </el-carousel-item>
                </el-carousel>
                <p v-for="item in depMbr" :key="item" class="depMbrName"> {{item}}</p>
            </div>
        </el-card>
    </el-col>
    <el-col  span="10" class="depMbrInfo-intro" >
        <el-card>
            <p class="depMbrName">姓名：<span>{{depMbr.name}}</span></p>
            <p class="depMbrClass">专业班级:<span>{{depMbr.class}}</span></p>
            <p class="depMbrTel">电话:  <span>{{depMbr.tel}}</span></p>
            <p class="depMbrQQ">QQ: <span>{{depMbr.qq}} </span> </p>
            <p class="depMbrIntro">简介：<span>{{depMbr.intro}}</span></p>
            <div class="depMbrfooter">
                <i class="el-icon-user"></i>
            </div>
        </el-card>
    </el-col>
</el-row>
</el-row>
<el-row class="depLifeImg">
<el-row class="depLifeImg-header">
    <h1>生活照片</h1>
    <el-button type=" primary ">更多</el-button>
    <el-date-picker
    v-model="lifePhotoYear"
    type="year"
    placeholder="选择年"
    value-format="yyyy"
    @change="setYear">
  </el-date-picker>
</el-row>
<div class="depLifeImg-main">
    <div  v-for="(item,index) in lifePhotoSrc" :key="index">
        <img :src="item.img" alt="">
</div>
</div>
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
    created() {
        //this.getTogetherPhoto();    
    },
    data() {
        return {
            depMbrYear: '2020',
            depMbrImg:['../assets/logo-bg.png'],
            depMbr: ['zcl'],
            togetherPhoto: '',
            lifePhotoYear: '2022',
            lifePhotoSrc: [
                { img: ""},
                { img: "" },
                { img: "" },
                { img: "" },
                { img: "" },
                { img: "" }
                
            ]
        }
    },
    methods: {
        getTogetherPhoto() {
            const self = this;
            this.$ajax({
                url: 'http://47.97.63.187/User/together_picture_src',
                method:'get'
            }).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    self.togetherPhoto = data.data.src[0].picture_src;
                    console.log(data.data.src[0].picture_src);
                    // console.log(data.data.src[0].picture_src);
                    // console.log(data.data.src[0].pic_route);
                }
            })
        },
        //选择年份展示对应的生活照片
        setYear(val) {
            if (val) {
                const self = this;
                console.log(val);
                this.$ajax({
                    url: 'http://47.97.63.187/picture_src',
                    method: 'post',
                }).then(response => {
                    const data = response.data;
                    if (data.code == 1) {
                        console.log(data.data.src["6"][this.lifePhotoYear]);
                        self.lifePhotoSrc[0].img = data.data.src["6"][this.lifePhotoYear][0].picture_src;
                        self.lifePhotoSrc[1].img = data.data.src["6"][this.lifePhotoYear][1].picture_src;
                        self.lifePhotoSrc[2].img = data.data.src["6"][this.lifePhotoYear][2].picture_src;
                        self.lifePhotoSrc[3].img = data.data.src["6"][this.lifePhotoYear][3].picture_src;
                        self.lifePhotoSrc[4].img = data.data.src["6"][this.lifePhotoYear][4].picture_src;
                        self.lifePhotoSrc[5].img = data.data.src["6"][this.lifePhotoYear][5].picture_src;
                    }
                })
            }
            else {
                console.log(0);
            }
        }

    }
}
</script>
<style>
*{
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
}
P{
    text-align: center;
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
.depInfo{
    margin-top: 20px;
    padding: 10px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-items: center;
}
.depInfo .depInfoTxt h1{
    text-align: center;
}
.depInfo .el-col .depInfoImg{
    width: 320px;
    height:240px;
    position: relative;
    left: 50%;
    top: 50%;
    transform: translateX(-50%);
}
.depInfoImg .togetherPhoto{
    width: 100%;
    height: 100%;
}
.depMbrInfo{
    margin-top: 20px;
    padding: 10px;
}
.depMbrInfo .depMbrInfo-header {
    text-align: center;
}
.depMbrInfo .depMbrInfo-main{
    display: flex;
    align-items: center;
    justify-items: center;
    margin-top: 20px;
}
.depMbrInfo .depMbrInfo-main .depMbrChange{
    height: 350px;
}
.depMbrInfo .depMbrInfo-main .depMbrImg{
    width: 400px;
    height: 300px;
}
.depMbrInfo-main .depMbrChange .depMbrName{
    margin-top: 15px;
    font-size: 24px;
}
.depMbrInfo-intro{
    padding: 20px;
}
.depMbrInfo-intro p{
    text-align: left;
}
.depMbrInfo-intro .depMbrfooter{
    height: 50px;
    background-color:#67C23A ;
    border-radius: 20px;
}
.depMbrInfo-intro .depMbrfooter i::before{
    height: 50px;
    width: 50px;
    background-color: #fff;
    color: #67C23A;
}
.el-icon-user:before {
    height: 50px;
    width: 50px;
}
.depLifeImg{
    margin-top: 20px;
    padding: 10px;
    text-align: center;
}
.depLifeImg-main{
    margin-top: 10px;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-template-rows: repeat(2,1fr);
    row-gap: 15px;
    column-gap: 10px;
}
.depLifeImg-main img{
    width: 300px;
    height: 240px;
    background-color: blue;
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