const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
    transpileDependencies: true,
    configureWebpack: {
        resolve: {
          fallback: {
            path: require.resolve('path-browserify'),
          },
        },
      },
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
