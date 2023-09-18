const path = require("path");

module.exports = {
    publicPath: '',
    outputDir: path.resolve(__dirname, "../public_html/"),
    configureWebpack: {
        devServer: {
          historyApiFallback: true
        }
      },
}