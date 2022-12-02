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
             active-text-color="#67C23A" default-active="doucment" :router="true">
                <el-menu-item class="navmenu-item" index="doucment" >
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
    <span>资料类型：</span>
    <el-select v-model="doucmentTypeInput" filterable placeholder="请选择">
        <el-option
          v-for="item in documentType"
          :key="item.value"
          :label="item.label"
          :value="item.value">
        </el-option>
      </el-select>
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
    <el-button @click="getDoucment()" type="primary" round>搜索</el-button>
</div>
<div class="reser-btn btn">
    <el-button type="primary" round>重置</el-button>
</div>

        </div>
        <div class="searchResult">
            <el-table :data="tableData" class="resultTable">
    <el-table-column prop="file_time" label="上传日期" class="tableCol">

    </el-table-column>
    <el-table-column prop="file_stu_name" label="上传人姓名" class="tableCol">
    </el-table-column>
    <el-table-column prop="file_stu_stuid" label="上传人学号" class="tableCol">
    </el-table-column>
    <el-table-column prop="file_name" label="文件名称" class="tableCol">
  </el-table-column>
  <el-table-column prop="file_type" label="文件类型" class="tableCol">
</el-table-column>
<el-table-column prop="file_id" label="文件id" class="tableCol">
</el-table-column>
<el-table-column label="操作" class="tableCol">
    <template slot-scope="scope">
        <!-- {{scope.row}} -->
        <el-button type="primary" size="mini" @click="(scope.row.file_id)">下载</el-button>
    </template>
</el-table-column>
  </el-table>
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
    /*width: 1000px;*/
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
    align-items: center;
    justify-items: center;
}
.searchInput div{
    width: 400px;
}
.searchInput div input{
    width: 350px;
}
.searchInput .btn{
    align-self: center;
    justify-self: center;
}
col{
    width: 150px;
}
.searchResult .resultTable .tableCol{
    width: 50px;
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
            documentType: [
                {
                    value:'选择类型',
                    label:'选择类型'
                },
                {
                    value: 'IT来袭闭幕式',
                    label:'IT来袭闭幕式 '            
                }, {
                    value:'PPT制作',
                    label:'PPT制作'
                },
                {
                    value:'LOGO设计',
                    label:'LOGO设计'
                },
                {
                    value:'短视频制作',
                    label:'短视频制作'
                }, {
                    value:'装机',
                    label:'装机'
                }, {
                    value:'生活',
                    label:'生活'
                }, {
                    value: '部门事务',
                    label:'部门事务'
                }, {
                    value:'学习资料',
                    label:'学习资料'
                },
            ],
            doucmentNameInput: '',
            doucmentTypeInput: '选择类型',
            contributorNameInput:'',
            contributorNbrInput:'',
            tableData: [ ]
        }
    },
    methods: {
        // getDoucment() {
        //     //console.log("getDoucment");
        //     const self = this;
        //     this.$ajax({
        //         url: 'http://47.97.63.187/UserSearch',
        //         method: 'post',
        //         data: {
        //             file_name:this.doucmentNameInput,
        //             file_type:this.doucmentTypeInput,
        //             kw_name:this.contributorNameInput,
        //             kw_stuid:this.contributorNbrInput
        //         }
        //     }).then(response => {
        //         const data = response.data;
        //         if (data.code == 1) {
        //             console.log(data.data);
        //             this.tableData = data.data.file_data;
        //         }
        //     })
        // },
        async getDoucment() {
            console.log(this.doucmentTypeInput);
            const { data:res } = await this.$ajax({
                url: 'http://47.97.63.187/UserSearch',
                method: 'post',
                data: {
                    file_name: this.doucmentNameInput,
                    file_type: this.doucmentTypeInput,
                    kw_name: this.contributorNameInput,
                    kw_stuid: this.contributorNbrInput
                }
            });
            if (res.code == 1) {
                this.$message.success(res.msg);
                this.tableData = res.data.file_data;
            }
            else {
                this.$message.error(res.msg);
            }
           
            //console.log(res.data.file_data);
        //     let result = res.data.file_data;
        //     var arr = [];
        //     for (let i in result) {
        //         let o = [];
        //         o[i] = result[i];
        //         arr.push(o);
        //     }
        //     console.log(arr);
     }
    }
}
</script>