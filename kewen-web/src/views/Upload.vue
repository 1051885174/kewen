<template>
    <div>
        <el-container class="all">
            <el-header class="uploadHeader">上传文件</el-header>
            <el-main class="main">
                <!-- 上传类型是上传活动照片还是上传部门资料 -->
                <div class="uploadType">
                    上传类型:<el-select v-model="value" placeholder="请选择">
                        <el-option
                          v-for="item in options"
                          :key="item.value"
                          :label="item.label"
                          :value="item.value">
                        </el-option>
                      </el-select>
                </div>
                <div class="fileType">
                    文件类型/图片类型：
                    <el-select v-model="value" placeholder="请选择">
                      <el-option
                        v-for="item in options"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                      </el-option>
                    </el-select>
                </div>
                <div class="upload">
                    <el-upload
                    class="upload-demo"
                     drag
                     action="https://jsonplaceholder.typicode.com/posts/"
                     multiple
                     accept=".jpg .png .doc .docx">
                     <i class="el-icon-upload"></i>
                      <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                      <div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>
</el-upload>
                </div>
            </el-main>
        </el-container>
    </div>
</template>
<script>
export default {
    data() {
      return {
        options: [{
          value: '选项1',
          label: '黄金糕'
        }, {
          value: '选项2',
          label: '双皮奶'
        }, {
          value: '选项3',
          label: '蚵仔煎'
        }, {
          value: '选项4',
          label: '龙须面'
        }, {
          value: '选项5',
          label: '北京烤鸭'
        }],
        value: ''
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
</style>