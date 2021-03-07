FROM php:7.4-fpm-alpine

WORKDIR /var/www/project

RUN curl --silent https://getcomposer.org/composer-2.phar -o /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer