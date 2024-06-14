#!/bin/sh

# Composer依存関係をインストール
if [ -f /var/www/html/composer.json ]; then
  composer install --no-interaction --working-dir=/var/www/html
fi

# PHP-FPMを起動
exec "$@"