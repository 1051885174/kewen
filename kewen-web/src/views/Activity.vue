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
        <el-main>
            <el-row class="carousel-summer">
                <!-- 固定照片数量，照片获取？ -->
                <el-carousel :interval="4000" type="card" height="200px">
                    <el-carousel-item v-for="item in 6" :key="item">
                      <h3 class="medium">{{ item }}</h3>
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carousel-item" gutter="20">
            <el-row class="carouser-ppt">
                <h1>PPT制作大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="value" placeholder="请选择">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                  </el-select>
                  <el-carousel :interval="5000" arrow="always">
                    <el-carousel-item v-for="item in 4" :key="item">
                      <h3>{{ item }}</h3>
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-logo">
                <h1>LOGO设计大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="value" placeholder="请选择">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                  </el-select>
                  <el-carousel :interval="5000" arrow="always">
                    <el-carousel-item v-for="item in 4" :key="item">
                      <h3>{{ item }}</h3>
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-video">
                <h1>短视频制作大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="value" placeholder="请选择">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                  </el-select>
                  <el-carousel :interval="5000" arrow="always">
                    <el-carousel-item v-for="item in 4" :key="item">
                      <h3>{{ item }}</h3>
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-ceremony">
                <h1>装机大赛</h1>
                <!-- 选择查看不同年份的照片，从2020年开始 -->
                <el-select v-model="value" placeholder="请选择">
                    <el-option
                      v-for="item in options"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                  </el-select>
                  <el-carousel :interval="5000" arrow="always">
                    <el-carousel-item v-for="item in 4" :key="item">
                      <h3>{{ item }}</h3>
                    </el-carousel-item>
                  </el-carousel>
            </el-row>
            <el-row class="carouser-ceremony">
              <h1>IT来袭&UP风暴活动闭幕式</h1>
              <!-- 选择查看不同年份的照片，从2020年开始 -->
              <el-select v-model="value" placeholder="请选择">
                  <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                  </el-option>
                </el-select>
                <el-carousel :interval="5000" arrow="always">
                  <el-carousel-item v-for="item in 4" :key="item">
                    <h3>{{ item }}</h3>
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
    data() {
      return {
        options: [{
          value: '选项1',
          label: '2020年'
        }, {
          value: '选项2',
          label: '2021年'
        }, {
          value: '选项3',
          label: '2022年'
        }],
        value: ''
      }
    }
    
}
</script>