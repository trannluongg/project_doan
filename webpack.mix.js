const mix = require('laravel-mix');
let webpack = require('webpack');
const path = require('path');

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
directory_asset = 'public/assets';
mix.setPublicPath(path.normalize(directory_asset));
new webpack.ContextReplacementPlugin(/\.\/locale$/, 'empty-module', false, /js$/);

var build_js = [
    {
        from: 'resources/js/slideshow/slideshow.js',
        to: 'js/slideshow_index.js'
    },
    {
        from: 'resources/js/slideshow/slideshow_product.js',
        to: 'js/slideshow_product.js'
    },
    {
        from: 'resources/js/slideshow/slideshow_search.js',
        to: 'js/slideshow_search.js'
    },
    {
        from: 'resources/js/pages/home/home.js',
        to: 'js/home.js'
    },
    {
        from: 'resources/js/pages/product/product.js',
        to: 'js/product.js'
    },
    {
        from: 'resources/js/pages/search/search_mobile.js',
        to: 'js/search_mobile.js'
    },
    {
        from: 'resources/js/pages/product_detail/product_detail.js',
        to: 'js/product_detail.js'
    },
    {
        from: 'resources/js/pages/user_info/user_info.js',
        to: 'js/user_info.js'
    },
    {
        from: 'resources/js/pages/register/register.js',
        to: 'js/register.js'
    },
    {
        from: 'resources/js/pages/login/login.js',
        to: 'js/login.js'
    },
    {
        from: 'resources/js/pages/cart/cart.js',
        to: 'js/cart.js'
    },
    {
        from: 'resources/js/pages/Admin/module_group/module_group.js',
        to: 'js/module_group.js'
    },
    {
        from: 'resources/js/pages/Admin/permission/permission.js',
        to: 'js/permission.js'
    },
    {
        from: 'resources/js/pages/Admin/module/module.js',
        to: 'js/module.js'
    },
    {
        from: 'resources/js/pages/Admin/role/role.js',
        to: 'js/role.js'
    },
    {
        from: 'resources/js/pages/Admin/producer/producer.js',
        to: 'js/producer.js'
    },
    {
        from: 'resources/js/pages/Admin/brand/brand.js',
        to: 'js/brand.js'
    },
    {
        from: 'resources/js/pages/Admin/category/category.js',
        to: 'js/category.js'
    },
    {
        from: 'resources/js/pages/Admin/product/product.js',
        to: 'js/product.js'
    },
    {
        from: 'resources/js/pages/Admin/user/user_admin.js',
        to: 'js/user_admin.js'
    },
    {
        from: 'resources/js/pages/Admin/bill/bill_admin.js',
        to: 'js/bill_admin.js'
    },
    {
        from: 'resources/js/pages/Admin/acc_admin/acc_admin.js',
        to: 'js/acc_admin.js'
    },
];

let build_scss = [
    {
        from: 'resources/sass/pages/home/home.scss',
        to: 'css/home.css'
    },
    {
        from: 'resources/sass/pages/product/product.scss',
        to: 'css/product_user.css'
    },
    {
        from: 'resources/sass/pages/search/search.scss',
        to: 'css/search.css'
    },
    {
        from: 'resources/sass/pages/product_detail/product_detail.scss',
        to: 'css/product_detail.css'
    },
    {
        from: 'resources/sass/pages/cart/cart.scss',
        to: 'css/cart.css'
    },
    {
        from: 'resources/sass/pages/user_info/user_info.scss',
        to: 'css/user_info.css'
    },
    {
        from: 'resources/sass/pages/register/register.scss',
        to: 'css/register.css'
    },
    {
        from: 'resources/sass/pages/login/login.scss',
        to: 'css/login.css'
    },
    {
        from: 'resources/sass/pages/Admin/module_group/module_group.scss',
        to: 'css/module_group.css'
    },
    {
        from: 'resources/sass/pages/Admin/permission/permission.scss',
        to: 'css/permission.css'
    },
    {
        from: 'resources/sass/pages/Admin/module/module.scss',
        to: 'css/module.css'
    },
    {
        from: 'resources/sass/pages/Admin/role/role.scss',
        to: 'css/role.css'
    },
    {
        from: 'resources/sass/pages/Admin/producer/producer.scss',
        to: 'css/producer.css'
    },
    {
        from: 'resources/sass/pages/Admin/brand/brand.scss',
        to: 'css/brand.css'
    },
    {
        from: 'resources/sass/pages/Admin/category/category.scss',
        to: 'css/category.css'
    },
    {
        from: 'resources/sass/pages/Admin/product/product.scss',
        to: 'css/product.css'
    },
    {
        from: 'resources/sass/pages/Admin/user/user_admin.scss',
        to: 'css/user_admin.css'
    },
    {
        from: 'resources/sass/pages/Admin/bill/bill_admin.scss',
        to: 'css/bill_admin.css'
    },
    {
        from: 'resources/sass/pages/Admin/acc_admin/acc_admin.scss',
        to: 'css/acc_admin.css'
    },
];
/*
    Javascript
 */
build_js.map((file) => {
    mix.js(file.from, file.to);
});

/*
    Css
 */
build_scss.map((file) => {
    mix.sass(file.from, file.to).minify(directory_asset + '/' + file.to).version();
});


mix.options({
    processCssUrls: false
})
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

// mix.disableNotifications();
mix.webpackConfig({
    plugins: [
        new webpack.ContextReplacementPlugin(/\.\/locale$/, 'empty-module', false, /js$/),
        new webpack.IgnorePlugin(/^codemirror$/),
    ],
    node: {
        fs: "empty"
    },
    module: {
        rules: [
            {
                test: /\.modernizrrc.js$/,
                use: ['modernizr-loader']
            },
            {
                test: /\.modernizrrc(\.json)?$/,
                use: ['modernizr-loader', 'json-loader']
            }
        ]
    },
    resolve: {
        alias: {
            "handlebars": "handlebars/dist/handlebars.js",
            modernizr$: path.resolve(__dirname, "resources/assets/js/.modernizrrc")
        }
    }
});
if (mix.inProduction()) {
    mix.version();
}
// mix.browserSync('123job.abc');
new webpack.LoaderOptionsPlugin({
    test: /\.s[ac]ss$/,
    options: {
        includePaths: [
            path.resolve(__dirname, './public/')
        ]
    }
});

