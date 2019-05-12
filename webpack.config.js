var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .addEntry('js/app', './assets/js/app.js') // your js entry file
    .addStyleEntry('css/app', './assets/less/app.less') // your less/scss entry file

    .enableLessLoader()
    .enablePostCssLoader()
    .enableSingleRuntimeChunk()
;

module.exports = Encore.getWebpackConfig();
