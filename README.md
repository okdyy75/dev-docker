# dev-docker
docker検証用

## Docker
Dockerファイル作成前に手元でコンテナを作成して検証＆デフォルト構成確認

### イメージ取得
```
docker pull nginx:1.19.2-alpine
docker pull php:7.4.9-fpm-alpine3.12
docker pull mysql:5.7
```

### 初回コンテナ立ち上げ
```
docker run -d --name nginx -p 80:80 nginx:1.19.2-alpine
docker run -d --name php-fpm php:7.4.9-fpm-alpine3.12
docker run -d --name mysql mysql:5.7
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


## Docker+Laravelについて

## 環境
- php8
- laravel8
- nginx:1.19
- mysql:5.7

## Nginx
今回はnginx.confを直接修正。複数サイトになる場合はドメインごとにxxx.confを作成した方が良い。

- foregroundで動くように`daemon off;`を追記
- laravel公式に記述されているように下記追記
https://readouble.com/laravel/7.x/ja/installation.html

```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

- nginx公式ドキュメントを参考に修正
- シンプルなPHPサイトの構成
https://nginx.org/en/docs/http/request_processing.html#simple_php_site_configuration

```
server {
    listen      80;
    server_name example.org www.example.org;
    root        /data/www;

    location / {
        index   index.html index.php;
    }

    location ~* \.(gif|jpg|png)$ {
        expires 30d;
    }

    location ~ \.php$ {
        fastcgi_pass  localhost:9000;
        fastcgi_param SCRIPT_FILENAME
                      $document_root$fastcgi_script_name;
        include       fastcgi_params;
    }
}
```

## PHP-FPM
phpコンテナ内に入ってphp拡張モジュールが入っているか確認。足りない場合は追加
```
# 確認
php -m
# モジュール追加
docker-php-ext-install bcmath pdo_mysql
```

## MySQL
- エラーログを出力するように設定
- 文字コードをUTF-8に設定する（絵文字の文字化けを回避するためutf8mb4）
