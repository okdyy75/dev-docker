# dev-docker
検証用Docker

## Docker基本
Dockerファイル作成前に手元でコンテナを作成して検証＆デフォルト構成確認

### イメージ取得
```
docker pull php:8.2-apache
docker pull mysql:8.0.33
```

### 初回コンテナ立ち上げ
```
docker run --rm --name apache php:8.2-apache
docker run --rm --name mysql -e MYSQL_ROOT_PASSWORD=root mysql:8.0.33
```

### コンテナ状態確認
```
docker ps -a
```

### コンテナに入る
```
docker exec -it apache bash
docker exec -it mysql bash
```

### コンテナ停止
```
docker stop apache
docker stop mysql
```

```


bin/cake bake migration CreateArticles

bin/cake migrations migrate
bin/cake migrations rollback

bin/cake bake all Articles -t CakephpFixtureFactories


```