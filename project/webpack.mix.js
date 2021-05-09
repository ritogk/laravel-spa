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
mix.ts('resources/ts/front/front.ts', 'public/js')
    .ts('resources/ts/admin/admin.ts', 'public/js')
    .ts("resources/ts/admin/router.ts", "public/js")
    .js("resources/js/content.js", "public/js")
    .js('resources/js/content/agree.js', 'public/js')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/content.scss', 'public/css')
    .version();

mix.webpackConfig({
    resolve: {
        alias: {
            '@root': path.resolve(__dirname, 'resources/ts/')
        }
    },
    node: {
        fs: 'empty',
    },
});
