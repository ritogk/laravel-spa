# laravel + spaのサンプルソース

## 概要
求人の検索サービスです。<br>
求人設定、選考確認、求人への応募が行えます。

| 職種選択　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408935-f350e400-c38a-11eb-97aa-748d152cf5ac.png">   |   |
<br>

| 仕事一覧　|仕事詳細  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408938-f4821100-c38a-11eb-80c1-b0c25ba5081c.png">   | <img src="https://user-images.githubusercontent.com/72111956/120408937-f3e97a80-c38a-11eb-87c1-51816f23ad47.png">   |
<br>

| ログイン　|管理画面  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408940-f51aa780-c38a-11eb-9199-28af63b2b620.png">   | <img src="https://user-images.githubusercontent.com/72111956/120408929-f21fb700-c38a-11eb-9781-e277c9937105.png">   |
<br>

| 選考一覧　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408952-f77d0180-c38a-11eb-933e-57bd51f473cb.png">   |   |
<br>

| 仕事カテゴリマスタ(一覧)　|仕事カテゴリマスタ(新規)  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408943-f5b33e00-c38a-11eb-908e-7aaa55ee28d0.png">   | <img src="https://user-images.githubusercontent.com/72111956/120408945-f5b33e00-c38a-11eb-9833-a6da62f6b75d.png">   |
<br>

| 仕事カテゴリマスタ(編集)　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408948-f64bd480-c38a-11eb-8dc5-0cd51d0e1d60.png">   |   |
<br>

| 仕事マスタ(一覧)　|仕事マスタ(新規)  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408942-f51aa780-c38a-11eb-8593-6bf999d57296.png">   | <img src="https://user-images.githubusercontent.com/72111956/120408950-f64bd480-c38a-11eb-9f7f-be43865d30c0.png">   |
<br>

| 仕事マスタ(編集)　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408951-f6e46b00-c38a-11eb-851d-6d733c503f70.png">   |   |
<br>

## URL
https://portfolio-rito.net/

### テスト用ユーザー
メールアドレス:test@test.co.jp<br>
パスワード:test

## 使用技術・環境
### フロントエンド
- vue 2.6.12
- vue-router 3.4.9
- vuex 3.6.2
- bootstrap-vue 2.19.x
- typescript 4.2.4
- axios 0.19
- bootstrap 4.x.x
- jquery 3.2

### バックエンド
- php 7.4
- laravel 8.4.0
- docker 20.10.4
- docker-compose 1.11.2
- nginx 8.3.0
- mysql 8.0.20

### 開発環境
- vscode
- eslint
- github

### CI/CD
- GithubActions
- larastan 0.7.x
- PHPUnit 9.3.3
- laravel Dusk 6.9

### 本番環境(AWS)
- VPC
- EC2
- ALB
- RDS
- ElastiCache
- S3
- Route53
- ACM

![aws構成図](https://user-images.githubusercontent.com/72111956/120178867-e88c3700-c244-11eb-9410-372e8fc977b9.png)

## 工夫した点
フロント側、管理側をspaで作成<br>
Laravelをapiとして使用(一部除く)<br>
ci/cdでテスト、デプロイを自動化<br>
セキュリティを意識したaws構成<br>
高可用でスケール可能なaws構成<br>

## 開発環境構築
### 初期セットアップ

#### git
```
$ mkdir laravel-spa
$ cd laravel-spa
$ git init
$ git remote add origin https://github.com/homing-job/laravel-docker-github-actions.git
$ git pull origin dev
```

#### docker
```
$ sudo docker-compose up -d
$ sudo cp project/.env.base project/.env
$ sudo vim project/.env
$ sudo docker-compose exec -T db mysql -uroot -proot -e'create database laravel'
$ sudo docker-compose exec -T php composer install
$ sudo docker-compose exec -T php npm install
$ sudo docker-compose exec -T php npm run prod
$ sudo docker-compose exec -T php php artisan migrate:refresh --seed
$ sudo docker-compose exec -T php php artisan key:generate
$ sudo docker-compose exec -T php chmod -R 777 storage
$ sudo docker-compose exec -T php chmod -R 777 bootstrap/cache
$ sudo docker-compose exec -T php php artisan storage:link
```

#### seeder用の画像DL
```
$ wget https://github.com/homing-job/laravel-spa/files/6542800/seeder_images.zip
$ unzip seeder_images.zip -d project/storage/app/public/images
$ rm -f seeder_images.zip
```
