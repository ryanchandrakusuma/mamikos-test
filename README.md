<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

This project is a result of mamikos' study case using Laravel.

## How to Install

1. Install any dependencies needed
```composer install```

2. Migrate the databases including the seed (for roles purposes)
```php artisan migrate```

3. Install passport for auth purposes
```php artisan passport:install```

4. Generate RSA Key (I'm using 4096, but you can use at least 2048) from any key generator and put it to .env (there's example on .env.example)
5. Run scheduler locally for development purposes
```php artisan schedule:work```

6. Export postman's collection and environment so you can try the APIs!
7. Happy coding!
```php artisan serve```

This project is using Laravel and MySQL.
