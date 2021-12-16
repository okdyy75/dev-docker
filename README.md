# dev-docker
検証用Docker

## 環境
- php8
- laravel6
- nginx1
- mysql5

### Nginx
- foregroundで動くように`daemon off;`を追記
- LaravelとNginxのドキュメントを参考に修正

#### Laravelのnginx設定

```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

https://readouble.com/laravel/6.x/ja/installation.html#pretty-urls

#### NginxのシンプルなPHPサイトの設定

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

https://nginx.org/en/docs/http/request_processing.html#simple_php_site_configuration

### PHP-FPM
phpコンテナ内に入ってphp拡張モジュールが入っているか確認。足りない場合は追加
```
# 確認
php -m
# モジュール追加
docker-php-ext-install bcmath pdo_mysql
```

### MySQL
- エラーログを出力するように設定
- 文字コードをUTF-8に設定する（絵文字の文字化けを回避するためutf8mb4）
