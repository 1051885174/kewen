<template>
    <div>
        <el-container class="all">
            <el-header class="header">
                <el-row>
                  <el-col span="4" class="avaterAndName">
                    <el-avatar id="useravater" :src="useravatarSrc" ></el-avatar>
                    <el-link id="kw_name" @click="toPerson" :underline="false">{{kw_name}}</el-link>
                  </el-col>
              <el-col span="16">
                <el-menu class="navmenu" mode="horizontal"
                active-text-color="#409EFF" default-active="activity" :router="true"  background-color="transparent">
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
        <el-main>
            <!-- <el-row class="carousel-summer">
                固定照片数量，照片获取？
                <el-carousel :interval="4000" type="card" height="300px">
                    <el-carousel-item v-for="item in headerPicture" :key="item">
                      <img :src=item alt="" class="picture">
                    </el-carousel-item>
                  </el-carousel>
            </el-row> -->
            <el-row class="carousel-item" gutter="20">
            <el-row class="carouser-ppt">
               <div class="carouserHeader">
                <h1 class="picTitle">PPT制作大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="pptValue" placeholder="请选择年份" class="yearSelect" @change="pptYear">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :value="item.value"
                      >
                    </el-option>
                  </el-select>
               </div>
                  <el-carousel :interval="5000" arrow="always" type="card" height="300px">
                    <el-carousel-item v-for="item in pptPicture" :key="item">
                      <img :src=item alt="" class="picture">
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-logo">
              <div class="carouserHeader">
                <h1 class="picTitle">短视频制作大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="videoValue" placeholder="请选择年份" class="yearSelect" @change="videoYear">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :value="item.value">
                    </el-option>
                  </el-select>
               </div>
                  <el-carousel :interval="5000" arrow="always" type="card" height="300px">
                    <el-carousel-item v-for="item in videoPicture" :key="item">
                      <img :src=item alt="" class="picture">
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-video">
              <div class="carouserHeader">
                <h1 class="picTitle">LOGO制作大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="logoValue" placeholder="请选择年份" class="yearSelect" @change="logoYear">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :value="item.value">
                    </el-option>
                  </el-select>
               </div>
                  <el-carousel :interval="5000" arrow="always" type="card" height="300px">
                    <el-carousel-item v-for="item in logoPicture" :key="item">
                      <img :src=item alt="" class="picture">
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-ceremony">
              <div class="carouserHeader">
                <h1 class="picTitle">装机大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="computerValue" placeholder="请选择年份" class="yearSelect" @change="computerYear">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :value="item.value">
                    </el-option>
                  </el-select>
               </div>
                  <el-carousel :interval="5000" arrow="always" type="card" height="300px">
                    <el-carousel-item v-for="item in computerPicture" :key="item">
                      <img :src=item alt="" class="picture">
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-ceremony">
              <div class="carouserHeader">
                <h1 class="picTitle">闭幕式</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="endValue" placeholder="请选择" class="yearSelect" @change="endYear">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :value="item.value">
                    </el-option>
                  </el-select>
               </div>
                <el-carousel :interval="5000" arrow="always" type="card" height="300px">
                  <el-carousel-item v-for="item in endPicture" :key="item">
                    <img :src=item alt="" class="picture">
                  </el-carousel-item>
                </el-carousel>
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
<style>
.all{
    margin: 40px auto;
    width: 1000px;
}
*{
  margin: 0;
  padding: 0;
  font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
}
P{
  text-align: center;
}
.header .el-row{
  height: 60px;
}
.header .el-row .el-col{
  height:100%;
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
.picture{
  width: auto;  
  height: auto;  
  max-width: 100%;  
  max-height: 100%;   
}
.carouserHeader{
  display: flex;
}
.picTitle{
  width: 200px;
}
.yearSelect{
  width: 150px;
}
.el-carousel{
    width: 100%;
}
.el-carousel__item h3 {
    color: #475669;
    font-size: 14px;
    opacity: 0.75;
    line-height: 200px;
    margin: 0;
  }
  
  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
}
    .el-carousel__item:nth-child(2n+1) {
        background-color: #d3dce6;
      }
      .carousel-item .el-row{
        display: flex;
        flex-direction: column;
        gap: 10px;
      }
