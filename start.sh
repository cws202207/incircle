#!/bin/sh

# Nginxの設定ファイルを有効化
ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

# PHP-FPMとNginxをバックグラウンドで起動
service php7.4-fpm start
service nginx start

# フォアグラウンドでのプロセスを維持
tail -f /var/log/nginx/access.log /var/log/nginx/error.log