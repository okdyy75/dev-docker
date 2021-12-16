# dev-docker
検証用Docker

## Docker基本
Dockerファイル作成前に手元でコンテナを作成して検証＆デフォルト構成確認

### イメージ取得
```
docker pull nginx:1.21.4-alpine
docker pull php:8.1.0-fpm-alpine3.15
docker pull mysql:5.7.35
```

### 初回コンテナ立ち上げ
```
docker run -d --name nginx -p 80:80 nginx:1.21.4-alpine
docker run -d --name php-fpm php:8.1.0-fpm-alpine3.15
docker run -d --name mysql mysql:5.7.35
```

### コンテナ状態確認
```
docker ps -a
```

### コンテナに入る
```
docker exec -it nginx sh
docker exec -it php-fpm sh
docker exec -it mysql sh
```

### コンテナ停止
```
docker stop nginx
docker stop php-fpm
docker stop mysql
```

### コンテナ起動
```
docker start nginx
docker start php-fpm
docker start mysql
```

### コンテナ削除
```
docker rm nginx
docker rm php-fpm
docker rm mysql
```
