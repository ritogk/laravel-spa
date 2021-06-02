# laravel + spaのサンプルソース

## 概要
求人の検索サービスです。<br>
求人設定、選考確認、求人への応募が行えます。

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

## 工夫した点
フロント画面側、管理画面側をspaで作成<br>
Laravelをapiとして使用(一部除く)<br>
ci/cdでテスト、デプロイを自動化<br>
セキュリティを意識したaws構成<br>
高可用でスケール可能なaws構成<br>
