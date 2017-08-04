// webpack.config.js
var Encore = require("@symfony/webpack-encore")

Encore.setOutputPath("web/build/")
  .setPublicPath("/build")
  .cleanupOutputBeforeBuild()
  .addEntry("appjs", "./app/Resources/assets/js/app.js")
  .addStyleEntry("appcss", "./app/Resources/assets/scss/app.scss")
  .enableSassLoader()
  .autoProvidejQuery()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning()

module.exports = Encore.getWebpackConfig()
