// const { defineConfig } = require('@vue/cli-service')
// module.exports = defineConfig({
//     transpileDependencies: true,
//     configureWebpack: {
//         resolve: {
//           fallback: {
//             path: require.resolve('path-browserify'),
//           },
//         },
//       },
// })
// let proxyObj={}

// proxyObj['/']={
//     //websocket
//     ws:false,
//     target:'http://localhost:8081',
//     //发送请求头host会被设置成target
//     changeOrigin:true,

//     //不重写请求地址
//     pathRewrite:{
//         '^/':'/'
//     }
// }

// module.exports={
//     devServer:{
//         host:'localhost',
//         port:'8080',
//        // proxy:proxyObj
//   },
 
// }
// //---------------判断配置文件是否开启了gzip加速Start---------------
// // 引入压缩文件的组件，该插件会对生成的文件进行压缩，生成一个.gz文件
// // const CompressionWebpackPlugin = require('compression-webpack-plugin')
// // // ---------------判断配置文件是否开启了gzip加速End---------------

// // module.exports = {
// //   // 如果你不需要生产环境的 source map，可以将其设置为 false 以加速生产环境构建。
// //   productionSourceMap: false,
// //   configureWebpack: config => {
// //       config.plugins.push(new CompressionWebpackPlugin({
// //           filename: '[path][name].gz',
// //           algorithm: 'gzip',  // 使用gzip压缩
// //           threshold: 10240, // 资源大于10240=10KB时会被压缩
// //           minRatio: 0.8,
// //           deleteOriginalAssets: false, // 是否删除原资源
// //           // test: new RegExp( // 满足正则表达式的文件会被压缩
// //           //   '\\.(' + ['js', 'css'].join('|') + ')$'
// //           // ),
// //           test: /\.(js|css)$/i
// //       }));
// //   }
// // }
const path = require("path");


const CompressionPlugin = require("compression-webpack-plugin");

module.exports = {
  // 默认在生成的静态资源文件名中包含hash以控制缓存
  filenameHashing: true,

  // 是否在保存的时候使用 `eslint-loader` 进行检查。
  lintOnSave: false,

  //开启gzip
  configureWebpack: (config) => {
    if (process.env.NODE_ENV === "production") {
      return {
        plugins: [
          new CompressionPlugin({
            algorithm: "gzip",
            test: /\.(js|css)$/, // 匹配文件名
            threshold: 10240, // 对超过10k的数据压缩
            deleteOriginalAssets: false, // 不删除源文件
            minRatio: 0.8, // 压缩比
          }),
        ],
      };
    }
  },

  //移除map文件
  productionSourceMap: false,

};
