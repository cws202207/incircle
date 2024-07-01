# 概要

Dockerを使用してPHP-FPM、Nginx、およびMongoDBをセットアップし、PHPスクリプトからMongoDBに接続して情報を表示する方法を示します。

## プロジェクト構成

- **PHP-FPM**: PHPスクリプトの実行
- **Nginx**: Webサーバー
- **MongoDB**: NoSQLデータベース

## 事前準備


- DockerとDocker Composeがインストールされていることを確認してください。

## セットアップ手順

### 1. リポジトリのクローン

まず、リポジトリをクローンします。
githubが使えない場合はincircle.zipを使用してください。(どこかに置いておきます)
システム側で使って良いのがあれば、pushします。

```sh
git clone https://github.com/hogehoge/hogehoge-repo.git
cd hogehgoe-repo

```
### 2. Docker Composeの起動
```sh
docker-compose up --build
```
Docker Composeを使用してすべてのサービス（PHP-FPM、Nginx、MongoDB）を起動します。

### 3. MongoDBユーザーの作成
#### デフォルトは認証無しなので、本番で使用する際は、必要に応じて設定してください。
MongoDBコンテナにアクセスし、管理者ユーザーを作成します。

```sh
docker exec -it your-repo_mongo_1 mongo
```

以下のコマンドをMongoDBシェルで実行します。

```javascript
use admin
db.createUser({
  user: "admin",
  pwd: "password",
  roles: [{ role: "root", db: "admin" }]
})
```

### 4. コンテナの確認と操作
現在実行中のコンテナを一覧表示します。

```sh
docker-compose ps
```

#### コンテナのログ確認
特定のコンテナのログを確認します。例えば、nginxコンテナのログを確認する場合：

```sh
docker-compose logs nginx
```

#### コンテナにアクセス
特定のコンテナにシェルでアクセスします。例えば、PHP-FPMコンテナにアクセスする場合：

```sh
docker exec -it your-repo_php-fpm_1 sh
```

### 5. データベースの操作
MongoDBシェルにアクセス
MongoDBシェルにアクセスして、データベース操作を行います。

```sh
docker exec -it your-repo_mongo_1 mongo
```

#### データベースの作成
新しいデータベースを作成します。

```javascript
use newdatabase
```

#### コレクションの作成
新しいコレクションを作成します。

```javascript
db.createCollection("newcollection")
```

#### ドキュメントの挿入
コレクションにドキュメントを挿入します。

```javascript
db.newcollection.insert({ name: "example", type: "test" })
```

#### ドキュメントの検索
コレクション内のドキュメントを検索します。

```javascript
db.newcollection.find()
```
### 6. PHPスクリプトの確認

src/index.phpにアクセスして、PHPとMongoDBの情報を確認します。

ブラウザで以下のURLにアクセスします。

```sh
http://localhost/index.php
```
このページには、MongoDBへの接続情報、接続の結果、そしてPHPの情報が表示されるはずです。