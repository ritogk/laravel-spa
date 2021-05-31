## laravelとspaのサンプルソース

## URL
https://portfolio-rito.net/

### テスト用ユーザー
メールアドレス:test@test.co.jp<br>
パスワード:test

## 使用技術・環境
### フロントエンド
- vue
- vuex
- bootstrap-vue
- typescript
- axios
- bootstrap
- jquery

### バックエンド
- php
- laravel
- phpunit
- larastan
- laravel dusk
- docker
- docker-compose
- nginx
- mysql

### 開発環境
- vscode
- eslint
- github
- docker
- docker-compose

### 開発環境
- 本番環境(AWS)
- eslint
- github
- docker
- docker-compose

### CI/CD
- GithubActions

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

git
```
$ mkdir laravel-spa
$ cd laravel-spa
$ git init
$ git remote add origin https://github.com/homing-job/laravel-docker-github-actions.git
$ git pull origin dev
```

docker
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

seeder用の画像DL
```
$ wget https://github.com/homing-job/laravel-spa/files/6542800/seeder_images.zip
$ unzip seeder_images.zip -d project/storage/app/public/images
$ rm -f seeder_images.zip
```
