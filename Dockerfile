FROM php:8.3-apache

# 1. Установка системных зависимостей и расширений PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip \
    && a2enmod rewrite

# 2. Изменение Document Root для Apache на public-директорию Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/project-task-app/public

# 3. Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Установка рабочей директории
WORKDIR /var/www/html/project-task-app

# 5. Настройка прав (Apache использует пользователя www-data)
RUN chown -R www-data:www-data /var/www/html/project-task-app
