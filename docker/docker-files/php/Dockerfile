FROM php:7.1.10-fpm

# Update an upgrade image php
RUN apt-get update && apt-get upgrade -y

# Install the basic
ENV PHP_EXT_XDEBUG_VERSION "2.5.5"

RUN apt-get update && apt-get install -y git curl \
    && yes | pecl install xdebug-$PHP_EXT_XDEBUG_VERSION && docker-php-ext-enable xdebug

# Configs
COPY config/xdebug.ini /usr/local/etc/php/conf.d/zz-xdebug.ini

# php composer
RUN cd /usr/src && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN curl --silent --show-error https://getcomposer.org/installer | php \
#     && mv composer.phar /usr/local/bin/composer