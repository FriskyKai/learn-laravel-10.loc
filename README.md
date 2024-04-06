## Учебный проект
Для запуска проекта выполните следующие команды:
```sh
git clone https://github.com/FriskyKai/learn-laravel-10.loc
```

```sh
cd learn-laravel-10.loc
```

```sh
composer install
```

```sh
php artisan key:generate
```

Переименуйте файл .env.example в .env и пропишите настройки подключения к БД

```sh
php artisan migrate --seed
```
