FROM php:7.0-fpm

RUN apt-get update && \
    docker-php-ext-install -j$(nproc) bcmath mbstring sockets

WORKDIR /var/www/html

RUN usermod -u 1000 www-data

#CMD ["php-fpm", "-F"]

#EXPOSE 9000