const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true
})
let proxyObj={}

proxyObj['/']={
    //websocket
    ws:false,
    target:'http://localhost:8081',
    //发送请求头host会被设置成target
    changeOrigin:true,

    //不重写请求地址
    pathRewrite:{
        '^/':'/'
    }
}



module.exports={
    devServer:{
        host:'localhost',
        port:'8080',
        proxy:proxyObj
    }
}
