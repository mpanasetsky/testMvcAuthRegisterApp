FROM php:8.3-apache

RUN a2enmod rewrite

RUN docker-php-ext-install pdo pdo_mysql

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri \
  -e 's!/var/www/html!/var/www/html/public!g' \
  -e 's/AllowOverride None/AllowOverride All/g' \
  /etc/apache2/sites-available/000-default.conf

COPY php.ini /usr/local/etc/php/conf.d/

COPY . /var/www/html