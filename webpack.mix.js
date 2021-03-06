let mix = require('laravel-mix');
let webpack = require('webpack')
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/assets/js/admin/galleries.js', 'public/js/admin')
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .extract(['jquery', 'tether', 'bootstrap'])
    .autoload({
        jquery: ['$', 'jQuery', 'jquery'],
        tether: ['Tether'],
    })
    .browserSync({
        proxy: 'http://praslin.test',
        browser: 'google chrome',
        port: 3010,
    })
    .webpackConfig({
        resolve: {
            alias: {
                'styles': path.resolve(__dirname, 'resources/assets/sass'),
                '~js': path.resolve(__dirname, 'resources/assets/js'),
            }
        },
        plugins: [
            new webpack.LoaderOptionsPlugin({
                options: {
                    loaders: [
                        {
                            test: /\.vue$/,
                            loader: 'vue-loader'
                        },
                    ],
                }
            })
        ]
    });
