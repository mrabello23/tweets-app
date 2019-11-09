FROM php:7.2-apache

RUN apt-get update && apt-get install zip unzip git -y
RUN pecl install xdebug-2.6.0
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install bcmath

RUN a2enmod rewrite

COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer --disable-tls

RUN apt-get install python2.7 sysstat python-pip -y
RUN DD_API_KEY=ca0debc37c552558e2dbf5d4b0fce92f sh -c "$(curl -L https://raw.githubusercontent.com/DataDog/dd-agent/master/packaging/datadog-agent/source/setup_agent.sh)"
