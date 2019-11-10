FROM php:7.2-apache

RUN apt-get update && apt-get install zip unzip git -y
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install bcmath

RUN a2enmod rewrite

COPY docker/php-apache/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer --disable-tls
