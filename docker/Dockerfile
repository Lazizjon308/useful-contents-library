FROM php:8.4-fpm
WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    curl \
    git \
    nano \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql pgsql
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
#COPY ./docker/php.ini /usr/local/etc/php/conf.d/
#
#RUN chown -R www-data:www-data /var/www \
#    && chmod -R 755 /var/www/storage \
