# どんなdockerイメージを利用して構築をするか
FROM php:7.4.15-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

#composerをインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer

#npmインストール
COPY --from=node:lts /usr/local/bin /usr/local/bin
COPY --from=node:lts /usr/local/lib /usr/local/lib

# ミドルウェアインストール
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libpng-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql bcmath

# Laravelで必要になるmodRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

#コンテナ内に入った時のディレクトリを指定
WORKDIR /var/www/html

EXPOSE 80
