FROM php:8.2-fpm

RUN apt update && \
    apt install -y zip libzip-dev libpng-dev libicu-dev libxml2-dev

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-install mysqli pdo pdo_mysql gd zip intl xml

RUN apt clean