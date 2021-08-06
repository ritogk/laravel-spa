# laravel + spa + awsのポートフォリオ

## 概要
求人検索サービスです。<br>
求人の追加、求人への応募が行えます。

## URL
https://portfolio-rito.net/

### テスト用ユーザー
メールアドレス:test@test.co.jp<br>
パスワード:test

| ログイン(会員)　|会員登録  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/128485140-f79f1455-1c1d-40f0-815c-1a14431821a2.png">   | <img src="https://user-images.githubusercontent.com/72111956/128484253-74ea0ff4-58dd-4de8-813a-d13bd3c83a74.png">   |
<br>

| 職種選択　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/128484272-acff4141-c1ca-442a-9e7a-cc6bde9c1402.png">   |   |
<br>

| 仕事一覧　|仕事詳細  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/128484261-4b470a56-a841-4821-84ec-223fa16040f3.png">   | <img src="https://user-images.githubusercontent.com/72111956/128484855-6db556c5-9e55-411b-9216-38d152b93f2c.png">   |
<br>

| ログイン(管理者)　|管理画面  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/128485143-120a0c14-0239-44b7-acb8-8160f09dc440.png">   | <img src="https://user-images.githubusercontent.com/72111956/120468483-3dae8100-c3dc-11eb-85fb-c2f95b207100.PNG">   |
<br>

| 選考一覧　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408952-f77d0180-c38a-11eb-933e-57bd51f473cb.png">   |   |
<br>

| 職種マスタ(一覧)　|職種マスタ(新規)  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120468478-3c7d5400-c3dc-11eb-9c07-8234287aff5c.PNG">   | <img src="https://user-images.githubusercontent.com/72111956/120468492-4010db00-c3dc-11eb-9903-a13d70a2b7b5.PNG">   |
<br>

| 職種マスタ(編集)　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120468484-3dae8100-c3dc-11eb-93b1-2c0ec5d40d6b.png">   |   |
<br>

| 仕事マスタ(一覧)　|仕事マスタ(新規)  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408942-f51aa780-c38a-11eb-8593-6bf999d57296.png">   | <img src="https://user-images.githubusercontent.com/72111956/120408950-f64bd480-c38a-11eb-9f7f-be43865d30c0.png">   |
<br>

| 仕事マスタ(編集)　|  |
| :----: | :----: |
| <img src="https://user-images.githubusercontent.com/72111956/120408951-f6e46b00-c38a-11eb-851d-6d733c503f70.png">   |   |
<br>

## 使用技術・環境
### フロントエンド
- vue 2.6.12
- vue-router 3.4.9
- vuex 3.6.2
- bootstrap-vue 2.19.x
- typescript 4.2.4

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
- windows
- wsl2

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
バックエンドとフロントエンドをapiとvueで切り離した設計<br>
フロントエンド側をspaで作成<br>
一般会員と管理者のマルチログイン機能<br>
typescript, 静的チェック, テストコード等を使用して品質向上<br>
コンテナはローカル環境と本番環境で同じものを使用<br>
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
$ git remote add origin https://github.com/homing-job/laravel-spa.git
$ git pull origin dev
```

#### docker
```
$ sudo docker-compose up -d
$ sudo cp project/.env.base project/.env
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

## 職務経歴書
https://github.com/homing-job/laravel-spa/blob/main/resume.md
