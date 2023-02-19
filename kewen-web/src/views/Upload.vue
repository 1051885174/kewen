<template>
    <div>
        <el-container class="all">
            <el-header class="uploadHeader">上传文件</el-header>
            <el-main class="main">
                <div class="uploadFile">
                    <!-- 上传文件：<el-select v-model="typeValue" placeholder="请选择">
                        <el-option
                          v-for="item in options"
                          :key="item.value"
                          :label="item.label"
                          :value="item.value">
                        </el-option>
                      </el-select> -->
                      上传文件类型:  <el-select v-model="fileValue" placeholder="请选择">
                        <el-option
                          v-for="item in fileOptions"
                          :key="item.value"
                          :label="item.label"
                          :value="item.value">
                        </el-option>
                      </el-select>

                </div>
                <div class="upload">
                    <el-upload
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
                       @click="delFile" class="selectBtn">选取文件</el-button>
  <!-- 准备一个提交按钮 -->
<el-button type="primary" size="small" @click="onSubmitFile" class="uploadBtn">上传</el-button>
</el-upload>
                </div>
                <div class="uploadPic">
                  上传图片类型： <el-select v-model="picValue" placeholder="请选择">
                    <el-option
                      v-for="item in picOptions"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                  </el-select>
                  <!-- 上传图片年份： <el-date-picker
                  v-model="picYear"
                  type="year"
                  value-format="yyyy"
                  placeholder="选择年"
                  @change="setPicYear">
                </el-date-picker> -->
                 <!-- 选择查看不同年份的照片，从2020年开始 -->
                 <el-select v-model="picYear" placeholder="请选择年份" class="yearSelect" @change="setPicYear">
                  <el-option
                    v-for="item in options"
                    :key="item.value"
                    :value="item.value"
                    >
                  </el-option>
                </el-select>
                </div>
                <div class="upload">
                  <el-upload
                  ref="upload"
                  action="string"
                  :file-list="picList"	
                  :auto-upload="false"	
                  :http-request="uploadPic"
                  :on-change="handleChangePic"	
                  :on-preview="handlePreviewPic"	
                  :on-remove="handleRemovePic"
                  multiple="multiple">
                    <el-button slot="trigger"
                    size="small"
                    type="primary"
                     @click="delPic" class="selectBtn">选取文件</el-button>
<!-- 准备一个提交按钮 -->
<el-button type="primary" size="small" @click="onSubmitPic" class="uploadBtn">上传</el-button>
</el-upload>
              </div>
            </el-main>
        </el-container>
    </div>
</template>
<script>
export default {
  created() {
    this.getNowYear(); 
  },
    data() {
      return {
        options: [{
          value: '0',
          label: '文件'
        }, {
          value: '1',
          label: '图片'
        }],
        fileValue: '选择类型',
        picValue: '选择类型',
        picYear:'',
        fileOptions: [
          {
          value: 'IT来袭闭幕式',
          label: 'IT来袭闭幕式'
        }, {
          value: 'PPT制作',
          label: 'PPT制作'
          }
          , {
          value: 'LOGO设计',
          label: 'LOGO设计'
          },
          {
            value: '短视频制作',
          label:'短视频制作'
        },
          {
            value: '装机',
          label:'装机'
          }
          ,
          {
            value: '生活',
          label:'生活'
          }
          ,
          {
            value: '部门事务',
          label:'部门事务'
          }
          ,
          {
            value: '学习资料',
          label:'学习资料'
          }
          ,
          {
            value: '选择类型',
          label:'选择类型'
          }
          ,
          {
            value: '合照',
          label:'合照'
        }
        ],
        picOptions:[
          {
          value: 'IT来袭闭幕式',
          label: 'IT来袭闭幕式'
        }, {
          value: 'PPT制作',
          label: 'PPT制作'
          }
          , {
          value: 'LOGO设计',
          label: 'LOGO设计'
          },
          {
            value: '短视频制作',
          label:'短视频制作'
        },
          {
            value: '装机',
          label:'装机'
          }
          ,
          {
            value: '生活',
          label:'生活'
          }
          ,
          {
            value: '部门事务',
          label:'部门事务'
          }
          ,
          {
            value: '学习资料',
          label:'学习资料'
          }
          ,
          {
            value: '选择类型',
          label:'选择类型'
          }
        ],
        //上传部分
        fileList: [],//文件列表
        picList:[],//图片列表
            // 支持多选
        multiple: true,
        formData: "",
        formDataPic:"",
        file_type: "",
        picture_type: "",
        options: [],
        
      }
  },
  methods: {
    // 上传文件部分
       //点击上传文件触发的额外事件,清空fileList
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
    delFile () {
            this.fileList = [];
            console.log(this.file_type)
    },
    handleChange (file, fileList) {
      this.fileList = fileList;
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
    //保存按钮 上传文件
        onSubmitFile() {
            let formData = new FormData();
           //拿到存在fileList的文件存放到formData中
           for (let i = 0; i < this.fileList.length; i++) {
            formData.append("kw_file", this.fileList[i].raw);
           }
          console.log(formData);
          this.file_type = this.fileValue;
          console.log(this.file_type);
            //使用键值对方式存储)
            formData.append("file_type", this.file_type);
            //console.log();
            this.$ajax.post('https://www.cdukewen.top/User_Upload', formData
            ).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    this.$message.success(data.msg);
                    console.log(data.msg);
                }
            })
    },
    // 上传图片部分
    delPic () {
            this.picList = [];
            //console.log(this.file_type)
    },
    handleChangePic(file, picList) {
      this.picList = picList;
      console.log(this.picList);
    },
    //自定义上传文件
    uploadPic(file) {
      this.formData.append("together_picture_file", file.file);
      // console.log(file.file, "sb2");
    },
    //删除文件
    handleRemovePic (file, picList) {
      console.log(file, picList);
    },
    // 点击文件
    handlePreviewPic (file) {
      console.log(file);
    },
        //上传图片年份
      setPicYear(val) {
      console.log("hello");
      this.picYear = val;
      console.log(this.picYear); 
        },
      //保存按钮 上传合照
        onSubmitPic() {
            let formDataPic = new FormData();
           //拿到存在fileList的文件存放到formData中
           for (let i = 0; i < this.picList.length; i++) {
            formDataPic.append("picture_file", this.picList[i].raw);
           }
          console.log(formDataPic);
          this.picture_type= this.picValue;
          console.log(this.picture_type);
            //使用键值对方式存储)
          formDataPic.append("picture_type", this.picture_type);
          formDataPic.append("picture_year", this.picYear);
            //console.log();
            this.$ajax.post('https://www.cdukewen.top/picture_upload', formDataPic
            ).then(response => {
                const data = response.data;
                if (data.code == 1) {
                    this.$message.success(data.msg);
                    console.log(data.msg);
                }
            })
        },
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
.uploadHeader{
    background-color: #67C23A;
    color: aliceblue;
    font-size: 36px;
    font-weight: 700;
    text-align: center;
}
.all .main{
    display: flex;
    flex-direction: column;
    gap: 20px;
}
/*.upload{
  display: flex;
  flex-direction: row;
  gap: 10px;
}*/
.upload .selectBtn{
  display: block;
  margin-right: 10px;
}
/*.upload .uploadBtn{
  display: block;
  margin-left: 10px;
}*/
.uploadPic .yearSelect{ 
  display: inline-block;
  margin-left: 10px;
}
</style>