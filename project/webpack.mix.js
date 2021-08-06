const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | コンパイル対象ファイル、バンド対象ファイルをここに記述する
 |
 | mix.js('resources/assets/js/app.js', 'public/js'); この記述で以下画実行される
 | ・ES2015記法
 | ・モジュール
 | ・.vueファイルのコンパイル
 | ・開発環境向けに圧縮
 |
 |　生のjsファイルをバンドルする場合は「mix.babel()」を使う。ESS5記法に変換される。
 |
 */
mix.ts('resources/ts/front/main/main.ts', 'public/js/front')
    .sass('resources/sass/front/main.scss', 'public/css/front')
    .ts('resources/ts/admin/main/main.ts', 'public/js/admin')
    .sass('resources/sass/admin/main.scss', 'public/css/admin')
    .ts('resources/ts/admin/login/login.ts', 'public/js/admin')
    .sass('resources/sass/admin/login.scss', 'public/css/admin')
    .version();

mix.webpackConfig({
    resolve: {
        alias: {
            '@root': path.resolve(__dirname, 'resources/ts/'),
            '@admin': path.resolve(__dirname, 'resources/ts/admin'),
            '@front': path.resolve(__dirname, 'resources/ts/front'),
        }
    },
    node: {
        fs: 'empty',
    },
});
