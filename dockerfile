FROM php:8.2-apache

WORKDIR /app/

RUN chown -R 777 /app/

RUN export DEBIAN_FRONTEND=noninteractive && \
apt-get update -yqq && \
apt-get install -y nano && \
apt-get install -y curl && \
apt-get install -y apt-utils zip unzip && \
apt-get install -y libzip-dev libpq-dev && \
docker-php-ext-install pdo pdo_mysql && \
docker-php-ext-install mysqli && \
docker-php-ext-enable mysqli &&\
docker-php-ext-configure zip && \
docker-php-ext-install zip && \
apt-get install -y sendmail libpng-dev && \
apt-get install -y zlib1g-dev 

# Install SOAP PHP Extension
RUN apt-get update && \
    apt-get install -y libxml2-dev && \
    docker-php-ext-install soap

# Image Handling PHP Extension --> 
RUN apt-get update && \
apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN composer global require laravel/installer \
&& export PATH="~/.composer/vendor/bin:$PATH" \
&& echo 'PATH="~/.composer/vendor/bin:$PATH"' >> ~/.bashrc \
&& /bin/bash -c 'source ~/.bashrc'

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
         && apt-get install -y nodejs \
         && npm install --global yarn

RUN a2enmod rewrite

RUN apt install -y git \
&& git config --global user.name "moshiur1412" \
&& git config --global user.email moshiur1412@gmail.com 

RUN echo memory_limit = -1 >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
