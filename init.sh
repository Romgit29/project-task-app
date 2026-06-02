#!/bin/sh

# Проверяем, был ли проект инициализирован ранее
if [ ! -f ".initialized" ]; then
    echo "Инициализация проекта..."

    # 1. Установка зависимостей Composer
    if [ ! -d "vendor" ]; then
        composer install --no-interaction --prefer-dist --optimize-autoloader
    fi

    # 2. Создание файла окружения .env
    if [ ! -f ".env" ]; then 
        cp .env.example .env
    fi

    # 3. Генерация ключа приложения
    if ! grep -q "APP_KEY=base64:" .env; then
        php artisan key:generate --force
    fi
    
    # Миграции
    php artisan migrate --force

    # Создаем маркер завершения инициализации
    touch .initialized
    
    echo "Инициализация успешно завершена"
else
    echo "Проект уже инициализирован. Пропуск шагов настройки."
fi

exec "$@"

