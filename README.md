<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Proje Hakkında

Bu proje Yaanimail task case çalışması için yapılmıştır. Projede kod analizi için <a href="https://laravel.com" target="_blank">Larastan</a> paketi ve SonarLint kullanılmıştır.

## Kod Hakkında

Proje Factory ve Adaptor Patternlerden güç alınarak geliştirilmiştir.

git@github.com:umitkutuk/clevel-test-case.git
## Kurulum

Projeyi ayaklandırmak için aşağıdaki adımları tek tek takip edebilirsiniz.
```
git clone https://github.com/umitkutuk/yaanimail.git
```
```
composer install
```
```
cd  yaanimail
```
```
php artisan migrate
```
```
php artisan serve
```

## Öz Eleştiri

Sistem hızlı geliştirildiğinden birkaç yerde refactor edilmesi gerekir.


