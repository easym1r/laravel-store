# Проект-продуктовый каталог (реализация с помощью Laravel)

В проекте используется: Docker-compose, Laravel, HTML шаблон-магазина взятый с colorlib

Сборка проекта происходит с помощью Docker-контейнеров (docker-compose)

Для установки и запуска проекта у себя выполните следующие шаги:
1. Создайте директорию под проект (например: cd /var/www/ & mkdir nudle-js)
2. Скачайте файлы проекта в вашу директорию (git clone and e.t.c.)
3. Запустите сборку и запуск контейнеров в фоновом режиме (убедитесь, что используемые Docker'ом порты свободны)
```
Команда для запуска: docker-compose up -d
Для остановки: docker-compose down
```
5. Далее необходимо установить зависимости laravel, для этого от лица контейнера php-cli используем команду:
```
docker-compose exec php-cli php composer install
```
6. Далее необходимо установить node и создать сборку проекта, чтобы работал laravel breeze (аутентификация), для этого от лица контейнера node используем команду:
```
docker compose exec node npm install
docker compose exec node npm run build
```
7. Осталось последнее, а именно настроить конфиг подключения к БД и выполнить миграции:
```
Для этого заходим в файл .env и выставляем следующие значения для параметров:
DB_DATABASE=laravel-store
DB_PASSWORD=secret

Далее выполняем миграции и наполняем созданные таблицы данными
docker-compose exec php-cli php artisan migrate
docker-compose exec php-cli php artisan db:seed
```
8. Всё, наш проект должен быть готов к работе. Перейдите в вашем браузере по адресу: localhost:80 и используйте функционал веб-сайта

Скриншоты проекта:

![Главная страница](https://github.com/easym1r/laravel-store/blob/master/readme/main.png)

![Страница с товарами](https://github.com/easym1r/laravel-store/blob/master/readme/products.png)

![Корзина](https://github.com/easym1r/laravel-store/blob/master/readme/cart.png)

![Страница с заказами](https://github.com/easym1r/laravel-store/blob/master/readme/order.png)
