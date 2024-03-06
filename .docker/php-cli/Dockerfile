# Используем образ PHP CLI
FROM php:8.1-cli

# Обновляем текущие пакеты и устанавливаем необходимые
RUN apt-get update && apt-get install -y libmcrypt-dev mariadb-client \
    && docker-php-ext-install pdo_mysql pcntl

RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif

# Скачиваем установщик Composer
RUN apt-get install -y wget unzip curl
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN apt-get install -y cron

# Определяем пользователя по стандарту для работы с laravel artisan
USER 1000:1000

# Устанавливаем рабочую директорию
WORKDIR /var/www