.carousel-item .el-row h1{
  font-size: 28px;
  font-weight: normal;
}
.carousel-item .el-row .el-carousel__item{
  align-self: center;
  justify-self: center;
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
  name: 'activity',
  mounted() {
    this.getusername(); 
    this.getAvatar();//用户头像
    this.getNowYear();//获取当前年份
    this.initpicture()//默认显示2020年图片
    },
    data() {
      return {
        useravatarSrc: '',//头像地址
        pptValue: '',
        videoValue: '',
        logoValue: '',
        computerValue: '',
        endValue:'',
        kw_name:'fox',
        options: [],
        value: '',
        pptPicture: [],//存放ppt活动轮播图照片的数组
        setPptPicture: '',
        videoPicture: [],
        setVideoPicture: '',
        setLogoPicture: '',
        setComputerPicture: '',
        setendPicture:'',
        logoPicture: [],
        computerPicture:[],
        endPicture: [],
        headerPicture:[],
        
      }
  },
  methods: {
    getNowYear() {
      var data = new Date();
      var nowYear = data.getFullYear();
      //console.log(nowYear);
      for (let i = 2020; i <= nowYear; i++){
        //this.newarr = this.arr.unshift({ 'value': '2023' });
        //console.log(this.newarr);
       // const j = i.toString();
        this.options.unshift({ value: i });
        //console.log(this.options);
        //console.log(i);
      }
      //console.log(this.options);
    },
    getusername() {
            //console.log("test");
            this.$ajax({
                url: 'https://www.cdukewen.top/User/index',
                method: 'get'
            }).then(reponse => {
                const data = reponse.data;
                //console.log(data);
                let userinfo = data.data;
                //console.log(userinfo.user_data.kw_name);
                this.kw_name = userinfo.user_data.kw_name;
            })
    },
        //获取头像地址
        getAvatar() {
            this.$ajax.get('https://www.cdukewen.top/User/User_Picture_Src').then(response =>
            {
                const data = response.data;
                this.useravatarSrc = 'https://www.cdukewen'+data.data.kw_picture_src;
                //console.log(this.useravatarSrc);
            })
    },
    //默认显示2020年的照片
    initpicture() {
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[2][2020];
        //console.log(data);
        let pptPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.pptPicture.push(pptPictureSrc[i].picture_src);
      }
      })
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[4][2020];
        //console.log(data);
        let videoPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.videoPicture.push(videoPictureSrc[i].picture_src);
      }
      }),
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[3][2020];
        //console.log(data);
        let logoPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.logoPicture.push(logoPictureSrc[i].picture_src);
      }
      })
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[5][2020];
        //console.log(data);
        let computerPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.computerPicture.push(computerPictureSrc[i].picture_src);
      }
      })
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[1][2020];
        //console.log(data);
        let endPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.endPicture.push(endPictureSrc[i].picture_src);
      }
      })
      //头部的那个轮播图
      this.$ajax({
        url: 'http://www.cdukewen.top/rotation_together_picture_show',
        method:'get'
      }).then(reponse => {
        const data = reponse.data.data;
        console.log(data);
      })
    },
    pptYear(val) {
      //console.log(val);
      this.setPptPicture = val;
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[2][val];
        //console.log(data);
        let pptPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.pptPicture.push(pptPictureSrc[i].picture_src);
      }
      })
      // for (let i = 0; i < 4; i++){//限制轮播图数量为4张
      //   this.pptPicture.push(pptPictureSrc[i].picture_src);
      // }
      //console.log(this.pptPicture);
    },
    videoYear(val) {
      this.setVideoPicture = val;
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[4][val];
        //console.log(data);
        let videoPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.videoPicture.push(videoPictureSrc[i].picture_src);
      }
      })
    },
    logoYear(val) {
      this.setLogoPicture = val;
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[3][val];
        //console.log(data);
        let logoPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.logoPicture.push(logoPictureSrc[i].picture_src);
      }
      })
    },
    computerYear(val) {
      this.setComputerPicture = val;
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[5][val];
        //console.log(data);
        let computerPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.computerPicture.push(computerPictureSrc[i].picture_src);
      }
      })
    },
    endYear(val) {
      this.setendPicture = val;
      this.$ajax({
        url: 'https://www.cdukewen.top/picture_src',
        method:'post'
      }).then(reponse => {
        const data = reponse.data.data.src[1][val];
        //console.log(data);
        let endPictureSrc = data;
        for (let i = 0; i < 4; i++){//限制轮播图数量为4张
        this.endPicture.push(endPictureSrc[i].picture_src);
      }
      })
    },
    toPerson() {
            this.$router.push('/person');
        }
    }
}
</script>